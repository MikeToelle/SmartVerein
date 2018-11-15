<?php
namespace Typo3graf\VmClub\Domain\Model;

/***
 *
 * This file is part of the "Vereinsmeier - Club module" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3gtraf.de>
 *
 ***/

/**
 * Master data of the club.
 */

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Club extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Fullname of the club.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $clubName = '';

    /**
     * Shortname of the club.
     *
     * @var string
     */
    protected $clubShortName = '';

    /**
     * Founding year of the club
     *
     * @var string
     */
    protected $clubFoundingYear = '';

    /**
     * Street of the club address.
     *
     * @var string
     */
    protected $clubStreet = '';

    /**
     * Zipcode of the club address.
     *
     * @var string
     */
    protected $clubZipCode = '';

    /**
     * City of the club address.
     *
     * @var string
     */
    protected $clubCity = '';

    /**
     * Phonenumber of the club.
     *
     * @var string
     */
    protected $clubPhone = '';

    /**
     * Email address of the club.
     *
     * @var string
     * @validate EmailAddress
     */
    protected $clubEmail = '';

    /**
     * Website address of the club.
     *
     * @var string
     */
    protected $clubWebsite = '';

    /**
     * Tax office of the club
     *
     * @var string
     */
    protected $clubTaxOffice = '';

    /**
     * Tax number for the club.
     *
     * @var string
     */
    protected $clubTaxNumber = '';

    /**
     * VAT number for the club.
     *
     * @var string
     */
    protected $clubVatNumber = '';

    /**
     * Registration Court of the club.
     *
     * @var string
     */
    protected $clubRegistrationCourt = '';

    /**
     * Registration number for the club.
     *
     * @var string
     */
    protected $clubRegistrationNumber = '';

    /**
     * Bank of the club.
     *
     * @var string
     */
    protected $clubBankname = '';

    /**
     * IBAN of the club account.
     *
     * @var string
     */
    protected $clubIBAN = '';

    /**
     * BIC of the club account.
     *
     * @var string
     */
    protected $clubBIC = '';

    /**
     * Devout-identification number for the club.
     *
     * @var string
     */
    protected $clubDId = '';

    /**
     * Organisation the club belongs to.
     *
     * @var string
     */
    protected $clubOrganisation = '';

    /**
     * ID number of the club from the organisation.
     *
     * @var string
     */
    protected $clubOrganisationNumber = '';

    /**
     * Logo of the Club
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $clubLogo;

    /**
     * Facebook Link of the club
     *
     * @var string
     */
    protected $clubSocialMediaFacebook = '';

    /**
     * Twitter link of the club
     *
     * @var string
     */
    protected $clubSocialMediaTwitter = '';

    /**
     * Google+ link of the club
     *
     * @var string
     */
    protected $clubSocialMediaGoogle = '';

    /**
     * Instagram link of the club
     *
     * @var string
     */
    protected $clubSocialMediaInstagram = '';

    /**
     * Printerest link of the club
     *
     * @var string
     */
    protected $clubSocialMediaPrinterest = '';

    public function __construct()
    {
        $this->clubLogo = new ObjectStorage();
    }

    /**
     * Returns the clubName
     *
     * @return string $clubName
     */
    public function getClubName()
    {
        return $this->clubName;
    }

    /**
     * Sets the clubName
     *
     * @param string $clubName
     * @return void
     */
    public function setClubName($clubName)
    {
        $this->clubName = $clubName;
    }

    /**
     * Returns the clubShortName
     *
     * @return string $clubShortName
     */
    public function getClubShortName()
    {
        return $this->clubShortName;
    }

    /**
     * Sets the clubShortName
     *
     * @param string $clubShortName
     * @return void
     */
    public function setClubShortName($clubShortName)
    {
        $this->clubShortName = $clubShortName;
    }

    /**
     * Returns the clubFoundingYear
     *
     * @return string $clubFoundingYear
     */
    public function getClubFoundingYear()
    {
        return $this->clubFoundingYear;
    }

    /**
     * Sets the clubFoundingYear
     *
     * @param string $clubFoundingYear
     * @return void
     */
    public function setClubFoundingYear($clubFoundingYear)
    {
        $this->clubFoundingYear = $clubFoundingYear;
    }

    /**
     * Returns the clubStreet
     *
     * @return string $clubStreet
     */
    public function getClubStreet()
    {
        return $this->clubStreet;
    }

    /**
     * Sets the clubStreet
     *
     * @param string $clubStreet
     * @return void
     */
    public function setClubStreet($clubStreet)
    {
        $this->clubStreet = $clubStreet;
    }

    /**
     * Returns the clubZipCode
     *
     * @return string $clubZipCode
     */
    public function getClubZipCode()
    {
        return $this->clubZipCode;
    }

    /**
     * Sets the clubZipCode
     *
     * @param string $clubZipCode
     * @return void
     */
    public function setClubZipCode($clubZipCode)
    {
        $this->clubZipCode = $clubZipCode;
    }

    /**
     * Returns the clubCity
     *
     * @return string $clubCity
     */
    public function getClubCity()
    {
        return $this->clubCity;
    }

    /**
     * Sets the clubCity
     *
     * @param string $clubCity
     * @return void
     */
    public function setClubCity($clubCity)
    {
        $this->clubCity = $clubCity;
    }

    /**
     * Returns the clubPhone
     *
     * @return string $clubPhone
     */
    public function getClubPhone()
    {
        return $this->clubPhone;
    }

    /**
     * Sets the clubPhone
     *
     * @param string $clubPhone
     * @return void
     */
    public function setClubPhone($clubPhone)
    {
        $this->clubPhone = $clubPhone;
    }

    /**
     * Returns the clubEmail
     *
     * @return string $clubEmail
     */
    public function getClubEmail()
    {
        return $this->clubEmail;
    }

    /**
     * Sets the clubEmail
     *
     * @param string $clubEmail
     * @return void
     */
    public function setClubEmail($clubEmail=NULL)
    {
        $this->clubEmail = $clubEmail;
    }

    /**
     * Returns the clubWebsite
     *
     * @return string $clubWebsite
     */
    public function getClubWebsite()
    {
        return $this->clubWebsite;
    }

    /**
     * Sets the clubWebsite
     *
     * @param string $clubWebsite
     * @return void
     */
    public function setClubWebsite($clubWebsite)
    {
        $this->clubWebsite = $clubWebsite;
    }

    /**
     * Returns the clubTaxOffice
     *
     * @return string $clubTaxOffice
     */
    public function getClubTaxOffice()
    {
        return $this->clubTaxOffice;
    }

    /**
     * Sets the clubTaxOffice
     *
     * @param string $clubTaxOffice
     * @return void
     */
    public function setClubTaxOffice($clubTaxOffice)
    {
        $this->clubTaxOffice = $clubTaxOffice;
    }

    /**
     * Returns the clubTaxNumber
     *
     * @return string $clubTaxNumber
     */
    public function getClubTaxNumber()
    {
        return $this->clubTaxNumber;
    }

    /**
     * Sets the clubTaxNumber
     *
     * @param string $clubTaxNumber
     * @return void
     */
    public function setClubTaxNumber($clubTaxNumber)
    {
        $this->clubTaxNumber = $clubTaxNumber;
    }

    /**
     * Returns the clubVatNumber
     *
     * @return string $clubVatNumber
     */
    public function getClubVatNumber()
    {
        return $this->clubVatNumber;
    }

    /**
     * Sets the clubVatNumber
     *
     * @param string $clubVatNumber
     * @return void
     */
    public function setClubVatNumber($clubVatNumber)
    {
        $this->clubVatNumber = $clubVatNumber;
    }

    /**
     * Returns the clubRegistrationCourt
     *
     * @return string $clubRegistrationCourt
     */
    public function getClubRegistrationCourt()
    {
        return $this->clubRegistrationCourt;
    }

    /**
     * Sets the clubRegistrationCourt
     *
     * @param string $clubRegistrationCourt
     * @return void
     */
    public function setClubRegistrationCourt($clubRegistrationCourt)
    {
        $this->clubRegistrationCourt = $clubRegistrationCourt;
    }

    /**
     * Returns the clubRegistrationNumber
     *
     * @return string $clubRegistrationNumber
     */
    public function getClubRegistrationNumber()
    {
        return $this->clubRegistrationNumber;
    }

    /**
     * Sets the clubRegistrationNumber
     *
     * @param string $clubRegistrationNumber
     * @return void
     */
    public function setClubRegistrationNumber($clubRegistrationNumber)
    {
        $this->clubRegistrationNumber = $clubRegistrationNumber;
    }

    /**
     * Returns the clubBankname
     *
     * @return string $clubBankname
     */
    public function getClubBankname()
    {
        return $this->clubBankname;
    }

    /**
     * Sets the clubBankname
     *
     * @param string $clubBankname
     * @return void
     */
    public function setClubBankname($clubBankname)
    {
        $this->clubBankname = $clubBankname;
    }

    /**
     * Returns the clubIBAN
     *
     * @return string $clubIBAN
     */
    public function getClubIBAN()
    {
        return $this->clubIBAN;
    }

    /**
     * Sets the clubIBAN
     *
     * @param string $clubIBAN
     * @return void
     */
    public function setClubIBAN($clubIBAN)
    {
        $this->clubIBAN = $clubIBAN;
    }

    /**
     * Returns the clubBIC
     *
     * @return string $clubBIC
     */
    public function getClubBIC()
    {
        return $this->clubBIC;
    }

    /**
     * Sets the clubBIC
     *
     * @param string $clubBIC
     * @return void
     */
    public function setClubBIC($clubBIC)
    {
        $this->clubBIC = $clubBIC;
    }

    /**
     * Returns the clubDId
     *
     * @return string $clubDId
     */
    public function getClubDId()
    {
        return $this->clubDId;
    }

    /**
     * Sets the clubDId
     *
     * @param string $clubDId
     * @return void
     */
    public function setClubDId($clubDId)
    {
        $this->clubDId = $clubDId;
    }

    /**
     * Returns the clubOrganisation
     *
     * @return string $clubOrganisation
     */
    public function getClubOrganisation()
    {
        return $this->clubOrganisation;
    }

    /**
     * Sets the clubOrganisation
     *
     * @param string $clubOrganisation
     * @return void
     */
    public function setClubOrganisation($clubOrganisation)
    {
        $this->clubOrganisation = $clubOrganisation;
    }

    /**
     * Returns the clubOrganisationNumber
     *
     * @return string $clubOrganisationNumber
     */
    public function getClubOrganisationNumber()
    {
        return $this->clubOrganisationNumber;
    }

    /**
     * Sets the clubOrganisationNumber
     *
     * @param string $clubOrganisationNumber
     * @return void
     */
    public function setClubOrganisationNumber($clubOrganisationNumber)
    {
        $this->clubOrganisationNumber = $clubOrganisationNumber;
    }

    /**
     * Returns the clubLogo
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubLogo
     */
    public function getClubLogo()
    {
        return $this->clubLogo;
    }

    /**
     * Sets the clubLogo
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubLogo
     *
     */
    public function setClubLogo($clubLogo=NULL)
    {
        $this->clubLogo = $clubLogo;
    }

    /**
     * Returns the clubSocialMediaFacebook
     *
     * @return string $clubSocialMediaFacebook
     */
    public function getClubSocialMediaFacebook()
    {
        return $this->clubSocialMediaFacebook;
    }

    /**
     * Sets the clubSocialMediaFacebook
     *
     * @param string $clubSocialMediaFacebook
     * @return void
     */
    public function setClubSocialMediaFacebook($clubSocialMediaFacebook)
    {
        $this->clubSocialMediaFacebook = $clubSocialMediaFacebook;
    }

    /**
     * Returns the clubSocialMediaTwitter
     *
     * @return string $clubSocialMediaTwitter
     */
    public function getClubSocialMediaTwitter()
    {
        return $this->clubSocialMediaTwitter;
    }

    /**
     * Sets the clubSocialMediaTwitter
     *
     * @param string $clubSocialMediaTwitter
     * @return void
     */
    public function setClubSocialMediaTwitter($clubSocialMediaTwitter)
    {
        $this->clubSocialMediaTwitter = $clubSocialMediaTwitter;
    }

    /**
     * Returns the clubSocialMediaGoogle
     *
     * @return string $clubSocialMediaGoogle
     */
    public function getClubSocialMediaGoogle()
    {
        return $this->clubSocialMediaGoogle;
    }

    /**
     * Sets the clubSocialMediaGoogle
     *
     * @param string $clubSocialMediaGoogle
     * @return void
     */
    public function setClubSocialMediaGoogle($clubSocialMediaGoogle)
    {
        $this->clubSocialMediaGoogle = $clubSocialMediaGoogle;
    }

    /**
     * Returns the clubSocialMediaInstagram
     *
     * @return string $clubSocialMediaInstagram
     */
    public function getClubSocialMediaInstagram()
    {
        return $this->clubSocialMediaInstagram;
    }

    /**
     * Sets the clubSocialMediaInstagram
     *
     * @param string $clubSocialMediaInstagram
     * @return void
     */
    public function setClubSocialMediaInstagram($clubSocialMediaInstagram)
    {
        $this->clubSocialMediaInstagram = $clubSocialMediaInstagram;
    }

    /**
     * Returns the clubSocialMediaPrinterest
     *
     * @return string $clubSocialMediaPrinterest
     */
    public function getClubSocialMediaPrinterest()
    {
        return $this->clubSocialMediaPrinterest;
    }

    /**
     * Sets the clubSocialMediaPrinterest
     *
     * @param string $clubSocialMediaPrinterest
     * @return void
     */
    public function setClubSocialMediaPrinterest($clubSocialMediaPrinterest)
    {
        $this->clubSocialMediaPrinterest = $clubSocialMediaPrinterest;
    }
}
