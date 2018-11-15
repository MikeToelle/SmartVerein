<?php

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member',
        'label' => 'member_lastname',
		'label_alt' => 'member_firstname',
		'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'member_lastname,member_firstname,member_form_of_address,member_title,member_street,member_zip_code,member_city,member_country_zone,member_country,member_phone1,member_phone2,member_mobile,member_email,member_birthday,member_wedding_date,member_marital_status,member_payment_interval,member_payment_method,member_first_payment_date,member_account_owner,member_i_b_a_n,member_b_i_c,member_mandate_reference,member_mandate_valid,member_copy_mandate,member_note,member_i_d,member_entry_date,member_leaving_date,member_leaving,member_reason_for_leaving,member_photo,membership_application,membership_resignation,member_attachments,member_dashboard_layout,member_is_admin,member_folder,member_vita,member_edit_history,member_status,member_contribution_rate,member_salutation,member_departments,member_has_family,member_login',
        'iconfile' => 'EXT:vm_member/Resources/Public/Icons/tx_vmmember_domain_model_member.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, member_lastname, member_firstname, member_form_of_address, member_title, member_street, member_zip_code, member_city, member_country_zone, member_country, member_phone1, member_phone2, member_mobile, member_email, member_birthday, member_wedding_date, member_marital_status, member_payment_interval, member_payment_method, member_first_payment_date, member_account_owner, member_i_b_a_n, member_b_i_c, member_mandate_reference, member_mandate_valid, member_copy_mandate, member_note, member_i_d, member_entry_date, member_leaving_date, member_leaving, member_reason_for_leaving, member_photo, membership_application, membership_resignation, member_attachments, member_dashboard_layout, member_is_admin, member_folder, member_vita, member_edit_history, member_status, member_contribution_rate, member_salutation, member_departments, member_has_family, member_login',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, member_lastname, member_firstname, member_form_of_address, member_title, member_street, member_zip_code, member_city, member_country_zone, member_country, member_phone1, member_phone2, member_mobile, member_email, member_birthday, member_wedding_date, member_marital_status, member_payment_interval, member_payment_method, member_first_payment_date, member_account_owner, member_i_b_a_n, member_b_i_c, member_mandate_reference, member_mandate_valid, member_copy_mandate, member_note, member_i_d, member_entry_date, member_leaving_date, member_leaving, member_reason_for_leaving, member_photo, membership_application, membership_resignation, member_attachments, member_dashboard_layout, member_is_admin, member_folder, member_vita, member_edit_history, member_status, member_contribution_rate, member_salutation, member_departments, member_has_family, member_login, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_vmmember_domain_model_member',
                'foreign_table_where' => 'AND tx_vmmember_domain_model_member.pid=###CURRENT_PID### AND tx_vmmember_domain_model_member.sys_language_uid IN (-1,0)',
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
		'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'member_lastname' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_lastname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'member_firstname' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_firstname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'member_form_of_address' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_form_of_address',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'items' => [
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.pc', 0],
			        ['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.mr', 1],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.mrs', 2],
			    ],
			    'size' => 1,
			    'maxitems' => 1,
			    'eval' => ''
			],
	    ],
		'member_title' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_title',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
	    'member_street' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_street',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_zip_code' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_zip_code',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_city' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_city',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_country_zone' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_country_zone',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_country' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_country',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_phone1' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_phone1',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_phone2' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_phone2',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_mobile' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_mobile',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_email' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_birthday' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_birthday',
	        'config' => [
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	    'member_wedding_date' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_wedding_date',
	        'config' => [
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	    'member_marital_status' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_marital_status',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'items' => [
			        ['', 0],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_marital.single', 1],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_marital.married', 2],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_marital.divorced', 3],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_marital.widowed', 4],
			    ],
			    'size' => 1,
			    'maxitems' => 1,
			    'eval' => ''
			],
	    ],
	    'member_payment_interval' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_payment_interval',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
				'items' => [
					['', 0],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.monthly', 1],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.quarterly', 3],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.biannual', 6],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.yearly', 12],
				],
			    'size' => 1,
			    'maxitems' => 1,
			    'eval' => ''
			],
	    ],
	    'member_payment_method' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_payment_method',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
				'items' => [
					['', 0],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.debit', 1],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.transaction', 2],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.cash', 3],
				],
			    'size' => 1,
			    'maxitems' => 1,
			    'eval' => ''
			],
	    ],
		'member_first_payment_date' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_first_payment_date',
			'config' => [
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'default' => time()
			],
		],
	    'member_account_owner' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_account_owner',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_i_b_a_n' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_i_b_a_n',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_b_i_c' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_b_i_c',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_mandate_reference' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_mandate_reference',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_mandate_valid' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_mandate_valid',
	        'config' => [
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	    'member_copy_mandate' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_copy_mandate',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'member_copy_mandate',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
					],
					'foreign_types' => [
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
					'maxitems' => 1
				]
			),
	    ],
	    'member_note' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_note',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
	    'member_i_d' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_i_d',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
		'member_entry_date' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_entry_date',
			'config' => [
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'default' => time()
			],
		],
		'member_leaving_date' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_leaving_date',
			'config' => [
				'type' => 'input',
				'size' => 7,
				'eval' => 'date',
				'default' => time()
			],
	    ],
	    'member_leaving' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_leaving',
	        'config' => [
			    'type' => 'check',
			    'items' => [
			        '1' => [
			            '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
			        ]
			    ],
			    'default' => 0
			]
	    ],
	    'member_reason_for_leaving' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_reason_for_leaving',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'member_photo' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_photo',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'member_photo',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
			        'foreign_types' => [
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
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	    ],
	    'membership_application' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.membership_application',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'membership_application',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
					],
					'foreign_types' => [
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
					'maxitems' => 1
				]
			),
	    ],
	    'membership_resignation' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.membership_resignation',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'membership_resignation',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
					],
					'foreign_types' => [
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
					'maxitems' => 1
				]
			),
	    ],
	    'member_attachments' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_attachments',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'member_attachments',
				[
					'appearance' => [
						'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
					],
					'foreign_types' => [
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
					'maxitems' => 100
				]
			),
	    ],
	    'member_dashboard_layout' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_dashboard_layout',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
		'member_is_admin' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_is_admin',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
				'default' => 0
			]
		],
		'member_folder' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_folder',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
	    'member_vita' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_vita',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_vmmember_domain_model_vita',
			    'foreign_field' => 'member',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
	    'member_edit_history' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_edit_history',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_vmmember_domain_model_edithistory',
			    'foreign_field' => 'member',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
	    'member_status' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_status',
	        'config' => [
				'items' => array(
					array(' --- Bitte wählen --- ',0)
				),
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'foreign_table' => 'tx_vmmember_domain_model_membershipstatus',
			    'minitems' => 0,
			    'maxitems' => 1,
			],
	    ],
	    'member_contribution_rate' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_contribution_rate',
	        'config' => [
				'items' => array(
					array(' --- Bitte wählen --- ',0)
				),
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'foreign_table' => 'tx_vmmember_domain_model_contributionrate',
			    'minitems' => 0,
			    'maxitems' => 1,
			],
	    ],
	    'member_salutation' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_salutation',
	        'config' => [
				'items' => array(
					array(' --- Bitte wählen --- ',0)
				),
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'foreign_table' => 'tx_vmmember_domain_model_salutation',
			    'minitems' => 0,
			    'maxitems' => 1,
			],
	    ],
	    'member_departments' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_departments',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectMultipleSideBySide',
			    'foreign_table' => 'tx_vmmember_domain_model_department',
			    'MM' => 'tx_vmmember_member_department_mm',
			    'size' => 10,
			    'autoSizeMax' => 30,
			    'maxitems' => 9999,
			    'multiple' => 0,
			    'wizards' => [
			        '_PADDING' => 1,
			        '_VERTICAL' => 1,
			        'edit' => [
			            'module' => [
			                'name' => 'wizard_edit',
			            ],
			            'type' => 'popup',
			            'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
			            'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
			            'popup_onlyOpenIfSelected' => 1,
			            'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
			        ],
			        'add' => [
			            'module' => [
			                'name' => 'wizard_add',
			            ],
			            'type' => 'script',
			            'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
			            'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
			            'params' => [
			                'table' => 'tx_vmmember_domain_model_department',
			                'pid' => '###CURRENT_PID###',
			                'setValue' => 'prepend'
			            ],
			        ],
			    ],
			],
	    ],
	    'member_has_family' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_has_family',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_vmmember_domain_model_families',
			    'foreign_field' => 'member',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
	    'member_login' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_login',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'fe_users',
			    'minitems' => 0,
			    'maxitems' => 1,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
		'tstamp'=> [
			'exclude' => 1,
			'label' => 'geändert am',
			'config' => [
				'type' => 'none',
				'format' => 'date',
				'eval' => 'date',
			],
		],
    ],
];
