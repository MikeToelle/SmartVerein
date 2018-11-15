<?php
namespace Typo3graf\VmBase\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class MASettingsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmBase\Domain\Model\MASettings
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmBase\Domain\Model\MASettings();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getEditOwnMemberDataReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getEditOwnMemberData()
        );

    }

    /**
     * @test
     */
    public function setEditOwnMemberDataForBoolSetsEditOwnMemberData()
    {
        $this->subject->setEditOwnMemberData(true);

        self::assertAttributeEquals(
            true,
            'editOwnMemberData',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowBulletinBoardReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getShowBulletinBoard()
        );

    }

    /**
     * @test
     */
    public function setShowBulletinBoardForBoolSetsShowBulletinBoard()
    {
        $this->subject->setShowBulletinBoard(true);

        self::assertAttributeEquals(
            true,
            'showBulletinBoard',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowEventsReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getShowEvents()
        );

    }

    /**
     * @test
     */
    public function setShowEventsForBoolSetsShowEvents()
    {
        $this->subject->setShowEvents(true);

        self::assertAttributeEquals(
            true,
            'showEvents',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowMemberListAllReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getShowMemberListAll()
        );

    }

    /**
     * @test
     */
    public function setShowMemberListAllForBoolSetsShowMemberListAll()
    {
        $this->subject->setShowMemberListAll(true);

        self::assertAttributeEquals(
            true,
            'showMemberListAll',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowMemberListByGroupsReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getShowMemberListByGroups()
        );

    }

    /**
     * @test
     */
    public function setShowMemberListByGroupsForBoolSetsShowMemberListByGroups()
    {
        $this->subject->setShowMemberListByGroups(true);

        self::assertAttributeEquals(
            true,
            'showMemberListByGroups',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowClubFinancesReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getShowClubFinances()
        );

    }

    /**
     * @test
     */
    public function setShowClubFinancesForBoolSetsShowClubFinances()
    {
        $this->subject->setShowClubFinances(true);

        self::assertAttributeEquals(
            true,
            'showClubFinances',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowDownloadAreaReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getShowDownloadArea()
        );

    }

    /**
     * @test
     */
    public function setShowDownloadAreaForBoolSetsShowDownloadArea()
    {
        $this->subject->setShowDownloadArea(true);

        self::assertAttributeEquals(
            true,
            'showDownloadArea',
            $this->subject
        );

    }
}
