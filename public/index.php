<?php

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'bootstrap.php';
use Illuminate\Pagination\Paginator;
use \Symfony\Component\VarDumper\VarDumper;
use App\Router\Router;

Router::get('/', 'MainController@index');

// Home routes
Router::get('/login', 'MainController@login');
Router::get('/register', 'MainController@create');

Router::post('/store', 'UserController@store');
Router::post('/create', 'UserController@create');
Router::post('/logout', 'UserController@logout');

Router::get('/reserver/[i:id]', 'ReservationController@store');

// For Client
Router::get('/profile', 'ClientController@profile');
Router::get('/profile/settings', 'ClientController@settings');
Router::get('/c/coachs', 'ClientController@coachs');




// For Coach
Router::get('/coachs', 'CoachController@index');
Router::get('/coach/[i:id]', 'CoachController@show');
Router::get('/coach/dashboard', 'CoachController@dashboard');
Router::get('/coach/profile/settings', 'CoachController@settings');
Router::get('/coach/clients', 'CoachController@clients');
Router::get('/coach/seances', 'CoachController@seances');
Router::get('/client/profile', 'ClientController@show');

// Others
Router::get('/about-us', 'MainController@aboutUs');
Router::get('/cgu', 'MainController@cgu');
Router::get('/faqs', 'MainController@faqs');
Router::get('/passwordreset', 'MainController@passwordreset');

// SEANCE 
Router::get('/confirmer/[i:id]', 'SeanceController@confirmer');
Router::get('/annuler/[i:id]', 'SeanceController@annuler');
Router::get('/terminer/[i:id]', 'SeanceController@terminer');
Router::run();