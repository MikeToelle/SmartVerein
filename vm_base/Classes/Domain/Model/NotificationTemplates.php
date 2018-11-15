<?php
namespace Typo3graf\VmBase\Domain\Model;

/***
 *
 * This file is part of the "Vereinsmeier - Base module" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 ***/

/**
 * Notification Templates for E-Mails and so on.
 */
class NotificationTemplates extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Title of the Template
     *
     * @var string
     * @validate NotEmpty
     */
    protected $templateTitle = '';

    /**
     * Source HTML code.
     *
     * @var string
     * @validate NotEmpty
     */
    protected $templateSource = '';

    /**
     * Typ of the Template. E-Mail,PDF or so.
     *
     * @var string
     */
    protected $templateType = '';

    /**
     * Returns the templateTitle
     *
     * @return string $templateTitle
     */
    public function getTemplateTitle()
    {
        return $this->templateTitle;
    }

    /**
     * Sets the templateTitle
     *
     * @param string $templateTitle
     * @return void
     */
    public function setTemplateTitle($templateTitle)
    {
        $this->templateTitle = $templateTitle;
    }

    /**
     * Returns the templateSource
     *
     * @return string $templateSource
     */
    public function getTemplateSource()
    {
        return $this->templateSource;
    }

    /**
     * Sets the templateSource
     *
     * @param string $templateSource
     * @return void
     */
    public function setTemplateSource($templateSource)
    {
        $this->templateSource = $templateSource;
    }

    /**
     * Returns the templateType
     *
     * @return string $templateType
     */
    public function getTemplateType()
    {
        return $this->templateType;
    }

    /**
     * Sets the templateType
     *
     * @param string $templateType
     * @return void
     */
    public function setTemplateType($templateType)
    {
        $this->templateType = $templateType;
    }
}
