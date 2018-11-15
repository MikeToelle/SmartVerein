<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_vita',
        'label' => 'vita_title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
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
		'searchFields' => 'vita_title,vita_description,vita_date,vita_is',
        'iconfile' => 'EXT:vm_member/Resources/Public/Icons/tx_vmmember_domain_model_vita.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, vita_title, vita_description, vita_date, vita_is',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, vita_title, vita_description, vita_date, vita_is, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_vmmember_domain_model_vita',
                'foreign_table_where' => 'AND tx_vmmember_domain_model_vita.pid=###CURRENT_PID### AND tx_vmmember_domain_model_vita.sys_language_uid IN (-1,0)',
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
        'vita_title' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_vita.vita_title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'vita_description' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_vita.vita_description',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
	    'vita_date' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_vita.vita_date',
	        'config' => [
			    'type' => 'input',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	    'vita_is' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_vita.vita_is',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'items' => [
			        ['', 0],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member.vita.event',1],
					['LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member.vita.honor',2]
			    ],
			    'size' => 1,
			    'maxitems' => 1,
			    'eval' => ''
			],
	    ],
        'member' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
