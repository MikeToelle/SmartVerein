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
 * ContributionRateController
 */
class ContributionRateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
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
    public function rateListAction()
    {
        $this->view->assign('contributionRates', $this->contributionRateRepository->findAll());
        $this->view->assign('membershipStatuses', $this->membershipStatusRepository->findAll());
        $this->view->assign('salutations', $this->salutationRepository->findAll());
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate)
    {
        $this->view->assign('contributionRate', $contributionRate);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    public function initializeCreateRateAction()
    {
        if (isset( $this->arguments['newContributionRate'] )) {
            // use own converter for float to convert the german comma-notation to english point-notation
            $this->arguments["newContributionRate"]->getPropertyMappingConfiguration()
                ->forProperty( 'contributionRateAmount' )
                ->setTypeConverter( $this->objectManager->get( 'Typo3graf\\VmBase\\Property\\TypeConverter\\FloatConverter' ) );
        }
    }
    /**
     * action create
     *
     * @param \Typo3graf\VmMember\Domain\Model\ContributionRate $newContributionRate
     * @return void
     */
    public function createRateAction(\Typo3graf\VmMember\Domain\Model\ContributionRate $newContributionRate)
    {
        $this->addFlashMessage('Beitagssatz angelegt.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->contributionRateRepository->add($newContributionRate);
        $this->redirect('rateList');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate
     * @ignorevalidation $contributionRate
     * @return void
     */
    public function editRateAction(\Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate)
    {
        $this->view->assign('contributionRates', $this->contributionRateRepository->findAll());
        $this->view->assign('membershipStatuses', $this->membershipStatusRepository->findAll());
        $this->view->assign('salutations', $this->salutationRepository->findAll());
        $this->view->assign('contributionRate', $contributionRate);
    }

    public function initializeUpdateRateAction()
    {
        if (isset( $this->arguments['newContributionRate'] )) {
            // use own converter for float to convert the german comma-notation to english point-notation
            $this->arguments["newContributionRate"]->getPropertyMappingConfiguration()
                ->forProperty( 'contributionRateAmount' )
                ->setTypeConverter( $this->objectManager->get( 'Typo3graf\\VmBase\\Property\\TypeConverter\\FloatConverter' ) );
        }
    }
    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate
     * @return void
     */
    public function updateRateAction(\Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate)
    {
        $this->addFlashMessage('Beitragssatz geändert.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->contributionRateRepository->update($contributionRate);
        $this->redirect('rateList');
    }

    /**
     * action delete
     *
     * @param \Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate
     * @return void
     */
    public function deleteRateAction(\Typo3graf\VmMember\Domain\Model\ContributionRate $contributionRate)
    {
        $this->addFlashMessage('Beitagssatz gelöscht.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->contributionRateRepository->remove($contributionRate);
        $this->redirect('rateList');
    }

    protected function getErrorFlashMessage() {
        return FALSE;
    }
}
