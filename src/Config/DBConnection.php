<?php

namespace App\Config;

use Illuminate\Database\Capsule\Manager as Capsule;

class DBConnection
{

    public function __construct()
    {

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => Env::getEnv('DB_DRIVER'),
            'host' => Env::getEnv('DB_HOST'),
            'database' => Env::getEnv('DB_DATABASE'),
            'username' => Env::getEnv('DB_USERNAME'),
            'password' => Env::getEnv('DB_PASSWORD'),
            'port' => Env::getEnv('DB_PORT'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->bootEloquent();

    }
}
  