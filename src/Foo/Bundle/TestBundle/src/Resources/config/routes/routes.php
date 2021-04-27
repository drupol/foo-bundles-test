<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

use Foo\TestBundle\Controller\Foo;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes) {
    $routes
        ->add('foo_bundle_homepage', '/foo')
        ->controller(Foo::class);
};
