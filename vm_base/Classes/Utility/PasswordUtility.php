<?php

namespace Typo3graf\VmBase\Utility;

/***
 *
 * This file is part of the "Vereinsmeier - Base" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3graf.de>
 *
 ***/

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Saltedpasswords\Salt\SaltFactory;
use TYPO3\CMS\Saltedpasswords\Utility\SaltedPasswordsUtility;

abstract class PasswordUtility{

    /**
     * encrypt Password
     * @param $password
     * @return $selectOptions
     */
    public static function encryptPassword($password){
        if (ExtensionManagementUtility::isLoaded('saltedpasswords') && SaltedPasswordsUtility::isUsageEnabled('FE')) {
            $saltObject = SaltFactory::getSaltingInstance(null);
            if (is_object($saltObject)) {
                $password = $saltObject->getHashedPassword($password);
            }
        }
        return $password;
    }

    public static function generatePassword($length = 12, $available_sets = 'luns')
    {
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghijklmnopqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if(strpos($available_sets, 'n') !== false)
            $sets[] = '0123456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '~!@#$%^&*()-+[]{}<>?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        return $password;
    }

}
