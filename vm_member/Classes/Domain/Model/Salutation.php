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
 * Salutation
 */
class Salutation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * salutationTitle
     *
     * @var string
     * @validate NotEmpty
     */
    protected $salutationTitle = '';

    /**
     * salutationDescription
     *
     * @var string
     */
    protected $salutationDescription = '';

    /**
     * Returns the salutationTitle
     *
     * @return string $salutationTitle
     */
    public function getSalutationTitle()
    {
        return $this->salutationTitle;
    }

    /**
     * Sets the salutationTitle
     *
     * @param string $salutationTitle
     * @return void
     */
    public function setSalutationTitle($salutationTitle)
    {
        $this->salutationTitle = $salutationTitle;
    }

    /**
     * Returns the salutationDescription
     *
     * @return string $salutationDescription
     */
    public function getSalutationDescription()
    {
        return $this->salutationDescription;
    }

    /**
     * Sets the salutationDescription
     *
     * @param string $salutationDescription
     * @return void
     */
    public function setSalutationDescription($salutationDescription)
    {
        $this->salutationDescription = $salutationDescription;
    }
}
