<?php
return [
	'ctrl' => [
		'title'	=> 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_edithistory',
		'label' => 'edit_history_title',
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
		'searchFields' => 'edit_history_title,edit_history_description,edit_history_date_time',
		'iconfile' => 'EXT:vm_member/Resources/Public/Icons/tx_vmmember_domain_model_edithistory.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, edit_history_title, edit_history_description, edit_history_date_time',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, edit_history_title, edit_history_description, edit_history_date_time, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
				'foreign_table' => 'tx_vmmember_domain_model_edithistory',
				'foreign_table_where' => 'AND tx_vmmember_domain_model_edithistory.pid=###CURRENT_PID### AND tx_vmmember_domain_model_edithistory.sys_language_uid IN (-1,0)',
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
		'edit_history_title' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_edithistory.edit_history_title',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			],
		],
		'edit_history_description' => [
			'exclude' => false,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_edithistory.edit_history_description',
			'config' => [
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			]
		],
		'edit_history_date_time' => [
			'exclude' => true,
			'label' => 'LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_edithistory.edit_history_date_time',
			'config' => [
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'default' => time()
			],
		],
		'member' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
	],
];
