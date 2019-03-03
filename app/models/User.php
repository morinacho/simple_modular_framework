<?php  

	class User{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}

		public function cargar(){
			
		}

		public function getByEmail($email){
			$email =  $this->db->deleteSpecialChars($email,'email'); 
			$this->db->query('SELECT * FROM  user WHERE user_email = :email');
			$this->db->bind(':email', $email);

			$response = $this->db->getRecord();
			return $response;
		}
	}

 ?>
