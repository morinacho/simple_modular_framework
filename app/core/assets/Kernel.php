<?php  
	# Mapping url
	class Kernel{
		protected $activeController = 'Main';
		protected $activeMethod 	= 'index';
		protected $parameters 	    = '[]';

		# Constructor
		public function __construct(){ 
			$url = $this->getUrl(); 
			
			# Seach controller and set default controller 
			if (isset($url[0]) && file_exists('../app/'. strtolower($url[0]) .'/controller/' . ucwords($url[0]) . '.php')){
				$this->activeController = ucwords($url[0]);

				# Unset index
				unset($url[0]);
			} 
			
			require_once '../app/'. strtolower($this->activeController) .'/controller/' . $this->activeController . '.php';
			$this->activeController = new $this->activeController;

			# Check method
			if(isset($url[1])){
				if (method_exists($this->activeController, $url[1])){
					$this->activeMethod = $url[1];
					unset($url[1]);
				}
			}

			# Return parameters
			$this->parameters = $url ? array_values($url) : [];  

			# Callback array parameters
			call_user_func_array([$this->activeController, $this->activeMethod], $this->parameters);
		}
		
		# Get url
		public function getUrl(){ 
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);

				return $url;
			}
		}
	}
?>