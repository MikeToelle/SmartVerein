<?php

namespace Typo3graf\VmMember\Service;
/**
 * **************************************************************
 *   Copyright notice
 *
 *   (c) 2018 Typo3graf Development-Team <development@typo3graf.de>
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


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

class ExportService implements \TYPO3\CMS\Core\SingletonInterface
{
    /**
     * The object manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

    /**
     * memberRepository
     *
     * @var \Typo3graf\VmMember\Domain\Repository\MemberRepository
     * @inject
     */
    protected $memberRepository = null;

    /**
     * @param string $export Export
     * @return boolean TRUE on success, otherwise false
     */
    public function createExportFile($export)
    {
        $exportView = GeneralUtility::makeInstance(StandaloneView::class);
        $exportView->setFormat('csv');

    }

}
