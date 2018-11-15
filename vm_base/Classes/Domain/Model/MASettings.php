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
 * Member area settings.
 */
class MASettings extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Member can edit his own Data.
     *
     * @var bool
     */
    protected $editOwnMemberData = false;

    /**
     * Show the bulletin board
     *
     * @var bool
     */
    protected $showBulletinBoard = false;

    /**
     * Shows the event calendar.
     *
     * @var bool
     */
    protected $showEvents = false;

    /**
     * Shoes all members in list.
     *
     * @var bool
     */
    protected $showMemberListAll = false;

    /**
     * Shows meberlist only with mebergroups.
     *
     * @var bool
     */
    protected $showMemberListByGroups = false;

    /**
     * Show the club finances
     *
     * @var bool
     */
    protected $showClubFinances = false;

    /**
     * Show the download area.
     *
     * @var bool
     */
    protected $showDownloadArea = false;

    /**
     * Returns the editOwnMemberData
     *
     * @return bool $editOwnMemberData
     */
    public function getEditOwnMemberData()
    {
        return $this->editOwnMemberData;
    }

    /**
     * Sets the editOwnMemberData
     *
     * @param bool $editOwnMemberData
     * @return void
     */
    public function setEditOwnMemberData($editOwnMemberData)
    {
        $this->editOwnMemberData = $editOwnMemberData;
    }

    /**
     * Returns the boolean state of editOwnMemberData
     *
     * @return bool
     */
    public function isEditOwnMemberData()
    {
        return $this->editOwnMemberData;
    }

    /**
     * Returns the showBulletinBoard
     *
     * @return bool $showBulletinBoard
     */
    public function getShowBulletinBoard()
    {
        return $this->showBulletinBoard;
    }

    /**
     * Sets the showBulletinBoard
     *
     * @param bool $showBulletinBoard
     * @return void
     */
    public function setShowBulletinBoard($showBulletinBoard)
    {
        $this->showBulletinBoard = $showBulletinBoard;
    }

    /**
     * Returns the boolean state of showBulletinBoard
     *
     * @return bool
     */
    public function isShowBulletinBoard()
    {
        return $this->showBulletinBoard;
    }

    /**
     * Returns the showEvents
     *
     * @return bool $showEvents
     */
    public function getShowEvents()
    {
        return $this->showEvents;
    }

    /**
     * Sets the showEvents
     *
     * @param bool $showEvents
     * @return void
     */
    public function setShowEvents($showEvents)
    {
        $this->showEvents = $showEvents;
    }

    /**
     * Returns the boolean state of showEvents
     *
     * @return bool
     */
    public function isShowEvents()
    {
        return $this->showEvents;
    }

    /**
     * Returns the showMemberListAll
     *
     * @return bool $showMemberListAll
     */
    public function getShowMemberListAll()
    {
        return $this->showMemberListAll;
    }

    /**
     * Sets the showMemberListAll
     *
     * @param bool $showMemberListAll
     * @return void
     */
    public function setShowMemberListAll($showMemberListAll)
    {
        $this->showMemberListAll = $showMemberListAll;
    }

    /**
     * Returns the boolean state of showMemberListAll
     *
     * @return bool
     */
    public function isShowMemberListAll()
    {
        return $this->showMemberListAll;
    }

    /**
     * Returns the showMemberListByGroups
     *
     * @return bool $showMemberListByGroups
     */
    public function getShowMemberListByGroups()
    {
        return $this->showMemberListByGroups;
    }

    /**
     * Sets the showMemberListByGroups
     *
     * @param bool $showMemberListByGroups
     * @return void
     */
    public function setShowMemberListByGroups($showMemberListByGroups)
    {
        $this->showMemberListByGroups = $showMemberListByGroups;
    }

    /**
     * Returns the boolean state of showMemberListByGroups
     *
     * @return bool
     */
    public function isShowMemberListByGroups()
    {
        return $this->showMemberListByGroups;
    }

    /**
     * Returns the showClubFinances
     *
     * @return bool $showClubFinances
     */
    public function getShowClubFinances()
    {
        return $this->showClubFinances;
    }

    /**
     * Sets the showClubFinances
     *
     * @param bool $showClubFinances
     * @return void
     */
    public function setShowClubFinances($showClubFinances)
    {
        $this->showClubFinances = $showClubFinances;
    }

    /**
     * Returns the boolean state of showClubFinances
     *
     * @return bool
     */
    public function isShowClubFinances()
    {
        return $this->showClubFinances;
    }

    /**
     * Returns the showDownloadArea
     *
     * @return bool $showDownloadArea
     */
    public function getShowDownloadArea()
    {
        return $this->showDownloadArea;
    }

    /**
     * Sets the showDownloadArea
     *
     * @param bool $showDownloadArea
     * @return void
     */
    public function setShowDownloadArea($showDownloadArea)
    {
        $this->showDownloadArea = $showDownloadArea;
    }

    /**
     * Returns the boolean state of showDownloadArea
     *
     * @return bool
     */
    public function isShowDownloadArea()
    {
        return $this->showDownloadArea;
    }
}
