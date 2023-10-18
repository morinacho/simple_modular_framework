<?php
    namespace app\core;
    
    class Controller{
        private $class;

        public function __construct(){
            $this->class = strtolower(get_class($this));
            
        }

        # Load view
        public function view($route, $param = []){
            session_start();

            extract($param); # Destructuracion de array
            $route = str_replace('.','/',$route);

            if(self::authenticated()){
                if(file_exists("../resources/views/{$route}.php")){
                    ob_start();
                    include "../resources/views/{$route}.php";
                    return ob_get_clean();
                }
                else{
                    return "File $route not found";     # Page not found
                }
            }
            else{
                return "public Login"; #public page not login pages
            }
        }

        public static function authenticated(){
			return (isset($_SESSION['username']));
		}
    }
?>