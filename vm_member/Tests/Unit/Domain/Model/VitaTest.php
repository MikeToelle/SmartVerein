<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class VitaTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\Vita
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\Vita();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getVitaTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVitaTitle()
        );

    }

    /**
     * @test
     */
    public function setVitaTitleForStringSetsVitaTitle()
    {
        $this->subject->setVitaTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vitaTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getVitaDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVitaDescription()
        );

    }

    /**
     * @test
     */
    public function setVitaDescriptionForStringSetsVitaDescription()
    {
        $this->subject->setVitaDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vitaDescription',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getVitaDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getVitaDate()
        );

    }

    /**
     * @test
     */
    public function setVitaDateForDateTimeSetsVitaDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setVitaDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'vitaDate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getVitaIsReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setVitaIsForIntSetsVitaIs()
    {
    }
}
