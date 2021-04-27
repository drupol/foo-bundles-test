# Foo Bundles

`Foo Bundles` is a proof-of-concept repository containing bundles and their
tests.

3 types of tests are implemented: Unit, Functional and Application.

The purpose of this repository is to test the feasibility of having multiple
Symfony bundles into one project (monorepo) and be able to test them
individually.

## Usage

1. `composer install`
2. `./vendor/bin/phpunit -c src/Foo/Bundle/TestBundle/phpunit.xml.dist  src/Foo/Bundle/TestBundle/`
