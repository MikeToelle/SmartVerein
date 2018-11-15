<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class FamiliesTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\Families
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\Families();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFamilyIDReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFamilyID()
        );

    }

    /**
     * @test
     */
    public function setFamilyIDForStringSetsFamilyID()
    {
        $this->subject->setFamilyID('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'familyID',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberIsFamilyHeadReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getMemberIsFamilyHead()
        );

    }

    /**
     * @test
     */
    public function setMemberIsFamilyHeadForBoolSetsMemberIsFamilyHead()
    {
        $this->subject->setMemberIsFamilyHead(true);

        self::assertAttributeEquals(
            true,
            'memberIsFamilyHead',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getFamilyMembersReturnsInitialValueForMember()
    {
        self::assertEquals(
            null,
            $this->subject->getFamilyMembers()
        );

    }

    /**
     * @test
     */
    public function setFamilyMembersForMemberSetsFamilyMembers()
    {
        $familyMembersFixture = new \Typo3graf\VmMember\Domain\Model\Member();
        $this->subject->setFamilyMembers($familyMembersFixture);

        self::assertAttributeEquals(
            $familyMembersFixture,
            'familyMembers',
            $this->subject
        );

    }
}
