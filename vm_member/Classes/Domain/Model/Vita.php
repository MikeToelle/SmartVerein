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
 * The club vita of a member.
 */
class Vita extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title of an vita event for a member.
     *
     * @var string
     */
    protected $vitaTitle = '';

    /**
     * Descrition of an vita event of a member.
     *
     * @var string
     */
    protected $vitaDescription = '';

    /**
     * vitaDate
     *
     * @var \DateTime
     */
    protected $vitaDate = null;

    /**
     * vitaIs
     *
     * @var int
     */
    protected $vitaIs = 0;

    /**
     * Returns the vitaTitle
     *
     * @return string $vitaTitle
     */
    public function getVitaTitle()
    {
        return $this->vitaTitle;
    }

    /**
     * Sets the vitaTitle
     *
     * @param string $vitaTitle
     * @return void
     */
    public function setVitaTitle($vitaTitle)
    {
        $this->vitaTitle = $vitaTitle;
    }

    /**
     * Returns the vitaDescription
     *
     * @return string $vitaDescription
     */
    public function getVitaDescription()
    {
        return $this->vitaDescription;
    }

    /**
     * Sets the vitaDescription
     *
     * @param string $vitaDescription
     * @return void
     */
    public function setVitaDescription($vitaDescription)
    {
        $this->vitaDescription = $vitaDescription;
    }

    /**
     * Returns the vitaDate
     *
     * @return \DateTime $vitaDate
     */
    public function getVitaDate()
    {
        return $this->vitaDate;
    }

    /**
     * Sets the vitaDate
     *
     * @param \DateTime $vitaDate
     * @return void
     */
    public function setVitaDate(\DateTime $vitaDate=NULL)
    {
        if ($vitaDate instanceof \DateTime) {
            $vitaDate->setTime(0, 0, 0);
        }

        $this->vitaDate = $vitaDate;
    }

    /**
     * Returns the vitaIs
     *
     * @return int $vitaIs
     */
    public function getVitaIs()
    {
        return $this->vitaIs;
    }

    /**
     * Sets the vitaIs
     *
     * @param int $vitaIs
     * @return void
     */
    public function setVitaIs($vitaIs)
    {
        $this->vitaIs = $vitaIs;
    }
}
