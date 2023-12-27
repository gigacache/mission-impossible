install:
	composer update

update:
	composer update

run-tests:
	./vendor/bin/phpunit test

nuke:
	rm -rf vendor
	rm -rf composer.lock
