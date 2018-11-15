<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmClub',
            'Clubmanager',
            'Club'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'SmartVerein - Club module');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_vmclub_domain_model_club', 'EXT:vm_club/Resources/Private/Language/locallang_csh_tx_vmclub_domain_model_club.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_vmclub_domain_model_club');

    },
    $_EXTKEY
);
