
default:
	docker-compose up

build:
	docker-compose build app
	docker-compose build db

composer:
	docker-compose exec app composer install

migrate:
	docker-compose exec app php artisan migrate

seed:
	docker-compose exec app php artisan db:seed

key:
	docker-compose exec app php artisan key:generate

o:
	docker-compose exec app php artisan optimize

art:
	docker-compose exec app php artisan ${q}

init:
	make composer && make key

down:
	docker-compose down

admin:
	docker-compose exec app php artisan serve

network:
	docker network create elearning-network

npm:
	docker-compose exec app npm install
