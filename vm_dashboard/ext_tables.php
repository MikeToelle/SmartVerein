<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {
        // Backend Styling
        if (!is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'])) {
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']);
        }
// Login Logo
        if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo'])
            || empty(trim($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo']))
        ) {
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginLogo'] = 'https://www.typo3graf.de/BackendStyling/Typo3grafLoginLogo.svg';
        }
// Login Background
        if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginBackgroundImage'])
            || empty(trim($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginBackgroundImage']))
        ) {
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginBackgroundImage'] = 'https://www.typo3graf.de/BackendStyling/Typo3grafHintergrundhoch3Logo.svg';
        }

// Login Highlight Color
        if (!isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginHighlightColor'])
            || empty(trim($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginHighlightColor']))
        ) {
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']['loginHighlightColor'] = '#88B04B';
        }

        if (is_array($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'])) {
            $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] = serialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend']);
        }

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmDashboard',
            'UserPanel',
            'Dashboard - Userpanel'
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Typo3graf.VmDashboard',
            'Dashboard',
            'Dashboard'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Vereinsmeier - Dashboard module');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $extKey . '/Configuration/PageTS/tsconfig.txt">');


    },
    $_EXTKEY
);
