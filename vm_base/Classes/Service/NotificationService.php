<?php
namespace Typo3graf\VmBase\Service;
/**
 * **************************************************************
 *   Copyright notice
 *
 *   (c) 2018 Typo3graf Development-Team <development@typo3graf.de>
 *   All rights reserved
 *
 *  This file is part of the TYPO3 CMS project.
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The TYPO3 project - inspiring people to share!
 *
 *   This script is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   This copyright notice MUST APPEAR in all copies of the script!
 * *************************************************************
 */

/**
 * NotificationService
 *
 *
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use Typo3graf\VmMember\Utility\MemberUtility;
use Typo3graf\VmBase\Utility\MessageType;
use Typo3graf\VmBase\Utility\Placeholders;

class NotificationService
{
    /**
     * The object manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * Email Service
     *
     * @var \Typo3graf\VmBase\Service\EmailService
     * @inject
     */
    protected $emailService;

    /**
     * FluidStandaloneService
     *
     * @var \Typo3graf\VmBase\Service\FluidStandaloneViewService
     * @inject
     */
    protected $fluidStandaloneViewService;

    /**
     * AttachmentService
     *
     * @var \Typo3graf\VmBase\Service\AttachmentService
     * @inject
     */
    protected $attachmentService;

    /**
     * Settings Service
     *
     * @var \Typo3graf\VmBase\Service\SettingsService
     * @inject
     */
    protected $settingsService = null;

    /**
     * memberRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MemberRepository
     * @inject
     */
    protected $memberRepository = null;

    /**
     * clubRepository
     *
     * @var \Typo3graf\VmClub\Domain\Repository\ClubRepository
     * @inject
     */
    protected $clubRepository = null;

    /**
     * Sends a custom notification defined by the given customNotification key
     * to all confirmed users of the event
     *
     * @param int $notificationType
     * @param \Typo3graf\VmMember\Domain\Model\Member $member
     *
     *
     * @return void
     */
    public function sendMemberNotification($notificationType, $member)
    {
       /* if ($this->cantSendCustomNotification($event, $settings, $customNotification)) {
            return 0;
        }*/
        
        $club = $this->clubRepository->findAll()->getFirst();
        $user = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        $htmlTemplate = 'test';
        // TODO HTML Template über buildEmailTemplate erzeugen
        $htmlTemplate = $this->renderPlaceholders($htmlTemplate);

        $variables = array(
            'member' => $member,
            'club' => $club,
            'user' => $user
        );
        $htmlTemplate = $this->fluidStandaloneViewService->parseStringWithFluid($htmlTemplate,$variables);
        $recipient[$member->getMemberEmail()] = MemberUtility::getFullName($member);
        $sender[$club->getClubEmail()] = $club->getClubName();
        $subject = 'Dein Benutzerkonto bei '.$club->getClubName();
        $this->emailService->sendMemberEmail($recipient,$sender,$subject,$htmlTemplate);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($htmlTemplate, 'HTML');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($body, 'Body');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($notificationType, 'TYPE');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->fluidStandaloneViewService->parseStringWithFluid($htmlTemplate,$variables), 'Fluid');


        return;
    }

    /**
     * renders the placeholders
     *
     * @param string $source
     *
     *
     * @return string
     */
    protected function renderPlaceholders($source){
        $placeholders = Placeholders::getPlaceholders();
        foreach ($placeholders as $key=>$value){
            $source = str_replace($key,$value,$source);
        }

        return $source;
    }

}
