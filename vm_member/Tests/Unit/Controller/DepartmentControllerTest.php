<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class DepartmentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\DepartmentController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\DepartmentController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllDepartmentsFromRepositoryAndAssignsThemToView()
    {

        $allDepartments = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $departmentRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\DepartmentRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $departmentRepository->expects(self::once())->method('findAll')->will(self::returnValue($allDepartments));
        $this->inject($this->subject, 'departmentRepository', $departmentRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('departments', $allDepartments);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDepartmentToView()
    {
        $department = new \Typo3graf\VmMember\Domain\Model\Department();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('department', $department);

        $this->subject->showAction($department);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenDepartmentToDepartmentRepository()
    {
        $department = new \Typo3graf\VmMember\Domain\Model\Department();

        $departmentRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\DepartmentRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentRepository->expects(self::once())->method('add')->with($department);
        $this->inject($this->subject, 'departmentRepository', $departmentRepository);

        $this->subject->createAction($department);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenDepartmentToView()
    {
        $department = new \Typo3graf\VmMember\Domain\Model\Department();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('department', $department);

        $this->subject->editAction($department);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenDepartmentInDepartmentRepository()
    {
        $department = new \Typo3graf\VmMember\Domain\Model\Department();

        $departmentRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\DepartmentRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentRepository->expects(self::once())->method('update')->with($department);
        $this->inject($this->subject, 'departmentRepository', $departmentRepository);

        $this->subject->updateAction($department);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenDepartmentFromDepartmentRepository()
    {
        $department = new \Typo3graf\VmMember\Domain\Model\Department();

        $departmentRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\DepartmentRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $departmentRepository->expects(self::once())->method('remove')->with($department);
        $this->inject($this->subject, 'departmentRepository', $departmentRepository);

        $this->subject->deleteAction($department);
    }
}
