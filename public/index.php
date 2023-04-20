<?php
    require '../vendor/autoload.php';

    use App\Router\Router;

    Router::get('/', 'HomeController@index');

    Router::get('/login', 'UserController@login');
    Router::get('/register', 'UserController@create');

    Router::get('/user/[a:user]', 'UserController@show');

    Router::get('/about-us', 'HomeController@aboutUs');
    Router::get('/cgu', 'HomeController@cgu');
    Router::get('/faqs', 'HomeController@faqs');
    
    Router::run();