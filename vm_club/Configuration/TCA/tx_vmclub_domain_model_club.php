<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club',
        'label' => 'club_name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'club_name,club_short_name,club_street,club_zip_code,club_city,club_phone,club_email,club_website,club_tax_number,club_vat_number,club_registration_court,club_registration_number,club_i_b_a_n,club_b_i_c,club_d_id,club_organisation,club_organisation_number,club_logo,club_social_media_facebook,club_social_media_twitter,club_social_media_google,club_social_media_instagram,club_social_media_printerest',
		'iconfile' => 'EXT:vm_club/Resources/Public/Icons/tx_vmclub_domain_model_club.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, club_name, club_short_name, club_street, club_zip_code, club_city, club_phone, club_email, club_website, club_tax_number, club_vat_number, club_registration_court, club_registration_number, club_i_b_a_n, club_b_i_c, club_d_id, club_organisation, club_organisation_number, club_logo, club_social_media_facebook, club_social_media_twitter, club_social_media_google, club_social_media_instagram, club_social_media_printerest',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, club_name, club_short_name, club_street, club_zip_code, club_city, club_phone, club_email, club_website, club_tax_number, club_vat_number, club_registration_court, club_registration_number, club_i_b_a_n, club_b_i_c, club_d_id, club_organisation, club_organisation_number, club_logo, club_social_media_facebook, club_social_media_twitter, club_social_media_google, club_social_media_instagram, club_social_media_printerest, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
	],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_vmclub_domain_model_club',
                'foreign_table_where' => 'AND tx_vmclub_domain_model_club.pid=###CURRENT_PID### AND tx_vmclub_domain_model_club.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
				'behaviour' => [
					'allowLanguageSynchronization' => 'true',
				],
				'renderType' => 'inputDateTime',
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
				'behaviour' => [
					'allowLanguageSynchronization' => 'true',
				],
				'renderType' => 'inputDateTime',
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'club_name' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'club_short_name' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_short_name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
		'club_founding_year' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_founding_year',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
	    'club_street' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_street',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_zip_code' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_zip_code',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_city' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_city',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_phone' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_phone',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_email' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_website' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_website',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
		'club_tax_office' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_tax_office',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
	    'club_tax_number' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_tax_number',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_vat_number' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_vat_number',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_registration_court' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_registration_court',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_registration_number' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_registration_number',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
		'club_bankname' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_bankname',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
	    'club_i_b_a_n' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_i_b_a_n',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_b_i_c' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_b_i_c',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_d_id' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_d_id',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_organisation' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_organisation',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_organisation_number' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_organisation_number',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'club_logo' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_logo',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'club_logo',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
					// custom configuration for displaying fields in the overlay/reference table
					// to use the imageoverlayPalette instead of the basicoverlayPalette
					'foreign_match_fields' => [
						'fieldname' => 'club_logo',
						'tablenames' => 'tx_vmclub_domain_model_club',
						'table_local' => 'sys_file',
					],
					'overrideChildTca' => [
						'types' => [
			            '0' => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ]
			        ],
						],
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	    ],
		'club_social_media_facebook' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_social_media_facebook',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'club_social_media_twitter' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_social_media_twitter',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'club_social_media_google' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_social_media_google',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'club_social_media_instagram' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_social_media_instagram',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'club_social_media_printerest' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_club/Resources/Private/Language/locallang_db.xlf:tx_vmclub_domain_model_club.club_social_media_printerest',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
    ],
];
