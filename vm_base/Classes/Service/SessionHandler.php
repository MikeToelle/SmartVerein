<?php
namespace Typo3graf\VmBase\Service;
/***
 *
 * This file is part of the "Vereinsmeier - Base module" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Typo3graf Developer-Team <development@typo3gtraf.de>
 *
 ***/

class SessionHandler implements \TYPO3\CMS\Core\SingletonInterface {

    private $prefixKey = 'oldMember_';

    /**
     * Returns the object stored in the user´s PHP session
     * @return Object the stored object
     */
    public function restoreFromSession($key) {
        $sessionData = $GLOBALS['TSFE']->fe_user->getKey('ses', $this->prefixKey . $key);
        return unserialize($sessionData);
    }

    /**
     * Writes an object into the PHP session
     * @param    $object any serializable object to store into the session
     * @return   \Typo3graf\VmBase\Service\SessionHandler
     */
    public function writeToSession($object, $key) {
        $sessionData = serialize($object);
        $GLOBALS['TSFE']->fe_user->setKey('ses', $this->prefixKey . $key, $sessionData);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        return $this;
    }

    /**
     * Cleans up the session: removes the stored object from the PHP session
     * @return   \Typo3graf\VmBase\Service\SessionHandler
     */
    public function cleanUpSession($key) {
        $GLOBALS['TSFE']->fe_user->setKey('ses', $this->prefixKey . $key, NULL);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        return $this;
    }

    public function setPrefixKey($prefixKey) {
        $this->prefixKey = $prefixKey;
    }

}
