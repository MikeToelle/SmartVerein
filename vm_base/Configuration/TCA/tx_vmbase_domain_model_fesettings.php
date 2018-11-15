<?php

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_fesettings',
        'label' => 'my_profil',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'enablecolumns' => [
        ],
		'searchFields' => 'my_profil',
        'iconfile' => 'EXT:vm_base/Resources/Public/Icons/tx_vmbase_domain_model_fesettings.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, my_profil',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, my_profil'],
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
                'foreign_table' => 'tx_vmbase_domain_model_fesettings',
                'foreign_table_where' => 'AND tx_vmbase_domain_model_fesettings.pid=###CURRENT_PID### AND tx_vmbase_domain_model_fesettings.sys_language_uid IN (-1,0)',
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
        'my_profil' => [
	        'exclude' => false,
	        'label' => 'LLL:EXT:vm_base/Resources/Private/Language/locallang_db.xlf:tx_vmbase_domain_model_fesettings.my_profil',
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
