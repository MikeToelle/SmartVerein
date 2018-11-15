<?php
/**
 * **************************************************************
 *   Copyright notice
 *
 *   (c) $year $user <development@typo3graf.de>
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

class NextEventsOverviewController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController
{
    /**
     *
     */
    public function indexAction()
    {
        $this->view->assign('males', '2');
    }
}
