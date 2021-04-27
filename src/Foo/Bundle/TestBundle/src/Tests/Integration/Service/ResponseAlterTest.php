<?php

namespace Foo\TestBundle\Tests\Integration\Service;

use Foo\TestBundle\Service\ResponseAlter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class ResponseAlterTest extends KernelTestCase
{
    public function testSomething()
    {
        self::bootKernel();

        $container = self::$container;

        $service = $container->get('foo_test_bundle.response_alter');

        $this->assertInstanceOf(ResponseAlter::class, $service);

    }
}
