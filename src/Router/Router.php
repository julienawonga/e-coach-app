<?php
    namespace App\Router;
    use \AltoRouter;

    class Router {

        private static $router = null;

        public static function init(){
            if(self::$router == null){
                self::$router = new AltoRouter();
            }
        }

        public static function get($path, $target) {
            self::init();
            self::$router->map('GET', $path, $target);
           
        }

        public static function post($path, $target) {
            self::init();
            self::$router->map('POST', $path, $target); 
        }

        public static function run(){
            $match = self::$router->match();
            if($match) {
                $target = explode('@', $match['target']);
                $controller = 'App\\Controllers\\' . $target[0];
                $method = $target[1];
                $params = Array($match['params'], $_POST);
                call_user_func_array([new $controller(), $method], $params);
            }
        }

    }