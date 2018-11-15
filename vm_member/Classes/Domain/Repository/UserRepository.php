<?php

namespace Typo3graf\VmMember\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class UserGroupRepository
 */
class UserRepository extends Repository
{
    /**
     * count all references of usergroups
     *
     * @param string $usergroupID
     * @return QueryResultInterface
     */
    public function countUsergroupReferences($usergroupID) {
        $query = $this->createQuery();
        $query->matching(
            $query->contains('usergroup', $usergroupID)
        );
        $query->execute();
        return $query->count();
    }
}
