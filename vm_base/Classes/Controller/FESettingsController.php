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
 * FESettingsController
 */
class FESettingsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * fESettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\FESettingsRepository
     * @inject
     */
    protected $fESettingsRepository = null;

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
        $fESettings = $this->fESettingsRepository->findAll();
        $this->view->assign('fESettings', $fESettings);
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
     * @param \Typo3graf\VmBase\Domain\Model\FESettings $newFESettings
     * @return void
     */
    public function createAction(\Typo3graf\VmBase\Domain\Model\FESettings $newFESettings)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->fESettingsRepository->add($newFESettings);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmBase\Domain\Model\FESettings $fESettings
     * @ignorevalidation $fESettings
     * @return void
     */
    public function editAction(\Typo3graf\VmBase\Domain\Model\FESettings $fESettings)
    {
        $this->view->assign('fESettings', $fESettings);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmBase\Domain\Model\FESettings $fESettings
     * @return void
     */
    public function updateAction(\Typo3graf\VmBase\Domain\Model\FESettings $fESettings)
    {
        $this->addFlashMessage('Settings geändert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->fESettingsRepository->update($fESettings);
        $this->redirect('list');
    }
}
