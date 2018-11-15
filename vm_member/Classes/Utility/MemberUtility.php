<?php

namespace Typo3graf\VmMember\Utility;

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

use TYPO3\CMS\Core\Resource\StorageRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use Typo3graf\VmBase\Service\SettingsService;
use Typo3graf\VmBase\Utility\FileUtility;
use Typo3graf\VmMember\Domain\Model\Member;

class MemberUtility{

    /**
     * Settings Service
     *
     * @var \Typo3graf\VmBase\Service\SettingsService
     * @inject
     */
    protected $settingsService = null;

     /**
     * Create member id
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
      * @param string $format
     * @return string
     */
    public static function createMemberID(Member $member,$format=NULL)
    {

        if ($format === ''){
            $format = '{M}{Y}-{n}{n}{n}{n}';
        }
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numeric = '0123456789';
        while(preg_match('/{\w+}/',$format,$matches)){

            switch($matches[0]){
                case '{M}':
                    if ($member->getMemberEntryDate() !== ''){
                        $format = preg_replace("/{M}/", $member->getMemberEntryDate()->format('m'), $format,1);
                    } else {
                        $format = preg_replace("/{M}/", date('m'), $format,1);
                    }
                    break;
                case '{Y}':
                    if ($member->getMemberEntryDate() !== ''){
                        $format = preg_replace("/{Y}/",  $member->getMemberEntryDate()->format('y'), $format,1);
                    } else {
                        $format = preg_replace("/{Y}/", date('y'), $format,1);
                    }
                    break;
                case '{a}':
                    $format = preg_replace("/{a}/", $characters[mt_rand(0, strlen($characters)-1)], $format,1);
                    break;
                case '{n}':
                    $format = preg_replace("/{n}/",$numeric[mt_rand(0, strlen($numeric)-1)], $format,1);
                    break;
                case '{NN}':
                     $format =preg_replace("/{NN}/", $member->getMemberLastname()[0], $format,1);
                    break;
                case '{VN}':
                     $format = preg_replace("/{VN}/", $member->getMemberFirstname()[0], $format,1);
                    break;

            }
        }

        return $format;
    }

    /**
     * get full Name
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @param string $seperator
     * @return string
     */
    public static function getFullName(Member $member,$seperator = ' ')
    {
        return $member->getMemberFirstname().$seperator.$member->getMemberLastname();
    }

    /**
     * Create member folder
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @return string
     */
    public static function createMemberFolder(Member $member)
    {

        $memberFolder = FileUtility::ChangeSpecialCharacters(MemberUtility::getFullName($member,'_'));
        $foldercount = 0;
        $checkfolder = $memberFolder;
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $storage = $storageRepository->findByUid('1'); //this is the fileadmin storage
        while ($storage->hasFolder('smartverein/mitglieder/'.$checkfolder)){
            ++$foldercount;
            $checkfolder = $memberFolder.$foldercount;
        }
        $storage->createFolder('smartverein/mitglieder/'.$checkfolder);

        return $checkfolder;
    }

    /**
     * Rename member folder
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @return string
     */
    public static function renameMemberFolder(Member $oldMember,Member $member)
    {
        $folderName = FileUtility::ChangeSpecialCharacters(self::getFullName($oldMember,'_'));
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $storage = $storageRepository->findByUid('1'); //this is the fileadmin storage
        $memberFolder = $storage->getFolder('smartverein/mitglieder/'.$folderName);
        $newMemberFolder = FileUtility::ChangeSpecialCharacters(self::getFullName($member,'_'));
        $memberFolder->rename($newMemberFolder);
        return $newMemberFolder;
    }

    /**
     * Delete member folder
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @return void
     */
    public static function deleteMemberFolder(Member $member)
    {
        $folderName = $member->getMemberFolder();
        $storageRepository = GeneralUtility::makeInstance(StorageRepository::class);
        $storage = $storageRepository->findByUid('1'); //this is the fileadmin storage

            $storage->deleteFolder($storage->getFolder('smartverein/mitglieder/' . $folderName), true);

        return;
    }

    /**
     * Static Select Options
     *
     * @return array $selectOptions
     */
    public static function staticSelectOptions() :array
    {
        $selectOptions = array(
            'methode' => array (
                '0' => array(
                    'id' => 0, 'methode' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.pc', 'VmMember')
                ),
                '1' => array(
                    'id' => 1, 'methode' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.debit', 'VmMember')
                ),
                '2' => array(
                    'id' => 2, 'methode' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.transaction', 'VmMember')
                ),
                '3' => array(
                    'id' => 3, 'methode' =>LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.cash', 'VmMember')
                ),

            ),
            'intervall' => array (
                '0' => array (
                    'id' => 0, 'interval' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.pc', 'VmMember')
                ),
                '1' => array (
                    'id' => 1, 'interval' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.monthly', 'VmMember')
                ),
                '2' => array (
                    'id' => 3, 'interval' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.quarterly', 'VmMember')
                ),
                '3' => array (
                    'id' => 6, 'interval' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.biannual', 'VmMember')
                ),
                '4' => array (
                    'id' => 12, 'interval' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.yearly', 'VmMember')
                ),
            ),

            'salut' => array (
                '0' => array(
                    'id' => 0, 'salutation' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.pc', 'VmMember')
                ),
                '1' => array(
                    'id' => 1, 'salutation' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.mr', 'VmMember')
                ),
                '2' => array(
                    'id' => 2, 'salutation' => LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.mrs', 'VmMember')
                ),
            )
        );
        return $selectOptions;
    }

    /**
     * getWidgetArray
     *
     * @return array
     */
    public static function getWidgetArray() :array
    {
        $dashboard = [
            'layout' => '25/50/25',
            'widgets' => [
                [
                  'widgetID'=> 'WelcomeWidget',
                    'widgetSettings' => [
                       'active' => '1',
                        'column' => '2'
                    ]
                ],
                [
                    'widgetID'=> 'MemberOverviewWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'MemberDepartmentOverviewWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'GenderOverviewWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'BirthdaysOverviewWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'AnniversaryOverviewWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'NextEventsOverviewWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'NextEventsWithClubsWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'MyTasksWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'OverdueTasksWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
                [
                    'widgetID'=> 'SmartVereinNewsWidget',
                    'widgetSettings' => [
                        'active' => '0',
                        'column' => '1'
                    ]
                ],
            ]
        ];

        return $dashboard;
    }
}
