<?php
    namespace App\Config;
    use \PDO;
    class Config {
        private static $instance = null;
        private $pdo;
        private function __construct(){
            $this->pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        }
        public static function getInstance(){
            if(self::$instance == null){
                self::$instance = new Config();
            }
            return self::$instance;
        }
        public function getPDO(){
            return $this->pdo;
        }
    }