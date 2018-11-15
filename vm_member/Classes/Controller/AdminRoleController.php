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
 * AdminRoleController
 */
class AdminRoleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * userGroupRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\UserGroupRepository
     * @inject
     */
    protected $userGroupRepository = null;

    /**
     * userRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\UserRepository
     * @inject
     */
    protected $userRepository = null;

    public function initializeAction()
    {
        // Redirect zur Login Seite falls nicht eingeloggt
        if (!$GLOBALS['TSFE']->loginUser) {
            $this->redirect(null, null, null, null, $this->settings['loginPage']);
        }
    }

    /**
     * action adminRoleList
     *
     * @return void
     */
    public function adminRoleListAction()
    {
        $this->view->assign('roles',$this->getRoles());
        $this->view->assign('count',$this->getReferences());
        $this->view->assign('adminRoles',$this->userGroupRepository->findAllForFrontendSelectionFrom('101'));
    }

    /**
     * action createAdminRole
     *
     * @param array $newAdminRole
     * @return void
     */
    public function createAdminRoleAction(array $newAdminRole)
    {
        $adminRole = $this->newRoleToSubgroups($newAdminRole);
        $this->addFlashMessage('L:Administrationsgruppe erfolgreich angelegt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);

        $this->userGroupRepository->add($adminRole);
        $this->redirect('adminRoleListAction');
    }

    /**
     * action editAdminRole
     *
     * @param \Typo3graf\VmMember\Domain\Model\UserGroup $adminRole
     *
     * @return void
     */

    public function editAdminRoleAction(\Typo3graf\VmMember\Domain\Model\UserGroup $adminRole)
    {
        $this->view->assign('editRole',$this->subgroupsToRole($adminRole));
        $this->view->assign('roles',$this->getRoles());
        $this->view->assign('adminRoles',$this->userGroupRepository->findAllForFrontendSelectionFrom('101'));
        $this->view->assign('adminRole',$adminRole);
        $this->view->assign('count',$this->getReferences());
    }

    /**
     * action updateAdminRole
     *
     * @param array $editRole
     * @param \Typo3graf\VmMember\Domain\Model\UserGroup $adminRole
     * @return void
     */
    public function updateAdminRoleAction(array $editRole, \Typo3graf\VmMember\Domain\Model\UserGroup $adminRole)
    {

        $this->updateRoleToSubgroups($editRole,$adminRole);
        $this->addFlashMessage('L:Administrationsgruppe erfolgreich geändert!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->userGroupRepository->update($adminRole);
        $this->redirect('adminRoleListAction');
    }

    /**
     * action deleteAdminRole
     *
     * @param \Typo3graf\VmMember\Domain\Model\UserGroup $adminRole
     *
     * @return void
     */

    public function deleteAdminRoleAction(\Typo3graf\VmMember\Domain\Model\UserGroup $adminRole)
    {
        $this->addFlashMessage('L:Administrationsgruppe erfolgreich entfernt!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->userGroupRepository->remove($adminRole);
        $this->redirect('adminRoleListAction');

    }

    /**
     * getReferences
     *
     * @return array
     */

    public function getReferences(){
        $count = array();
        $adminRoles = $this->userGroupRepository->findAllForFrontendSelectionFrom('101');
        foreach ($adminRoles as $adminRole){

            $count[] = $this->userRepository->countUsergroupReferences($adminRole->getUid());
        }
        return $count;
    }

    /**
     * newRoleToSubgroups
     *
     * @param array $adminRole
     * @return \Typo3graf\VmMember\Domain\Model\UserGroup
     */

    protected function newRoleToSubgroups(array $adminRole){
        $userGroup = new \Typo3graf\VmMember\Domain\Model\UserGroup;
        $userGroup->setTitle($adminRole[title]);
        //$userGroup->setFelogin_redirectPid('5');
        foreach($adminRole[newRoles] as $role){
            $userGroup->addSubgroup($this->userGroupRepository->findByUid($role));
        }
        foreach ($adminRole[newRights] as $right) {
            if ($right != '0') {
                $userGroup->addSubgroup($this->userGroupRepository->findByUid($right));
            }
        }

        return $userGroup;
    }

    /**
     * updateRoleToSubgroups
     *
     * @param array $editRole
     * @param \Typo3graf\VmMember\Domain\Model\UserGroup $adminRole
     * @return \Typo3graf\VmMember\Domain\Model\UserGroup
     */

    protected function updateRoleToSubgroups(array $editRole, \Typo3graf\VmMember\Domain\Model\UserGroup $adminRole ){

        $adminRole->setTitle($editRole[title]);

        foreach ($adminRole->getSubgroup() as $role){
            $adminRole->removeSubgroup($role);
        }

        foreach ($adminRole->getSubgroup() as $role){
            $adminRole->removeSubgroup($role);
        }
        foreach ($adminRole->getSubgroup() as $role){
            $adminRole->removeSubgroup($role);
        }

        foreach($editRole[editRoles] as $role){

            $adminRole->addSubgroup($this->userGroupRepository->findByUid($role));
        }
        foreach ($editRole[editRights] as $right) {
            if ($right != '0') {
                $adminRole->addSubgroup($this->userGroupRepository->findByUid($right));
            }
        }
        
        return $adminRole;
    }

    /**
     * subgroupsToRole
     *
     * @param \Typo3graf\VmMember\Domain\Model\UserGroup $adminGroup
     * @return array
     */

    protected function subgroupsToRole(\Typo3graf\VmMember\Domain\Model\UserGroup $adminGroup){

        $roles = '2,11,12,14,15,16,17,18,19';
        $roles = explode(',', $roles);
        $tabs = '20,22,24,28,26,30,3,5,7,9';
        $tabs = explode(',',$tabs);
        $readOnly ='21,23,25,29,27,31,4,6,8,10';
        $readOnly = explode(',',$readOnly);
        $adminRole = array();
        for ($i = 0; $i <= 9; $i++) {
            $adminRole ['editRights'][$i] = 0;
        }

        $adminRole ['title'] = $adminGroup->getTitle();
        $subgroups = $adminGroup->getSubgroup();

       if($adminGroup->getSubgroup()->count() > 0){
            foreach ($subgroups as $subgroup) {
                if (in_array ($subgroup->getUid(),$roles)){
                    $adminRole ['editRoles'][] = $subgroup->getUid();
                }

                if (in_array ($subgroup->getUid(),$tabs)){
                    $adminRole ['editRights'][array_search($subgroup->getUid(), $tabs)] = $subgroup->getUid();
                }
                if (in_array ($subgroup->getUid(),$readOnly)){
                    $adminRole ['editRights'][array_search($subgroup->getUid(), $readOnly)] = $subgroup->getUid();
                }
               }
        }
        return $adminRole;
    }

    /**
     * getRoles
     *
     * @return array
     */

    protected function getRoles(){
       $roles = [
           'MeinVerein' => [
            'MP' => [
            'VereinStamdaten' => [
             'MPID' => '2',
             'Tabs' => [
                 'Stammdaten' => [
                     '3' => 'Keinen Zugriff',
                     '4' => 'Nur Lesen',
                     '0' => 'Lesen und Schreiben',
                 ],
                 'VereinGericht' => [
                     '5' => 'Keinen Zugriff',
                     '6' => 'Nur Lesen',
                     '0' => 'Lesen und Schreiben',
                 ],
                 'VereinBank' => [
                     '7' => 'Keinen Zugriff',
                     '8' => 'Nur Lesen',
                     '0' => 'Lesen und Schreiben',
                 ],
                 'VereinSocials' => [
                     '9' => 'Keinen Zugriff',
                     '10' => 'Nur Lesen',
                     '0' => 'Lesen und Schreiben',
                 ],
                ],
],
                'VereinFunktion' => [
                    'MPID' => '11',
                ],
                'VereinAbteilung' => [
                    'MPID' => '11',
                ],
        ],
            ],
        'Einstellungen' => [
            'MP' => [
                'System' => [
                    'MPID' => '14',

                ],
                'BasisDaten' => [
                    'MPID' => '15',
                ],
                'Admin' => [
                    'MPID' => '16',
                ],
                'Buchhaltung' => [
                    'MPID' => '17',
                ],
                'Dateispeicher' => [
                    'MPID' => '18',
                ],
        ],
        ],
           'Mitglieder' => [
               'MP' => [
                   'Verwaltung' => [
                       'MPID' => '19',
                       'Tabs' => [
                           'Stammdaten' => [
                               '20' => 'Keinen Zugriff',
                               '21' => 'Nur Lesen',
                               '0' => 'Lesen und Schreiben',
                           ],
                           'Vereindaten' => [
                               '22' => 'Keinen Zugriff',
                               '23' => 'Nur Lesen',
                               '0' => 'Lesen und Schreiben',
                           ],
                           'Beitraege' => [
                               '24' => 'Keinen Zugriff',
                               '25' => 'Nur Lesen',
                               '0' => 'Lesen und Schreiben',
                           ],
                           'Dokumente' => [
                               '26' => 'Keinen Zugriff',
                               '27' => 'Nur Lesen',
                               '0' => 'Lesen und Schreiben',
                           ],
                           'Login' => [
                               '28' => 'Keinen Zugriff',
                               '29' => 'Nur Lesen',
                               '0' => 'Lesen und Schreiben',
                           ],
                           'History' => [
                               '30' => 'Keinen Zugriff',
                               '31' => 'Nur Lesen',
                               '0' => 'Lesen und Schreiben',
                           ],
                       ],
                   ],
               ],
           ],
           ];
        return $roles;
    }
}
