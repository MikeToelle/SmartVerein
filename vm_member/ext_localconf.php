<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Memberlist',
            [
                'Member' => 'memberList, wholeMemberList, birthdayList, addressList, signatureList, editMember, updateMember,newMember,createMember,deleteMember, csvExport, createVitaAjax,deleteVitaAjax,backToList'
            ],
            // non-cacheable actions
            [
                'Member' => 'memberList, wholeMemberList, birthdayList, addressList, signatureList, editMember, updateMember,newMember,createMember,deleteMember,csvExport, createVitaAjax,deleteVitaAjax,backToList'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Memberprofil',
            [
                'Member' => 'editMyProfil, updateMember, deleteMember,createVitaAjax,deleteVitaAjax,backToList'
            ],
            // non-cacheable actions
            [
                'Member' => 'editMyProfil, updateMember, deleteMember,createVitaAjax,deleteVitaAjax,backToList'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Personalsetting',
            [
                'Member' => 'setPersonalData,savePersonalData',
            ],
            // non-cacheable actions
            [
                'Member' => 'setPersonalData,savePersonalData',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Csvimport',
            [
                'CsvImport' => 'csvUploadForm,csvUpload,csvMapping,csvImport,csvImportReport,backToList'
            ],
            // non-cacheable actions
            [
                'CsvImport' => 'csvUploadForm,csvUpload,csvMapping,csvImport,csvImportReport,backToList'
            ]
        );


        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Adminrole',
            [
                'AdminRole' => 'adminRoleList, createAdminRole, editAdminRole, updateAdminRole, deleteAdminRole'
            ],
            // non-cacheable actions
            [
                'AdminRole' => 'adminRoleList, createAdminRole, editAdminRole, updateAdminRole, deleteAdminRole'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Memberdata',
            [
                'MembershipStatus' => 'statusList,createStatus, editStatus, updateStatus, deleteStatus',
                'ContributionRate' => 'rateList, createRate, editRate, updateRate, deleteRate',
                'Salutation' => 'salutationList,createSalutation, editSalutation, updateSalutation, deleteSalutation'
            ],
            // non-cacheable actions
            [
                'MembershipStatus' => 'statusList,createStatus, editStatus, updateStatus, deleteStatus',
                'ContributionRate' => 'rateList, createRate, editRate, updateRate, deleteRate',
                'Salutation' => 'salutationList,createSalutation, editSalutation, updateSalutation, deleteSalutation'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Departments',
            [
                'Department' => 'listDepartment,newDepartment,createDepartment,editDepartment,updateDepartment,deleteDepartment,listWorkers,upWorker,downWorker,createWorker,editWorker,updateWorker,deleteWorker',
            ],
            // non-cacheable actions
            [
                'Department' => 'listDepartment,newDepartment,createDepartment,editDepartment,updateDepartment,deleteDepartment,listWorkers,upWorker,downWorker,createWorker,editWorker,updateWorker,deleteWorker',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Typo3graf.VmMember',
            'Functions',
            [
                'ClubFunction' => 'listFunctions, createFunction, editFunction, updateFunction, deleteFunction',
            ],
            // non-cacheable actions
            [
                'ClubFunction' => 'listFunctions, createFunction, editFunction, updateFunction, deleteFunction',
            ]
        );


        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					memberlist {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_memberlist
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_memberlist.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_memberlist
						}
					}
					memberprofil {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_memberprofil
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_memberprofil.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_memberprofil
						}
					}
					personalsetting {
						iconIdentifier = vereinsmeier-logo-color
						title = Persönliche Einstellungen
						description = Dashboard Layout
						tt_content_defValues {
							CType = list
							list_type = vmmember_personalsetting
						}
					}
					csvimport {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_csvimport
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_csvimport.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_csvimport
						}
					}
					adminrole {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_adminrole
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_adminrole.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_adminrole
						}
					}
					memberdata {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_memberdata
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_memberdata.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_memberdata
						}
					}
					departments {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_member.member_departments
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vm_member_domain_model_department.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_departments
						}
					}
					functions {
						iconIdentifier = vereinsmeier-logo-color
						title = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_clubfunction
						description = LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:tx_vmmember_domain_model_clubfunction.description
						tt_content_defValues {
							CType = list
							list_type = vmmember_functions
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
