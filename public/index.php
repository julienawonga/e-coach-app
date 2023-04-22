<?php
    require '../vendor/autoload.php';

    use App\Router\Router;

    Router::get('/', 'MainController@index');

    Router::get('/login', 'MainController@login');
    Router::get('/register', 'MainController@create');

    Router::get('/user/[i:id]', 'ClientController@show');
    Router::get('/coach/[i:id]', 'CoachController@show');

    Router::get('/about-us', 'MainController@aboutUs');
    Router::get('/cgu', 'MainController@cgu');
    Router::get('/faqs', 'MainController@faqs');
    
    Router::run();