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

class MemberOverviewController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController
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

        $memberLabels = '';
        $memberCount = '';
        $entryCount = '';
        $leavingCount = '';
        $mCount = 0;
        $lCount = 0;
        for ($x = 11; $x >= 0; $x--) {
            $mCount = intval($this->memberRepository->countAllMembersByMonth($x-1));
            $lCount = $lCount + intval($this->memberRepository->countMembersInMonth('memberLeavingDate',$x-1));
            $memberCount .= strval($mCount - $lCount).",";
            $entryCount .= strval($this->memberRepository->countMembersInMonth('memberEntryDate',$x-1)).",";
            $leavingCount .= strval($this->memberRepository->countMembersInMonth('memberLeavingDate',$x-1)).",";
            $memberLabels .= '"'.$this->getMonthLabel(date("n")-$x).'",';
        }
        $this->view->assign('memberLabels',$memberLabels);
        $this->view->assign('memberCount', $memberCount);
        $this->view->assign('entryCount', $entryCount);
        $this->view->assign('leavingCount', $leavingCount);
    }

    protected function getMonthLabel($month){
        $monthLabels = array('Januar','Februar','März','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember');
        if ($month < 0){
            $month = $month +12;
            $monthLabel = $monthLabels[$month];
        } else {
           $monthLabel = $monthLabels[$month];
        }

        return $monthLabel;
    }
}
