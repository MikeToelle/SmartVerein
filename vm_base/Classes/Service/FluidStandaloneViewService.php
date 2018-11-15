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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * FluidStandaloneViewService
 *
 */

class FluidStandaloneViewService
{

    /**
     * The object manager
     *
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     * @inject
     */
    protected $objectManager;

/**
 * Parses the given string with Fluid
 *
 * @param string $source
 * @param array $variables
 * @return string Parsed string
 */
    public function parseStringWithFluid($source,$variables=[])
    {
        if (empty($source)){
            return $source;
        }

        /** @var StandaloneView $standaloneView */
        $standaloneView = $this->objectManager->get(StandaloneView::class);
        $standaloneView->setTemplateSource($source);
        $standaloneView->assignMultiple($variables);

        return $standaloneView->render();
    }

    /**
     * Renders a fluid standlone view for the given template
     *
     * @param string $template
     * @param string $templateRootPath
     * @param array $variables
     * @param string $extensionName
     * @param string $pluginName
     * @return string
     */
    public function renderTemplate($template,$templateRootPath, $variables, $extensionName = NULL, $pluginName = NULL)
    {
        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $emailView */
        $emailView = $this->objectManager->get(StandaloneView::class);
        if ($extensionName){
            $emailView->getRequest()->setControllerExtensionName($extensionName);
        }
        if ($pluginName){
            $emailView->getRequest()->setPluginName($pluginName);
        }

        $emailView->setFormat('html');
        // TODO Besseren Weg finden für paths (soll so allgemein wie möglich funktionieren)
        $emailView->setLayoutRootPaths($this->isSuffixedPath($templateRootPath).'layout');
        $emailView->setPartialRootPaths($this->isSuffixedPath($templateRootPath).'partial');
        $emailView->setTemplatePathAndFilename($template);
        $emailView->assignMultiple($variables);
        $emailBody = $emailView->render();

        return $emailBody;
    }

    /**
     * check if the path ends with a slash
     *
     * @param string $path
     * @return string
     */
    protected function isSuffixedPath($path)
    {
        return rtrim($path, '/') . '/';
    }
}
