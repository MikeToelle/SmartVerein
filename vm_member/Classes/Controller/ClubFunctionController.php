<?php
namespace Typo3graf\VmMember\Controller;

/***
 *
 * This file is part of the "Vereinsmeier - Member management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 ***/

/**
 * FunctionController
 */
class ClubFunctionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * clubFunctionRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\ClubFunctionRepository
     * @inject
     */
    protected $clubFunctionRepository = null;

    public function initializeAction()
    {
        // Redirect zur Login Seite falls nicht eingeloggt
        if (!$GLOBALS['TSFE']->loginUser) {
            $this->redirect(null, null, null, null, $this->settings['loginPage']);
        }
    }

    /**
     * action listFunctions
     *
     * @return void
     */
    public function listFunctionsAction()
    {
        $this->view->assign('clubFunctions', $this->clubFunctionRepository->findAll());
    }

    /**
     * action createFunction
     *
     * @param \Typo3graf\VmMember\Domain\Model\ClubFunction $newFunction
     * @return void
     */
    public function createFunctionAction(\Typo3graf\VmMember\Domain\Model\ClubFunction $newFunction)
    {
        $this->addFlashMessage('Funktion erfolgreich angelegt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clubFunctionRepository->add($newFunction);
        $this->redirect('listFunctions');
    }

    /**
     * action editFunction
     *
     * @param \Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction
     * @ignorevalidation $clubFunction
     * @return void
     */
    public function editFunctionAction(\Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction)
    {
        $this->view->assign('function', $clubFunction);
        $this->view->assign('clubFunctions', $this->clubFunctionRepository->findAll());
    }

    /**
     * action updateFunction
     *
     * @param \Typo3graf\VmMember\Domain\Model\ClubFunction $function
     * @return void
     */
    public function updateFunctionAction(\Typo3graf\VmMember\Domain\Model\ClubFunction $function)
    {
        $this->addFlashMessage('Funktion erfolgreich geändert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clubFunctionRepository->update($function);
        $this->redirect('listFunctions');
    }

    /**
     * action deleteFunction
     *
     * @param \Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction
     * @return void
     */
    public function deleteFunctionAction(\Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction)
    {
        $this->addFlashMessage('Funktion erfolgreich gelöscht!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clubFunctionRepository->remove($clubFunction);
        $this->redirect('listFunctions');
    }
}
