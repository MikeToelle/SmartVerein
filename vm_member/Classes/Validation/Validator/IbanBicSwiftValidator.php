<?php

namespace Typo3graf\VmMember\Validation\Validator;

use Typo3graf\VmClub\Utility\BankAccountUtility;

class IbanBicSwiftValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator
{
    /**
     * Object Manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * Is valid
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @return boolean
     */
    public function isValid($member) {
        if (!BankAccountUtility::checkIBAN($member->getMemberIBAN()) && $member->getMemberIBAN() != '' ) {
            $error = $this->objectManager->get(
                'TYPO3\CMS\Extbase\Validation\Error',
                'No valid IBAN account number.', 2347292434);
            $this->result->forProperty('memberIBAN')->addError($error);
        }

        if (!BankAccountUtility::checkBicSwift($member->getMemberBIC()) && $member->getMemberBIC() != '' ) {
            $error = $this->objectManager->get(
                'TYPO3\CMS\Extbase\Validation\Error',
                'No valid BIC/SWIFT number.', 2347392434);
            $this->result->forProperty('memberBIC')->addError($error);
        }

        if (!empty($error)){
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
