<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Foo\TestBundle\Tests\Fixtures\App;

use Foo\TestBundle\FooTestBundle;
use FriendsOfBehat\SymfonyExtension\Bundle\FriendsOfBehatSymfonyExtensionBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return [
            new FriendsOfBehatSymfonyExtensionBundle(),
            new FooTestBundle(),
            new FrameworkBundle(),
        ];
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import(__DIR__ . '/config/services.yaml');

        $container->extension(
            'framework',
            [
                'secret' => 'secret',
                'test' => true,
                'router' => ['utf8' => true],
                'secrets' => false,
            ]
        );
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        foreach (glob(__DIR__ . '/config/routes/*.yaml') as $file) {
            $routes->import($file);
        }
    }
}
