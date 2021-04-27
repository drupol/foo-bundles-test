<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Foo\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Foo
{
    /**
     * @Route("/foo")
     */
    public function __invoke(): Response
    {
        return new Response('Hello world');
    }
}
