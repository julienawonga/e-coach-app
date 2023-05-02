<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use \Symfony\Component\VarDumper\VarDumper;
use App\Router\Router;


Router::get('/', 'MainController@index');

// Home routes
Router::get('/login', 'MainController@login');
Router::get('/register', 'MainController@create');

Router::post('/store', 'UserController@store');
Router::post('/create', 'UserController@create');
Router::post('/logout', 'UserController@logout');

// For Client
Router::get('/me', 'ClientController@index');
Router::get('/profile', 'ClientController@show');
Router::get('/profile/settings', 'ClientController@settings');
Router::get('/chat', 'ClientController@chat');
Router::get('/messages', 'ClientController@messages');



// For Coach
Router::get('/coachs', 'CoachController@index');
#Router::get('/coach/me', 'CoachController@index');
Router::get('/coach/[i:id]', 'CoachController@show');
Router::get('/coach/dashboard', 'CoachController@dashboard');
Router::get('/coach/profile/settings', 'CoachController@settings');
Router::get('/coach/clients', 'CoachController@client');
Router::get('/coach/messages', 'CoachController@messages');
Router::get('/coach/chat', 'CoachController@messages');
Router::get('/client/profile', 'ClientController@show');

// Others
Router::get('/about-us', 'MainController@aboutUs');
Router::get('/cgu', 'MainController@cgu');
Router::get('/faqs', 'MainController@faqs');

Router::run();