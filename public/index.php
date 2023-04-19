<?php
    require '../vendor/autoload.php';

    use App\Router\Router;

    Router::get('/', 'HomeController@index');

    Router::post('/register', 'HomeController@create');

    Router::run();