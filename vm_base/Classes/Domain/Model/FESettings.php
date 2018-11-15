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
 * Frontend settings for SmartVerein
 */
class FESettings extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * is myProfil
     *
     * @var bool
     */
    protected $myProfil = false;

    /**
     * Returns the myProfil
     *
     * @return bool $myProfil
     */
    public function getMyProfil()
    {
        return $this->myProfil;
    }

    /**
     * Sets the myProfil
     *
     * @param bool $myProfil
     * @return void
     */
    public function setMyProfil($myProfil)
    {
        $this->myProfil = $myProfil;
    }

    /**
     * Returns the boolean state of myProfil
     *
     * @return bool
     */
    public function isMyProfil()
    {
        return $this->myProfil;
    }
}
