<?php
defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Typo3graf.VmDashboard',
    'UserPanel',
    [
        'Dashboard' => 'userPanel'
    ],
    // non-cacheable actions
    [
        'Dashboard' => 'userPanel'
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Typo3graf.VmDashboard',
    'Dashboard',
    [
        'Dashboard' => 'showDashboard'
    ],
    // non-cacheable actions
    [
        'Dashboard' => 'showDashboard'
    ]
);


$rootlinefields = &$GLOBALS["TYPO3_CONF_VARS"]["FE"]["addRootLineFields"];
if ($rootlinefields != '') {
    $rootlinefields .= ' , ';
}
$rootlinefields .= 'page_icon';

$GLOBALS['TYPO3_CONF_VARS']['FE']['pageOverlayFields'] .= ',page_icon';

