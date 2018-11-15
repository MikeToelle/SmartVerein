<?php

namespace Typo3graf\VmMember\Domain\Model;

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
 * Settings for Dashboard Layout
 */
class DashboardLayout extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{
    /**
     * Layout of the dashboard
     *
     * @var string
     */
    protected $dashboardLayout = '';

    /**
     * widget1
     *
     * @var string
     */
    protected $widget1 = '';

    /**
     * widget2
     *
     * @var string
     */
    protected $widget2 = '';

    /**
     * widget3
     *
     * @var string
     */
    protected $widget3 = '';

    /**
     * widget4
     *
     * @var string
     */
    protected $widget4 = '';

    /**
     * widget5
     *
     * @var string
     */
    protected $widget5 = '';

    /**
     * widget6
     *
     * @var string
     */
    protected $widget6 = '';

    /**
     * widget7
     *
     * @var string
     */
    protected $widget7 = '';

    /**
     * widget8
     *
     * @var string
     */
    protected $widget8 = '';

    /**
     * widget9
     *
     * @var string
     */
    protected $widget9 = '';

    /**
     * widget10
     *
     * @var string
     */
    protected $widget10 = '';

    /**
     * Returns the dashboardLayout
     *
     * @return string $dashboardLayout
     */
    public function getDashboardLayout()
    {
        return $this->dashboardLayout;
    }

    /**
     * Sets the dashboardLayout
     *
     * @param string $dashboardLayout
     * @return void
     */
    public function setDashboardLayout($dashboardLayout)
    {
        $this->dashboardLayout = $dashboardLayout;
    }

    /**
     * Returns the widget1
     *
     * @return string $widget1
     */
    public function getWidget1()
    {
        return $this->widget1;
    }

    /**
     * Sets the widget1
     *
     * @param string $widget1
     * @return void
     */
    public function setWidget1($widget1)
    {
        $this->widget1 = $widget1;
    }

    /**
     * Returns the widget2
     *
     * @return string $widget2
     */
    public function getWidget2()
    {
        return $this->widget2;
    }

    /**
     * Sets the widget2
     *
     * @param string $widget2
     * @return void
     */
    public function setWidget2($widget2)
    {
        $this->widget2 = $widget2;
    }

    /**
     * Returns the widget3
     *
     * @return string $widget3
     */
    public function getWidget3()
    {
        return $this->widget3;
    }

    /**
     * Sets the widget3
     *
     * @param string $widget3
     * @return void
     */
    public function setWidget3($widget3)
    {
        $this->widget3 = $widget3;
    }

    /**
     * Returns the widget4
     *
     * @return string $widget4
     */
    public function getWidget4()
    {
        return $this->widget4;
    }

    /**
     * Sets the widget4
     *
     * @param string $widget4
     * @return void
     */
    public function setWidget4($widget4)
    {
        $this->widget4 = $widget4;
    }

    /**
     * Returns the widget5
     *
     * @return string $widget5
     */
    public function getWidget5()
    {
        return $this->widget5;
    }

    /**
     * Sets the widget5
     *
     * @param string $widget5
     * @return void
     */
    public function setWidget5($widget5)
    {
        $this->widget5 = $widget5;
    }

    /**
     * Returns the widget6
     *
     * @return string $widget6
     */
    public function getWidget6()
    {
        return $this->widget6;
    }

    /**
     * Sets the widget6
     *
     * @param string $widget6
     * @return void
     */
    public function setWidget6($widget6)
    {
        $this->widget6 = $widget6;
    }

    /**
     * Returns the widget7
     *
     * @return string $widget7
     */
    public function getWidget7()
    {
        return $this->widget7;
    }

    /**
     * Sets the widget7
     *
     * @param string $widget7
     * @return void
     */
    public function setWidget7($widget7)
    {
        $this->widget7 = $widget7;
    }

    /**
     * Returns the widget8
     *
     * @return string $widget8
     */
    public function getWidget8()
    {
        return $this->widget8;
    }

    /**
     * Sets the widget8
     *
     * @param string $widget8
     * @return void
     */
    public function setWidget8($widget8)
    {
        $this->widget8 = $widget8;
    }

    /**
     * Returns the widget9
     *
     * @return string $widget9
     */
    public function getWidget9()
    {
        return $this->widget9;
    }

    /**
     * Sets the widget9
     *
     * @param string $widget9
     * @return void
     */
    public function setWidget9($widget9)
    {
        $this->widget9 = $widget9;
    }

    /**
     * Returns the widget10
     *
     * @return string $widget10
     */
    public function getWidget10()
    {
        return $this->widget10;
    }

    /**
     * Sets the widget10
     *
     * @param string $widget10
     * @return void
     */
    public function setWidget10($widget10)
    {
        $this->widget10 = $widget10;
    }
}
