<?php

declare(strict_types=1);

namespace Foo\TestBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class FooControllerTest extends WebTestCase
{
    public function testFooController(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

       // Request a specific page
        $crawler = $client->request('GET', '/foo');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }
}
