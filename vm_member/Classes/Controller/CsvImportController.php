<?php


namespace Typo3graf\VmMember\Controller;

/***
 *
 * This file is part of the "Vereinsmeier - Member management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 * csvUploadForm,csvUpload,csvMapping,csvImport,backToList
 *
 ***/


use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use Typo3graf\VmBase\Utility\FileUtility;
use Typo3graf\VmBase\Utility\PasswordUtility;
use Typo3graf\VmMember\Domain\Model\Member;
use Typo3graf\VmMember\Domain\Model\User;
use Typo3graf\VmMember\Domain\Model\UserGroup;
use Typo3graf\VmMember\Domain\Repository\UserRepository;
use Typo3graf\VmMember\Utility\HistoryUtility;
use Typo3graf\VmMember\Utility\MemberUtility;
use Typo3graf\VmClub\Utility\CsvUtility;
use TYPO3\CMS\Core\Resource\DuplicationBehavior;

/**
 * CsvImportController
 */
class CsvImportController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * persistenceManager
     *
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;



    /**
     * memberRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MemberRepository
     * @inject
     */
    protected $memberRepository = null;

    /**
     * membershipStatusRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository
     * @inject
     */
    protected $membershipStatusRepository = null;

    /**
     * salutationRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\SalutationRepository
     * @inject
     */
    protected $salutationRepository = null;

    /**
     * contributionRateRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\ContributionRateRepository
     * @inject
     */
    protected $contributionRateRepository = null;

    /**
     * userGroupRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\UserGroupRepository
     * @inject
     */
    protected $userGroupRepository = null;

    /**
     * editHistoryRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\EditHistoryRepository
     * @inject
     */
    protected $editHistoryRepository = null;

    /**
     * userRepository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     * @inject
     */
    protected $frontendUserRepository = null;

    /**
     * clubRepository
     *
     * @var \Typo3graf\VmClub\Domain\Repository\ClubRepository
     * @inject
     */
    protected $clubRepository = null;

    /**
     * Email Service
     *
     * @var \Typo3graf\VmBase\Service\EmailService
     * @inject
     */
    protected $emailService = null;

    /**
     * action csvUploadForm
     *
     * @return void
     */
    public function csvUploadFormAction()
    {

    }

    /**
     * action csvUpload
     *
     * @return void
     */
    public function csvUploadAction()
    {
        $overwriteExistingFiles = TRUE;

        $data = array();
        $namespace = key($_FILES);
        $targetFalDirectory = '1:/_temp_/';

        // Register every upload field from the form:
        $this->registerUploadField($data, $namespace, 'csvFile', $targetFalDirectory);

        // Initializing:
        /** @var \TYPO3\CMS\Core\Utility\File\ExtendedFileUtility $fileProcessor */
        $fileProcessor = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Utility\\File\\ExtendedFileUtility');

        //$fileProcessor->init(array(), $GLOBALS['TYPO3_CONF_VARS']['BE']['fileExtensions']);
        $fileProcessor->setExistingFilesConflictMode(DuplicationBehavior::REPLACE);
        $fileProcessor->setActionPermissions(array('addFile' => TRUE));
        $fileProcessor->dontCheckForUnique = $overwriteExistingFiles ? 1 : 0;
        // Actual upload
        $fileProcessor->start($data);
        $result = $fileProcessor->processData();

        // Do whatever you want with $result (array of File objects)
        foreach ($result['upload'] as $files) {
            /** @var \TYPO3\CMS\Core\Resource\File $file */
            $file = $files[0];	// Single element array due to the way we registered upload fields
        }

        $this->redirect('csvMapping',NULL ,NULL,array('file'=>$file->getIdentifier()));
    }

    /**
     * action csvMapping
     *
     * @return void
     */
    public function csvMappingAction()
    {
        $requiredDbFields = array(
            'Vorname'=> 'member_firstname',
            'Nachname' => 'member_lastname',
            'Benutzername oder E-Mail' => 'username',
        );
        $optionalDbFields = array(
            'Anrede' => 'member_form_of_address',
            'Titel' => 'member_title',
            'Straße und Hausnummer' => 'member_street',
            'PLZ' => 'member_zip_code',
            'Ort' => 'member_city',
            'Bundesland' => 'member_country_zone',
            'Land' => 'member_country',
            'Telefon 1' => 'member_phone1',
            'Telefon 2' => 'member_phone2',
            'Mobiltelefon' => 'member_mobile',
            'E-Mail' => 'member_email',
            'Geburtstag' => 'member_birthday',
            'Hochzeitstag' => 'member_wedding_date',
            'Mitgliedsnummer' => 'member_id',
            'Eintrittsdatum' => 'member_entry_date',
            'Austrittsdatum' => 'member_leaving_date',
            'Mitgliederstatus' => 'member_status',
            'Bemerkungen/Notizen' => 'member_note',
            'Beitragssatz' => 'member_contribution_rate',
            'Zahlungsweise' => 'member_payment_interval',
            'Zahlung ab' => 'member_first_payment_date',
            'Zahlungsart' => 'member_payment_method',
            'abweichender Kontoinhaber' => 'member_account_owner',
            'IBAN' => 'member_iban',
            'BIC' => 'member_bic',
            'Mandatsreferenz' => 'member_mandate_reference',
            'gültig ab' => 'member_mandate_valid',
        );
        $data = array();
        $csvFile = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('fileadmin'. $this->request->getArgument('file'));
        if ($csvFile){
            $source = @fopen($csvFile,"r");
            $csvHeader = fgetcsv($source,10000,';');
            foreach ($csvHeader as $map){
                $csvFields[] = CsvUtility::convertToUtf8Charset($map);
            }
        }
        $this->view->assign('csvFields',$csvFields);
        $this->view->assign('csvFile',$this->request->getArgument('file'));
        $this->view->assign('requiredDbFields',$requiredDbFields);
        $this->view->assign('optionalDbFields',$optionalDbFields);
    }

    /**
     * action csvImport
     *
     * @return void
     */
    public function csvImportAction()
    {
        $csvFile = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('fileadmin'. $this->request->getArgument('csvFile'));
        // Validation required fields
        if ((!in_array('member_firstname',$this->request->getArgument('mapping'))) || (!in_array('member_lastname',$this->request->getArgument('mapping')))||(!in_array('username',$this->request->getArgument('mapping'))) ){
            $this->addFlashMessage('L:Ein oder mehrere erforderlichen Felder sind im Mapping nicht belegt worden!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
            $this->forward('csvMapping',NULL ,NULL,array('file'=>$this->request->getArgument('csvFile')));
        }
        // Import member data
        $importSuccess = False;
        $datarows = 0;
        $membercount = 0;
        $importErrors = array();
        if (file_exists($csvFile)){
            $source = @fopen($csvFile,"r");
            if ($source){
            $csvHeader = fgetcsv($source,10000,';');
            while (!feof($source)){
                 $temp = fgetcsv($source,10000,';');
                 $datarows = ++$datarows;
                if (($temp) && ($temp[0] !=NULL)) {
                    $importSuccess = True;
                    $membercount = ++$membercount;
                    $member = new Member();
                    $login = new User();
                    foreach ($this->request->getArgument('mapping') as $key => $column) {
                        switch ($column) {
                            case 'member_firstname':
                                $member->setMemberFirstname(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_lastname':
                                $member->setMemberLastname(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'username':
                                $password = PasswordUtility::generatePassword();
                                $member->setPassword($password);
                                // Benutzername, Passwort und Benutzergruppe setzen
                                $login->setUsername(CsvUtility::convertToUtf8Charset($temp[$key]));
                                $login->setPassword(PasswordUtility::encryptPassword($password));
                                $login->setUsergroup(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
                                $usergroup = $this->userGroupRepository->findByUid(99);
                                $login->addUsergroup($usergroup);
                                $member->setMemberLogin($login);
                                break;
                            case 'member_form_of_address':
                                switch(CsvUtility::convertToUtf8Charset($temp[$key])){
                                    case 'Herr':
                                        $member->setMemberFormOfAddress(1);
                                        break;
                                    case 'Frau':
                                        $member->setMemberFormOfAddress(2);
                                        break;
                                    default:
                                        $importErrors[$membercount][] = 'Konnte Wert: '. CsvUtility::convertToUtf8Charset($temp[$key]) .' in Dateizeile '. $membercount . ' dem Feld Anrede nicht zu ordnen.';
                                        break;
                                }

                                break;
                            case 'member_title':
                                $member->setMemberTitle(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_street':
                                $member->setMemberStreet(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_zip_code':
                                $member->setMemberZipCode(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_city':
                                $member->setMemberCity(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_country_zone':
                                $member->setMemberCountryZone(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_country':
                                $member->setMemberCountry(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_phone1':
                                $member->setMemberPhone1(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_phone2':
                                $member->setMemberPhone2(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_mobile':
                                $member->setMemberMobile(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_email':
                                $member->setMemberEmail(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_birthday':
                                if ($temp[$key] != '') {
                                    list($d, $m, $y) = explode('.', $temp[$key]);
                                    $date = new \DateTime();
                                    $member->setMemberBirthday($date->setDate($y, $m, $d));
                                }
                                break;
                            case 'member_wedding_date':
                                if ($temp[$key] != '') {
                                    list($d, $m, $y) = explode('.', $temp[$key]);
                                    $date = new \DateTime();
                                    $member->setMemberWeddingDate($date->setDate($y, $m, $d));
                                }
                                break;
                            case 'member_id':
                                $member->setMemberID(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_entry_date':

                                if ($temp[$key] != '') {
                                    list($d, $m, $y) = explode('.', $temp[$key]);
                                    $date = new \DateTime();
                                    $member->setMemberEntryDate($date->setDate($y, $m, $d));
                                } else {
                                    if ($this->request->getArgument('autoEntryDate')){
                                       $member->setMemberEntryDate(new \DateTime('now'));
                                    }
                                }
                                break;
                            case 'member_leaving_date':
                                if ($temp[$key] != '') {
                                    list($d, $m, $y) = explode('.', $temp[$key]);
                                    $date = new \DateTime();
                                    $member->setMemberLeavingDate($date->setDate($y, $m, $d));
                                }
                                break;
                            case 'member_status':
                                $status= $this->membershipStatusRepository->findByStatusTitle(CsvUtility::convertToUtf8Charset($temp[$key]));
                                $member->setMemberStatus($status->getFirst());
                                break;
                            case 'member_note':
                                $member->setMemberNote(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_contribution_rate':
                                $rate= $this->contributionRateRepository->findByContributionRateTitle(CsvUtility::convertToUtf8Charset($temp[$key]));
                                $member->setMemberContributionRate($rate->getFirst());
                                break;
                            case 'member_payment_interval':
                                switch (CsvUtility::convertToUtf8Charset($temp[$key])){
                                    case 'monatlich':
                                        $member->setMemberPaymentInterval(1);
                                        break;
                                    case 'quartalsweise':
                                        $member->setMemberPaymentInterval(3);
                                        break;
                                    case 'halbjährlich':
                                        $member->setMemberPaymentInterval(6);
                                        break;
                                    case 'jährlich':
                                        $member->setMemberPaymentInterval(12);
                                        break;
                                    default:
                                        $importErrors[$membercount][] = 'Konnte Wert: '. CsvUtility::convertToUtf8Charset($temp[$key]) .' in Dateizeile '. $membercount . ' dem Feld Zahlungsweise nicht zu ordnen.';
                                        break;
                                }

                                break;
                            case 'member_first_payment_date':
                                if ($temp[$key] != '') {
                                    list($d, $m, $y) = explode('.', $temp[$key]);
                                    $date = new \DateTime();
                                    $member->setMemberFirstPaymentDate($date->setDate($y, $m, $d));
                                }
                                break;
                            case 'member_payment_method':
                                switch (CsvUtility::convertToUtf8Charset($temp[$key])){
                                    case 'Lastschriftverfahren':
                                        $member->setMemberPaymentMethod(1);
                                        break;
                                    case 'Überweisung':
                                        $member->setMemberPaymentMethod(2);
                                        break;
                                    case 'Bar':
                                        $member->setMemberPaymentMethod(3);
                                        break;
                                    default:
                                        $importErrors[$membercount][] = 'Konnte Wert: '. CsvUtility::convertToUtf8Charset($temp[$key]) .' in Dateizeile '. $membercount . ' dem Feld Zahlungsart nicht zu ordnen.';
                                        break;
                                }
                                break;
                            case 'member_account_owner':
                                $member->setMemberAccountOwner(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_iban':
                                $member->setMemberIBAN($temp[$key]);
                                break;
                            case 'member_bic':
                                $member->setMemberBIC($temp[$key]);
                                break;
                            case 'member_mandate_reference':
                                $member->setMemberMandateReference(CsvUtility::convertToUtf8Charset($temp[$key]));
                                break;
                            case 'member_mandate_valid':
                                if ($temp[$key] != '') {
                                    list($d, $m, $y) = explode('.', $temp[$key]);
                                    $date = new \DateTime();
                                    $member->setMemberMandateValid($date->setDate($y, $m, $d));
                                }
                                break;

                            default:
                                //Do nothing
                                break;
                        }
                    }

                    // Create member folder
                    $member->setMemberFolder( MemberUtility::createMemberFolder($member));

                    // Member Vita
                    $memberVita = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\Vita');
                    $memberVita->setVitaTitle(LocalizationUtility::translate('member.vita.event', 'vm_member'));
                    $memberVita->setVitaDescription(LocalizationUtility::translate('member.vita.joined', 'vm_member'));
                    $memberVita->setVitaDate($member->getMemberEntryDate());
                    $memberVita->setVitaIs(1);
                    $member->addMemberVita($memberVita);

                    // Edit History
                    $memberEditHistory = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\EditHistory');
                    $memberEditHistory->setEditHistoryTitle(LocalizationUtility::translate('editHistory.memberCreate', 'vm_member'));
                    $user = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
                    $entry = $user->getMemberFirstname().' '.$user->getMemberLastname().' '.LocalizationUtility::translate('editHistory.createNewMember', 'vm_member').'.';
                    $memberEditHistory->setEditHistoryDescription($entry);
                    $memberEditHistory->setEditHistoryDateTime(new \DateTime('now'));
                    $member->addMemberEditHistory($memberEditHistory);
                    $member->setMemberDashboardLayout(serialize(MemberUtility::getWidgetArray()));
                    // Persitieren des Mitglieds
                    $this->memberRepository->add($member);
                    if (($this->request->getArgument('sendEmail'))&&($member->getMemberEmail()!='')){
                        $this->SendLoginEmail($member);
                    }
                } else {
                    $importErrors[$datarows][] = 'Datenzeile '. $datarows .' war leer';
                }
             } // while
                if ($membercount == 0) {
                    $importErrors = array();
                    $importSuccess = False;
                    $importErrors[0][] = 'Import konnte nicht durchgeführt werden: Datei konnte nicht verarbeitet werden.';
                }
            } else {
                $importErrors[0][] = 'Datei konnte nicht geöffnet werden.';
            }

        } else {
            $importErrors[0][] = 'Import konnte nicht durchgeführt werden: Datei existiert nicht.';
        }

        $this->forward('csvImportReport',NULL ,NULL,array('importSuccess'=>$importSuccess,'errors'=>$importErrors,'membercount'=>$membercount,'datarows'=>$datarows,'csvFile'=>$this->request->getArgument('csvFile')));
    }

    /**
     * action csvImportReport
     *
     * @return void
     */
    public function csvImportReportAction()
    {
        // TODO delete CSV file
        /*$storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $storage = $storageRepository->findByUid('1'); //this is the fileadmin storage
        $storage->deleteFolder($storage->getFolder($this->request->getArgument('csvFile')),TRUE);*/
        $this->view->assign('importSuccess',$this->request->getArgument('importSuccess'));
        $this->view->assign('errors',$this->request->getArgument('errors'));
        $this->view->assign('membercount',$this->request->getArgument('membercount'));
        $this->view->assign('datarows',$this->request->getArgument('datarows'));
    }

    /**
     * Registers an uploaded file for TYPO3 native upload handling.
     *
     * @param array &$data
     * @param string $namespace
     * @param string $fieldName
     * @param string $targetDirectory
     * @return void
     */
    protected function registerUploadField(array &$data, $namespace, $fieldName, $targetDirectory = '1:/_temp_/') {
        if (!isset($data['upload'])) {
            $data['upload'] = array();
        }
        $counter = count($data['upload']) + 1;

        $keys = array_keys($_FILES[$namespace]);
        foreach ($keys as $key) {
            $_FILES['upload_' . $counter][$key] = $_FILES[$namespace][$key][$fieldName];
        }
        $data['upload'][$counter] = array(
            'data' => $counter,
            'target' => $targetDirectory,
        );
    }

    /**
     * Send login mail
     *
     * param \Typo3graf\VmMember\Domain\Model\Member $member
     *
     * @return string
     */
    public function SendLoginEmail(\Typo3graf\VmMember\Domain\Model\Member $member) {

        $user = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $club = $this->clubRepository->findAll()->getFirst();
        $recipient[$member->getMemberEmail()] = $member->getMemberFirstname().' '.$member->getMemberLastname();
        $sender[$club->getClubEmail()] = $club->getClubName();
        $subject = 'Dein Benutzerkonto bei '.$club->getClubName();
        $variables['member'] = $member;
        $variables['user'] = $user;
        $variables['club'] = $club;
        $this->emailService->sendTemplateEmail($recipient, $sender,$subject, 'LoginEmail',$variables);
    }

    /**
     * action backToList
     *
     * @return void
     */
    public function backToListAction()
    {
        //  $this->redirect() auf memberList Seite
    }

}
