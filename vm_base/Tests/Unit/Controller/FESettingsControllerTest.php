<?php
namespace Typo3graf\VmBase\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class FESettingsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmBase\Controller\FESettingsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmBase\Controller\FESettingsController::class)
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
    public function listActionFetchesAllFESettingssFromRepositoryAndAssignsThemToView()
    {

        $allFESettingss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $fESettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\FESettingsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $fESettingsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFESettingss));
        $this->inject($this->subject, 'fESettingsRepository', $fESettingsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('fESettingss', $allFESettingss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFESettingsToFESettingsRepository()
    {
        $fESettings = new \Typo3graf\VmBase\Domain\Model\FESettings();

        $fESettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\FESettingsRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $fESettingsRepository->expects(self::once())->method('add')->with($fESettings);
        $this->inject($this->subject, 'fESettingsRepository', $fESettingsRepository);

        $this->subject->createAction($fESettings);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFESettingsToView()
    {
        $fESettings = new \Typo3graf\VmBase\Domain\Model\FESettings();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('fESettings', $fESettings);

        $this->subject->editAction($fESettings);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFESettingsInFESettingsRepository()
    {
        $fESettings = new \Typo3graf\VmBase\Domain\Model\FESettings();

        $fESettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\FESettingsRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $fESettingsRepository->expects(self::once())->method('update')->with($fESettings);
        $this->inject($this->subject, 'fESettingsRepository', $fESettingsRepository);

        $this->subject->updateAction($fESettings);
    }
}
