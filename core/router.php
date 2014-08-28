<?php
	class Router{
		private $request_url;
		private $segmented_url;
		private $url;

		private function validate_url_format(){
			if(! preg_match("/^\/.*[[:alnum:]]$/", $this -> request_url)){
				//echo $this -> response -> getResponse(400, "La url no cuenta con un formato correcto");

				$file_standar_response = FILE_STANDAR_RESPONSE;

				$file_standar_response :: getResponse(101, "La url no cuenta con un formato correcto");
				exit;
			}
		}

		private function redirect_request(){
			$controller_id = $this -> url -> get_controller();
			$controller_file = APP_DIR . "/controllers/" . $controller_id . ".php";

			if(is_file($controller_file)){
				require_once($controller_file);
				
				$controller_class = ucfirst($controller_id);
				$controller = new $controller_class($this -> url);
				$controller_method = $this -> url -> get_method();
				
				if(method_exists($controller, $controller_method)){
					$controller -> $controller_method();
				}else{
					//echo $this -> response -> getResponse(400, "Este recurso no tiene disponible el envio de peticiones por el metodo $method.");

					ResponseHTTP :: getResponse(101, "Este recurso no tiene disponible el envio de peticiones por el metodo $method.");
				}

				//{"insert_" . segmented_url[1]}();
			}else{
				//echo $this -> response -> getResponse(404, "No existe el recurso solicitado");
				ResponseHTTP :: getResponse(101, "No existe el recurso solicitado");
				exit;
			}
		}

		function __construct(){
			//$this -> response = $response;
			/*Instanciamos a la clase UrlParser para crear un objeto que nos devuelva 
			un array con las propiedades separadas de la URL */
			$this -> url = new RequestParser();

			$this -> segmented_url = explode("/", substr($this -> request_url, 1));
			$this -> redirect_request();
		}

		function __destruct(){

		}
	}
?>