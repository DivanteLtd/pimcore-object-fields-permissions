MIN_COVERED_MSI:=100
MIN_MSI:=100

.PHONY: it
it: coding-standards dependency-analysis static-code-analysis tests ## Runs the coding-standards, dependency-analysis, static-code-analysis, and tests targets

.PHONY: code-coverage
code-coverage: vendor ## Collects coverage from running unit tests with phpunit/phpunit
	vendor/bin/phpunit --configuration=test/Unit/phpunit.xml --coverage-text

.PHONY: coding-standards
coding-standards: vendor ## Fixes code style issues with friendsofphp/php-cs-fixer
	mkdir -p .build/php-cs-fixer
	vendor/bin/php-cs-fixer fix --config=.php_cs --diff --diff-format=udiff --verbose

.PHONY: dependency-analysis
dependency-analysis: vendor ## Runs a dependency analysis with maglnet/composer-require-checker
	docker run --interactive --rm --tty --volume ${PWD}:/app webfactory/composer-require-checker:2.0.0

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: mutation-tests
mutation-tests: vendor ## Runs mutation tests with infection/infection
	mkdir -p .build/infection
	vendor/bin/infection --ignore-msi-with-no-mutations --min-covered-msi=${MIN_COVERED_MSI} --min-msi=${MIN_MSI}

.PHONY: static-code-analysis
static-code-analysis: vendor ## Runs a static code analysis with phpstan/phpstan and vimeo/psalm
	mkdir -p .build/phpstan
	vendor/bin/phpstan analyse --configuration=phpstan.neon
	mkdir -p .build/psalm
	vendor/bin/psalm --config=psalm.xml --show-info=false --stats

.PHONY: static-code-analysis-baseline
static-code-analysis-baseline: vendor ## Generates a baseline for static code analysis with phpstan/phpstan and vimeo/psalm
	mkdir -p .build/phpstan
	echo '' > phpstan-baseline.neon
	vendor/bin/phpstan analyze --configuration=phpstan.neon --error-format=baselineNeon > phpstan-baseline.neon || true
	mkdir -p .build/psalm
	vendor/bin/psalm --config=psalm.xml --set-baseline=psalm-baseline.xml

.PHONY: tests
tests: vendor ## Runs auto-review, unit, and integration tests with phpunit/phpunit
	mkdir -p .build/phpunit
	vendor/bin/phpunit --configuration=tests/Unit/phpunit.xml

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress --no-suggest
	composer normalize
