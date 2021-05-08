.PHONY: all up down bash logs horizon-up horizon-down scheduler-up scheduler-down xdebug-up xdebug-down init-db clear-app

all:

up: down
	docker compose up -d
	docker compose exec app php artisan optimize:clear
down:
	docker compose down
bash:
	docker compose exec app bash
logs:
	docker compose logs -f app
horizon-up:
	docker compose exec app supervisorctl start horizon
horizon-down:
	docker compose exec app supervisorctl down horizon
scheduler-up:
	docker compose exec app supervisorctl start scheduler
scheduler-down:
	docker compose exec app supervisorctl stop scheduler
xdebug-up:
	docker compose exec app composer xdebug-enable
xdebug-down:
	docker compose exec app composer xdebug-disable
init-db:
	docker compose exec app php artisan migrate:install
	docker compose exec app php artisan migrate
	docker compose exec app php artisan db:seed
clear-app:
	docker compose exec app php artisan optimize:clear
