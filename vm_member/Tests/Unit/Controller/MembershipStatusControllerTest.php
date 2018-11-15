<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class MembershipStatusControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\MembershipStatusController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\MembershipStatusController::class)
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
    public function listActionFetchesAllMembershipStatusesFromRepositoryAndAssignsThemToView()
    {

        $allMembershipStatuses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $membershipStatusRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $membershipStatusRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMembershipStatuses));
        $this->inject($this->subject, 'membershipStatusRepository', $membershipStatusRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('membershipStatuses', $allMembershipStatuses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMembershipStatusToView()
    {
        $membershipStatus = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('membershipStatus', $membershipStatus);

        $this->subject->showAction($membershipStatus);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMembershipStatusToMembershipStatusRepository()
    {
        $membershipStatus = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();

        $membershipStatusRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $membershipStatusRepository->expects(self::once())->method('add')->with($membershipStatus);
        $this->inject($this->subject, 'membershipStatusRepository', $membershipStatusRepository);

        $this->subject->createAction($membershipStatus);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMembershipStatusToView()
    {
        $membershipStatus = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('membershipStatus', $membershipStatus);

        $this->subject->editAction($membershipStatus);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMembershipStatusInMembershipStatusRepository()
    {
        $membershipStatus = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();

        $membershipStatusRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $membershipStatusRepository->expects(self::once())->method('update')->with($membershipStatus);
        $this->inject($this->subject, 'membershipStatusRepository', $membershipStatusRepository);

        $this->subject->updateAction($membershipStatus);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMembershipStatusFromMembershipStatusRepository()
    {
        $membershipStatus = new \Typo3graf\VmMember\Domain\Model\MembershipStatus();

        $membershipStatusRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $membershipStatusRepository->expects(self::once())->method('remove')->with($membershipStatus);
        $this->inject($this->subject, 'membershipStatusRepository', $membershipStatusRepository);

        $this->subject->deleteAction($membershipStatus);
    }
}
