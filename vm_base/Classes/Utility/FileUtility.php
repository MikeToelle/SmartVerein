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

abstract class FileUtility{

    /**
     * ersetzt Sonderzeichen in Filenames
     * @param $string
     * @return string
     */
    public static function ChangeSpecialCharacters($string)
    {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´");
        $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "");
        return str_replace($search, $replace, $string);
    }
}
