<?php

declare(strict_types=1);

use Foo\TestBundle\Controller\Foo;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes) {
    $routes
        ->add('foo_bundle_homepage', '/foo')
        ->controller(Foo::class);
};
