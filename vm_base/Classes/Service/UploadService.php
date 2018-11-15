<?php

namespace Typo3graf\VmBase\Service;

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

class UploadService{

    public function setTypeConverterConfigurationForImageUpload(\TYPO3\CMS\Extbase\Mvc\Controller\Argument $argumentName,$property,$folderName)
    {

        $uploadConfiguration = array(
            \Typo3graf\VmBase\Property\TypeConverter\UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
            \Typo3graf\VmBase\Property\TypeConverter\UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/smartverein/'.$folderName,
        );
        $memberConfiguration = $argumentName->getPropertyMappingConfiguration();
        $memberConfiguration->forProperty($property)
            ->setTypeConverterOptions(
                'Typo3graf\\VmBase\\Property\\TypeConverter\\UploadedFileReferenceConverter',
                $uploadConfiguration
            );
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($memberConfiguration, 'My Title');
    }

}
