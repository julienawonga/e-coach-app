<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use \Symfony\Component\VarDumper\VarDumper;
use App\Router\Router;


Router::get('/', 'MainController@index');

Router::get('/login', 'MainController@login');
Router::get('/register', 'MainController@create');

Router::get('/user/[i:id]', 'ClientController@show');

Router::post('/store', 'UserController@store');
Router::post('/create', 'UserController@create');

Router::get('/coach/[i:id]', 'CoachController@show');
Router::get('/coach/c', 'CoachController@client');

Router::get('/about-us', 'MainController@aboutUs');
Router::get('/cgu', 'MainController@cgu');
Router::get('/faqs', 'MainController@faqs');

Router::run();