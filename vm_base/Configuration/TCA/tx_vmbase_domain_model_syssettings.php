<?php

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings',
        'label' => 'member_i_d_format',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'enablecolumns' => [
        ],
		'searchFields' => 'member_i_d_format,auto_member_i_d,club_anniversaries,sent_anniversaries_email,show_member_birthdays,sent_birthday_email',
		'iconfile' => 'EXT:vm_base/Resources/Public/Icons/tx_vmbase_domain_model_syssettings.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, member_i_d_format, auto_member_i_d, club_anniversaries, sent_anniversaries_email, show_member_birthdays, sent_birthday_email',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, member_i_d_format, auto_member_i_d, club_anniversaries, sent_anniversaries_email, show_member_birthdays, sent_birthday_email'],
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
                'foreign_table' => 'tx_vmbase_domain_model_syssettings',
                'foreign_table_where' => 'AND tx_vmbase_domain_model_syssettings.pid=###CURRENT_PID### AND tx_vmbase_domain_model_syssettings.sys_language_uid IN (-1,0)',
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
        'member_i_d_format' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings.member_i_d_format',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'auto_member_i_d' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings.auto_member_i_d',
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

	    'club_anniversaries' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings.club_anniversaries',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
		'sent_anniversaries_email' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings.sent_anniversaries_email',
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
	    'show_member_birthdays' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings.show_member_birthdays',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
		'sent_birthday_email' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_syssettings.sent_birthday_email',
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
