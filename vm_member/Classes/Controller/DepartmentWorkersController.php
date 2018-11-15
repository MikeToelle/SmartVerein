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
 * DepartmentWorkersController
 */
class DepartmentWorkersController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * departmentWorkersRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\DepartmentWorkersRepository
     * @inject
     */
    protected $departmentWorkersRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $departmentWorkers = $this->departmentWorkersRepository->findAll();
        $this->view->assign('departmentWorkers', $departmentWorkers);
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers)
    {
        $this->view->assign('departmentWorkers', $departmentWorkers);
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
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $newDepartmentWorkers
     * @return void
     */
    public function createAction(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $newDepartmentWorkers)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->departmentWorkersRepository->add($newDepartmentWorkers);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers
     * @ignorevalidation $departmentWorkers
     * @return void
     */
    public function editAction(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers)
    {
        $this->view->assign('departmentWorkers', $departmentWorkers);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers
     * @return void
     */
    public function updateAction(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->departmentWorkersRepository->update($departmentWorkers);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers
     * @return void
     */
    public function deleteAction(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentWorkers)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->departmentWorkersRepository->remove($departmentWorkers);
        $this->redirect('list');
    }
}
