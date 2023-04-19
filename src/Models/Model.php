<?php
    namespace App\Models;
    use \PDO;
    
    class Model {
        private static $pdo = null;

        private static function init(): void{
            if(self::$pdo==null){
                self::$pdo = new PDO();
            }
        } 

        public function All(){
            self::init();
            self::$pdo->prepare(`SELECT * FROM `);
        }
    }