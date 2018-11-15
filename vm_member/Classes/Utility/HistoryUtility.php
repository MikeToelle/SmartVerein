<?php
namespace Typo3graf\VmMember\Utility;

/***
 *
 * This file is part of the "Vereinsmeier - Member management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 ***/

use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

abstract class HistoryUtility{

    /**
     * editEntry
     * @param $key
     * @param $value
     * @return string
     */
    public static function editEntry ($key,$value){
        switch ($key){
            case 'memberFormOfAddress':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_form_of_address', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> ';
                $entry .= (1 == $value[1]) ? LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.mr', 'vm_member') : LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_form_of_address.mrs', 'vm_member');
                $entry .= '<br/>';
                return $entry;
                break;
            case 'memberTitle':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_title', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberSalutation':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_salutation', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->getSalutationTitle().'<br/>';
                return $entry;
                break;
            case 'memberFirstname':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_firstname', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberLastname':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_lastname', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberStreet':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_street', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberZipCode':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_zip_code', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberCity':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_city', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberCountryZone':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_country_zone', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberCountry':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_country', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberPhone1':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_phone1', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberPhone2':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_phone2', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberMobile':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_mobile', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberEmail':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_email', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberBirthday':
                if ($value[0] != $value[1]){
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_birthday', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->format('d.m.Y').'<br/>';
                }
                return $entry;
                break;
            case 'memberWeddingDate':
                if ($value[0] != $value[1]){
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_wedding_date', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->format('d.m.Y').'<br/>';
                }
                return $entry;
                break;
            case 'memberEntryDate':
                if ($value[0] != $value[1]){
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_entry_date', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->format('d.m.Y').'<br/>';
                }
                return $entry;
                break;
            case 'memberLeavingDate':
                if ($value[0] != $value[1]){
                    if ($value[1] !='') {
                        $editDate = $value[1]->format('d.m.Y');
                    } else { $editDate ='';}
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_leaving_date', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$editDate.'<br/>';
                }
                return $entry;
                break;
            case 'memberFirstPaymentDate':
                if ($value[0] != $value[1]){
                    if ($value[1] !='') {
                        $editDate = $value[1]->format('d.m.Y');
                    }
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_first_payment_date', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$editDate.'<br/>';
                }
                return $entry;
                break;
            case 'memberMandateValid':
                if ($value[0] != $value[1]){
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_mandate_valid', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->format('d.m.Y').'<br/>';
                }
                return $entry;
                break;
            case 'memberID':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_i_d', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberIsAdmin':
                $entry = 'L: Administrationsgruppe geändert.<br/>';
                return $entry;
                break;
            case 'memberLogin':
                if (isSet($value['username'])){
                    $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_login_username', 'vm_member') .' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[username][1].'<br/>';
                }
                if (isSet($value['password'])){
                    $entry .= LocalizationUtility::translate('tx_vmmember_domain_model_member.member_login_password_changed', 'vm_member').'<br/>';
                }
                return $entry;
                break;
            case 'memberStatus':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_status', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->getStatusTitle().'<br/>';
                return $entry;
                break;
            case 'memberAccountOwner':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_account_owner', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberIBAN':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_i_b_a_n', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberBIC':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_b_i_c', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1].'<br/>';
                return $entry;
                break;
            case 'memberContributionRate':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_contribution_rate', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> '.$value[1]->getContributionRateTitle().'<br/>';
                return $entry;
                break;
            case 'memberPaymentMethod':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_payment_method', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> ';
                switch($value[1]){
                    case 1: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.debit', 'VmMember');
                        break;
                    case 2: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.transaction', 'VmMember');
                        break;
                    case 3: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_method.cash', 'VmMember');
                        break;
                };
                $entry .= '<br/>';
                return $entry;
                break;
            case 'memberPaymentInterval':
                $entry = LocalizationUtility::translate('tx_vmmember_domain_model_member.member_payment_interval', 'vm_member').' <i class="fas fa-long-arrow-alt-right"arria-hidden="true"></i> ';
                switch($value[1]){
                    case 1: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.monthly', 'VmMember');
                        break;
                    case 3: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.quarterly', 'VmMember');
                        break;
                    case 6: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.biannual', 'VmMember');
                        break;
                    case 12: $entry .= LocalizationUtility::translate('LLL:EXT:vm_member/Resources/Private/Language/locallang_db.xlf:member_payment_interval.yearly', 'VmMember');
                        break;
                };
                $entry .= '<br/>';
                return $entry;
                break;
        }
    }
}
