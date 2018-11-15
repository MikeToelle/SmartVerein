<?php
namespace Typo3graf\VmBase\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class FESettingsTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmBase\Domain\Model\FESettings
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmBase\Domain\Model\FESettings();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getMyProfilReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getMyProfil()
        );

    }

    /**
     * @test
     */
    public function setMyProfilForBoolSetsMyProfil()
    {
        $this->subject->setMyProfil(true);

        self::assertAttributeEquals(
            true,
            'myProfil',
            $this->subject
        );

    }
}
