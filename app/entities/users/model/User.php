<?php
    use app\core\DataBase;

    class User{
        private $db;

        public function __construct(){
            $this->db = new DataBase;
        }

        public function getUsername(){}
    }

?>