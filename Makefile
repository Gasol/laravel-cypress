#

PHPUNIT	:= ./vendor/bin/phpunit

all: test

test:
	$(PHPUNIT)

.PHONY: all test
