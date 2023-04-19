<?php
    namespace App\Models;
    
    class UserModel extends Model {
        private int $id;
        private string $fistName;

        public function __constructor(int $id, string $fistName){
            $this->id = $id;
            $this->fistName = $fistName;
        }

        public function getId(): int{
            return $this->id;
        }
        public function setId(int $int): void{
            $this->id = $id;
        }

        public function getFistName(): string{
            return $this->fistName;
        }

        public function setFistName(string $fistName): void{
            $this->fistName = $fistName;
        }

    }