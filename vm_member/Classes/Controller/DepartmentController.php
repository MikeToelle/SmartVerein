<?php
namespace Typo3graf\VmMember\Controller;

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
 * DepartmentController
 */
class DepartmentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * departmentRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\DepartmentRepository
     * @inject
     */
    protected $departmentRepository = null;

    /**
     * departmentWorkersRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\DepartmentWorkersRepository
     * @inject
     */
    protected $departmentWorkersRepository = null;

    /**
     * memberRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MemberRepository
     * @inject
     */
    protected $memberRepository = null;

    /**
     * functionRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\ClubFunctionRepository
     * @inject
     */
    protected $clubFunctionRepository = null;

    /**
     * Session Handler
     *
     * @var \Typo3graf\VmBase\Service\SessionHandler
     * @inject
     */
    protected $sessionHandler = null;

    /**
     * Upload Service
     *
     * @var \Typo3graf\VmBase\Service\UploadService
     * @inject
     */
    protected $uploadService = null;

    public function initializeAction()
    {
        // Redirect zur Login Seite falls nicht eingeloggt
        if (!$GLOBALS['TSFE']->loginUser) {
            $this->redirect(null, null, null, null, $this->settings['loginPage']);
        }
    }

    /**
     * action list
     *
     * @return void
     */
    public function listDepartmentAction()
    {
        $GLOBALS['TSFE']->fe_user->removeSessionData();
        $this->view->assign('count',$this->getReferences());
        $departments = $this->departmentRepository->findAll();
        $this->view->assign('departments', $departments);
    }

    /**
     * action show
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @return void
     */
    public function showAction(\Typo3graf\VmMember\Domain\Model\Department $department)
    {

        $this->view->assign('department', $department);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newDepartmentAction()
    {

    }

    public function initializeCreateDepartmentAction()
    {
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['newDepartment'],'departmentLogo.0','abteilungen');
    }
    /**
     * action create
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $newDepartment
     * @return void
     */
    public function createDepartmentAction(\Typo3graf\VmMember\Domain\Model\Department $newDepartment)
    {
        $this->addFlashMessage('Abteilung erfolgreich angelegt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->departmentRepository->add($newDepartment);
        $this->redirect('listDepartment');
    }

    /**
     * action edit
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @ignorevalidation $department
     * @return void
     */
    public function editDepartmentAction(\Typo3graf\VmMember\Domain\Model\Department $department)
    {
        $this->view->assign('department', $department);
        $this->view->assign('count',$this->getReferences());
        $departments = $this->departmentRepository->findAll();
        $this->view->assign('departments', $departments);
    }

    public function initializeUpdateDepartmentAction()
    {
        $this->uploadService->setTypeConverterConfigurationForImageUpload($this->arguments['department'],'departmentLogo.0','abteilungen');
    }
    /**
     * action update
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @return void
     */
    public function updateDepartmentAction(\Typo3graf\VmMember\Domain\Model\Department $department)
    {
        $this->addFlashMessage('Abteilung erfolgreich geändert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->departmentRepository->update($department);
        $this->redirect('listDepartment');
    }

    /**
     * action deleteDepartment
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @return void
     */
    public function deleteDepartmentAction(\Typo3graf\VmMember\Domain\Model\Department $department)
    {
        $this->addFlashMessage('Abteilung erfolgreich gelöscht!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->departmentRepository->remove($department);
        $this->redirect('listDepartment');
    }

    /**
     * action listWorkers
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @return void
     */
    public function listWorkersAction(\Typo3graf\VmMember\Domain\Model\Department $department)
    {
        if ($department->isIsFunctionDepartment()){
            $this->view->assign('members',$this->memberRepository->findAll());
        } else {
            $this->view->assign('members',$this->memberRepository->findMembersOfDepartment($department->getUid()));
        }

        $this->view->assign('clubFunctions',$this->clubFunctionRepository->findAll());
        $this->view->assign('department',$department);
    }

    /**
     * action createWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $newWorker
     * @return void
     */
    public function createWorkerAction(\Typo3graf\VmMember\Domain\Model\Department $department, \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $newWorker)
    {

        if($department->isIsFunctionDepartment()){
            $member = $newWorker->getDepartmentWorker();
            $member->addMemberDepartment($department);
            $this->memberRepository->update($member);
        }
        $this->addFlashMessage('Funktionär erfolgreich angelegt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $department->addDepartmentHasWorker($newWorker);
        $this->departmentRepository->update($department);
        $this->redirect('listWorkers',NULL,NULL,array('department'=>$department));
    }

    /**
     * action editWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker
     * @return void
     */
    public function editWorkerAction(\Typo3graf\VmMember\Domain\Model\Department $department, \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker)
    {
        if ($department->isIsFunctionDepartment()){
            $this->view->assign('members',$this->memberRepository->findAll());
        } else {
            $this->view->assign('members',$this->memberRepository->findMembersOfDepartment($department->getUid()));
        }
        $this->view->assign('oldWorker',$worker->getDepartmentWorker());
        $this->view->assign('clubFunctions',$this->clubFunctionRepository->findAll());
        $this->view->assign('worker',$worker);
        $this->view->assign('department',$department);
    }

    /**
     * action updateWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker
     * @param \Typo3graf\VmMember\Domain\Model\Member $oldWorker
     * @return void
     */
    public function updateWorkerAction(\Typo3graf\VmMember\Domain\Model\Department $department, \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker,\Typo3graf\VmMember\Domain\Model\Member $oldWorker)
    {

        if($department->isIsFunctionDepartment()){
            $member = $worker->getDepartmentWorker();
            $member->addMemberDepartment($department);
            $this->memberRepository->update($member);
            if($worker->getDepartmentWorker() != $oldWorker){
                $oldWorker->removeMemberDepartment($department);
                $this->memberRepository->update($oldWorker);
            }
        }
        $this->addFlashMessage('Funktionär erfolgreich geändert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $department->addDepartmentHasWorker($worker);
        $this->departmentRepository->update($department);
        $this->redirect('listWorkers',NULL,NULL,array('department'=>$department));
    }

    /**
     * action deleteWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker
     * @return void
     */
    public function deleteWorkerAction(\Typo3graf\VmMember\Domain\Model\Department $department, \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker)
    {
        if($department->isIsFunctionDepartment()){
            $member = $worker->getDepartmentWorker();
            $member->removeMemberDepartment($department);
            $this->memberRepository->update($member);
        }
        $this->addFlashMessage('Funktionär erfolgreich gelöscht!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $department->removeDepartmentHasWorker($worker);
        $this->departmentRepository->update($department);
        $this->redirect('listWorkers',NULL,NULL,array('department'=>$department));
    }

    /**
     * action upWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker
     * @return void
     */
    public function upWorkerAction(\Typo3graf\VmMember\Domain\Model\Department $department,\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker )
    {
        $current = $worker->getSorting();
        $before = $this->departmentWorkersRepository->getBefore($worker);

        $worker->setSorting($before->getSorting());
        $before->setSorting($current);

        $this->departmentWorkersRepository->update($before);
        $this->departmentWorkersRepository->update($worker);

       // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($department, 'Department');
        //$this->departmentWorkersRepository->moveUp($worker);
        $this->redirect('listWorkers',NULL,NULL,array('department'=>$department));
    }

    /**
     * action downWorker
     *
     * @param \Typo3graf\VmMember\Domain\Model\Department $department
     * @param \Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker
     * @return void
     */
    public function downWorkerAction(\Typo3graf\VmMember\Domain\Model\Department $department,\Typo3graf\VmMember\Domain\Model\DepartmentWorkers $worker )
    {
        $current = $worker->getSorting();
        $after = $this->departmentWorkersRepository->getNext($worker);
        $worker->setSorting($after->getSorting());
        $after->setSorting($current);

        $this->departmentWorkersRepository->update($after);
        $this->departmentWorkersRepository->update($worker);

        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($department, 'Department');
        //$this->departmentWorkersRepository->moveUp($worker);
        $this->redirect('listWorkers',NULL,NULL,array('department'=>$department));
    }


    /**
     * getReferences
     *
     * @return array
     */

    public function getReferences(){
        $count = array();
        $departments = $this->departmentRepository->findAll();
        foreach ($departments as $department){

            $count[] = $this->memberRepository->countDepartmentReferences($department->getUid());
        }
        return $count;
    }

    protected function getErrorFlashMessage() {
        return FALSE;
    }
}
