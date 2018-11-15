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

use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class EmailService implements \TYPO3\CMS\Core\SingletonInterface
{
    /**
     * The object manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

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
     * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
     * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
     * @param string $subject subject of the email
     * @param string $templateName template name (UpperCamelCase)
     * @param array $variables variables to be passed to the Fluid view
     * @return boolean TRUE on success, otherwise false
     */
    public function sendTemplateEmail(array $recipient, array $sender=NULL, $subject, $templateName, $variables)
    {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');

        //$user = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        //$club = $this->clubRepository->findAll()->getFirst();
       // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($user, 'My Title');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($club, 'My Title'); die();

        $emailView = GeneralUtility::makeInstance(StandaloneView::class);
        $emailView->setLayoutRootPaths(
            array(GeneralUtility::getFileAbsFileName('EXT:vm_base/Resources/Private/Layouts'))
        );
        $emailView->setPartialRootPaths(
            array(GeneralUtility::getFileAbsFileName('EXT:vm_base/Resources/Private/Partials'))
        );
        $emailView->setTemplateRootPaths(
            array(GeneralUtility::getFileAbsFileName('EXT:vm_base/Resources/Private/Templates'))
        );
        $emailView->setTemplate('Email/'.$templateName);
        $emailView->assignMultiple($variables);
        $emailBody = $emailView->render();

        /** @var $message \TYPO3\CMS\Core\Mail\MailMessage */
        $message = $objectManager->get('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        $message->setTo($recipient)
            ->setFrom($sender)
            ->setSubject($subject);

        // Possible attachments here
        //foreach ($attachments as $attachment) {
        //    $message->attach($attachment);
        //}
        // Plain text example
        //$message->setBody($emailBody, 'text/plain');

        // HTML Email
        $message->setBody($emailBody, 'text/html');

        $message->send();
        return $message->isSent();
    }

    /**
     * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
     * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
     * @param string $subject subject of the email
     * @param string $emailBody
     *
     * @return boolean TRUE on success, otherwise false
     */
    public function sendMemberEmail(array $recipient, array $sender=NULL, $subject, $emailBody)
    {
        /** @var $message \TYPO3\CMS\Core\Mail\MailMessage */
        $message = GeneralUtility::makeInstance(MailMessage::class);
        $message->setTo($recipient)
            ->setFrom($sender)
            ->setSubject($subject);

        // Possible attachments here
        //foreach ($attachments as $attachment) {
        //    $message->attach($attachment);
        //}
        // Plain text example
        //$message->setBody($emailBody, 'text/plain');

        // HTML Email
        $message->setBody($emailBody, 'text/html');

        $message->send();
        return $message->isSent();
    }

}
