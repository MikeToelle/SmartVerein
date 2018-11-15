<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class MemberControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\MemberController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\MemberController::class)
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
    public function listActionFetchesAllMembersFromRepositoryAndAssignsThemToView()
    {

        $allMembers = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MemberRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $memberRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMembers));
        $this->inject($this->subject, 'memberRepository', $memberRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('members', $allMembers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMemberToView()
    {
        $member = new \Typo3graf\VmMember\Domain\Model\Member();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('member', $member);

        $this->subject->showAction($member);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMemberToMemberRepository()
    {
        $member = new \Typo3graf\VmMember\Domain\Model\Member();

        $memberRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MemberRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository->expects(self::once())->method('add')->with($member);
        $this->inject($this->subject, 'memberRepository', $memberRepository);

        $this->subject->createAction($member);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMemberToView()
    {
        $member = new \Typo3graf\VmMember\Domain\Model\Member();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('member', $member);

        $this->subject->editAction($member);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMemberInMemberRepository()
    {
        $member = new \Typo3graf\VmMember\Domain\Model\Member();

        $memberRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MemberRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository->expects(self::once())->method('update')->with($member);
        $this->inject($this->subject, 'memberRepository', $memberRepository);

        $this->subject->updateAction($member);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMemberFromMemberRepository()
    {
        $member = new \Typo3graf\VmMember\Domain\Model\Member();

        $memberRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\MemberRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $memberRepository->expects(self::once())->method('remove')->with($member);
        $this->inject($this->subject, 'memberRepository', $memberRepository);

        $this->subject->deleteAction($member);
    }
}
