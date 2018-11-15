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
 * MembershipStatus
 */
class MembershipStatus extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * statusTitle
     *
     * @var string
     * @validate NotEmpty
     */
    protected $statusTitle = '';

    /**
     * statusDescription
     *
     * @var string
     */
    protected $statusDescription = '';

    /**
     * Returns the statusTitle
     *
     * @return string $statusTitle
     */
    public function getStatusTitle()
    {
        return $this->statusTitle;
    }

    /**
     * Sets the statusTitle
     *
     * @param string $statusTitle
     * @return void
     */
    public function setStatusTitle($statusTitle)
    {
        $this->statusTitle = $statusTitle;
    }

    /**
     * Returns the statusDescription
     *
     * @return string $statusDescription
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Sets the statusDescription
     *
     * @param string $statusDescription
     * @return void
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
    }
}
