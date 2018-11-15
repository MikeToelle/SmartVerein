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
 * The repository for DepartmentWorkers
 */
class DepartmentWorkersRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = array(
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    public function findByMember(\Typo3graf\VmMember\Domain\Model\Member $member) {
        $query = $this->createQuery();
        $query->matching(
          $query->equals('department_worker',$member)
        );

        return $query->execute();
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
