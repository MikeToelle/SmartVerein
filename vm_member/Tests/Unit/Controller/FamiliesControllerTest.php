<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class FamiliesControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\FamiliesController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\FamiliesController::class)
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
    public function listActionFetchesAllFamiliessFromRepositoryAndAssignsThemToView()
    {

        $allFamiliess = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $familiesRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\FamiliesRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $familiesRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFamiliess));
        $this->inject($this->subject, 'familiesRepository', $familiesRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('familiess', $allFamiliess);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFamiliesToView()
    {
        $families = new \Typo3graf\VmMember\Domain\Model\Families();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('families', $families);

        $this->subject->showAction($families);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFamiliesToFamiliesRepository()
    {
        $families = new \Typo3graf\VmMember\Domain\Model\Families();

        $familiesRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\FamiliesRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $familiesRepository->expects(self::once())->method('add')->with($families);
        $this->inject($this->subject, 'familiesRepository', $familiesRepository);

        $this->subject->createAction($families);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFamiliesToView()
    {
        $families = new \Typo3graf\VmMember\Domain\Model\Families();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('families', $families);

        $this->subject->editAction($families);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFamiliesInFamiliesRepository()
    {
        $families = new \Typo3graf\VmMember\Domain\Model\Families();

        $familiesRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\FamiliesRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $familiesRepository->expects(self::once())->method('update')->with($families);
        $this->inject($this->subject, 'familiesRepository', $familiesRepository);

        $this->subject->updateAction($families);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenFamiliesFromFamiliesRepository()
    {
        $families = new \Typo3graf\VmMember\Domain\Model\Families();

        $familiesRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\FamiliesRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $familiesRepository->expects(self::once())->method('remove')->with($families);
        $this->inject($this->subject, 'familiesRepository', $familiesRepository);

        $this->subject->deleteAction($families);
    }
}
