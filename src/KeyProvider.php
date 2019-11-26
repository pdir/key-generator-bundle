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
 * KeyProvider.
 */
class KeyProvider extends \System
{
    /**
     * returns a key.
     *
     * @param string $strFieldname fieldname
     * @param int    $intLength    length of the key
     *
     * @return string generated key
     */
    public static function getKey($strFieldname = '', $intLength = 0)
    {
        // HOOK: search for extern genenerator
        if (isset($GLOBALS['TL_HOOKS']['generateKey']) && \is_array($GLOBALS['TL_HOOKS']['generateKey'])) {
            foreach ($GLOBALS['TL_HOOKS']['generateKey'] as $callback) {
                $strKey = $callback[0]::$callback[1]($strFieldname, $intLength);
                if ($strKey) {
                    return $strKey;
                }
            }
        }

        // Default Key Generator
        $strCharPool = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789');
        $intPoolLength = \strlen($strCharPool) - 1;
        // if the length is not set, we will generate a key with 40 chars
        if (0 === $intLength) {
            $intLength = 40;
        }
        $strKey = '';
        for ($i = 0; $i < $intLength; ++$i) {
            $strKey .= substr($strCharPool, rand(0, $intPoolLength), 1);
        }

        return $strKey;
    }
}
