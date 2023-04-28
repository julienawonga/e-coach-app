<?php
    require '../vendor/autoload.php';

    use App\Router\Router;
    use \Twig\Loader\FilesystemLoader;
    use \Twig\Environment;

    Router::get('/', 'MainController@index');

    Router::get('/login', 'MainController@login');
    Router::get('/register', 'MainController@create');

    Router::get('/user/[i:id]', 'ClientController@show');

    Router::get('/save', 'UserController@store');

    Router::get('/coach/[i:id]', 'CoachController@show');
    Router::get('/coach/c', 'CoachController@client');

    Router::get('/about-us', 'MainController@aboutUs');
    Router::get('/cgu', 'MainController@cgu');
    Router::get('/faqs', 'MainController@faqs');
    
    Router::run();