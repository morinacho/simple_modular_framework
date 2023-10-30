<?php
    namespace app\entities\main\controller;
    use app\core\Controller;
    
    class Main extends Controller{
        
        public function __construct(){
            parent::__construct();
        }

        public function index(){
            return $this->view('index',['title' => 'Nup - Home']);
        }
    }
?>