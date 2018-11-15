<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class MemberTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\Member
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\Member();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getMemberLastnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberLastname()
        );

    }

    /**
     * @test
     */
    public function setMemberLastnameForStringSetsMemberLastname()
    {
        $this->subject->setMemberLastname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberLastname',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberFirstnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberFirstname()
        );

    }

    /**
     * @test
     */
    public function setMemberFirstnameForStringSetsMemberFirstname()
    {
        $this->subject->setMemberFirstname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberFirstname',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberFormOfAddressReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setMemberFormOfAddressForIntSetsMemberFormOfAddress()
    {
    }

    /**
     * @test
     */
    public function getMemberTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberTitle()
        );

    }

    /**
     * @test
     */
    public function setMemberTitleForStringSetsMemberTitle()
    {
        $this->subject->setMemberTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberTitle',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberStreetReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberStreet()
        );

    }

    /**
     * @test
     */
    public function setMemberStreetForStringSetsMemberStreet()
    {
        $this->subject->setMemberStreet('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberStreet',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberZipCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberZipCode()
        );

    }

    /**
     * @test
     */
    public function setMemberZipCodeForStringSetsMemberZipCode()
    {
        $this->subject->setMemberZipCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberZipCode',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberCity()
        );

    }

    /**
     * @test
     */
    public function setMemberCityForStringSetsMemberCity()
    {
        $this->subject->setMemberCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberCity',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberCountryZoneReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberCountryZone()
        );

    }

    /**
     * @test
     */
    public function setMemberCountryZoneForStringSetsMemberCountryZone()
    {
        $this->subject->setMemberCountryZone('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberCountryZone',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberCountryReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberCountry()
        );

    }

    /**
     * @test
     */
    public function setMemberCountryForStringSetsMemberCountry()
    {
        $this->subject->setMemberCountry('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberCountry',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberPhone1ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberPhone1()
        );

    }

    /**
     * @test
     */
    public function setMemberPhone1ForStringSetsMemberPhone1()
    {
        $this->subject->setMemberPhone1('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberPhone1',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberPhone2ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberPhone2()
        );

    }

    /**
     * @test
     */
    public function setMemberPhone2ForStringSetsMemberPhone2()
    {
        $this->subject->setMemberPhone2('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberPhone2',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberMobileReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberMobile()
        );

    }

    /**
     * @test
     */
    public function setMemberMobileForStringSetsMemberMobile()
    {
        $this->subject->setMemberMobile('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberMobile',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberEmail()
        );

    }

    /**
     * @test
     */
    public function setMemberEmailForStringSetsMemberEmail()
    {
        $this->subject->setMemberEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberEmail',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberBirthdayReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberBirthday()
        );

    }

    /**
     * @test
     */
    public function setMemberBirthdayForDateTimeSetsMemberBirthday()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMemberBirthday($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'memberBirthday',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberWeddingDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberWeddingDate()
        );

    }

    /**
     * @test
     */
    public function setMemberWeddingDateForDateTimeSetsMemberWeddingDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMemberWeddingDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'memberWeddingDate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberMaritalStatusReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setMemberMaritalStatusForIntSetsMemberMaritalStatus()
    {
    }

    /**
     * @test
     */
    public function getMemberPaymentIntervalReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setMemberPaymentIntervalForIntSetsMemberPaymentInterval()
    {
    }

    /**
     * @test
     */
    public function getMemberPaymentMethodReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setMemberPaymentMethodForIntSetsMemberPaymentMethod()
    {
    }

    /**
     * @test
     */
    public function getMemberAccountOwnerReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberAccountOwner()
        );

    }

    /**
     * @test
     */
    public function setMemberAccountOwnerForStringSetsMemberAccountOwner()
    {
        $this->subject->setMemberAccountOwner('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberAccountOwner',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberIBANReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberIBAN()
        );

    }

    /**
     * @test
     */
    public function setMemberIBANForStringSetsMemberIBAN()
    {
        $this->subject->setMemberIBAN('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberIBAN',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberBICReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberBIC()
        );

    }

    /**
     * @test
     */
    public function setMemberBICForStringSetsMemberBIC()
    {
        $this->subject->setMemberBIC('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberBIC',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberMandateReferenceReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberMandateReference()
        );

    }

    /**
     * @test
     */
    public function setMemberMandateReferenceForStringSetsMemberMandateReference()
    {
        $this->subject->setMemberMandateReference('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberMandateReference',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberMandateValidReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberMandateValid()
        );

    }

    /**
     * @test
     */
    public function setMemberMandateValidForDateTimeSetsMemberMandateValid()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMemberMandateValid($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'memberMandateValid',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberCopyMandateReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberCopyMandate()
        );

    }

    /**
     * @test
     */
    public function setMemberCopyMandateForFileReferenceSetsMemberCopyMandate()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMemberCopyMandate($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'memberCopyMandate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberNoteReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberNote()
        );

    }

    /**
     * @test
     */
    public function setMemberNoteForStringSetsMemberNote()
    {
        $this->subject->setMemberNote('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberNote',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberIDReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberID()
        );

    }

    /**
     * @test
     */
    public function setMemberIDForStringSetsMemberID()
    {
        $this->subject->setMemberID('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberID',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberEntryDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberEntryDate()
        );

    }

    /**
     * @test
     */
    public function setMemberEntryDateForDateTimeSetsMemberEntryDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMemberEntryDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'memberEntryDate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberLeavingDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberLeavingDate()
        );

    }

    /**
     * @test
     */
    public function setMemberLeavingDateForDateTimeSetsMemberLeavingDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMemberLeavingDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'memberLeavingDate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberPhotoReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberPhoto()
        );

    }

    /**
     * @test
     */
    public function setMemberPhotoForFileReferenceSetsMemberPhoto()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMemberPhoto($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'memberPhoto',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMembershipApplicationReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getMembershipApplication()
        );

    }

    /**
     * @test
     */
    public function setMembershipApplicationForFileReferenceSetsMembershipApplication()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMembershipApplication($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'membershipApplication',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMembershipResignationReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getMembershipResignation()
        );

    }

    /**
     * @test
     */
    public function setMembershipResignationForFileReferenceSetsMembershipResignation()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMembershipResignation($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'membershipResignation',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberDashboardLayoutReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemberDashboardLayout()
        );

    }

    /**
     * @test
     */
    public function setMemberDashboardLayoutForStringSetsMemberDashboardLayout()
    {
        $this->subject->setMemberDashboardLayout('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memberDashboardLayout',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberVitaReturnsInitialValueForVita()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMemberVita()
        );

    }

    /**
     * @test
     */
    public function setMemberVitaForObjectStorageContainingVitaSetsMemberVita()
    {
        $memberVitum = new \Typo3graf\VmMember\Domain\Model\Vita();
        $objectStorageHoldingExactlyOneMemberVita = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMemberVita->attach($memberVitum);
        $this->subject->setMemberVita($objectStorageHoldingExactlyOneMemberVita);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMemberVita,
            'memberVita',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addMemberVitumToObjectStorageHoldingMemberVita()
    {
        $memberVitum = new \Typo3graf\VmMember\Domain\Model\Vita();
        $memberVitaObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberVitaObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($memberVitum));
        $this->inject($this->subject, 'memberVita', $memberVitaObjectStorageMock);

        $this->subject->addMemberVitum($memberVitum);
    }

    /**
     * @test
     */
    public function removeMemberVitumFromObjectStorageHoldingMemberVita()
    {
        $memberVitum = new \Typo3graf\VmMember\Domain\Model\Vita();
        $memberVitaObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberVitaObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($memberVitum));
        $this->inject($this->subject, 'memberVita', $memberVitaObjectStorageMock);

        $this->subject->removeMemberVitum($memberVitum);

    }

    /**
     * @test
     */
    public function getMemberEditHistoryReturnsInitialValueForEditHistory()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMemberEditHistory()
        );

    }

    /**
     * @test
     */
    public function setMemberEditHistoryForObjectStorageContainingEditHistorySetsMemberEditHistory()
    {
        $memberEditHistory = new \Typo3graf\VmMember\Domain\Model\EditHistory();
        $objectStorageHoldingExactlyOneMemberEditHistory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMemberEditHistory->attach($memberEditHistory);
        $this->subject->setMemberEditHistory($objectStorageHoldingExactlyOneMemberEditHistory);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMemberEditHistory,
            'memberEditHistory',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addMemberEditHistoryToObjectStorageHoldingMemberEditHistory()
    {
        $memberEditHistory = new \Typo3graf\VmMember\Domain\Model\EditHistory();
        $memberEditHistoryObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberEditHistoryObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($memberEditHistory));
        $this->inject($this->subject, 'memberEditHistory', $memberEditHistoryObjectStorageMock);

        $this->subject->addMemberEditHistory($memberEditHistory);
    }

    /**
     * @test
     */
    public function removeMemberEditHistoryFromObjectStorageHoldingMemberEditHistory()
    {
        $memberEditHistory = new \Typo3graf\VmMember\Domain\Model\EditHistory();
        $memberEditHistoryObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberEditHistoryObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($memberEditHistory));
        $this->inject($this->subject, 'memberEditHistory', $memberEditHistoryObjectStorageMock);

        $this->subject->removeMemberEditHistory($memberEditHistory);

    }

    /**
     * @test
     */
    public function getMemberStatusReturnsInitialValueForMembershipStatus()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberStatus()
        );

    }

    /**
     * @test
     */
    public function setMemberStatusForMembershipStatusSetsMemberStatus()
    {
        $memberStatusFixture = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();
        $this->subject->setMemberStatus($memberStatusFixture);

        self::assertAttributeEquals(
            $memberStatusFixture,
            'memberStatus',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberContributionRateReturnsInitialValueForContributionRate()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberContributionRate()
        );

    }

    /**
     * @test
     */
    public function setMemberContributionRateForContributionRateSetsMemberContributionRate()
    {
        $memberContributionRateFixture = new \Typo3graf\VmMember\Domain\Model\ContributionRate();
        $this->subject->setMemberContributionRate($memberContributionRateFixture);

        self::assertAttributeEquals(
            $memberContributionRateFixture,
            'memberContributionRate',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberSalutationReturnsInitialValueForSalutation()
    {
        self::assertEquals(
            null,
            $this->subject->getMemberSalutation()
        );

    }

    /**
     * @test
     */
    public function setMemberSalutationForSalutationSetsMemberSalutation()
    {
        $memberSalutationFixture = new \Typo3graf\VmMember\Domain\Model\Salutation();
        $this->subject->setMemberSalutation($memberSalutationFixture);

        self::assertAttributeEquals(
            $memberSalutationFixture,
            'memberSalutation',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMemberDepartmentsReturnsInitialValueForMemberDepartment()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMemberDepartments()
        );

    }

    /**
     * @test
     */
    public function setMemberDepartmentsForObjectStorageContainingMemberDepartmentSetsMemberDepartments()
    {
        $memberDepartment = new \Typo3graf\VmMember\Domain\Model\MemberDepartment();
        $objectStorageHoldingExactlyOneMemberDepartments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMemberDepartments->attach($memberDepartment);
        $this->subject->setMemberDepartments($objectStorageHoldingExactlyOneMemberDepartments);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMemberDepartments,
            'memberDepartments',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addMemberDepartmentToObjectStorageHoldingMemberDepartments()
    {
        $memberDepartment = new \Typo3graf\VmMember\Domain\Model\MemberDepartment();
        $memberDepartmentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberDepartmentsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($memberDepartment));
        $this->inject($this->subject, 'memberDepartments', $memberDepartmentsObjectStorageMock);

        $this->subject->addMemberDepartment($memberDepartment);
    }

    /**
     * @test
     */
    public function removeMemberDepartmentFromObjectStorageHoldingMemberDepartments()
    {
        $memberDepartment = new \Typo3graf\VmMember\Domain\Model\MemberDepartment();
        $memberDepartmentsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberDepartmentsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($memberDepartment));
        $this->inject($this->subject, 'memberDepartments', $memberDepartmentsObjectStorageMock);

        $this->subject->removeMemberDepartment($memberDepartment);

    }

    /**
     * @test
     */
    public function getMemberHasFamilyReturnsInitialValueForFamilies()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMemberHasFamily()
        );

    }

    /**
     * @test
     */
    public function setMemberHasFamilyForObjectStorageContainingFamiliesSetsMemberHasFamily()
    {
        $memberHasFamily = new \Typo3graf\VmMember\Domain\Model\Families();
        $objectStorageHoldingExactlyOneMemberHasFamily = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMemberHasFamily->attach($memberHasFamily);
        $this->subject->setMemberHasFamily($objectStorageHoldingExactlyOneMemberHasFamily);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMemberHasFamily,
            'memberHasFamily',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addMemberHasFamilyToObjectStorageHoldingMemberHasFamily()
    {
        $memberHasFamily = new \Typo3graf\VmMember\Domain\Model\Families();
        $memberHasFamilyObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberHasFamilyObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($memberHasFamily));
        $this->inject($this->subject, 'memberHasFamily', $memberHasFamilyObjectStorageMock);

        $this->subject->addMemberHasFamily($memberHasFamily);
    }

    /**
     * @test
     */
    public function removeMemberHasFamilyFromObjectStorageHoldingMemberHasFamily()
    {
        $memberHasFamily = new \Typo3graf\VmMember\Domain\Model\Families();
        $memberHasFamilyObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberHasFamilyObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($memberHasFamily));
        $this->inject($this->subject, 'memberHasFamily', $memberHasFamilyObjectStorageMock);

        $this->subject->removeMemberHasFamily($memberHasFamily);

    }

    /**
     * @test
     */
    public function getMemberLoginReturnsInitialValueForFrontendUser()
    {
    }

    /**
     * @test
     */
    public function setMemberLoginForFrontendUserSetsMemberLogin()
    {
    }
}
