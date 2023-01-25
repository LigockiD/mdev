install:
	sh ./install.sh

migrate:
	docker compose exec -T mdev-php php bin/console doctrine:migrations:diff --no-interaction
	docker compose exec -T mdev-php php bin/console doctrine:migrations:migrate --no-interaction


composer_install:
	COMPOSER_ALLOW_SUPERUSER=1 docker compose exec -T mdev-php composer self-update
	COMPOSER_ALLOW_SUPERUSER=1 docker compose exec -T mdev-php composer install --no-interaction --classmap-authoritative --optimize-autoloader

composer_update:
	COMPOSER_ALLOW_SUPERUSER=1 docker compose exec -T mdev-php composer self-update
	COMPOSER_ALLOW_SUPERUSER=1 docker compose exec -T mdev-php composer update --no-interaction --classmap-authoritative --optimize-autoloader

build:
	docker compose -f docker-compose.yml build

start:
	docker compose -f docker-compose.yml up -d

stop:
	docker compose stop

down:
	docker compose down
	
execphp:
	docker compose exec mdev-php bash

execdb:
	docker compose exec mdev-db bash
