<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Foo\TestBundle\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @internal
 * @coversNothing
 */
final class FooControllerTest extends WebTestCase
{
    public function testFooController(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = self::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/foo');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
    }
}
