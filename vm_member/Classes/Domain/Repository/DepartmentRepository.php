<?php
namespace Typo3graf\VmMember\Domain\Repository;

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
 * The repository for Departments
 */
class DepartmentRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    /**
     * get all Departments
     *
     * @return QueryResultInterface
     */
    public function getDepartments() {
        $query = $this->createQuery();
        $query->matching(

            $query->equals('isFunctionDepartment','0')

        );

        return $query->execute();
    }
}
