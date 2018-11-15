<?php
namespace Typo3graf\VmBase\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Typo3graf Developer-Team <development@typo3graf.de>
 */
class MASettingsControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Typo3graf\VmBase\Controller\MASettingsController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Typo3graf\VmBase\Controller\MASettingsController::class)
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
    public function listActionFetchesAllMASettingssFromRepositoryAndAssignsThemToView()
    {

        $allMASettingss = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mASettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\MASettingsRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $mASettingsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMASettingss));
        $this->inject($this->subject, 'mASettingsRepository', $mASettingsRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('mASettingss', $allMASettingss);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMASettingsToMASettingsRepository()
    {
        $mASettings = new \Typo3graf\VmBase\Domain\Model\MASettings();

        $mASettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\MASettingsRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $mASettingsRepository->expects(self::once())->method('add')->with($mASettings);
        $this->inject($this->subject, 'mASettingsRepository', $mASettingsRepository);

        $this->subject->createAction($mASettings);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMASettingsToView()
    {
        $mASettings = new \Typo3graf\VmBase\Domain\Model\MASettings();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('mASettings', $mASettings);

        $this->subject->editAction($mASettings);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMASettingsInMASettingsRepository()
    {
        $mASettings = new \Typo3graf\VmBase\Domain\Model\MASettings();

        $mASettingsRepository = $this->getMockBuilder(\Typo3graf\VmBase\Domain\Repository\MASettingsRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $mASettingsRepository->expects(self::once())->method('update')->with($mASettings);
        $this->inject($this->subject, 'mASettingsRepository', $mASettingsRepository);

        $this->subject->updateAction($mASettings);
    }
}
