<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Foo\TestBundle\Service\ResponseAlter;

return static function (ContainerConfigurator $container) {
    $container
        ->services()
        ->set('foo_test_bundle.response_alter', ResponseAlter::class)
        ->autowire(true)
        ->autoconfigure(true);
};
