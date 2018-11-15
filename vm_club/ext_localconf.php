<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmClub',
            'Clubmanager',
            [
                'Club' => 'editClub, updateClub, newClub, createClub'
            ],
            // non-cacheable actions
            [
                'Club' => 'editClub, updateClub, newClub, createClub'
            ]
        );
        
        // wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					clubmanager {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vm_club_domain_model_clubmanager
						description = LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vm_club_domain_model_clubmanager.description
						tt_content_defValues {
							CType = list
							list_type = vmclub_clubmanager
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
