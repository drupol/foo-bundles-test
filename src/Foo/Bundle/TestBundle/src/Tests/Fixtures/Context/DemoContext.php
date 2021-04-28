<?php

# tests/Behat/DemoContext.php

namespace Foo\TestBundle\Tests\Fixtures\Context;
// If using Symfony 3, use namespace "Tests\Behat" instead

use Behat\Behat\Context\Context;

final class DemoContext implements Context
{
    /** @var string */
    private $environment;

    public function __construct(string $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @Then the application's kernel should use :expected environment
     */
    public function kernelEnvironmentShouldBe(string $expected): void
    {
        if ($this->environment !== $expected) {
            throw new \RuntimeException();
        }
    }
}
