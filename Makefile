help:
	@grep "^[a-zA-Z\-]*:" Makefile | grep -v "grep" | sed -e 's/^/make /' | sed -e 's/://'
init:
	@make destroy
	@make build
build:
	docker compose down
	docker compose up --build -d
	docker compose cp .env.example .env
	docker compose composer install --ignore-platform-req=ext-zip
	docker compose php artisan key:generate
	@make wait-for-mysql
	docker compose exec app composer dump-autoload
	docker compose exec app php artisan migrate:fresh
	docker compose exec app php artisan db:seed
	docker compose exec app php artisan jwt:secret
	docker compose ps
start:
	docker compose up -d
stop:
	docker compose stop
destroy:
	docker compose down --rmi all --volumes
wait-for-mysql:
	until (docker compose exec db mysqladmin ping &>/dev/null) do echo 'waiting for mysql wake up...' && sleep 3; done

exportapi:
	docker compose exec app php artisan laravel-request-docs:export