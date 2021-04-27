<?php

namespace Foo\TestBundle\Tests\Fixtures\App;

use Foo\TestBundle\FooTestBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
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
        ];

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader) { }


    protected function configureContainer(ContainerConfigurator $container, LoaderInterface $loader): void
    {
        $container->setParameter('kernel.project_dir', __DIR__);

        $loader->load(__DIR__ . "/config/config_{$this->getEnvironment()}.yml");

        $container->prependExtensionConfig(
            'framework',
            [
                'secret' => 'dunglas.fr',
                'validation' => ['enable_annotations' => true],
                'serializer' => ['enable_annotations' => true],
                'test' => true,
                'session' => class_exists(SessionFactory::class) ? ['storage_factory_id' => 'session.storage.factory.mock_file'] : ['storage_id' => 'session.storage.mock_file'],
                'profiler' => [
                    'enabled' => true,
                    'collect' => false,
                ],
                'messenger' => [
                    'default_bus' => 'messenger.bus.default',
                    'buses' => [
                        'messenger.bus.default' => ['default_middleware' => 'allow_no_handlers'],
                    ],
                ],
                'router' => ['utf8' => true],
            ]
    );
    }

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        $routes->import(__DIR__ . "/config/routing_{$this->getEnvironment()}.yml");
    }
}
