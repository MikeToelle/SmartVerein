<?php
namespace Typo3graf\VmBase\Controller;

/***
 *
 * This file is part of the "Vereinsmeier - Base module" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 ***/

/**
 * MASettingsController
 */
class MASettingsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * mASettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\MASettingsRepository
     * @inject
     */
    protected $mASettingsRepository = null;

    public function initializeAction()
    {
        // Redirect zur Login Seite falls nicht eingeloggt
        if (!$GLOBALS['TSFE']->loginUser) {
            $this->redirect(null, null, null, null, $this->settings['loginPage']);
        }
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $mASettings = $this->mASettingsRepository->findAll();
        $this->view->assign('mASettings', $mASettings);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Typo3graf\VmBase\Domain\Model\MASettings $newMASettings
     * @return void
     */
    public function createAction(\Typo3graf\VmBase\Domain\Model\MASettings $newMASettings)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mASettingsRepository->add($newMASettings);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmBase\Domain\Model\MASettings $mASettings
     * @ignorevalidation $mASettings
     * @return void
     */
    public function editAction(\Typo3graf\VmBase\Domain\Model\MASettings $mASettings)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($mASettings, 'EDIT');
        $this->view->assign('mASettings', $mASettings);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmBase\Domain\Model\MASettings $mASettings
     * @return void
     */
    public function updateAction(\Typo3graf\VmBase\Domain\Model\MASettings $mASettings)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($mASettings, 'Update');die();
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->mASettingsRepository->update($mASettings);
        $this->redirect('list');
    }
}
