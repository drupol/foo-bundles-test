<?php

namespace Foo\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Foo
{
    /**
     * @Route("/")
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return new Response('Hello world');
    }
}
