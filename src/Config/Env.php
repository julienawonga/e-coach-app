<?php

namespace App\Config;

use Dotenv\Dotenv;

class Env
{
    public static function getEnv($key)
    {
        // if(!isset($_ENV[$key])) {
        //     throw new \Exception("The key $key is not defined in the .env file");
        // }
        self::loadEnv();
        return $_ENV[$key];
    }

    public static function loadEnv()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();
    }
}