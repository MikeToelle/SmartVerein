<?php
namespace Typo3graf\VmMember\Domain\Model;

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
 * Processing log of an member.
 */
class EditHistory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title of the processingevent.
     *
     * @var string
     */
    protected $editHistoryTitle = '';

    /**
     * editHistoryDescription
     *
     * @var string
     */
    protected $editHistoryDescription = '';

    /**
     * Date/Time of the processing event.
     *
     * @var \DateTime
     */
    protected $editHistoryDateTime = null;

    /**
     * Returns the editHistoryTitle
     *
     * @return string $editHistoryTitle
     */
    public function getEditHistoryTitle()
    {
        return $this->editHistoryTitle;
    }

    /**
     * Sets the editHistoryTitle
     *
     * @param string $editHistoryTitle
     * @return void
     */
    public function setEditHistoryTitle($editHistoryTitle)
    {
        $this->editHistoryTitle = $editHistoryTitle;
    }

    /**
     * Returns the editHistoryDescription
     *
     * @return string $editHistoryDescription
     */
    public function getEditHistoryDescription()
    {
        return $this->editHistoryDescription;
    }

    /**
     * Sets the editHistoryDescription
     *
     * @param string $editHistoryDescription
     * @return void
     */
    public function setEditHistoryDescription($editHistoryDescription)
    {
        $this->editHistoryDescription = $editHistoryDescription;
    }

    /**
     * Returns the editHistoryDateTime
     *
     * @return \DateTime $editHistoryDateTime
     */
    public function getEditHistoryDateTime()
    {
        return $this->editHistoryDateTime;
    }

    /**
     * Sets the editHistoryDateTime
     *
     * @param \DateTime $editHistoryDateTime
     * @return void
     */
    public function setEditHistoryDateTime(\DateTime $editHistoryDateTime)
    {
        $this->editHistoryDateTime = $editHistoryDateTime;
    }
}
