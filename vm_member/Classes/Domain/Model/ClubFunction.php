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
 * Member functions of the club.
 */
class ClubFunction extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name of the function.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $functionName = '';

    /**
     * Description of the function.
     *
     * @var string
     */
    protected $functionDescription = '';

    /**
     * Returns the functionName
     *
     * @return string $functionName
     */
    public function getFunctionName()
    {
        return $this->functionName;
    }

    /**
     * Sets the functionName
     *
     * @param string $functionName
     * @return void
     */
    public function setFunctionName($functionName)
    {
        $this->functionName = $functionName;
    }

    /**
     * Returns the functionDescription
     *
     * @return string $functionDescription
     */
    public function getFunctionDescription()
    {
        return $this->functionDescription;
    }

    /**
     * Sets the functionDescription
     *
     * @param string $functionDescription
     * @return void
     */
    public function setFunctionDescription($functionDescription)
    {
        $this->functionDescription = $functionDescription;
    }
}
