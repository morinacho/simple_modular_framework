<?php
    namespace app\entities\auth\controller;

    use app\core\Controller;

    class Auth extends Controller{
        

        public static function authenticated(){
			return (isset($_SESSION['username']));
		}
    }
?>