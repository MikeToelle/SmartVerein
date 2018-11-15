<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class MembershipStatusTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\MembershipStatus
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getStatusTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStatusTitle()
        );

    }

    /**
     * @test
     */
    public function setStatusTitleForStringSetsStatusTitle()
    {
        $this->subject->setStatusTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'statusTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getStatusDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStatusDescription()
        );

    }

    /**
     * @test
     */
    public function setStatusDescriptionForStringSetsStatusDescription()
    {
        $this->subject->setStatusDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'statusDescription',
            $this->subject
        );

    }
}
