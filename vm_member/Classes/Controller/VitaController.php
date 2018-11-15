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
 * VitaController
 */
class VitaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * vitaRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\VitaRepository
     * @inject
     */
    protected $vitaRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $vitas = $this->vitaRepository->findAll();
        $this->view->assign('vitas', $vitas);
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\Vita $vita
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\Vita $vita)
    {
        $this->view->assign('vita', $vita);
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
     * @param \Typo3graf\VmMember\Domain\Model\Vita $newVita
     * @return void
     */
    public function createAction(\Typo3graf\VmMember\Domain\Model\Vita $newVita)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->vitaRepository->add($newVita);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\Vita $vita
     * @ignorevalidation $vita
     * @return void
     */
    public function editAction(\Typo3graf\VmMember\Domain\Model\Vita $vita)
    {
        $this->view->assign('vita', $vita);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\Vita $vita
     * @return void
     */
    public function updateAction(\Typo3graf\VmMember\Domain\Model\Vita $vita)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->vitaRepository->update($vita);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmMember\Domain\Model\Vita $vita
     * @return void
     */
    public function deleteAction(\Typo3graf\VmMember\Domain\Model\Vita $vita)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->vitaRepository->remove($vita);
        $this->redirect('list');
    }
}
