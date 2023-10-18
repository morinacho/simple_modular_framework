<?php
    namespace app\entities\main\controller;
    use app\core\Controller;
    
    class Main extends Controller{
        public function index(){
            return $this->view('home',['title' => 'Hello index']);
        }

        public function contact(){
            return $this->view('home',['title' => 'Hello contact']);
        }
    }
?>