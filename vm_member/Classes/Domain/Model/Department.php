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
 * Departments of the club.
 */
class Department extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name of the department
     *
     * @var string
     * @validate NotEmpty
     */
    protected $departmentName = '';

    /**
     * Is department a function-department. z.B. Vorstand
     *
     * @var bool
     */
    protected $isFunctionDepartment = false;

    /**
     * Description of the department.
     *
     * @var string
     */
    protected $departmentDescription = '';

    /**
     * Logo of the department.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     *
     */
    protected $departmentLogo = null;

    /**
     * departmentHasWorkers
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\DepartmentWorkers>
     * @cascade remove
     */
    protected $departmentHasWorkers = null;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->departmentLogo = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->departmentHasWorkers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the departmentName
     *
     * @return string $departmentName
     */
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    /**
     * Sets the departmentName
     *
     * @param string $departmentName
     * @return void
     */
    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    /**
     * Returns the isFunctionDepartment
     *
     * @return bool $isFunctionDepartment
     */
    public function getIsFunctionDepartment()
    {
        return $this->isFunctionDepartment;
    }

    /**
     * Sets the isFunctionDepartment
     *
     * @param bool $isFunctionDepartment
     * @return void
     */
    public function setIsFunctionDepartment($isFunctionDepartment)
    {
        $this->isFunctionDepartment = $isFunctionDepartment;
    }

    /**
     * Returns the boolean state of isFunctionDepartment
     *
     * @return bool
     */
    public function isIsFunctionDepartment()
    {
        return $this->isFunctionDepartment;
    }

    /**
     * Returns the departmentDescription
     *
     * @return string $departmentDescription
     */
    public function getDepartmentDescription()
    {
        return $this->departmentDescription;
    }

    /**
     * Sets the departmentDescription
     *
     * @param string $departmentDescription
     * @return void
     */
    public function setDepartmentDescription($departmentDescription)
    {
        $this->departmentDescription = $departmentDescription;
    }

    /**
     * Returns the departmentLogo
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage $departmentLogo
     */
    public function getDepartmentLogo()
    {
        return $this->departmentLogo;
    }

    /**
     * Sets the departmentLogo
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $departmentLogo
     * @return void
     */
    public function setDepartmentLogo(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $departmentLogo=NULL)
    {
        $this->departmentLogo = $departmentLogo;
    }

    /**
     * Adds a DepartmentWorkers
     *
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentHasWorker
     * @return void
     */
    public function addDepartmentHasWorker(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentHasWorker)
    {
        $this->departmentHasWorkers->attach($departmentHasWorker);
    }

    /**
     * Removes a DepartmentWorkers
     *
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentHasWorkerToRemove The DepartmentWorkers to be removed
     * @return void
     */
    public function removeDepartmentHasWorker(\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $departmentHasWorkerToRemove)
    {
        $this->departmentHasWorkers->detach($departmentHasWorkerToRemove);
    }

    /**
     * Returns the departmentHasWorkers
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\DepartmentWorkers> $departmentHasWorkers
     */
    public function getDepartmentHasWorkers()
    {
        return $this->departmentHasWorkers;
    }

    /**
     * Sets the departmentHasWorkers
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Typo3graf\VmMember\Domain\Model\DepartmentWorkers> $departmentHasWorkers
     * @return void
     */
    public function setDepartmentHasWorkers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $departmentHasWorkers)
    {
        $this->departmentHasWorkers = $departmentHasWorkers;
    }
}
