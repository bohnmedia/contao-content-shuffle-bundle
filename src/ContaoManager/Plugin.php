<?php

namespace BohnMedia\ContentShuffleBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use BohnMedia\ContentShuffleBundle\ContentShuffleBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContentShuffleBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}