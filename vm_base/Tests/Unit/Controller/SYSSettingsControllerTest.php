<?php
namespace Typo3graf\VmBase\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class SYSSettingsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmBase\Controller\SYSSettingsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmBase\Controller\SYSSettingsController::class)
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
    public function listActionFetchesAllSYSSettingssFromRepositoryAndAssignsThemToView()
    {

        $allSYSSettingss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $sYSSettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\SYSSettingsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $sYSSettingsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allSYSSettingss));
        $this->inject($this->subject, 'sYSSettingsRepository', $sYSSettingsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('sYSSettingss', $allSYSSettingss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSYSSettingsToSYSSettingsRepository()
    {
        $sYSSettings = new \Typo3graf\VmBase\Domain\Model\SYSSettings();

        $sYSSettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\SYSSettingsRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $sYSSettingsRepository->expects(self::once())->method('add')->with($sYSSettings);
        $this->inject($this->subject, 'sYSSettingsRepository', $sYSSettingsRepository);

        $this->subject->createAction($sYSSettings);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSYSSettingsToView()
    {
        $sYSSettings = new \Typo3graf\VmBase\Domain\Model\SYSSettings();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('sYSSettings', $sYSSettings);

        $this->subject->editAction($sYSSettings);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSYSSettingsInSYSSettingsRepository()
    {
        $sYSSettings = new \Typo3graf\VmBase\Domain\Model\SYSSettings();

        $sYSSettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\SYSSettingsRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $sYSSettingsRepository->expects(self::once())->method('update')->with($sYSSettings);
        $this->inject($this->subject, 'sYSSettingsRepository', $sYSSettingsRepository);

        $this->subject->updateAction($sYSSettings);
    }
}
