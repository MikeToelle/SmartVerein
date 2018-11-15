<?php
namespace Typo3graf\VmMember\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class DepartmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Domain\Model\Department
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Typo3graf\VmMember\Domain\Model\Department();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDepartmentNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDepartmentName()
        );

    }

    /**
     * @test
     */
    public function setDepartmentNameForStringSetsDepartmentName()
    {
        $this->subject->setDepartmentName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'departmentName',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDepartmentDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDepartmentDescription()
        );

    }

    /**
     * @test
     */
    public function setDepartmentDescriptionForStringSetsDepartmentDescription()
    {
        $this->subject->setDepartmentDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'departmentDescription',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDepartmentLogoReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getDepartmentLogo()
        );

    }

    /**
     * @test
     */
    public function setDepartmentLogoForFileReferenceSetsDepartmentLogo()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setDepartmentLogo($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'departmentLogo',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDepartmentHasGroupsReturnsInitialValueForGroup()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDepartmentHasGroups()
        );

    }

    /**
     * @test
     */
    public function setDepartmentHasGroupsForObjectStorageContainingGroupSetsDepartmentHasGroups()
    {
        $departmentHasGroup = new \Typo3graf\VmMember\Domain\Model\Group();
        $objectStorageHoldingExactlyOneDepartmentHasGroups = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDepartmentHasGroups->attach($departmentHasGroup);
        $this->subject->setDepartmentHasGroups($objectStorageHoldingExactlyOneDepartmentHasGroups);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDepartmentHasGroups,
            'departmentHasGroups',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addDepartmentHasGroupToObjectStorageHoldingDepartmentHasGroups()
    {
        $departmentHasGroup = new \Typo3graf\VmMember\Domain\Model\Group();
        $departmentHasGroupsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentHasGroupsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($departmentHasGroup));
        $this->inject($this->subject, 'departmentHasGroups', $departmentHasGroupsObjectStorageMock);

        $this->subject->addDepartmentHasGroup($departmentHasGroup);
    }

    /**
     * @test
     */
    public function removeDepartmentHasGroupFromObjectStorageHoldingDepartmentHasGroups()
    {
        $departmentHasGroup = new \Typo3graf\VmMember\Domain\Model\Group();
        $departmentHasGroupsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentHasGroupsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($departmentHasGroup));
        $this->inject($this->subject, 'departmentHasGroups', $departmentHasGroupsObjectStorageMock);

        $this->subject->removeDepartmentHasGroup($departmentHasGroup);

    }

    /**
     * @test
     */
    public function getDepartmentHasEmployeeReturnsInitialValueForEmployeeFunction()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDepartmentHasEmployee()
        );

    }

    /**
     * @test
     */
    public function setDepartmentHasEmployeeForObjectStorageContainingEmployeeFunctionSetsDepartmentHasEmployee()
    {
        $departmentHasEmployee = new \Typo3graf\VmMember\Domain\Model\EmployeeFunction();
        $objectStorageHoldingExactlyOneDepartmentHasEmployee = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDepartmentHasEmployee->attach($departmentHasEmployee);
        $this->subject->setDepartmentHasEmployee($objectStorageHoldingExactlyOneDepartmentHasEmployee);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDepartmentHasEmployee,
            'departmentHasEmployee',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addDepartmentHasEmployeeToObjectStorageHoldingDepartmentHasEmployee()
    {
        $departmentHasEmployee = new \Typo3graf\VmMember\Domain\Model\EmployeeFunction();
        $departmentHasEmployeeObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentHasEmployeeObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($departmentHasEmployee));
        $this->inject($this->subject, 'departmentHasEmployee', $departmentHasEmployeeObjectStorageMock);

        $this->subject->addDepartmentHasEmployee($departmentHasEmployee);
    }

    /**
     * @test
     */
    public function removeDepartmentHasEmployeeFromObjectStorageHoldingDepartmentHasEmployee()
    {
        $departmentHasEmployee = new \Typo3graf\VmMember\Domain\Model\EmployeeFunction();
        $departmentHasEmployeeObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentHasEmployeeObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($departmentHasEmployee));
        $this->inject($this->subject, 'departmentHasEmployee', $departmentHasEmployeeObjectStorageMock);

        $this->subject->removeDepartmentHasEmployee($departmentHasEmployee);

    }
}
