<?php

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings',
        'label' => 'edit_own_member_data',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'enablecolumns' => [
        ],
		'searchFields' => 'edit_own_member_data,show_bulletin_board,show_events,show_member_list_all,show_member_list_by_groups,show_club_finances,show_download_area',
        'iconfile' => 'EXT:vm_base/Resources/Public/Icons/tx_vmbase_domain_model_masettings.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, edit_own_member_data, show_bulletin_board, show_events, show_member_list_all, show_member_list_by_groups, show_club_finances, show_download_area',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, edit_own_member_data, show_bulletin_board, show_events, show_member_list_all, show_member_list_by_groups, show_club_finances, show_download_area'],
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
                'foreign_table' => 'tx_vmbase_domain_model_masettings',
                'foreign_table_where' => 'AND tx_vmbase_domain_model_masettings.pid=###CURRENT_PID### AND tx_vmbase_domain_model_masettings.sys_language_uid IN (-1,0)',
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
        'edit_own_member_data' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.edit_own_member_data',
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
	    'show_bulletin_board' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.show_bulletin_board',
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
	    'show_events' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.show_events',
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
	    'show_member_list_all' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.show_member_list_all',
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
	    'show_member_list_by_groups' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.show_member_list_by_groups',
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
	    'show_club_finances' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.show_club_finances',
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
	    'show_download_area' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_masettings.show_download_area',
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
    ],
];
