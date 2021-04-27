<?php

namespace Foo\TestBundle\Tests\Fixtures\App;

use Foo\TestBundle\FooTestBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function __construct(string $environment, bool $debug)
    {
        parent::__construct($environment, $debug);

        $this->environment = $_SERVER['APP_ENV'] ?? $environment;
    }

    public function getProjectDir()
    {
        return __DIR__;
    }

    public function registerBundles()
    {
        $bundles = [
            new FrameworkBundle(),
            new FooTestBundle(),
        ];

        return $bundles;
    }

    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->parameters()->set('kernel.project_dir', __DIR__);

        $container->extension(
            'framework',
            [
                'secret' => 'secret',
                'test' => true,
                'router' => ['utf8' => true],
                'secrets' => false
            ]
    );
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        //$routes->import(__DIR__ . "/config/routing_{$this->getEnvironment()}.yml");
    }
}
