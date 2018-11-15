<?php

namespace Typo3graf\VmClub\Controller;

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
 * ClubController
 */
class ClubController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * clubRepository
     *
     * @var \Typo3graf\VmClub\Domain\Repository\ClubRepository
     * @inject
     */
    protected $clubRepository = null;

    /**
     * Upload Service
     *
     * @var \Typo3graf\VmBase\Service\UploadService
     * @inject
     */
    protected $uploadService = null;

    public function initializeAction()
    {
            // Redirect zur Login Seite falls nicht eingeloggt
            if (!$GLOBALS['TSFE']->loginUser) {
                $this->redirect(null, null, null, null, $this->settings['loginPage']);
            }
    }



    /**
     * action editClub
     *
     * @param \Typo3graf\VmClub\Domain\Model\Club $club
     * @ignorevalidation $club
     * @return void
     */
    public function editClubAction(\Typo3graf\VmClub\Domain\Model\Club $club=NULL)
    {
        $club = $this->loadClub();
        if ($club === NULL) {
            $this->forward('newClub');
        }
        $this->view->assign('club', $club);
    }

    public function initializeUpdateClubAction()
    {
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['club'],'clubLogo.0','verein');
    }
    /**
     * action updateClub
     *
     * @param \Typo3graf\VmClub\Domain\Model\Club $club
     * @return void
     */
    public function updateClubAction(\Typo3graf\VmClub\Domain\Model\Club $club)
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('updateClub', 'VmClub'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clubRepository->update($club);
        $this->redirect('editClub');
    }

    /**
     * action newClub
     *
     * @return void
     */
    public function newClubAction()
    {

    }

    public function initializeCreateClubAction()
    {
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['newClub'],'clubLogo.0','verein');
    }
    /**
     * action createClub
     *
     * @param \Typo3graf\VmClub\Domain\Model\Club $newClub
     * @return void
     */
    public function createClubAction(\Typo3graf\VmClub\Domain\Model\Club $newClub)
    {
        $this->addFlashMessage(\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('newClub', 'VmClub'), '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->clubRepository->add($newClub);

        $this->redirect('editClub');
    }

    // Hilfsfunktion

    /**
     * loadClub
     *
     * @return array
     */
    public function loadClub()
    {
        $clubs = $this->clubRepository->findAll();
        $club = $clubs->getFirst();
        return $club;
    }

    protected function getErrorFlashMessage() {
        return FALSE;
    }
}
