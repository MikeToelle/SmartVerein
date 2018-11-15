<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class SalutationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\Salutation
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\Salutation();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getSalutationTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSalutationTitle()
        );

    }

    /**
     * @test
     */
    public function setSalutationTitleForStringSetsSalutationTitle()
    {
        $this->subject->setSalutationTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'salutationTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getSalutationDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSalutationDescription()
        );

    }

    /**
     * @test
     */
    public function setSalutationDescriptionForStringSetsSalutationDescription()
    {
        $this->subject->setSalutationDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'salutationDescription',
            $this->subject
        );

    }
}
