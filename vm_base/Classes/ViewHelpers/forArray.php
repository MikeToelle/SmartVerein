<?php

namespace Typo3graf\VmBase\ViewHelpers;

class ForArrayViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Beschreibung der Methode
     *
     * @param array $array zu durchlaufendes array
     * @param int $counter Counter
     * @return string
     *
     */
    public function render( $array, $counter ) {
        return $array[$counter];
    }
}
?>
