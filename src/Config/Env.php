<?php

namespace App\Config;

use Dotenv\Dotenv;

class Env
{
    public static function getEnv($key)
    {
        self::loadEnv();
        return $_ENV[$key];
    }

    public static function loadEnv()
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();
    }
}