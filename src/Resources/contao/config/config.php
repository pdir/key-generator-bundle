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

$GLOBALS['TL_HOOKS']['executePreActions'][] = ['Pdir\KeyGeneratorBundle\KeyGenerator', 'generateKey'];
