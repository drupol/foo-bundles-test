<?php

namespace Foo\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

final class Foo
{
    public function __invoke(): Response
    {
        return new Response('Hello world');
    }
}
