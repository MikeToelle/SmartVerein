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
 * SalutationController
 */
class SalutationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * salutationRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\SalutationRepository
     * @inject
     */
    protected $salutationRepository = null;

    /**
     * contributionRateRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\ContributionRateRepository
     * @inject
     */
    protected $contributionRateRepository = null;

    /**
     * membershipStatusRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository
     * @inject
     */
    protected $membershipStatusRepository = null;

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
    public function salutationListAction()
    {
        $this->view->assign('contributionRates', $this->contributionRateRepository->findAll());
        $this->view->assign('membershipStatuses', $this->membershipStatusRepository->findAll());
        $this->view->assign('salutations', $this->salutationRepository->findAll());
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\Salutation $salutation
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\Salutation $salutation)
    {
        $this->view->assign('salutation', $salutation);
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
     * @param \Typo3graf\VmMember\Domain\Model\Salutation $newSalutation
     * @return void
     */
    public function createSalutationAction(\Typo3graf\VmMember\Domain\Model\Salutation $newSalutation)
    {
        $this->addFlashMessage('Briefanrede angelegt.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->salutationRepository->add($newSalutation);
        $this->redirect('salutationList');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\Salutation $salutation
     * @ignorevalidation $salutation
     * @return void
     */
    public function editSalutationAction(\Typo3graf\VmMember\Domain\Model\Salutation $salutation)
    {
        $this->view->assign('contributionRates', $this->contributionRateRepository->findAll());
        $this->view->assign('membershipStatuses', $this->membershipStatusRepository->findAll());
        $this->view->assign('salutations', $this->salutationRepository->findAll());
        $this->view->assign('salutation',$salutation);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\Salutation $salutation
     * @return void
     */
    public function updateSalutationAction(\Typo3graf\VmMember\Domain\Model\Salutation $salutation)
    {
        $this->addFlashMessage('Briefanrede geändert.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->salutationRepository->update($salutation);
        $this->redirect('salutationList');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmMember\Domain\Model\Salutation $salutation
     * @return void
     */
    public function deleteSalutationAction(\Typo3graf\VmMember\Domain\Model\Salutation $salutation)
    {
        $this->addFlashMessage('Briefanrede gelöscht.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->salutationRepository->remove($salutation);
        $this->redirect('salutationList');
    }

    protected function getErrorFlashMessage() {
        return FALSE;
    }
}
