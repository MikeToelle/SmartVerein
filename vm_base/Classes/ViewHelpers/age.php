<?php

namespace Typo3graf\VmBase\ViewHelpers;
/**
 * Example
 * {namespace m=TYPO3\ExtensionName\ViewHelpers}
 * <m:customName param="nicecontent"></m:customName>
 * Nice description ;-)
 *
 * @package TYPO3
 * @subpackage ExtensionName
 * @version
 */
class AgeViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    /**
     * Shows years diff from Date to now
     *
     * @param \DateTime $date
     * @param string $option
     * @return string
     */
    public function render($date, $option='birthday') {
        if ($date === NULL) {
            return '??';
        }
        $now = new \DateTime('now');

        switch ($option){
            case 'birthday':
                $cur_day = $now->format('d');
                $cur_month = $now->format('m');
                $cur_year = $now->format('Y');
                $birthDay = $date->format('d');
                $birthMonth = $date->format('m');
                $birthYear = $date->format('Y');
                $calc_year = $cur_year - $birthYear;

               /* if( $birthMonth > $cur_month )
                    return $calc_year - 1;
                elseif ( $birthMonth == $cur_month && $birthDay > $cur_day )
                    return $calc_year - 1;
                else*/
                    return $calc_year;
                break;
            case 'currentAge':
                $cur_day = $now->format('d');
                $cur_month = $now->format('m');
                $cur_year = $now->format('Y');
                $birthDay = $date->format('d');
                $birthMonth = $date->format('m');
                $birthYear = $date->format('Y');
                $calc_year = $cur_year - $birthYear;

                if( $birthMonth > $cur_month )
                     return $calc_year - 1;
                 elseif ( $birthMonth == $cur_month && $birthDay > $cur_day )
                     return $calc_year - 1;
                 else
                return $calc_year;
                break;
            case 'next':
                $interval = $now->diff($date);
                $diffYears = $interval->format('%y');
                $years = intval($diffYears)+1;
                $diffYears = strval($years);
                break;
            case 'duration':
                $currentYear = $now->format('Y');
                $entryYear = $date->format('Y');
                $diffYears = strval(intval($currentYear)-intval($entryYear));
                break;
            default:
                $interval = $now->diff($date);
                $diffYears = $interval->format('%y');
                break;
        }

        return $diffYears;
    }
}

