<?php
/**
 * **************************************************************
 *   Copyright notice
 *
 *   (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *   All rights reserved
 *
 *  This file is part of the TYPO3 CMS project.
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The TYPO3 project - inspiring people to share!
 *
 *   This script is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   This copyright notice MUST APPEAR in all copies of the script!
 * *************************************************************
 */

namespace Typo3graf\VmDashboard\ViewHelpers\Widget\Controller;

class WelcomeController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController
{
    /**
     * memberRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MemberRepository
     * @inject
     */
    protected $memberRepository = null;

    /**
     *
     */
    public function indexAction()
    {
        $member = $this->memberRepository->findOneByMemberLogin($GLOBALS['TSFE']->fe_user->user['uid']);
        if ($member->getMemberFirstname() == 'Max' && $member->getMemberLastname() == 'Mustermann'){
            $isSetup = 1;
        } else {
            $isSetup =0;
        }
        $this->view->assign('isSetup', $isSetup);
        $this->view->assign('member', $member);
    }
}
