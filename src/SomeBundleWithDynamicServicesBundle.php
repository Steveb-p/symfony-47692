<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class SomeBundleWithDynamicServicesBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/Resources/config')
        );

        if ($container->hasExtension('framework')) {
            $loader->load('services/foo.yaml');
        }
    }
}
