<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class EditHistoryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\EditHistoryController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\EditHistoryController::class)
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
    public function listActionFetchesAllEditHistoriesFromRepositoryAndAssignsThemToView()
    {

        $allEditHistories = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $editHistoryRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\EditHistoryRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $editHistoryRepository->expects(self::once())->method('findAll')->will(self::returnValue($allEditHistories));
        $this->inject($this->subject, 'editHistoryRepository', $editHistoryRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('editHistories', $allEditHistories);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenEditHistoryToView()
    {
        $editHistory = new \Typo3graf\VmMember\Domain\Model\EditHistory();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('editHistory', $editHistory);

        $this->subject->showAction($editHistory);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenEditHistoryToEditHistoryRepository()
    {
        $editHistory = new \Typo3graf\VmMember\Domain\Model\EditHistory();

        $editHistoryRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\EditHistoryRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $editHistoryRepository->expects(self::once())->method('add')->with($editHistory);
        $this->inject($this->subject, 'editHistoryRepository', $editHistoryRepository);

        $this->subject->createAction($editHistory);
    }
}
