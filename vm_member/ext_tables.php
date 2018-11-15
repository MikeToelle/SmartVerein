<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Memberlist',
            'Member List'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Memberprofil',
            'Member Profil'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Personalsetting',
            'Personal Settings'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Csvimport',
            'CSV Import'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Csvexport',
            'CSV Export'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Adminrole',
            'Admin Role'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Memberdata',
            'Memberdata'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Departments',
            'Departments'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmMember',
            'Functions',
            'Functions'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Vereinsmeier - Member management');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_member', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_member.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_member');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_vita', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_vita.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_vita');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_edithistory', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_edithistory.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_edithistory');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_membershipstatus', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_membershipstatus.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_membershipstatus');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_contributionrate', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_contributionrate.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_contributionrate');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_salutation', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_salutation.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_salutation');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_department', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_department.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_department');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_ClubFunction', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_ClubFunction.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_ClubFunction');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_families', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_families.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_families');


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmmember_domain_model_departmentworkers', 'EXT:vm_member/Resources/Private/Language/locallang_csh_tx_vmmember_domain_model_departmentworkers.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmmember_domain_model_departmentworkers');

    },
    $_EXTKEY
);
