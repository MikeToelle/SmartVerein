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
 * NotificationTemplatesController
 */
class NotificationTemplatesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * notificationTemplatesRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\NotificationTemplatesRepository
     * @inject
     */
    protected $notificationTemplatesRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $notificationTemplates = $this->notificationTemplatesRepository->findAll();
        $this->view->assign('notificationTemplates', $notificationTemplates);
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates
     * @return void
     */
    public function showAction(\Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates)
    {
        $this->view->assign('notificationTemplates', $notificationTemplates);
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
     * @param \Typo3graf\VmBase\Domain\Model\NotificationTemplates $newNotificationTemplates
     * @return void
     */
    public function createAction(\Typo3graf\VmBase\Domain\Model\NotificationTemplates $newNotificationTemplates)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->notificationTemplatesRepository->add($newNotificationTemplates);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates
     * @ignorevalidation $notificationTemplates
     * @return void
     */
    public function editAction(\Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates)
    {
        $this->view->assign('notificationTemplates', $notificationTemplates);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates
     * @return void
     */
    public function updateAction(\Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->notificationTemplatesRepository->update($notificationTemplates);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates
     * @return void
     */
    public function deleteAction(\Typo3graf\VmBase\Domain\Model\NotificationTemplates $notificationTemplates)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->notificationTemplatesRepository->remove($notificationTemplates);
        $this->redirect('list');
    }
}
