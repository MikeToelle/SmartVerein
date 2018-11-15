<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class SalutationControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\SalutationController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\SalutationController::class)
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
    public function listActionFetchesAllSalutationsFromRepositoryAndAssignsThemToView()
    {

        $allSalutations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $salutationRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\SalutationRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $salutationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSalutations));
        $this->inject($this->subject, 'salutationRepository', $salutationRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('salutations', $allSalutations);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSalutationToView()
    {
        $salutation = new \Typo3graf\VmMember\Domain\Model\Salutation();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('salutation', $salutation);

        $this->subject->showAction($salutation);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSalutationToSalutationRepository()
    {
        $salutation = new \Typo3graf\VmMember\Domain\Model\Salutation();

        $salutationRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\SalutationRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $salutationRepository->expects(self::once())->method('add')->with($salutation);
        $this->inject($this->subject, 'salutationRepository', $salutationRepository);

        $this->subject->createAction($salutation);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSalutationToView()
    {
        $salutation = new \Typo3graf\VmMember\Domain\Model\Salutation();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('salutation', $salutation);

        $this->subject->editAction($salutation);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSalutationInSalutationRepository()
    {
        $salutation = new \Typo3graf\VmMember\Domain\Model\Salutation();

        $salutationRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\SalutationRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $salutationRepository->expects(self::once())->method('update')->with($salutation);
        $this->inject($this->subject, 'salutationRepository', $salutationRepository);

        $this->subject->updateAction($salutation);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSalutationFromSalutationRepository()
    {
        $salutation = new \Typo3graf\VmMember\Domain\Model\Salutation();

        $salutationRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\SalutationRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $salutationRepository->expects(self::once())->method('remove')->with($salutation);
        $this->inject($this->subject, 'salutationRepository', $salutationRepository);

        $this->subject->deleteAction($salutation);
    }
}
