<?php
namespace Typo3graf\VmClub\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3gtraf.de>
 */
class ClubControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmClub\Controller\ClubController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmClub\Controller\ClubController::class)
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
    public function listActionFetchesAllClubsFromRepositoryAndAssignsThemToView()
    {

        $allClubs = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $clubRepository = $this->getMockBuilder(\Typo3graf\VmClub\Domain\Repository\ClubRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $clubRepository->expects(self::once())->method('findAll')->will(self::returnValue($allClubs));
        $this->inject($this->subject, 'clubRepository', $clubRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('clubs', $allClubs);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenClubToView()
    {
        $club = new \Typo3graf\VmClub\Domain\Model\Club();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('club', $club);

        $this->subject->showAction($club);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenClubToClubRepository()
    {
        $club = new \Typo3graf\VmClub\Domain\Model\Club();

        $clubRepository = $this->getMockBuilder(\Typo3graf\VmClub\Domain\Repository\ClubRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $clubRepository->expects(self::once())->method('add')->with($club);
        $this->inject($this->subject, 'clubRepository', $clubRepository);

        $this->subject->createAction($club);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenClubToView()
    {
        $club = new \Typo3graf\VmClub\Domain\Model\Club();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('club', $club);

        $this->subject->editAction($club);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenClubInClubRepository()
    {
        $club = new \Typo3graf\VmClub\Domain\Model\Club();

        $clubRepository = $this->getMockBuilder(\Typo3graf\VmClub\Domain\Repository\ClubRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $clubRepository->expects(self::once())->method('update')->with($club);
        $this->inject($this->subject, 'clubRepository', $clubRepository);

        $this->subject->updateAction($club);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenClubFromClubRepository()
    {
        $club = new \Typo3graf\VmClub\Domain\Model\Club();

        $clubRepository = $this->getMockBuilder(\Typo3graf\VmClub\Domain\Repository\ClubRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $clubRepository->expects(self::once())->method('remove')->with($club);
        $this->inject($this->subject, 'clubRepository', $clubRepository);

        $this->subject->deleteAction($club);
    }
}
