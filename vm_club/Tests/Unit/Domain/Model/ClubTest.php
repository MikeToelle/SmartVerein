<?php
namespace Typo3graf\VmClub\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3gtraf.de>
 */
class ClubTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmClub\Domain\Model\Club
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmClub\Domain\Model\Club();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getClubNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubName()
        );

    }

    /**
     * @test
     */
    public function setClubNameForStringSetsClubName()
    {
        $this->subject->setClubName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubName',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubShortNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubShortName()
        );

    }

    /**
     * @test
     */
    public function setClubShortNameForStringSetsClubShortName()
    {
        $this->subject->setClubShortName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubShortName',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubStreetReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubStreet()
        );

    }

    /**
     * @test
     */
    public function setClubStreetForStringSetsClubStreet()
    {
        $this->subject->setClubStreet('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubStreet',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubZipCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubZipCode()
        );

    }

    /**
     * @test
     */
    public function setClubZipCodeForStringSetsClubZipCode()
    {
        $this->subject->setClubZipCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubZipCode',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubCity()
        );

    }

    /**
     * @test
     */
    public function setClubCityForStringSetsClubCity()
    {
        $this->subject->setClubCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubCity',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubPhoneReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubPhone()
        );

    }

    /**
     * @test
     */
    public function setClubPhoneForStringSetsClubPhone()
    {
        $this->subject->setClubPhone('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubPhone',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubEmail()
        );

    }

    /**
     * @test
     */
    public function setClubEmailForStringSetsClubEmail()
    {
        $this->subject->setClubEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubEmail',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubWebsiteReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubWebsite()
        );

    }

    /**
     * @test
     */
    public function setClubWebsiteForStringSetsClubWebsite()
    {
        $this->subject->setClubWebsite('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubWebsite',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubTaxNumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubTaxNumber()
        );

    }

    /**
     * @test
     */
    public function setClubTaxNumberForStringSetsClubTaxNumber()
    {
        $this->subject->setClubTaxNumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubTaxNumber',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubVatNumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubVatNumber()
        );

    }

    /**
     * @test
     */
    public function setClubVatNumberForStringSetsClubVatNumber()
    {
        $this->subject->setClubVatNumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubVatNumber',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubRegistrationCourtReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubRegistrationCourt()
        );

    }

    /**
     * @test
     */
    public function setClubRegistrationCourtForStringSetsClubRegistrationCourt()
    {
        $this->subject->setClubRegistrationCourt('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubRegistrationCourt',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubRegistrationNumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubRegistrationNumber()
        );

    }

    /**
     * @test
     */
    public function setClubRegistrationNumberForStringSetsClubRegistrationNumber()
    {
        $this->subject->setClubRegistrationNumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubRegistrationNumber',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubIBANReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubIBAN()
        );

    }

    /**
     * @test
     */
    public function setClubIBANForStringSetsClubIBAN()
    {
        $this->subject->setClubIBAN('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubIBAN',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubBICReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubBIC()
        );

    }

    /**
     * @test
     */
    public function setClubBICForStringSetsClubBIC()
    {
        $this->subject->setClubBIC('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubBIC',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubDIdReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubDId()
        );

    }

    /**
     * @test
     */
    public function setClubDIdForStringSetsClubDId()
    {
        $this->subject->setClubDId('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubDId',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubOrganisationReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubOrganisation()
        );

    }

    /**
     * @test
     */
    public function setClubOrganisationForStringSetsClubOrganisation()
    {
        $this->subject->setClubOrganisation('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubOrganisation',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubOrganisationNumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClubOrganisationNumber()
        );

    }

    /**
     * @test
     */
    public function setClubOrganisationNumberForStringSetsClubOrganisationNumber()
    {
        $this->subject->setClubOrganisationNumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clubOrganisationNumber',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getClubLogoReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getClubLogo()
        );

    }

    /**
     * @test
     */
    public function setClubLogoForFileReferenceSetsClubLogo()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setClubLogo($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'clubLogo',
            $this->subject
        );

    }
}
