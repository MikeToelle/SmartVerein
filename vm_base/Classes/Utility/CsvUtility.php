<?php

namespace Typo3graf\VmClub\Utility;

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

abstract class CsvUtility
{
    public static function convertToUtf8Charset($string) {
       $string = trim($string);
       $charset =  mb_detect_encoding(
            $string,
            "UTF-8, ISO-8859-1, ISO-8859-15, Windows-1252",
            true
        );
        if ($charset != 'UTF-8') {
            $string = mb_convert_encoding($string, "UTF-8", $charset);
        }
        return $string;
    }
}
