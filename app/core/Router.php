<?php
    namespace app\core;

    class Router{
        private static $routes = [];

        public static function get($uri, $callback){ 
            self::$routes['GET'][$uri] = $callback;
        }

        public static function post($uri, $callback){ 
            self::$routes['POST'][$uri] = $callback;
        }

        public static function dispatch(){ 
            $method = $_SERVER['REQUEST_METHOD']; 
            $uri = ""; 
            $url = trim($_SERVER['REQUEST_URI'], '/');      # Recupero la url ingresada
            $url = filter_var($url, FILTER_SANITIZE_URL);   # Se aplica filtro para mayor seguridad
            $url = explode('/', $url);                      # Se divide la url 

            for($i=0; $i<1; $i++) array_shift($url);        # Se quita los primeros elementos
            foreach ($url as $value) $uri .= "/$value";     # Se concatena para formar la uri 
            $uri = $uri === '' ? '/' : $uri;                # Compruebo de que la raiz este incluido (/)
            
            foreach(self::$routes[$method] as $route => $callback){ 
                $route = strpos($route, ':') ? preg_replace('#:[a-zA-Z0-9]+#', '([a-zA-Z0-9]+)', $route) : $route;  # Verificamos si se enviaron parametros
        
                if(preg_match("#^$route$#", $uri, $matches)){
                    $params = array_slice($matches, 1);
        
                    if(is_callable($callback)) 
                        $response = $callback(...$params);
                    
                    if(is_array($callback)){
                        $controller = new $callback[0];
                        $response = $controller->{$callback[1]}(...$params);
                    } 

                    if(is_array($response) || is_object($response)){
                        header('Content_Type: application/json');
                        echo json_encode($response);
                    }
                    else { echo $response; }
                    return;
                }
            } 

            echo "404: $uri not found";            
            # echo $_SERVER['SERVER_NAME']; <= Muestra el nombre del servidor, para aplicar en la direccion de la app
        }
    }
?>