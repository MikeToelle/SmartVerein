<?php
declare(strict_types = 1);
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
     ***/


use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use Typo3graf\VmBase\Utility\PasswordUtility;
use Typo3graf\VmMember\Utility\HistoryUtility;
use Typo3graf\VmMember\Utility\MemberUtility;
use Typo3graf\VmMember\Service\ExportService;
use Typo3graf\VmBase\Utility\MessageType;

/**
 * MemberController
 */
class MemberController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
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
     * departmentRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\DepartmentRepository
     * @inject
     */
    protected $departmentRepository = null;

    /**
     * departmentHasWorkers
     *
     * @var \Typo3graf\VmMember\Domain\Repository\DepartmentWorkersRepository
     *  @inject
     */
    protected $departmentHasWorkers = null;

    /**
     * Session Handler
     *
     * @var \Typo3graf\VmBase\Service\SessionHandler
     * @inject
     */
    protected $sessionHandler = null;

    /**
     * Upload Service
     *
     * @var \Typo3graf\VmBase\Service\UploadService
     * @inject
     */
    protected $uploadService = null;

    /**
     * Notification Service
     *
     * @var \Typo3graf\VmBase\Service\NotificationService
     * @inject
     */
    protected $notificationService = null;

    /**
     * Settings Service
     *
     * @var \Typo3graf\VmBase\Service\SettingsService
     * @inject
     */
    protected $settingsService = null;

    public function initializeAction()
    {
        // Redirect zur Login Seite falls nicht eingeloggt
        if (!$GLOBALS['TSFE']->loginUser) {
            $this->redirect(null, null, null, null, $this->settings['loginPage']);
        }
    }

    /**
     * action memberList
     *
     * @return void
     */
    public function memberListAction()
    {
        $GLOBALS['TSFE']->fe_user->removeSessionData();
        $this->view->assign('user',$GLOBALS['TSFE']->fe_user->user['uid']);
        $this->view->assign('members', $this->memberRepository->findAll());
        $this->view->assign('club',$this->clubRepository->findAll()->getFirst());
    }

    /**
     * action wholeMemberList
     *
     * @return void
     */
    public function wholeMemberListAction()
    {
        $GLOBALS['TSFE']->fe_user->removeSessionData();
        $this->view->assign('user',$GLOBALS['TSFE']->fe_user->user['uid']);
        $this->view->assign('members', $this->memberRepository->findAll());
        $this->view->assign('club',$this->clubRepository->findAll()->getFirst());
    }

    /**
     * action birthdayList
     *
     * @return void
     */
    public function birthdayListAction()
    {
        $GLOBALS['TSFE']->fe_user->removeSessionData();
        $this->view->assign('user',$GLOBALS['TSFE']->fe_user->user['uid']);
        $this->view->assign('members', $this->memberRepository->findAll());
        $this->view->assign('club',$this->clubRepository->findAll()->getFirst());
    }

    /**
     * action addressList
     *
     * @return void
     */
    public function addressListAction()
    {
        $GLOBALS['TSFE']->fe_user->removeSessionData();
        $this->view->assign('user',$GLOBALS['TSFE']->fe_user->user['uid']);
        $this->view->assign('members', $this->memberRepository->findAll());
        $this->view->assign('club',$this->clubRepository->findAll()->getFirst());
    }
    /**
     * action signatureList
     *
     * @return void
     */
    public function signatureListAction()
    {
        $GLOBALS['TSFE']->fe_user->removeSessionData();
        $this->view->assign('user',$GLOBALS['TSFE']->fe_user->user['uid']);
        $this->view->assign('members', $this->memberRepository->findAll());
        $this->view->assign('club',$this->clubRepository->findAll()->getFirst());
    }

    /**
     * action csvExport
     *
     * @throws
     * @return void
     */
    public function csvExportAction()
    {
        $list = $this->request->getArgument('list');
        // TODO Export Service einbinden ???????
        $this->view->assign('List',$list);
    }

    /**
     * action newMember
     *
     * @return void
     */
    public function newMemberAction()
    {
        $this->view->assign('usergroups',$this->userGroupRepository->findAllForFrontendSelection());
        $this->view->assign('contributionRate',$this->contributionRateRepository->findAll());
        $this->view->assign('salutation',$this->salutationRepository->findAll());
        $this->view->assign('status',$this->membershipStatusRepository->findAll());
        $this->view->assign('selectOptions',MemberUtility::staticSelectOptions());
        $this->view->assign('sysSettings',$this->settingsService->getSysSettings());
    }


    public function initializeCreateMemberAction()
    {
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberBirthday')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberWeddingDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberEntryDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberLeavingDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberMandateValid')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberFirstPaymentDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
    }
    /**
     * action createMember
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @validate $member \Typo3graf\VmMember\Validation\Validator\PasswordValidator
     * @validate $member \Typo3graf\VmMember\Validation\Validator\IsEmailValidator
     * @validate $member \Typo3graf\VmMember\Validation\Validator\IbanBicSwiftValidator
     * @throws
     * @return void
     */
    public function createMemberAction(\Typo3graf\VmMember\Domain\Model\Member $member)
    {
        $sysSettings = $this->settingsService->getSysSettings();

        // Login Data
        $login = $member->getMemberLogin();
        $login->setEmail($member->getMemberEmail());
        if ($member->getPassword() !== ''){
            $login->setPassword(PasswordUtility::encryptPassword($member->getPassword()));
        }

        $member->setMemberLogin($login);

        if ($member->isIsEmail() && $member->getPassword() !== ''){
            $this->notificationService->sendMemberNotification(MessageType::MEMBER_LOGIN_EMAIL, $member);
            $this->addFlashMessage('L: Email gesendet!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        }

        // Member entry Date
        if ($member->getMemberEntryDate() === NULL) {
            $member->setMemberEntryDate(new \DateTime('now'));
        }
        // Auto member ID
        if ($sysSettings->getAutoMemberID()) {
            $member->setMemberID(MemberUtility::createMemberID($member,$sysSettings->getMemberIDFormat()));
        }

        $member->setMemberDashboardLayout(serialize(MemberUtility::getWidgetArray()));
        // Member storage folder
        $member->setMemberFolder( MemberUtility::createMemberFolder($member));

        // Member vita entry
        $memberVita = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\Vita');
        $memberVita->setVitaTitle(LocalizationUtility::translate('member.vita.event', 'vm_member'));
        $memberVita->setVitaDescription(LocalizationUtility::translate('member.vita.joined', 'vm_member'));
        $memberVita->setVitaDate($member->getMemberEntryDate());
        $memberVita->setVitaIs(1);
        $member->addMemberVita($memberVita);

        // Member edit history
        $memberEditHistory = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\EditHistory');
        $memberEditHistory->setEditHistoryTitle(LocalizationUtility::translate('editHistory.memberCreate', 'vm_member'));
        $memberEditHistory->setEditHistoryDescription($this->editHistory('new'));
        $memberEditHistory->setEditHistoryDateTime(new \DateTime('now'));
        $member->addMemberEditHistory($memberEditHistory);


        $this->addFlashMessage('L:Mitglied erfolgreich angelegt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->memberRepository->add($member);
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($member, 'My Title'); die();
        //$newMeber = $this->memberRepository->
        $this->redirect('editMember',null,null,array('member'=> $member));
    }

    /**
     * action editMyProfil
     *
     * @return void
     */
    public function editMyProfilAction()
    {
        $FESettings = [
            'myProfil' => '1'
        ];

       $oldMember = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $this->sessionHandler->writeToSession($oldMember->getUid(), 'editUid');
        $this->sessionHandler->writeToSession($oldMember, 'edit'.$oldMember->getUid());
        // For AJAX use only!
        /*$GLOBALS['TSFE']->additionalFooterData[tx_vmdashboard] = '<script type="text/javascript"src="/typo3conf/ext/vm_dashboard/Resources/Public/JavaScript/memberAjax.js"
     language="JavaScript"></script>';*/
        $this->view->assign('usergroups',$this->userGroupRepository->findAllForFrontendSelection());
        $this->view->assign('contributionRate',$this->contributionRateRepository->findAll());
        $this->view->assign('salutation',$this->salutationRepository->findAll());
        $this->view->assign('status',$this->membershipStatusRepository->findAll());
        $this->view->assign('selectOptions',MemberUtility::staticSelectOptions());
        $this->view->assign('departments',$this->departmentRepository->findAll());
        $this->view->assign('functions',$this->departmentHasWorkers->findByMember($this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid'])));
        $this->view->assign('member', $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']));
        $this->view->assign('FESettings',$FESettings);
    }

    /**
     * action editMember
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @ignorevalidation $member
     * @return void
     */
    public function editMemberAction(\Typo3graf\VmMember\Domain\Model\Member $member)
    {
        if ($member->getUid() === $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid'])->getUid()){
            $FESettings = [
                'myProfil' => '1'
            ];
        }
        $this->sessionHandler->writeToSession($member->getUid(), 'editUid');
       if (!$this->sessionHandler->restoreFromSession('edit'.$member->getUid())){
           $this->sessionHandler->writeToSession($member, 'edit'.$member->getUid());
       }
        // For AJAX use only!
        /*$GLOBALS['TSFE']->additionalFooterData[tx_vmdashboard] = '<script type="text/javascript"src="/typo3conf/ext/vm_dashboard/Resources/Public/JavaScript/memberAjax.js"
     language="JavaScript"></script>';*/
        $this->view->assign('usergroups',$this->userGroupRepository->findAllForFrontendSelection());
        $this->view->assign('contributionRate',$this->contributionRateRepository->findAll());
        $this->view->assign('salutation',$this->salutationRepository->findAll());
        $this->view->assign('status',$this->membershipStatusRepository->findAll());
        $this->view->assign('selectOptions',MemberUtility::staticSelectOptions());
        $this->view->assign('departments',$this->departmentRepository->findAll());
        $this->view->assign('member', $member);
        $this->view->assign('functions',$this->departmentHasWorkers->findByMember($member));
        $this->view->assign('FESettings',$FESettings);
    }

    public function initializeUpdateMemberAction()
    {
$oldMember = $this->sessionHandler->restoreFromSession('edit'.$this->sessionHandler->restoreFromSession('editUid'));
        $folderName = 'mitglieder/'.$oldMember->getMemberFolder();

        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['member'],'memberPhoto.0',$folderName);
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['member'],'membershipApplication.0',$folderName);
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['member'],'membershipResignation.0',$folderName);
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['member'],'memberCopyMandate.0',$folderName);
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['member'],'memberAttachments',$folderName);

        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberBirthday')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberWeddingDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberEntryDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberLeavingDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberMandateValid')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        $this->arguments['member']
            ->getPropertyMappingConfiguration()
            ->forProperty('memberFirstPaymentDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
    }
    /**
     * action updateMember
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @validate $member \Typo3graf\VmMember\Validation\Validator\EditLoginValidator
     * @validate $member \Typo3graf\VmMember\Validation\Validator\IsEmailValidator
     * @validate $member \Typo3graf\VmMember\Validation\Validator\IbanBicSwiftValidator
     * @return void
     */
    public function updateMemberAction(\Typo3graf\VmMember\Domain\Model\Member $member)
    {
        $oldMember = $this->sessionHandler->restoreFromSession('edit'.$member->getUid());

       /* if (!empty($member->getMemberAttachments()->count())) {
            foreach ($member->getMemberAttachments() as $attachment){

                $member->addMemberAttachment($attachment);
            }
        }
DUMP*/

     if (!empty($oldMember->getMemberAttachments()->count())) {
            foreach ($oldMember->getMemberAttachments() as $attachment){

                $member->addMemberAttachment($attachment);
            }
        }

        $member->setMemberAttachments($member->getMemberAttachments());

        if ($oldMember->getMemberEntryDate() !== $member->getMemberEntryDate()) {
            $memberVita = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\Vita');
            $memberVita->setVitaTitle(LocalizationUtility::translate('member.vita.event', 'vm_member'));
            $memberVita->setVitaDescription(LocalizationUtility::translate('member.vita.joined', 'vm_member'));
            $memberVita->setVitaDate($member->getMemberEntryDate());
            $memberVita->setVitaIs(1);
            $member->addMemberVita($memberVita);
        }

        if ($member->getMemberLeavingDate() !=='' && $oldMember->getMemberLeavingDate() !== $member->getMemberLeavingDate()){
            $member->setMemberLeaving(1);
            // Member vita entry
            $memberVita = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\Vita');
            $memberVita->setVitaTitle(LocalizationUtility::translate('member.vita.event', 'vm_member'));
            $memberVita->setVitaDescription(LocalizationUtility::translate('member.vita.leave', 'vm_member'));
            $memberVita->setVitaDate($member->getMemberLeavingDate());
            $memberVita->setVitaIs(1);
            $member->addMemberVita($memberVita);
        }

        if ($member->getUid() == $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid'])->getUid()) {
            $member->setMemberIsAdmin($oldMember->getMemberIsAdmin());
        }

        $login = $member->getMemberLogin();
        $login->setEmail($member->getMemberEmail());
        if ($member->getPassword() !== ''){
            $login->setPassword(PasswordUtility::encryptPassword($member->getPassword()));
        }
        $member->setMemberLogin($login);
        if ($member->isIsEmail() && $member->getPassword() !== ''){
            $this->notificationService->sendMemberNotification(MessageType::MEMBER_LOGIN_EMAIL, $member);

            $this->addFlashMessage('Email gesendet!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        }


            if ($oldMember->isMemberIsAdmin() and !$member->isMemberIsAdmin()) {
                // Change Usergroup to 99 Mitglieder
                $login->setUsergroup(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
                $usergroup = $this->userGroupRepository->findByUid(99);
                $login->addUsergroup($usergroup);
            }

        // add Attachement (Ajax)


// Rename folder if nessecary
        if (($member->getMemberFirstname() !== $oldMember->getMemberFirstname())||($member->getMemberLastname() !== $oldMember->getMemberLastname()))
        {
           $member->setMemberFolder(MemberUtility::renameMemberFolder($oldMember,$member));
        }
        $ignoreProps = [
        '0'=>'memberVita',
        '1'=>'memberEditHistory',
        '2'=>'memberPhoto',
        '3'=>'membershipApplication',
        '4'=>'membershipResignation',
        '5'=>'memberCopyMandate',
        '6'=>'isEmail',
        '7'=>'memberNote',
            '8'=>'password',
            '9'=>'passwordConfirm',
            '10'=>'tstamp',
            '11'=>'memberLeaving',
            '12'=>'memberDashboardLayout',
        ];
        $editDescription = $this->editHistory('edit', $this->getChangedMemberDataFields( $oldMember, $member, $ignoreProps));
        if ($editDescription !='') {
            $memberEditHistory = $this->objectManager->get('Typo3graf\\VmMember\\Domain\\Model\\EditHistory');
            $memberEditHistory->setEditHistoryTitle(LocalizationUtility::translate('editHistory.memberUpdate',
                'vm_member'));
            $memberEditHistory->setEditHistoryDescription($editDescription);
            $memberEditHistory->setEditHistoryDateTime(new \DateTime('now'));
            $member->addMemberEditHistory($memberEditHistory);
        }
        $this->addFlashMessage('L: Mitglied erfolgreich geändert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);

        $this->memberRepository->update($member);
        $this->sessionHandler->cleanUpSession('edit'.$member->getUid());
        $this->redirect('list');
    }

    /**
     * action deleteMember
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @return void
     */
    public function deleteMemberAction(\Typo3graf\VmMember\Domain\Model\Member $member)
    {
        // delete Member storage folder
        MemberUtility::deleteMemberFolder($member);
        // delete login data
        $memberLogin = $member->getMemberLogin();
        $this->frontendUserRepository->remove($memberLogin);
        $this->addFlashMessage('L:Mitglied erfolgreich gelöscht!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->memberRepository->remove($member);
        $this->redirect('list');
    }

    /**
     * action setPersonalData
     *
     * @return void
     */
    public function setPersonalDataAction()
    {
       $selectOptions = array(
            '20/80' => 'Standard (20/80)',
            '80/20' => '80/20',
            '25/25/50' => '25/25/50',
            '25/50/25' => '25/50/25',
            '50/25/25' => '50/25/25',
            '100' => '1 Spaltig',
        );
        $member = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $personalData = unserialize($member->getMemberDashboardLayout(),NULL);
        $this->view->assign('selectOptions',$selectOptions);
        $this->view->assign('personalData',$personalData);
    }

    /**
     * action savePersonalData
     *
     * @param array $personalData
     * @throws
     * @return void
     */
    public function savePersonalDataAction(array $personalData)
    {
       //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($personalData, 'My Title'); die();
        $member = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $member->setMemberDashboardLayout(serialize($personalData));
        $this->memberRepository->update($member);
        $this->redirect('setPersonalDataAction');
    }

    public function initializeCreateVitaAjaxAction()
    {
        $this->arguments['vita']
            ->getPropertyMappingConfiguration()
            ->forProperty('vitaDate')
            ->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',
                \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
    }



    /**
     * action createVitaAjax
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @param \Typo3graf\VmMember\Domain\Model\Vita $vita
     * @ignorevalidation $member
     * @throws
     * @return void
     */
    public function createVitaAjaxAction(\Typo3graf\VmMember\Domain\Model\Member $member, \Typo3graf\VmMember\Domain\Model\Vita $vita)
    {
        $member->addMemberVita($vita);
        $this->memberRepository->update($member);
        // For AJAX use only!
        //$this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        $this->redirect('editMember', NULL, NULL, array('member'=>$member));

    }

    /**
     * action deleteVitaAjax
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @param \Typo3graf\VmMember\Domain\Model\Vita $vita
     * @ignorevalidation $member
     * @return void
     */
    public function deleteVitaAjaxAction(\Typo3graf\VmMember\Domain\Model\Member $member, \Typo3graf\VmMember\Domain\Model\Vita $vita)
    {
        $member->removeMemberVita($vita);
        $this->memberRepository->update($member);
        $this->redirect('editMember', NULL, NULL, array('member'=>$member));

    }

    /**
     * action backToList
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @ignorevalidation $member
     * @return void
     */
    public function backToListAction(\Typo3graf\VmMember\Domain\Model\Member $member)
    {
        if ($member->getUid() === $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid'])->getUid()){
            $this->sessionHandler->cleanUpSession('edit'.$member->getUid());
           $this->forward('editMyProfil');
        }
        $this->sessionHandler->cleanUpSession('edit'.$member->getUid());
        $this->forward('memberList');
    }

    //Hilfsklassen

    /**
     * editHistoryEntry
     * @param $status
     * @param $changes
     * @return string
     */
    public function editHistory($status,$changes=NULL){
        $user = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        switch ($status) {
            case "new":
                $entry = $user->getMemberFullnameFirst().' '.LocalizationUtility::translate('editHistory.createNewMember', 'vm_member').'.';
                return $entry;
            break;
            case "edit":

                $entryTitel = $user->getMemberFullnameFirst().' '.LocalizationUtility::translate('editHistory.dataChange', 'vm_member').':<br/>';
                $entry = '';

                foreach ($changes as $key => $value) {

                    $entry .= HistoryUtility::editEntry($key,$value);

                }
                if ($entry !='') $entry = $entryTitel.' '.$entry;
                return $entry;
            break;
            case "delete":
                $entry = $user->getMemberFullnameFirst().' '.LocalizationUtility::translate('editHistory.deleteMember', 'vm_member');
                return $entry;
            break;
        }
    }



    /**
     * compare member objects and show changes
     * @param $oldMember
     * @param $member
     * @param array $ignoreProps
     * @return array
     */
    public function getChangedMemberDataFields( $oldMember, $member, $ignoreProps = array() ) :array
    {

        if (!$ignoreProps) $ignoreProps = array('jsonData');

        $changes = array();

        if (is_object($oldMember)) {
            $props = ObjectAccess::getGettablePropertyNames($oldMember);
        } else if (is_array($oldMember)) {
            $props = array_keys($oldMember);
        }

        foreach ($props as $prop) {

            if (!in_array($prop, $ignoreProps)) {
                if (is_object($oldMember)) {
                    $oldVal = ObjectAccess::getProperty($oldMember, $prop);
                    if ($member != NULL) {
                        $newVal = ObjectAccess::getProperty($member, $prop);
                    }

                } else {
                    $oldVal = $oldMember[$prop];
                    $newVal = $member[$prop];
                }

                if ($oldVal != $newVal && !is_array($oldVal) && !is_object($oldVal)) {
                    $changes[$prop] = array($oldVal, $newVal);
                }
                if (is_object($oldVal)) {
                    if ($ref = $this->getChangedMemberDataFields($oldVal, $newVal)) {
                        $changes[$prop] = $ref;
                    }
                }
                if (is_array($oldVal)) {
                    if ($ref = $this->getChangedMemberDataFields($oldVal, $newVal)) {
                        $changes[$prop] = $ref;
                    }
                }
            }
        }

        return $changes;

    }

    protected function getErrorFlashMessage() {
         return FALSE;
    }
}
