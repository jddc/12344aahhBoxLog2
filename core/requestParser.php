<?php
	class RequestParser{
		private $request_url;
		private $id_controller;
		private $parameters = array();
		private $query;
		private $method;


		public function get_request(){
			return $this->request_url;
		}

		public function get_controller(){
			
			return $this->id_controller;
		}

		public function get_params(){
			return $this->parameters;
		}

		public function get_query(){
			return $this->query;
		}

		public function get_method(){
			return $this -> method;
		}

		public function path_segment(){

			$build = parse_url( $_SERVER['REQUEST_URI'] );
			$path = preg_replace( '/^\/+|\/+$/', '', $build[ 'path' ] );
			
			$segment_path = array_filter ( explode( '/', $path ), function( $value ){
				return ! empty( $value ) ;
			} );
				  
			//Se va a trabajar desde la posicion 1 de la path segmentada hasta que ya este en produccion se trabajara en la posicion 0
			if(isset($segment_path[1]))
				$this -> id_controller = $segment_path[1];	

			$this ->parameters["items"] = array_slice($segment_path, 2); 
			$this ->parameters["num_items"] = count($this ->parameters["items"]);
		}

		public function __construct(){
			$this -> request_url = $_SERVER['REQUEST_URI'];
			$this-> path_segment();

			$method = $_SERVER['REQUEST_METHOD'];

			switch($method) {
					case "GET":
						$this ->query["items"] = $_GET;
						$this ->query["num_items"] = count($_GET);
						$this -> method = "get_" . $this -> id_controller;
					break;
					case "POST":
						$this ->query["items"] = $_POST;
						$this ->query["num_items"] = count($_POST);
						$this -> method = "post_" . $this -> id_controller;
					break;
					case "PUT":
						$query = array();
						parse_str(file_get_contents('php://input'),$query);
						$this ->query["items"] = $query;
						$this ->query["num_items"] = count($query);
						$this -> method = "put_" . $this -> id_controller;
					break;
					case "DELETE":
						$query = array();
						parse_str(file_get_contents('php://input'), $query);
						$this ->query["items"] = $query;
						$this ->query["num_items"] = count($query);
						$this -> method = "delete_" . $this -> id_controller;
					break;
			}
		}

		/*
			Propiedades
			[string id_controlador]			
			[parametros]--> [array items][ int num_items]
			[query]--> [array items][int num_items] 
			
		*/
	}