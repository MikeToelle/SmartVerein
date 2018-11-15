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
 * MembershipStatusController
 */
class MembershipStatusController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * membershipStatusRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MembershipStatusRepository
     * @inject
     */
    protected $membershipStatusRepository = null;

    /**
     * contributionRateRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\ContributionRateRepository
     * @inject
     */
    protected $contributionRateRepository = null;

    /**
     * salutationRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\SalutationRepository
     * @inject
     */
    protected $salutationRepository = null;

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
    public function statusListAction()
    {
        $this->view->assign('contributionRates', $this->contributionRateRepository->findAll());
        $this->view->assign('membershipStatuses', $this->membershipStatusRepository->findAll());
        $this->view->assign('salutations', $this->salutationRepository->findAll());
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus)
    {
        $this->view->assign('membershipStatus', $membershipStatus);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newStatusAction()
    {

    }

    /**
     * action create
     *
     * @param \Typo3graf\VmMember\Domain\Model\MembershipStatus $newMembershipStatus
     * @return void
     */
    public function createStatusAction(\Typo3graf\VmMember\Domain\Model\MembershipStatus $newMembershipStatus)
    {
        $this->addFlashMessage('Mitgliederstatus angelegt.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->membershipStatusRepository->add($newMembershipStatus);
        $this->redirect('statusList');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus
     * @ignorevalidation $membershipStatus
     * @return void
     */
    public function editStatusAction(\Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus)
    {
        $this->view->assign('contributionRates', $this->contributionRateRepository->findAll());
        $this->view->assign('membershipStatuses', $this->membershipStatusRepository->findAll());
        $this->view->assign('salutations', $this->salutationRepository->findAll());
        $this->view->assign('membershipStatus',$membershipStatus);
    }

    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus
     * @return void
     */
    public function updateStatusAction(\Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus)
    {
        $this->addFlashMessage('Mitgliederstatus geändert.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->membershipStatusRepository->update($membershipStatus);
        $this->redirect('statusList');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus
     * @return void
     */
    public function deleteStatusAction(\Typo3graf\VmMember\Domain\Model\MembershipStatus $membershipStatus)
    {
        $this->addFlashMessage('Mitgliederstatus gelöscht.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->membershipStatusRepository->remove($membershipStatus);
        $this->redirect('statusList');
    }

    protected function getErrorFlashMessage() {
        return FALSE;
    }
}
