<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class ContributionRateTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\ContributionRate
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\ContributionRate();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getContributionRateTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContributionRateTitle()
        );

    }

    /**
     * @test
     */
    public function setContributionRateTitleForStringSetsContributionRateTitle()
    {
        $this->subject->setContributionRateTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'contributionRateTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getContributionRateAmountReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getContributionRateAmount()
        );

    }

    /**
     * @test
     */
    public function setContributionRateAmountForFloatSetsContributionRateAmount()
    {
        $this->subject->setContributionRateAmount(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'contributionRateAmount',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getContributeRateDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContributeRateDescription()
        );

    }

    /**
     * @test
     */
    public function setContributeRateDescriptionForStringSetsContributeRateDescription()
    {
        $this->subject->setContributeRateDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'contributeRateDescription',
            $this->subject
        );

    }
}
