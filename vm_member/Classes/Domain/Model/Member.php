<?php
namespace Typo3graf\VmMember\Domain\Model;

/***
 *
 * This file is part of the "Vereinsmeier - Member management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 ***/

/**
 * Member data.
 */
class Member extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Lastname of the member.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $memberLastname = '';

    /**
     * Firstname of the member.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $memberFirstname = '';

    /**
     * Form of address of the member. like Mr. Mrs.
     *
     * @var int
     */
    protected $memberFormOfAddress = 0;

    /**
     * Titel of the member
     *
     * @var string
     */
    protected $memberTitle = '';

    /**
     * Street of the member.
     *
     * @var string
     */
    protected $memberStreet = '';

    /**
     * Zipcode of the member
     *
     * @var string
     */
    protected $memberZipCode = '';

    /**
     * City of the member.
     *
     * @var string
     */
    protected $memberCity = '';

    /**
     * Country zone of the member.
     *
     * @var string
     */
    protected $memberCountryZone = '';

    /**
     * County of the member.
     *
     * @var string
     */
    protected $memberCountry = '';

    /**
     * Phonenumber1 of the member
     *
     * @var string
     */
    protected $memberPhone1 = '';

    /**
     * Phonenumber2 of the member
     *
     * @var string
     */
    protected $memberPhone2 = '';

    /**
     * mobileNumber of the member.
     *
     * @var string
     */
    protected $memberMobile = '';

    /**
     * Email address of the member.
     *
     * @var string
     */
    protected $memberEmail = '';

    /**
     * Birthday of the member.
     *
     * @var \DateTime
     */
    protected $memberBirthday = null;

    /**
     * Wedding date of the member.
     *
     * @var \DateTime
     */
    protected $memberWeddingDate = null;

    /**
     * Marital Status of the member
     * Familienstand
     *
     * @var int
     */
    protected $memberMaritalStatus = 0;

    /**
     * Payment interval of the member contribution.
     *
     * @var int
     */
    protected $memberPaymentInterval = 0;

    /**
     * Payment Method of the member contribution.
     *
     * @var int
     */
    protected $memberPaymentMethod = 0;

    /**
     * Date of the first payment.
     *
     * @var \DateTime
     */
    protected $memberFirstPaymentDate = null;

    /**
     * Account Owner name of the member.
     *
     * @var string
     */
    protected $memberAccountOwner = '';

    /**
     * IBAN of the member account.
     *
     * @var string
     */
    protected $memberIBAN = '';

    /**
     * BIC of the member account.
     *
     * @var string
     */
    protected $memberBIC = '';

    /**
     * The SEPA mandate reference of the member.
     *
     * @var string
     */
    protected $memberMandateReference = '';

    /**
     * The dat mandate reference is valid.
     *
     * @var \DateTime
     */
    protected $memberMandateValid = null;

    /**
     * A copy of mandate reference from the member.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $memberCopyMandate = null;

    /**
     * Notes of the member.
     *
     * @var string
     */
    protected $memberNote = '';

    /**
     * ID number of the member.
     *
     * @var string
     */
    protected $memberID = '';

    /**
     * Entry date of the member
     *
     * @var \DateTime
     */
    protected $memberEntryDate = null;

    /**
     * The leaving date of the member
     *
     * @var \DateTime
     */
    protected $memberLeavingDate = null;

    /**
     * memberLeaving
     *
     * @var bool
     */
    protected $memberLeaving = false;

    /**
     * memberReasonForLeaving
     *
     * @var string
     */
    protected $memberReasonForLeaving = '';

    /**
     * Photo of the member.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $memberPhoto;

    /**
     * Membership application of the member.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $membershipApplication;

    /**
     * Resignation of the membership.
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $membershipResignation = null;

    /**
     * Attachments of the member.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $memberAttachments = null;

    /**
     * Dashboard Layout from the member
     *
     * @var string
     */
    protected $memberDashboardLayout = '';

    /**
     * Is member admin from SmartVerein
     *
     * @var bool
     */
    protected $memberIsAdmin = false;

    /**
     * The folder of the member
     *
     * @var string
     */
    protected $memberFolder = '';

    /**
     * memberVita
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Vita>
     * @cascade remove
     */
    protected $memberVita = null;

    /**
     * memberEditHistory
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\EditHistory>
     * @cascade remove
     */
    protected $memberEditHistory = null;

    /**
     * memberStatus
     *
     * @var \Typo3graf\VmMember\Domain\Model\MembershipStatus
     */
    protected $memberStatus = null;

    /**
     * memberContributionRate
     *
     * @var \Typo3graf\VmMember\Domain\Model\ContributionRate
     */
    protected $memberContributionRate = null;

    /**
     * memberSalutation
     *
     * @var \Typo3graf\VmMember\Domain\Model\Salutation
     */
    protected $memberSalutation = null;

    /**
     * Departemnts the member belongs to.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Department>
     */
    protected $memberDepartments = null;

    /**
     * The familiy members.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Families>
     * @cascade remove
     */
    protected $memberHasFamily = null;

    /**
     * Login data of the member
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     */
    protected $memberLogin = null;

    /**
     * tstamp
     *
     * @var \DateTime
     */
    protected $tstamp;

    /**
     * @var string
     * @validate StringLength(minimum=8, maximum=22)
     */
    protected $password = null;


    /**
     * @var string
     * @validate StringLength(minimum=8, maximum=22)
     */
    protected $passwordConfirm = null;

    /**
     * send email to member
     *
     * @var bool
     */
    protected $isEmail = false;


    /**
     * __construct
     */
    public function __construct()
    {
        $this->memberPhoto = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->membershipApplication = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->membershipResignation = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->memberCopyMandate = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->memberAttachments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
       //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->memberVita = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->memberEditHistory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->memberDepartments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->memberHasFamily = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the memberLastname
     *
     * @return string $memberLastname
     */
    public function getMemberLastname()
    {
        return $this->memberLastname;
    }

    /**
     * Sets the memberLastname
     *
     * @param string $memberLastname
     * @return void
     */
    public function setMemberLastname($memberLastname)
    {
        $this->memberLastname = $memberLastname;
    }

    /**
     * Returns the memberFirstname
     *
     * @return string $memberFirstname
     */
    public function getMemberFirstname()
    {
        return $this->memberFirstname;
    }

    /**
     * Sets the memberFirstname
     *
     * @param string $memberFirstname
     * @return void
     */
    public function setMemberFirstname($memberFirstname)
    {
        $this->memberFirstname = $memberFirstname;
    }

    /**
     * Returns the memberFormOfAddress
     *
     * @return int $memberFormOfAddress
     */
    public function getMemberFormOfAddress()
    {
        return $this->memberFormOfAddress;
    }

    /**
     * Sets the memberFormOfAddress
     *
     * @param int $memberFormOfAddress
     * @return void
     */
    public function setMemberFormOfAddress($memberFormOfAddress)
    {
        $this->memberFormOfAddress = $memberFormOfAddress;
    }

    /**
     * Returns the memberTitle
     *
     * @return string $memberTitle
     */
    public function getMemberTitle()
    {
        return $this->memberTitle;
    }

    /**
     * Sets the memberTitle
     *
     * @param string $memberTitle
     * @return void
     */
    public function setMemberTitle($memberTitle)
    {
        $this->memberTitle = $memberTitle;
    }

    /**
     * Returns the memberStreet
     *
     * @return string $memberStreet
     */
    public function getMemberStreet()
    {
        return $this->memberStreet;
    }

    /**
     * Sets the memberStreet
     *
     * @param string $memberStreet
     * @return void
     */
    public function setMemberStreet($memberStreet)
    {
        $this->memberStreet = $memberStreet;
    }

    /**
     * Returns the memberZipCode
     *
     * @return string $memberZipCode
     */
    public function getMemberZipCode()
    {
        return $this->memberZipCode;
    }

    /**
     * Sets the memberZipCode
     *
     * @param string $memberZipCode
     * @return void
     */
    public function setMemberZipCode($memberZipCode)
    {
        $this->memberZipCode = $memberZipCode;
    }

    /**
     * Returns the memberCity
     *
     * @return string $memberCity
     */
    public function getMemberCity()
    {
        return $this->memberCity;
    }

    /**
     * Sets the memberCity
     *
     * @param string $memberCity
     * @return void
     */
    public function setMemberCity($memberCity)
    {
        $this->memberCity = $memberCity;
    }

    /**
     * Returns the memberCountryZone
     *
     * @return string $memberCountryZone
     */
    public function getMemberCountryZone()
    {
        return $this->memberCountryZone;
    }

    /**
     * Sets the memberCountryZone
     *
     * @param string $memberCountryZone
     * @return void
     */
    public function setMemberCountryZone($memberCountryZone)
    {
        $this->memberCountryZone = $memberCountryZone;
    }

    /**
     * Returns the memberCountry
     *
     * @return string $memberCountry
     */
    public function getMemberCountry()
    {
        return $this->memberCountry;
    }

    /**
     * Sets the memberCountry
     *
     * @param string $memberCountry
     * @return void
     */
    public function setMemberCountry($memberCountry)
    {
        $this->memberCountry = $memberCountry;
    }

    /**
     * Returns the memberPhone1
     *
     * @return string $memberPhone1
     */
    public function getMemberPhone1()
    {
        return $this->memberPhone1;
    }

    /**
     * Sets the memberPhone1
     *
     * @param string $memberPhone1
     * @return void
     */
    public function setMemberPhone1($memberPhone1)
    {
        $this->memberPhone1 = $memberPhone1;
    }

    /**
     * Returns the memberPhone2
     *
     * @return string $memberPhone2
     */
    public function getMemberPhone2()
    {
        return $this->memberPhone2;
    }

    /**
     * Sets the memberPhone2
     *
     * @param string $memberPhone2
     * @return void
     */
    public function setMemberPhone2($memberPhone2)
    {
        $this->memberPhone2 = $memberPhone2;
    }

    /**
     * Returns the memberMobile
     *
     * @return string $memberMobile
     */
    public function getMemberMobile()
    {
        return $this->memberMobile;
    }

    /**
     * Sets the memberMobile
     *
     * @param string $memberMobile
     * @return void
     */
    public function setMemberMobile($memberMobile)
    {
        $this->memberMobile = $memberMobile;
    }

    /**
     * Returns the memberEmail
     *
     * @return string $memberEmail
     */
    public function getMemberEmail()
    {
        return $this->memberEmail;
    }

    /**
     * Sets the memberEmail
     *
     * @param string $memberEmail
     * @return void
     */
    public function setMemberEmail($memberEmail)
    {
        $this->memberEmail = $memberEmail;
    }

    /**
     * Returns the memberBirthday
     *
     * @return \DateTime $memberBirthday
     */
    public function getMemberBirthday()
    {
        return $this->memberBirthday;
    }

    /**
     * Sets the memberBirthday
     *
     * @param \DateTime $memberBirthday
     * @return void
     */
    public function setMemberBirthday(\DateTime $memberBirthday=NULL)
    {
        if ($memberBirthday instanceof \DateTime) {
            $memberBirthday->setTime(0, 0, 0);
        }

        $this->memberBirthday = $memberBirthday;
    }

    /**
     * Returns the memberWeddingDate
     *
     * @return \DateTime $memberWeddingDate
     */
    public function getMemberWeddingDate()
    {
        return $this->memberWeddingDate;
    }

    /**
     * Sets the memberWeddingDate
     *
     * @param \DateTime $memberWeddingDate
     * @return void
     */
    public function setMemberWeddingDate(\DateTime $memberWeddingDate=NULL)
    {
        if ($memberWeddingDate instanceof \DateTime) {
            $memberWeddingDate->setTime(0, 0, 0);
        }
        $this->memberWeddingDate = $memberWeddingDate;
    }

    /**
     * Returns the memberMaritalStatus
     *
     * @return int $memberMaritalStatus
     */
    public function getMemberMaritalStatus()
    {
        return $this->memberMaritalStatus;
    }

    /**
     * Sets the memberMaritalStatus
     *
     * @param int $memberMaritalStatus
     * @return void
     */
    public function setMemberMaritalStatus($memberMaritalStatus)
    {
        $this->memberMaritalStatus = $memberMaritalStatus;
    }

    /**
     * Returns the memberPaymentInterval
     *
     * @return int $memberPaymentInterval
     */
    public function getMemberPaymentInterval()
    {
        return $this->memberPaymentInterval;
    }

    /**
     * Sets the memberPaymentInterval
     *
     * @param int $memberPaymentInterval
     * @return void
     */
    public function setMemberPaymentInterval($memberPaymentInterval)
    {
        $this->memberPaymentInterval = $memberPaymentInterval;
    }

    /**
     * Returns the memberPaymentMethod
     *
     * @return int $memberPaymentMethod
     */
    public function getMemberPaymentMethod()
    {
        return $this->memberPaymentMethod;
    }

    /**
     * Sets the memberPaymentMethod
     *
     * @param int $memberPaymentMethod
     * @return void
     */
    public function setMemberPaymentMethod($memberPaymentMethod)
    {
        $this->memberPaymentMethod = $memberPaymentMethod;
    }

    /**
     * Returns the memberFirstPaymentDate
     *
     * @return \DateTime $memberFirstPaymentDate
     */
    public function getMemberFirstPaymentDate()
    {
        return $this->memberFirstPaymentDate;
    }

    /**
     * Sets the memberFirstPaymentDate
     *
     * @param \DateTime $memberFirstPaymentDate
     * @return void
     */
    public function setMemberFirstPaymentDate(\DateTime $memberFirstPaymentDate=NULL)
    {
        if ($memberFirstPaymentDate instanceof \DateTime) {
            $memberFirstPaymentDate->setTime(0, 0, 0);
        }
        $this->memberFirstPaymentDate = $memberFirstPaymentDate;
    }

    /**
     * Returns the memberAccountOwner
     *
     * @return string $memberAccountOwner
     */
    public function getMemberAccountOwner()
    {
        return $this->memberAccountOwner;
    }

    /**
     * Sets the memberAccountOwner
     *
     * @param string $memberAccountOwner
     * @return void
     */
    public function setMemberAccountOwner($memberAccountOwner)
    {
        $this->memberAccountOwner = $memberAccountOwner;
    }

    /**
     * Returns the memberIBAN
     *
     * @return string $memberIBAN
     */
    public function getMemberIBAN()
    {
        return $this->memberIBAN;
    }

    /**
     * Sets the memberIBAN
     *
     * @param string $memberIBAN
     * @return void
     */
    public function setMemberIBAN($memberIBAN)
    {
        $this->memberIBAN = $memberIBAN;
    }

    /**
     * Returns the memberBIC
     *
     * @return string $memberBIC
     */
    public function getMemberBIC()
    {
        return $this->memberBIC;
    }

    /**
     * Sets the memberBIC
     *
     * @param string $memberBIC
     * @return void
     */
    public function setMemberBIC($memberBIC)
    {
        $this->memberBIC = $memberBIC;
    }

    /**
     * Returns the memberMandateReference
     *
     * @return string $memberMandateReference
     */
    public function getMemberMandateReference()
    {
        return $this->memberMandateReference;
    }

    /**
     * Sets the memberMandateReference
     *
     * @param string $memberMandateReference
     * @return void
     */
    public function setMemberMandateReference($memberMandateReference)
    {
        $this->memberMandateReference = $memberMandateReference;
    }

    /**
     * Returns the memberMandateValid
     *
     * @return \DateTime $memberMandateValid
     */
    public function getMemberMandateValid()
    {
        return $this->memberMandateValid;
    }

    /**
     * Sets the memberMandateValid
     *
     * @param \DateTime $memberMandateValid
     * @return void
     */
    public function setMemberMandateValid(\DateTime $memberMandateValid=NULL)
    {
        if ($memberMandateValid instanceof \DateTime) {
            $memberMandateValid->setTime(0, 0, 0);
        }
        $this->memberMandateValid = $memberMandateValid;
    }

    /**
     * Returns the memberCopyMandate
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberCopyMandate
     */
    public function getMemberCopyMandate()
    {
        return $this->memberCopyMandate;
    }

    /**
     * Sets the memberCopyMandate
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberCopyMandate
     * @return void
     */
    public function setMemberCopyMandate(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberCopyMandate=NULL)
    {
        $this->memberCopyMandate = $memberCopyMandate;
    }

    /**
     * Returns the memberNote
     *
     * @return string $memberNote
     */
    public function getMemberNote()
    {
        return $this->memberNote;
    }

    /**
     * Sets the memberNote
     *
     * @param string $memberNote
     * @return void
     */
    public function setMemberNote($memberNote)
    {
        $this->memberNote = $memberNote;
    }

    /**
     * Returns the memberID
     *
     * @return string $memberID
     */
    public function getMemberID()
    {
        return $this->memberID;
    }

    /**
     * Sets the memberID
     *
     * @param string $memberID
     * @return void
     */
    public function setMemberID($memberID)
    {
        $this->memberID = $memberID;
    }

    /**
     * Returns the memberEntryDate
     *
     * @return \DateTime $memberEntryDate
     */
    public function getMemberEntryDate()
    {
        return $this->memberEntryDate;
    }

    /**
     * Sets the memberEntryDate
     *
     * @param \DateTime $memberEntryDate
     * @return void
     */
    public function setMemberEntryDate(\DateTime $memberEntryDate=NULL)
    {
        if ($memberEntryDate instanceof \DateTime) {
            $memberEntryDate->setTime(0, 0, 0);
        }
        $this->memberEntryDate = $memberEntryDate;
    }

    /**
     * Returns the memberLeavingDate
     *
     * @return \DateTime $memberLeavingDate
     */
    public function getMemberLeavingDate()
    {
        return $this->memberLeavingDate;
    }

    /**
     * Sets the memberLeavingDate
     *
     * @param \DateTime $memberLeavingDate
     * @return void
     */
    public function setMemberLeavingDate(\DateTime $memberLeavingDate=NULL)
    {
        if ($memberLeavingDate instanceof \DateTime) {
            $memberLeavingDate->setTime(0, 0, 0);
        }
        $this->memberLeavingDate = $memberLeavingDate;
    }

    /**
     * Returns the memberLeaving
     *
     * @return bool $memberLeaving
     */
    public function getMemberLeaving()
    {
        return $this->memberLeaving;
    }

    /**
     * Sets the memberLeaving
     *
     * @param bool $memberLeaving
     * @return void
     */
    public function setMemberLeaving($memberLeaving)
    {
        $this->memberLeaving = $memberLeaving;
    }

    /**
     * Returns the boolean state of memberLeaving
     *
     * @return bool
     */
    public function isMemberLeaving()
    {
        return $this->memberLeaving;
    }

    /**
     * Returns the memberReasonForLeaving
     *
     * @return string $memberReasonForLeaving
     */
    public function getMemberReasonForLeaving()
    {
        return $this->memberReasonForLeaving;
    }

    /**
     * Sets the memberReasonForLeaving
     *
     * @param string $memberReasonForLeaving
     * @return void
     */
    public function setMemberReasonForLeaving($memberReasonForLeaving)
    {
        $this->memberReasonForLeaving = $memberReasonForLeaving;
    }

    /**
     * Returns the memberPhoto
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberPhoto
     */
    public function getMemberPhoto()
    {
        return $this->memberPhoto;
    }

    /**
     * Sets the memberPhoto
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberPhoto
     * @return void
     */
    public function setMemberPhoto(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberPhoto=NULL)
    {
        $this->memberPhoto = $memberPhoto;
    }

    /**
     * Returns the membershipApplication
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $membershipApplication
     */
    public function getMembershipApplication()
    {
        return $this->membershipApplication;
    }

    /**
     * Sets the membershipApplication
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $membershipApplication
     * @return void
     */
    public function setMembershipApplication(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $membershipApplication=NULL)
    {
        $this->membershipApplication = $membershipApplication;
    }

    /**
     * Returns the membershipResignation
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $membershipResignation
     */
    public function getMembershipResignation()
    {
        return $this->membershipResignation;
    }

    /**
     * Sets the membershipResignation
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $membershipResignation
     * @return void
     */
    public function setMembershipResignation(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $membershipResignation=NULL)
    {
        $this->membershipResignation = $membershipResignation;
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $memberAttachment
     * @return void
     */
    public function addMemberAttachment(\TYPO3\CMS\Extbase\Domain\Model\FileReference $memberAttachment)
    {
        $this->memberAttachments->attach($memberAttachment);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $memberAttachmentToRemove The FileReference to be removed
     * @return void
     */
    public function removeMemberAttachment(\TYPO3\CMS\Extbase\Domain\Model\FileReference $memberAttachmentToRemove)
    {
        $this->memberAttachments->detach($memberAttachmentToRemove);
    }

    /**
     * Returns the memberAttachments
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $memberAttachments
     */
    public function getMemberAttachments()
    {
        return $this->memberAttachments;
    }

    /**
     * Sets the memberAttachments
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $memberAttachments
     * @return void
     */
    public function setMemberAttachments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberAttachments)
    {
        $this->memberAttachments = $memberAttachments;
    }

    /**
     * Returns the memberDashboardLayout
     *
     * @return string $memberDashboardLayout
     */
    public function getMemberDashboardLayout()
    {
        return $this->memberDashboardLayout;
    }

    /**
     * Sets the memberDashboardLayout
     *
     * @param string $memberDashboardLayout
     * @return void
     */
    public function setMemberDashboardLayout($memberDashboardLayout)
    {
        $this->memberDashboardLayout = $memberDashboardLayout;
    }

    /**
     * Returns the memberIsAdmin
     *
     * @return bool $memberIsAdmin
     */
    public function getMemberIsAdmin()
    {
        return $this->memberIsAdmin;
    }

    /**
     * Sets the memberIsAdmin
     *
     * @param bool $memberIsAdmin
     * @return void
     */
    public function setMemberIsAdmin($memberIsAdmin)
    {
        $this->memberIsAdmin = $memberIsAdmin;
    }

    /**
     * Returns the boolean state of memberIsAdmin
     *
     * @return bool
     */
    public function isMemberIsAdmin()
    {
        return $this->memberIsAdmin;
    }

    /**
     * Returns the memberFolder
     *
     * @return string $memberFolder
     */
    public function getMemberFolder()
    {
        return $this->memberFolder;
    }

    /**
     * Sets the memberFolder
     *
     * @param string $memberFolder
     * @return void
     */
    public function setMemberFolder($memberFolder)
    {
        $this->memberFolder = $memberFolder;
    }

    /**
     * Adds a Vita
     *
     * @param \Typo3graf\VmMember\Domain\Model\Vita $memberVita
     * @return void
     */
    public function addMemberVita(\Typo3graf\VmMember\Domain\Model\Vita $memberVita)
    {
        $this->memberVita->attach($memberVita);
    }

    /**
     * Removes a Vita
     *
     * @param \Typo3graf\VmMember\Domain\Model\Vita $memberVitaToRemove The Vita to be removed
     * @return void
     */
    public function removeMemberVita(\Typo3graf\VmMember\Domain\Model\Vita $memberVitaToRemove)
    {
        $this->memberVita->detach($memberVitaToRemove);
    }

    /**
     * Returns the memberVita
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Vita> $memberVita
     */
    public function getMemberVita()
    {
        return $this->memberVita;
    }

    /**
     * Sets the memberVita
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Vita> $memberVita
     * @return void
     */
    public function setMemberVita(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberVita)
    {
        $this->memberVita = $memberVita;
    }

    /**
     * Adds a EditHistory
     *
     * @param \Typo3graf\VmMember\Domain\Model\EditHistory $memberEditHistory
     * @return void
     */
    public function addMemberEditHistory(\Typo3graf\VmMember\Domain\Model\EditHistory $memberEditHistory)
    {
        $this->memberEditHistory->attach($memberEditHistory);
    }

    /**
     * Removes a EditHistory
     *
     * @param \Typo3graf\VmMember\Domain\Model\EditHistory $memberEditHistoryToRemove The EditHistory to be removed
     * @return void
     */
    public function removeMemberEditHistory(\Typo3graf\VmMember\Domain\Model\EditHistory $memberEditHistoryToRemove)
    {
        $this->memberEditHistory->detach($memberEditHistoryToRemove);
    }

    /**
     * Returns the memberEditHistory
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\EditHistory> $memberEditHistory
     */
    public function getMemberEditHistory()
    {
        return $this->memberEditHistory;
    }

    /**
     * Sets the memberEditHistory
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\EditHistory> $memberEditHistory
     * @return void
     */
    public function setMemberEditHistory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberEditHistory)
    {
        $this->memberEditHistory = $memberEditHistory;
    }

    /**
     * Returns the memberStatus
     *
     * @return \Typo3graf\VmMember\Domain\Model\MembershipStatus $memberStatus
     */
    public function getMemberStatus()
    {
        return $this->memberStatus;
    }

    /**
     * Sets the memberStatus
     *
     * @param \Typo3graf\VmMember\Domain\Model\MembershipStatus $memberStatus
     * @return void
     */
    public function setMemberStatus(\Typo3graf\VmMember\Domain\Model\MembershipStatus $memberStatus=NULL)
    {
        $this->memberStatus = $memberStatus;
    }

    /**
     * Returns the memberContributionRate
     *
     * @return \Typo3graf\VmMember\Domain\Model\ContributionRate $memberContributionRate
     */
    public function getMemberContributionRate()
    {
        return $this->memberContributionRate;
    }

    /**
     * Sets the memberContributionRate
     *
     * @param \Typo3graf\VmMember\Domain\Model\ContributionRate $memberContributionRate
     * @return void
     */
    public function setMemberContributionRate(\Typo3graf\VmMember\Domain\Model\ContributionRate $memberContributionRate=NULL)
    {
        $this->memberContributionRate = $memberContributionRate;
    }

    /**
     * Returns the memberSalutation
     *
     * @return \Typo3graf\VmMember\Domain\Model\Salutation $memberSalutation
     */
    public function getMemberSalutation()
    {
        return $this->memberSalutation;
    }

    /**
     * Sets the memberSalutation
     *
     * @param \Typo3graf\VmMember\Domain\Model\Salutation $memberSalutation
     * @return void
     */
    public function setMemberSalutation(\Typo3graf\VmMember\Domain\Model\Salutation $memberSalutation=NULL)
    {
        $this->memberSalutation = $memberSalutation;
    }

    /**
     * Adds a Department
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $memberDepartment
     * @return void
     */
    public function addMemberDepartment(\Typo3graf\VmMember\Domain\Model\Department $memberDepartment)
    {
        $this->memberDepartments->attach($memberDepartment);
    }

    /**
     * Removes a Department
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $memberDepartmentToRemove The Department to be removed
     * @return void
     */
    public function removeMemberDepartment(\Typo3graf\VmMember\Domain\Model\Department $memberDepartmentToRemove)
    {
        $this->memberDepartments->detach($memberDepartmentToRemove);
    }

    /**
     * Returns the memberDepartments
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Department> $memberDepartments
     */
    public function getMemberDepartments()
    {
        return $this->memberDepartments;
    }

    /**
     * Sets the memberDepartments
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Department> $memberDepartments
     * @return void
     */
    public function setMemberDepartments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberDepartments)
    {
        $this->memberDepartments = $memberDepartments;
    }

    /**
     * Adds a Families
     *
     * @param \Typo3graf\VmMember\Domain\Model\Families $memberHasFamily
     * @return void
     */
    public function addMemberHasFamily(\Typo3graf\VmMember\Domain\Model\Families $memberHasFamily)
    {
        $this->memberHasFamily->attach($memberHasFamily);
    }

    /**
     * Removes a Families
     *
     * @param \Typo3graf\VmMember\Domain\Model\Families $memberHasFamilyToRemove The Families to be removed
     * @return void
     */
    public function removeMemberHasFamily(\Typo3graf\VmMember\Domain\Model\Families $memberHasFamilyToRemove)
    {
        $this->memberHasFamily->detach($memberHasFamilyToRemove);
    }

    /**
     * Returns the memberHasFamily
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Families> $memberHasFamily
     */
    public function getMemberHasFamily()
    {
        return $this->memberHasFamily;
    }

    /**
     * Sets the memberHasFamily
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\Families> $memberHasFamily
     * @return void
     */
    public function setMemberHasFamily(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $memberHasFamily)
    {
        $this->memberHasFamily = $memberHasFamily;
    }

    /**
     * Returns the memberLogin
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $memberLogin
     */
    public function getMemberLogin()
    {
        return $this->memberLogin;
    }

    /**
     * Sets the memberLogin
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $memberLogin
     * @return void
     */
    public function setMemberLogin(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $memberLogin)
    {
        $this->memberLogin = $memberLogin;
    }

    /**
     * Returns the tstamp
     *
     * @return \DateTime $tstamp
     */
    public function getTstamp() {
        return $this->tstamp;
    }

    /**
     * Sets the tstamp
     *
     * @param \DateTime $tstamp
     * @return void
     */
    public function setTstamp($tstamp) {
        $this->tstamp = $tstamp;
    }

    /**
     * Returns the password
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * sets the password
     * @param string $password
     * return void
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * Returns the passwordConfirm
     * @return string $passwordConfirm
     */
    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }

    /**
     * sets the passwordConfim
     * @param string $passwordConfirm
     * return void
     */
    public function setPasswordConfirm(string $passwordConfirm)
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * Returns the isEmail
     *
     * @return bool $isEmail
     */
    public function getIsEmail()
    {
        return $this->isEmail;
    }

    /**
     * Sets the isEmail
     *
     * @param bool $isEmail
     * @return void
     */
    public function setIsEmail($isEmail)
    {
        $this->isEmail = $isEmail;
    }

    /**
     * Returns the boolean state of isEmail
     *
     * @return bool
     */
    public function isIsEmail()
    {
        return $this->isEmail;
    }

    /**
     * Returns the memberFullnameFirst
     *
     * @return string $memberFullnameFirst
     */
    public function getMemberFullnameFirst()
    {
        return $this->getMemberFirstname().' '.$this->getMemberLastname();
    }

    /**
     * Returns the memberFullnameLast
     *
     * @return string $memberFullnameLast
     */
    public function getMemberFullnameLast()
    {
        return $this->getMemberLastname().' '.$this->getMemberFirstname();
    }

    /**
     * Returns the memberFullAddress
     *
     * @return string $memberFullAddress
     */
    public function getMemberFullAddress()
    {
        return $this->getMemberFirstname().' '.$this->getMemberLastname().' '.$this->getMemberStreet().' '.$this->getMemberCity();
    }

}
