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

namespace Pdir\KeyGeneratorBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Pdir\KeyGeneratorBundle\PdirKeyGeneratorBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(PdirKeyGeneratorBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['KeyGenerator']),
        ];
    }
}
