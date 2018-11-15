<?php
namespace Typo3graf\VmBase\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class SYSSettingsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmBase\Domain\Model\SYSSettings
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmBase\Domain\Model\SYSSettings();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getMemberIDFormatReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberIDFormat()
        );

    }

    /**
     * @test
     */
    public function setMemberIDFormatForStringSetsMemberIDFormat()
    {
        $this->subject->setMemberIDFormat('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberIDFormat',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAutoMemberIDReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAutoMemberID()
        );

    }

    /**
     * @test
     */
    public function setAutoMemberIDForBoolSetsAutoMemberID()
    {
        $this->subject->setAutoMemberID(true);

        self::assertAttributeEquals(
            true,
            'autoMemberID',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getSupplementMemberIDReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getSupplementMemberID()
        );

    }

    /**
     * @test
     */
    public function setSupplementMemberIDForBoolSetsSupplementMemberID()
    {
        $this->subject->setSupplementMemberID(true);

        self::assertAttributeEquals(
            true,
            'supplementMemberID',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubAnniversariesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubAnniversaries()
        );

    }

    /**
     * @test
     */
    public function setClubAnniversariesForStringSetsClubAnniversaries()
    {
        $this->subject->setClubAnniversaries('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubAnniversaries',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getShowMemberBirthdaysReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getShowMemberBirthdays()
        );

    }

    /**
     * @test
     */
    public function setShowMemberBirthdaysForStringSetsShowMemberBirthdays()
    {
        $this->subject->setShowMemberBirthdays('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'showMemberBirthdays',
            $this->subject
        );

    }
}
