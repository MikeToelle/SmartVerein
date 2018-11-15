<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class EditHistoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\EditHistory
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\EditHistory();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getEditHistoryTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEditHistoryTitle()
        );

    }

    /**
     * @test
     */
    public function setEditHistoryTitleForStringSetsEditHistoryTitle()
    {
        $this->subject->setEditHistoryTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'editHistoryTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getEditHistoryUserReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEditHistoryUser()
        );

    }

    /**
     * @test
     */
    public function setEditHistoryUserForStringSetsEditHistoryUser()
    {
        $this->subject->setEditHistoryUser('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'editHistoryUser',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getEditHistoryDateTimeReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getEditHistoryDateTime()
        );

    }

    /**
     * @test
     */
    public function setEditHistoryDateTimeForDateTimeSetsEditHistoryDateTime()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setEditHistoryDateTime($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'editHistoryDateTime',
            $this->subject
        );

    }
}
