<?php

namespace Typo3graf\VmDashboard\Controller;

    /***
     *
     * This file is part of the "Vereinsmeier - Club module" Extension for TYPO3 CMS.
     *
     * For the full copyright and license information, please read the
     * LICENSE.txt file that was distributed with this source code.
     *
     *  (c) 2018 Typo3graf Developer-Team <development@typo3gtraf.de>
     *
     ***/

/**
 * DashboardController
 */
class DashboardController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * clubRepository
     *
     * @var \Typo3graf\VmClub\Domain\Repository\ClubRepository
     * @inject
     */
    protected $clubRepository = null;

    /**
     * memberRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MemberRepository
     * @inject
     */
    protected $memberRepository = null;

    public function initializeAction()
    {
        // Redirect zur Login Seite falls nicht eingeloggt
        if (!$GLOBALS['TSFE']->loginUser) {
            $this->redirect(null, null, null, null, $this->settings['loginPage']);
        }
    }

    /**
     * action userPanel
     *
     * @return void
     */
    public function userPanelAction()
    {
        $club = $this->clubRepository->findAll()->getFirst();
        $member = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $this->view->assign('vmclub',$this->clubRepository->findAll()->getFirst());
        $this->view->assign('vmmember',$this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']));
    }

    /**
     * action showDashboard
     *
     * @return void
     */
    public function showDashboardAction()
    {
        $member = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $dashboard = unserialize($member->getMemberDashboardLayout());
        $this->view->assign('dashboard',$dashboard);
    }
}
