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

namespace Pdir\KeyGeneratorBundle\Tests;

use Pdir\KeyGeneratorBundle\PdirKeyGeneratorBundle;
use PHPUnit\Framework\TestCase;

class PdirKeyGeneratorBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new PdirKeyGeneratorBundle();

        $this->assertInstanceOf('Pdir\KeyGeneratorBundle\PdirKeyGeneratorBundle', $bundle);
    }
}
