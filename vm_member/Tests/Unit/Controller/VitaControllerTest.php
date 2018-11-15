<?php
namespace Typo3graf\VmMember\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class VitaControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmMember\Controller\VitaController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmMember\Controller\VitaController::class)
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
    public function listActionFetchesAllVitasFromRepositoryAndAssignsThemToView()
    {

        $allVitas = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $vitaRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\VitaRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $vitaRepository->expects(self::once())->method('findAll')->will(self::returnValue($allVitas));
        $this->inject($this->subject, 'vitaRepository', $vitaRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('vitas', $allVitas);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenVitaToView()
    {
        $vita = new \Typo3graf\VmMember\Domain\Model\Vita();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('vita', $vita);

        $this->subject->showAction($vita);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenVitaToVitaRepository()
    {
        $vita = new \Typo3graf\VmMember\Domain\Model\Vita();

        $vitaRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\VitaRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $vitaRepository->expects(self::once())->method('add')->with($vita);
        $this->inject($this->subject, 'vitaRepository', $vitaRepository);

        $this->subject->createAction($vita);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenVitaToView()
    {
        $vita = new \Typo3graf\VmMember\Domain\Model\Vita();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('vita', $vita);

        $this->subject->editAction($vita);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenVitaInVitaRepository()
    {
        $vita = new \Typo3graf\VmMember\Domain\Model\Vita();

        $vitaRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\VitaRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $vitaRepository->expects(self::once())->method('update')->with($vita);
        $this->inject($this->subject, 'vitaRepository', $vitaRepository);

        $this->subject->updateAction($vita);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenVitaFromVitaRepository()
    {
        $vita = new \Typo3graf\VmMember\Domain\Model\Vita();

        $vitaRepository = $this->getMockBuilder(\Typo3graf\VmMember\Domain\Repository\VitaRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $vitaRepository->expects(self::once())->method('remove')->with($vita);
        $this->inject($this->subject, 'vitaRepository', $vitaRepository);

        $this->subject->deleteAction($vita);
    }
}
