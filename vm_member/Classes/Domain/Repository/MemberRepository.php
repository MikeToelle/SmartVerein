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
 * The repository for Members
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use Typo3graf\VmMember\Domain\Model\Member;

class MemberRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'memberLastname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
        'memberFirstname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    public function findEmptyMemberID() {
        $query = $this->createQuery();
        $query->matching(
            $query->equals('memberID', '')
        );

        return $query->execute();
    }

    public function countGender($gender) {

        $query = $this->createQuery();
        //$query->getQuerySettings()->setStoragePageIds(array(45));
        $query->matching(
            $query->logicalAnd(
            $query->equals('memberFormOfAddress', $gender),
            $query->equals('memberLeaving', 0)
            )
        );
        $query->execute();
        return $query->count();
    }

    /**
     * count all members by Month
     *
     * @param integer $month
     * @return QueryResultInterface
     */
    public function countAllMembersByMonth($month) {

        $query = $this->createQuery();
        $date_min = new \DateTime('-'.$month.'Month');
        $date_min->modify('last day of this month');
        $query->matching(
            $query->lessThanOrEqual('memberEntryDate', $date_min)
            );
        return $query->execute()->count();
    }

    /**
     * count members in Month (entry or leaving)
     *
     * @param string $field
     * @param integer $month
     * @return QueryResultInterface
     */
    public function countMembersInMonth($field,$month) {

        $query = $this->createQuery();
        $date = new \DateTime('-'.$month.'Month');
        $first = $date->modify('first day of this month');
        $first = $first->getTimestamp();
        $last = $date->modify('last day of this month');
        $last = $last->getTimestamp();
        $timestamp = $date->getTimestamp();
        $date_min = mktime(0, 0, 0, date ('m',$timestamp), date('d',$first), date ('Y',$timestamp));
        $date_max = mktime(23, 59, 59, date ('m',$timestamp), date('d',$last), date ('Y',$timestamp));
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($date_min, 'Date min');
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($date_max, 'Date max');
        $query->matching(
            $query->logicalAnd(
                $query->greaterThanOrEqual($field, $date_min),
                $query->lessThanOrEqual($field, $date_max)
            )
        );
        //$query->execute();
        return $query->execute()->count();
    }

    /**
     * count all references of memberDepartments
     *
     * @param string $departmentID
     * @return QueryResultInterface
     */
    public function countDepartmentReferences($departmentID) {
        $query = $this->createQuery();
        $query->matching(
            $query->contains('memberDepartments', $departmentID)
        );
        $query->execute();
        return $query->count();
    }

    /**
     * find all members of a department
     *
     * @param string $departmentID
     * @return QueryResultInterface
     */
    public function findMembersOfDepartment($departmentID) {
        $query = $this->createQuery();
        $query->matching(
            $query->contains('memberDepartments', $departmentID)
        );

        return $query->execute();
    }

    /**
     * find birthdays
     * @param string $birthdayArray
     * @return QueryResultInterface
     */
    public function findBirthdays($birthdayArray = '') {
        $dataMapper = GeneralUtility::makeInstance(DataMapper::class);
        $query = $this->createQuery();
        if ($birthdayArray == '') {
            $query->statement("SELECT * FROM tx_vmmember_domain_model_member WHERE (DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_birthday SECOND),'%m%d') >= DATE_FORMAT(NOW(),'%m%d')) AND member_leaving = '0' ORDER BY DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_birthday SECOND),'%m%d') ASC  LIMIT 5");

        } else {
            $query->statement("SELECT * FROM tx_vmmember_domain_model_member WHERE ((DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_birthday SECOND),'%m%d') >= DATE_FORMAT(NOW(),'%m%d')) AND (DATE_FORMAT(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_birthday SECOND))),'%Y')+1 IN (".$birthdayArray."))) AND member_leaving = '0' ORDER BY DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_birthday SECOND),'%m%d') ASC  LIMIT 5");
        }
        $result = $query->execute(true);
        return $dataMapper->map(Member::class, $result);
    }

    /**
     * find anniversary
     * @param string $anniversaryArray
     * @return QueryResultInterface
     */
    public function findAnniversary($anniversaryArray = '10,20,25,30,40,50,60,70,80,90,100') {

        $dataMapper = GeneralUtility::makeInstance(DataMapper::class);
        $query = $this->createQuery();
            $query->statement("SELECT * FROM tx_vmmember_domain_model_member WHERE (DATE_FORMAT(NOW(),'%Y') - DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_entry_date SECOND), '%Y')) IN (".$anniversaryArray.") ORDER BY DATE_FORMAT(NOW(),'%Y') - DATE_FORMAT(DATE_ADD(FROM_UNIXTIME(0),INTERVAL member_entry_date SECOND), '%Y') ASC");

        $result = $query->execute(true);
        return $dataMapper->map(Member::class, $result);
    }

    public function getNext($entity)
    {
        $entities = $this->findAll();
        $match = false;
        foreach ($entities as $entityFor) {
            if ($entityFor->getUid() == $entity->getUid()) {
                $match = true;
                continue;
            }
            if ($match == true) {
                return $entityFor;
            }
        }
    }

    public function getBefore($entity)
    {
        $entities = array_reverse($this->findAll()->toArray());
        $match = false;
        foreach ($entities as $entityFor) {
            if ($entityFor->getUid() == $entity->getUid()) {
                $match = true;
                continue;
            }
            if ($match == true) {
                return $entityFor;
            }
        }
    }
}
