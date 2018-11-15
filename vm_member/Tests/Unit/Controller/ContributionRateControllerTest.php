<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class ContributionRateControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\ContributionRateController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\ContributionRateController::class)
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
    public function listActionFetchesAllContributionRatesFromRepositoryAndAssignsThemToView()
    {

        $allContributionRates = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $contributionRateRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\ContributionRateRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $contributionRateRepository->expects(self::once())->method('findAll')->will(self::returnValue($allContributionRates));
        $this->inject($this->subject, 'contributionRateRepository', $contributionRateRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('contributionRates', $allContributionRates);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenContributionRateToView()
    {
        $contributionRate = new \Typo3graf\VmMember\Domain\Model\ContributionRate();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('contributionRate', $contributionRate);

        $this->subject->showAction($contributionRate);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenContributionRateToContributionRateRepository()
    {
        $contributionRate = new \Typo3graf\VmMember\Domain\Model\ContributionRate();

        $contributionRateRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\ContributionRateRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $contributionRateRepository->expects(self::once())->method('add')->with($contributionRate);
        $this->inject($this->subject, 'contributionRateRepository', $contributionRateRepository);

        $this->subject->createAction($contributionRate);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenContributionRateToView()
    {
        $contributionRate = new \Typo3graf\VmMember\Domain\Model\ContributionRate();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('contributionRate', $contributionRate);

        $this->subject->editAction($contributionRate);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenContributionRateInContributionRateRepository()
    {
        $contributionRate = new \Typo3graf\VmMember\Domain\Model\ContributionRate();

        $contributionRateRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\ContributionRateRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $contributionRateRepository->expects(self::once())->method('update')->with($contributionRate);
        $this->inject($this->subject, 'contributionRateRepository', $contributionRateRepository);

        $this->subject->updateAction($contributionRate);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenContributionRateFromContributionRateRepository()
    {
        $contributionRate = new \Typo3graf\VmMember\Domain\Model\ContributionRate();

        $contributionRateRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\ContributionRateRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $contributionRateRepository->expects(self::once())->method('remove')->with($contributionRate);
        $this->inject($this->subject, 'contributionRateRepository', $contributionRateRepository);

        $this->subject->deleteAction($contributionRate);
    }
}
