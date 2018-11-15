<?php
defined('TYPO3_MODE') || die('Access denied.');

//Page Icon
$addLangPagesColumn = array(
'page_icon' => array(
'exclude' => 0,
'label' => 'Seiten-Icon',
'config' => array(
'type' => 'input',
'default' => '',
),
),
);
// Feld im TCA der Tabelle 'pages' hinzufügen
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $addLangPagesColumn, 1);
// Ort der Feldes in den Backendeinstellungen definieren
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
'pages',
'title',
'--linebreak--,page_icon',
'after:subtitle');
