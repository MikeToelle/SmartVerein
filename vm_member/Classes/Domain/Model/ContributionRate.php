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
 * ContributionRate
 */
class ContributionRate extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title of the contribution rate.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $contributionRateTitle = '';

    /**
     * Amount of contribution rate
     *
     * @var float
     * @validate NotEmpty
     */
    protected $contributionRateAmount = 0.0;

    /**
     * Description of the contribution rate.
     *
     * @var string
     */
    protected $contributeRateDescription = '';

    /**
     * Returns the contributionRateTitle
     *
     * @return string $contributionRateTitle
     */
    public function getContributionRateTitle()
    {
        return $this->contributionRateTitle;
    }

    /**
     * Sets the contributionRateTitle
     *
     * @param string $contributionRateTitle
     * @return void
     */
    public function setContributionRateTitle($contributionRateTitle)
    {
        $this->contributionRateTitle = $contributionRateTitle;
    }

    /**
     * Returns the contributionRateAmount
     *
     * @return float $contributionRateAmount
     */
    public function getContributionRateAmount()
    {
        return $this->contributionRateAmount;
    }

    /**
     * Sets the contributionRateAmount
     *
     * @param float $contributionRateAmount
     * @return void
     */
    public function setContributionRateAmount($contributionRateAmount)
    {
        $this->contributionRateAmount = $contributionRateAmount;
    }

    /**
     * Returns the contributeRateDescription
     *
     * @return string $contributeRateDescription
     */
    public function getContributeRateDescription()
    {
        return $this->contributeRateDescription;
    }

    /**
     * Sets the contributeRateDescription
     *
     * @param string $contributeRateDescription
     * @return void
     */
    public function setContributeRateDescription($contributeRateDescription)
    {
        $this->contributeRateDescription = $contributeRateDescription;
    }
}
