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
 * Workers of a Department
 */
class DepartmentWorkers extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * departmentWorkerEmail
     *
     * @var string
     */
    protected $departmentWorkerEmail = '';

    /**
     * clubFunction
     *
     * @var \Typo3graf\VmMember\Domain\Model\ClubFunction
     */
    protected $clubFunction = null;

    /**
     * departmentWorker
     *
     * @var \Typo3graf\VmMember\Domain\Model\Member
     */
    protected $departmentWorker = null;

    /**
     * sorting
     *
     * @var integer
     */
    protected $sorting = null;

    /**
     * Returns the departmentWorkerEmail
     *
     * @return string $departmentWorkerEmail
     */
    public function getDepartmentWorkerEmail()
    {
        return $this->departmentWorkerEmail;
    }

    /**
     * Sets the departmentWorkerEmail
     *
     * @param string $departmentWorkerEmail
     * @return void
     */
    public function setDepartmentWorkerEmail($departmentWorkerEmail)
    {
        $this->departmentWorkerEmail = $departmentWorkerEmail;
    }

    /**
     * Returns the clubFunction
     *
     * @return \Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction
     */
    public function getclubFunction()
    {
        return $this->clubFunction;
    }

    /**
     * Sets the clubFunction
     *
     * @param \Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction
     * @return void
     */
    public function setclubFunction(\Typo3graf\VmMember\Domain\Model\ClubFunction $clubFunction)
    {
        $this->clubFunction = $clubFunction;
    }

    /**
     * Returns the departmentWorker
     *
     * @return \Typo3graf\VmMember\Domain\Model\Member $departmentWorker
     */
    public function getDepartmentWorker()
    {
        return $this->departmentWorker;
    }

    /**
     * Sets the departmentWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Member $departmentWorker
     * @return void
     */
    public function setDepartmentWorker(\Typo3graf\VmMember\Domain\Model\Member $departmentWorker)
    {
        $this->departmentWorker = $departmentWorker;
    }

    /**
     * Returns the sorting
     *
     * @return integer $sorting
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * Sets the sorting
     *
     * @param integer $sorting
     * @return void
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }
}
