<?php
namespace Typo3graf\VmMember\Domain\Model;

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

/**
 * Members how belongs a family.
 */
class Families extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * familyID
     *
     * @var string
     * @validate NotEmpty
     */
    protected $familyID = '';

    /**
     * Is head of the family.
     *
     * @var bool
     */
    protected $memberIsFamilyHead = false;

    /**
     * Members how belongs to a Family
     *
     * @var \Typo3graf\VmMember\Domain\Model\Member
     */
    protected $familyMembers = null;

    /**
     * Returns the familyID
     *
     * @return string $familyID
     */
    public function getFamilyID()
    {
        return $this->familyID;
    }

    /**
     * Sets the familyID
     *
     * @param string $familyID
     * @return void
     */
    public function setFamilyID($familyID)
    {
        $this->familyID = $familyID;
    }

    /**
     * Returns the memberIsFamilyHead
     *
     * @return bool $memberIsFamilyHead
     */
    public function getMemberIsFamilyHead()
    {
        return $this->memberIsFamilyHead;
    }

    /**
     * Sets the memberIsFamilyHead
     *
     * @param bool $memberIsFamilyHead
     * @return void
     */
    public function setMemberIsFamilyHead($memberIsFamilyHead)
    {
        $this->memberIsFamilyHead = $memberIsFamilyHead;
    }

    /**
     * Returns the boolean state of memberIsFamilyHead
     *
     * @return bool
     */
    public function isMemberIsFamilyHead()
    {
        return $this->memberIsFamilyHead;
    }

    /**
     * Returns the familyMembers
     *
     * @return \Typo3graf\VmMember\Domain\Model\Member $familyMembers
     */
    public function getFamilyMembers()
    {
        return $this->familyMembers;
    }

    /**
     * Sets the familyMembers
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $familyMembers
     * @return void
     */
    public function setFamilyMembers(\Typo3graf\VmMember\Domain\Model\Member $familyMembers)
    {
        $this->familyMembers = $familyMembers;
    }
}
