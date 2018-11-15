<?php
namespace Typo3graf\VmMember\Domain\Repository;

class SortedRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
protected $defaultOrderings = array(
'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
);

public function moveUp($entity)
{
$tce = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\DataHandling\\DataHandler');
$tce->stripslashes_values = 0;
$entityTwoBefore = $this->getTwoBefore($entity);

if ($entityTwoBefore != null) {
//category is minimum 3
//can set over UID
$cmd[$this->getTableName($entity)][$entity->getUid()]['move']= 0-$entityTwoBefore->getUid();
} else {
//can only set over pid
$cmd[$this->getTableName($entity)][$entity->getUid()]['move']= $entity->getPid();
}

$tce->start(array(), $cmd);
$tce->process_cmdmap();

}

public function moveDown($entity)
{
$tce = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\DataHandling\\DataHandler');
$tce->stripslashes_values = 0;

$nextEntity = $this->getNext($entity);

if ($nextEntity != null) {
$cmd[$this->getTableName($entity)][$entity->getUid()]['move'] = 0 - $nextEntity->getUid();
}

$tce->start(array(), $cmd);
$tce->process_cmdmap();
}

private function getNext($entity)
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

private function getBefore($entity)
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

private function getTwoBefore($entity)
{
$entityTwoBefore = null;
$entityBefore = $this->getBefore($entity);
if ($entityBefore != null) {
$entityTwoBefore = $this->getBefore($entityBefore);
}

return $entityTwoBefore;

}

/**
* Return the current tablename
*
* @return string
*/
private function getTableName($entity) {

/** @var DataMapper $dataMapper */
$dataMapper = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Mapper\\DataMapper');

return $dataMapper->getDataMap(get_class($entity))->getTableName();
}
}
