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

use Typo3graf\VmMember\Utility\MemberUtility;

/**
 * SYSSettingsController
 */
class SYSSettingsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * sysSettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\SYSSettingsRepository
     * @inject
     */
    protected $sysSettingsRepository = null;

    /**
     * mASettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\MASettingsRepository
     * @inject
     */
    protected $mASettingsRepository = null;

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
     * action editSysSettings
     *
     *
     * @ignorevalidation $sysSettings
     * @return void
     */
    public function editSysSettingsAction()
    {
        $sysSettingsAll = $this->sysSettingsRepository->findAll();
        $maSettingsAll = $this->mASettingsRepository->findAll();
        $sysSetting = $sysSettingsAll->getFirst();
        $maSettings = $maSettingsAll->getFirst();
        $this->view->assign('sysSettings', $sysSetting);
        $this->view->assign('mASettings', $maSettings);
    }

    /**
     * action updateSYSSettings
     *
     * @param \Typo3graf\VmBase\Domain\Model\SYSSettings $sysSettings
     * @return void
     */
    public function updateSysSettingsAction(\Typo3graf\VmBase\Domain\Model\SYSSettings $sysSettings)
    {
        $this->addFlashMessage('Systemeinstellungen gespeichert.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        if ($sysSettings->getSupplementMemberID()) {
            $members = $this->memberRepository->findEmptyMemberID();
            foreach ($members as $member) {
                $member->setMemberID(MemberUtility::createMemberID($member, $sysSettings->getMemberIDFormat()));
                $this->memberRepository->update($member);
            }
        }
        $this->sysSettingsRepository->update($sysSettings);
        $this->redirect('editSysSettings');
    }

    /**
     * action updateMaSettings
     *
     * @param \Typo3graf\VmBase\Domain\Model\MASettings $mASettings
     * @return void
     */
    public function updateMaSettingsAction(\Typo3graf\VmBase\Domain\Model\MASettings $mASettings)
    {
        $this->addFlashMessage('Mitgliederbereich Einstellungen gespeichert.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->mASettingsRepository->update($mASettings);
        $this->redirect('list');
    }
}
