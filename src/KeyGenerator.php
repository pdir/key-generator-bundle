<?php

/*
 * Key generator wizard bundle for Contao Open Source CMS.
 *
 * @copyright  Sebastian Tilch 2012
 * @author     Sebastian Tilch
 * @copyright  Copyright (c) 2019, pdir GmbH
 * @author     Mathias Arzberger <https://pdir.de>
 * @license    LGPL
 */

namespace Pdir\KeyGeneratorBundle;

/**
 * KeyGenerator handles the ajax Request and provides the wizard HTML String.
 */
class KeyGenerator extends \Backend
{
    /**
     * This method generates a key if the action is "generateKey".
     *
     * @param string $strAction The trigger action
     */
    public function generateKey($strAction)
    {
        if ('generateKey' === $strAction) {
            // return generated key
            header('Content-Type: text/plain');
            echo KeyProvider::getKey(\Input::getInstance()->post('name'), \Input::getInstance()->post('maxlength'));
            exit;
        }
    }

    /**
     * This method replace the key with a new generated one if it is not set and returns it.
     *
     * @param string         $strValue current field value
     * @param \DataContainer $dc       DataContainer
     */
    public function setKeyIfEmpty($strValue, \DataContainer $dc)
    {
        if (\strlen($strValue)) {
            return $strValue;
        }

        $this->loadDataContainer($dc->table);
        $intLength = $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['maxlength'];

        return KeyProvider::getKey($dc->field, $intLength);
    }

    /**
     * This method returns the wizard HTML String and inserts some JS to the header and body of the site.
     *
     * @return string HTML String
     */
    public function getWizard()
    {
        $GLOBALS['TL_JAVASCRIPT']['KeyGenerator'] = 'bundles/pdirkeygeneratorbundle/scripts/KeyGenerator.js';
        $GLOBALS['TL_MOOTOOLS']['KeyGenerator'] = '<script>var REQUEST_TOKEN="'.REQUEST_TOKEN.'"</script>';

        return 	'<img src="bundles/pdirkeygeneratorbundle/media/icon.gif" width="20" height="20" style="vertical-align:-6px;cursor:pointer" class="keygenerator" title="'.$GLOBALS['TL_LANG']['MSC']['keygenerator'].'">';
    }
}
