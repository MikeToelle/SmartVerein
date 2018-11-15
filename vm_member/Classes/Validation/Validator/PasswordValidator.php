<?php

namespace Typo3graf\VmMember\Validation\Validator;

class PasswordValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator
{
    /**
     * Object Manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * userRepository
     *
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     * @inject
     */
    protected $frontendUserRepository = NULL;

    /**
     * Is valid
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     * @return boolean
     */
    public function isValid($member) {

        $user = $member->getMemberLogin();
        if ($this->frontendUserRepository->findByUsername($user->getUsername())->count() > 0){
            $error = $this->objectManager->get(
                'TYPO3\CMS\Extbase\Validation\Error',
                'Username exists.', 2342954);
            $this->result->forProperty('memberLogin.username')->addError($error);
        }

        if ($user->getUsername() == ''){
            $error = $this->objectManager->get(
                'TYPO3\CMS\Extbase\Validation\Error',
                'Username is not set.', 2343284);
            $this->result->forProperty('memberLogin.username')->addError($error);
        }

        if ($member->getPassword() !== $member->getPasswordConfirm()) {
            $error = $this->objectManager->get(
                'TYPO3\CMS\Extbase\Validation\Error',
                'Password and password confirmation do not match.', 2343422434);
            $this->result->forProperty('password')->addError($error);
        }
        if (!empty($error)){
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
