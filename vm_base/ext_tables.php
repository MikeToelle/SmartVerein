<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmBase',
            'Fesettings',
            'FE Settings'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmBase',
            'Syssettings',
            'Systems Settings'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmBase',
            'Masettings',
            'Member Area Settings'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Vereinsmeier - Base module');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmbase_domain_model_fesettings', 'EXT:vm_base/Resources/Private/Language/locallang_csh_tx_vmbase_domain_model_fesettings.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmbase_domain_model_fesettings');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmbase_domain_model_syssettings', 'EXT:vm_base/Resources/Private/Language/locallang_csh_tx_vmbase_domain_model_syssettings.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmbase_domain_model_syssettings');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmbase_domain_model_masettings', 'EXT:vm_base/Resources/Private/Language/locallang_csh_tx_vmbase_domain_model_masettings.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmbase_domain_model_masettings');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmbase_domain_model_notificationtemplates', 'EXT:vm_base/Resources/Private/Language/locallang_csh_tx_vmbase_domain_model_notificationtemplates.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmbase_domain_model_notificationtemplates');

    },
    $_EXTKEY
);
