<?php

namespace Typo3graf\VmMember\Validation\Validator;

class IsEmailValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator
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
        if (($member->getIsEmail() == 'true') and ($member->getMemberEmail() == '') ) {
            $error = $this->objectManager->get(
                'TYPO3\CMS\Extbase\Validation\Error',
                'Email not set.', 2343482434);
            $this->result->forProperty('memberEmail')->addError($error);
            $this->result->forProperty('isEmail')->addError($error);
            return FALSE;
        }
        return TRUE;
    }

}
