git add . && git commit -m "c" && git push

git init

.env подключение к бд с серт

копируем серт

правим датабайс конфиг

публикуем корсы
php artisan config:publish cors
'paths' => ['api/*', 'graphql', 'sanctum/csrf-cookie'],

подключаем роут для проверки бд

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'База данных подключена!!!';
    } catch (\Exception $e) {
        return 'Unable to connect to the database: ' . $e->getMessage();
    }
});
Проверяем подключение

Устанавливаем лайтхаус
composer require nuwave/lighthouse

<!-- че за нах?
> @php artisan vendor:publish --tag=laravel-assets --ansi --force
No publishable resources for tag [laravel-assets]. -->

публикуем схему
php artisan vendor:publish --tag=lighthouse-schema


устанавливаем графи
composer require mll-lab/laravel-graphiql

appServiceProvider

php artisan serve

--------
Склонировать репозиторий

Прописать два .env 


sudo docker run --rm -v $(pwd):/app composer install --ignore-platform-reqs

sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache

sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache

cd ..
sudo docker-compose up --build -d
