<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Foo\TestBundle\Tests\Integration\Service;

use Foo\TestBundle\Service\ResponseAlter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @internal
 * @coversNothing
 */
final class ResponseAlterTest extends KernelTestCase
{
    public function testSomething()
    {
        self::bootKernel();

        $container = self::$container;

        $service = $container->get('foo_test_bundle.response_alter');

        self::assertInstanceOf(ResponseAlter::class, $service);
    }
}
