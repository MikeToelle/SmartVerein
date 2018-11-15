<?php
/**
 * **************************************************************
 *   Copyright notice
 *
 *   (c) 2018 Typo3graf Developer Team <development@typo3graf.de>
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

namespace Typo3graf\VmBase\Service;

class SettingsService{

    /**
     * fESettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\FESettingsRepository
     * @inject
     */
    protected $fESettingsRepository = null;

    /**
     * mASettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\MASettingsRepository
     * @inject
     */
    protected $mASettingsRepository = null;

    /**
     * sysSettingsRepository
     *
     * @var \Typo3graf\VmBase\Domain\Repository\SYSSettingsRepository
     * @inject
     */
    protected $sysSettingsRepository = null;

    /**
     * Returns SYS settings.
     *
     * @return array
     */
    public function getSysSettings()
    {
        $settings = $this->sysSettingsRepository->findAll()->getFirst();
        return $settings;
    }
}
