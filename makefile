install:
	composer install

update:
	composer update

run-all-tests:
	make run-unit-tests
	make run-static-analysis

run-unit-tests:
	./vendor/bin/phpunit test

run-static-analysis:
	./vendor/bin/php-cs-fixer fix  --diff --dry-run

nuke:
	rm -rf vendor
	rm -rf composer.lock
