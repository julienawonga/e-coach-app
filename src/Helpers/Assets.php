<?php
    namespace App\Helpers;
    use App\Config\Env;

    class Assets {
        public static function assets() : string {
            return Env::getEnv('APP_URL');
        }
    }