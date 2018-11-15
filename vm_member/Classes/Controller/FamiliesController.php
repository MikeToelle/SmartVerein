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
 * FamiliesController
 */
class FamiliesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * familiesRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\FamiliesRepository
     * @inject
     */
    protected $familiesRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $families = $this->familiesRepository->findAll();
        $this->view->assign('families', $families);
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\Families $families
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\Families $families)
    {
        $this->view->assign('families', $families);
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
     * @param \Typo3graf\VmMember\Domain\Model\Families $newFamilies
     * @return void
     */
    public function createAction(\Typo3graf\VmMember\Domain\Model\Families $newFamilies)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->familiesRepository->add($newFamilies);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\Families $families
     * @ignorevalidation $families
     * @return void
     */
    public function editAction(\Typo3graf\VmMember\Domain\Model\Families $families)
    {
        $this->view->assign('families', $families);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\Families $families
     * @return void
     */
    public function updateAction(\Typo3graf\VmMember\Domain\Model\Families $families)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->familiesRepository->update($families);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmMember\Domain\Model\Families $families
     * @return void
     */
    public function deleteAction(\Typo3graf\VmMember\Domain\Model\Families $families)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->familiesRepository->remove($families);
        $this->redirect('list');
    }
}
