<?php
    namespace app\entities\users\controller;
    use app\core\Controller;

    class Users extends Controller{

        public function __construct(){
			parent::__construct(); 
		}

        public function index(){
            return $this->view('index',['title' => 'Nup - people']);
        }
    }
?>