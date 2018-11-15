<?php
namespace Typo3graf\VmBase\Domain\Model;

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
 * System settings for SmartVerein
 */
class SYSSettings extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Format of the automatic memberID. IS NOT IMPLEMENTED YET!
     *
     * @var string
     */
    protected $memberIDFormat = '';

    /**
     * Automatic memberID yes/no
     *
     * @var bool
     */
    protected $autoMemberID = false;

    /**
     * Supplement memberID if not set
     *
     * @var bool
     */
    protected $supplementMemberID = false;

    /**
     * Club anniversaries of the mebers. Comma seperated.
     *
     * @var string
     */
    protected $clubAnniversaries = '';

    /**
     * Automatic email for an anniversary
     *
     *
     * @var bool
     */
    protected $sentAnniversariesEmail = false;

    /**
     * Members Birthdays to be displayed. If empty all bithdays will displayed
     *
     * @var string
     */
    protected $showMemberBirthdays = '';

    /**
     * Automatic email for an Birthday
     *
     * @var bool
     */
    protected $sentBirthdayEmail = false;

    /**
     * Returns the memberIDFormat
     *
     * @return string $memberIDFormat
     */
    public function getMemberIDFormat()
    {
        return $this->memberIDFormat;
    }

    /**
     * Sets the memberIDFormat
     *
     * @param string $memberIDFormat
     * @return void
     */
    public function setMemberIDFormat($memberIDFormat)
    {
        $this->memberIDFormat = $memberIDFormat;
    }

    /**
     * Returns the autoMemberID
     *
     * @return bool $autoMemberID
     */
    public function getAutoMemberID()
    {
        return $this->autoMemberID;
    }

    /**
     * Sets the autoMemberID
     *
     * @param bool $autoMemberID
     * @return void
     */
    public function setAutoMemberID($autoMemberID)
    {
        $this->autoMemberID = $autoMemberID;
    }

    /**
     * Returns the boolean state of autoMemberID
     *
     * @return bool
     */
    public function isAutoMemberID()
    {
        return $this->autoMemberID;
    }

    /**
     * Returns the supplementMemberID
     *
     * @return bool $supplementMemberID
     */
    public function getSupplementMemberID()
    {
        return $this->supplementMemberID;
    }

    /**
     * Sets the supplementMemberID
     *
     * @param bool $supplementMemberID
     * @return void
     */
    public function setSupplementMemberID($supplementMemberID)
    {
        $this->supplementMemberID = $supplementMemberID;
    }

    /**
     * Returns the boolean state of supplementMemberID
     *
     * @return bool
     */
    public function isSupplementMemberID()
    {
        return $this->supplementMemberID;
    }

    /**
     * Returns the clubAnniversaries
     *
     * @return string $clubAnniversaries
     */
    public function getClubAnniversaries()
    {
        return $this->clubAnniversaries;
    }

    /**
     * Sets the clubAnniversaries
     *
     * @param string $clubAnniversaries
     * @return void
     */
    public function setClubAnniversaries($clubAnniversaries)
    {
        $this->clubAnniversaries = $clubAnniversaries;
    }

    /**
     * Returns the sentAnniversariesEmail
     *
     * @return bool $sentAnniversariesEmail
     */
    public function getSentAnniversariesEmail()
    {
        return $this->sentAnniversariesEmail;
    }

    /**
     * Sets the sentAnniversariesEmail
     *
     * @param bool $sentAnniversariesEmail
     * @return void
     */
    public function setSentAnniversariesEmail($sentAnniversariesEmail)
    {
        $this->sentAnniversariesEmail = $sentAnniversariesEmail;
    }

    /**
     * Returns the boolean state of sentAnniversariesEmail
     *
     * @return bool
     */
    public function isSentAnniversariesEmail()
    {
        return $this->sentAnniversariesEmail;
    }


    /**
     * Returns the showMemberBirthdays
     *
     * @return string $showMemberBirthdays
     */
    public function getShowMemberBirthdays()
    {
        return $this->showMemberBirthdays;
    }

    /**
     * Sets the showMemberBirthdays
     *
     * @param string $showMemberBirthdays
     * @return void
     */
    public function setShowMemberBirthdays($showMemberBirthdays)
    {
        $this->showMemberBirthdays = $showMemberBirthdays;
    }

    /**
     * Returns the sentBirthdayEmail
     *
     * @return bool $sentBirthdayEmail
     */
    public function getSentBirthdayEmail()
    {
        return $this->sentBirthdayEmail;
    }

    /**
     * Sets the sentBirthdayEmail
     *
     * @param bool $sentBirthdayEmail
     * @return void
     */
    public function setSentBirthdayEmail($sentBirthdayEmail)
    {
        $this->sentBirthdayEmail = $sentBirthdayEmail;
    }

    /**
     * Returns the boolean state of sentBirthdayEmail
     *
     * @return bool
     */
    public function isSentBirthdayEmail()
    {
        return $this->sentBirthdayEmail;
    }
}
