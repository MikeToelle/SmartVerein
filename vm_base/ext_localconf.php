<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{
        /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'vereinsmeier-logo-color',
            \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:vm_base/Resources/Public/Icons/vereinsmeier_logo_color.svg']
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmBase',
            'Fesettings',
            [
                'FESettings' => 'edit, update'
            ],
            // non-cacheable actions
            [
                'FESettings' => 'edit, update'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmBase',
            'Syssettings',
            [
                'SYSSettings' => 'editSysSettings, updateSysSettings, updateMaSettings'
            ],
            // non-cacheable actions
            [
                'SYSSettings' => 'editSysSettings, updateSysSettings, updateMaSettings'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmBase',
            'Masettings',
            [
                'MASettings' => 'edit, update'
            ],
            // non-cacheable actions
            [
                'MASettings' => 'edit, update'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Typo3graf\\VmBase\\Property\\TypeConverter\\FloatConverter');
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Typo3graf\\VmBase\\Property\\TypeConverter\\UploadedFileReferenceConverter');
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Typo3graf\\VmBase\\Property\\TypeConverter\\ObjectStorageConverter');
        # Scheduler
        $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['extbase']['commandControllers'][] = 'Typo3graf\VmBase\Command\SchedulerCommandController';

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					fesettings {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vm_base_domain_model_fesettings
						description = LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vm_base_domain_model_fesettings.description
						tt_content_defValues {
							CType = list
							list_type = vmbase_fesettings
						}
					}
					syssettings {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vm_base_domain_model_syssettings
						description = LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vm_base_domain_model_syssettings.description
						tt_content_defValues {
							CType = list
							list_type = vmbase_syssettings
						}
					}
					masettings {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vm_base_domain_model_masettings
						description = LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vm_base_domain_model_masettings.description
						tt_content_defValues {
							CType = list
							list_type = vmbase_masettings
						}
					}
					
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
