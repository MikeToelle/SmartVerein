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
 * EditHistoryController
 */
class EditHistoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * editHistoryRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\EditHistoryRepository
     * @inject
     */
    protected $editHistoryRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $editHistories = $this->editHistoryRepository->findAll();
        $this->view->assign('editHistories', $editHistories);
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\EditHistory $editHistory
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\EditHistory $editHistory)
    {
        $this->view->assign('editHistory', $editHistory);
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
     * @param \Typo3graf\VmMember\Domain\Model\EditHistory $newEditHistory
     * @return void
     */
    public function createAction(\Typo3graf\VmMember\Domain\Model\EditHistory $newEditHistory)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->editHistoryRepository->add($newEditHistory);
        $this->redirect('list');
    }
}
