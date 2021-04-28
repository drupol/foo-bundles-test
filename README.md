# Foo Bundles

`Foo Bundles` is a proof-of-concept repository containing bundles and their
tests.

4 types of tests are implemented:

- Unit
- Functional
- Application
- Behat

The purpose of this repository is to test the feasibility of having multiple
Symfony bundles into one project (*monorepo*) and be able to test them
individually.

## Usage

1. `composer install`
2. `./vendor/bin/phpunit -c src/Foo/Bundle/TestBundle/phpunit.xml.dist  src/Foo/Bundle/TestBundle/`

## Run the tests

### Unit tests

```shell
vendor/bin/phpunit -c src/Foo/Bundle/TestBundle/phpunit.xml.dist  src/Foo/Bundle/TestBundle/src/Tests/Unit
```

### Functional tests

```shell
vendor/bin/phpunit -c src/Foo/Bundle/TestBundle/phpunit.xml.dist  src/Foo/Bundle/TestBundle/src/Tests/Functional
```

### Integration tests

```shell
vendor/bin/phpunit -c src/Foo/Bundle/TestBundle/phpunit.xml.dist  src/Foo/Bundle/TestBundle/src/Tests/Integration
```

### Behat tests

```shell
vendor/bin/behat -c src/Foo/Bundle/TestBundle/behat.yaml.dist
```
