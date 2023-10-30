<?php
    namespace app\entities\auth\model;
    use app\core\DataBase;

    class Auth{
        private $db;

        public function __construct(){
            $this->db = new DataBase;
        }

        public function getAuth($username){
            $username = $this->db->deleteSpecialChars($username, 'char');
            $this->db->query('
                SELECT username, password, token, user_rol_id, personal_information_id
                FROM people.users
                WHERE username = :username
            '); 

            $this->db->bind(':username', $username);
            return $this->db->getRecord(); 
        }
    }

?>
