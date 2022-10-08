Laravel project use docker , docker compose for laravel 8 , php 8

docker-compose up
## to rebuild cintainer after changes
docker-compose up --build
## to go to container 
docker-compose exec php-apache-environment sh
## migrate files
php artisan migrate
## notice in .env depending on info in db container 
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel-db
DB_USERNAME=root
DB_PASSWORD=

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
