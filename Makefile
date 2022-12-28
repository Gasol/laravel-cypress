#

PHPUNIT	:= ./vendor/bin/phpunit

all: test

test:
	$(PHPUNIT)

act:
	act -P ubuntu-22.04=shivammathur/node:2204

.PHONY: all test
