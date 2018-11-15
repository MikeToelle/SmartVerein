<?php

namespace Typo3graf\VmMember\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class UserGroupRepository
 */
class UserGroupRepository extends Repository
{

    /**
     * Find all groups and respect exclude list
     *
     * @param string $removeList commaseparated list
     * @return QueryResultInterface
     */
    public function findAllForFrontendSelection($removeList=NULL)
    {
        $query = $this->createQuery();
        if ($removeList) {
            $query->matching($query->logicalNot($query->in('uid', explode(',', $removeList))));
        } else {
            $query->matching($query->greaterThanOrEqual('uid',100));
        }
        $query->setOrderings(['title' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    /**
     * Find all groups and respect exclude list
     *
     * @param string $from startpoint
     * @return QueryResultInterface
     */
    public function findAllForFrontendSelectionFrom($from=NULL)
    {
        $query = $this->createQuery();
        if ($from) {
            $query->matching($query->greaterThanOrEqual('uid',$from));
        }
        $query->setOrderings(['title' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }
}
