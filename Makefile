brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

brain-calc:
	./bin/brain-calc

validate:
	composer validate

lint:
    composer run-script phpcs -- --standard=PSR12 src bin

docker-lint:
	docker run --rm -v $(PWD):/app -w /app composer:latest make lint

docker-install:
	docker run --rm -v $(PWD):/app -w /app -u $(id -u) composer:latest composer install