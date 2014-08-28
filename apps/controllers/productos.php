<?php

	class Productos extends Controller{
		public function get_productos(){
			//**********************************************************************************
			//Carga de modelo y se establece  la instancia de bd a utilizar
			$this -> load -> model("productos_model");
			$this -> productos_model -> connection_set("MYSQL1");
			//**********************************************************************************
			
			/*
			Se queda en espera de permisos para ejecutar query DESCRIBE en base de datos
			$helper = new valida();
			$helper->validate(array('correo'));
			*/

			//**********************************************************************************
			//Cargamos el heper vaidateDate
			$this -> load -> helper("validateDate");

			//Validamos un dato  con ayuda  del helper
 			/*if(!$this -> validateDate -> telefono(234567890)){
 				ResponseHTTP::getResponse(101, $this -> validateDate -> get_error_message());
 			}
 			//*********************************************************************************
			*/

 			//*********************************************************************************
 			//Obtenemos datos desde  el modelo
			$datos = $this -> productos_model -> obtener_usuarios(); 

			//Preparamos los datos para enviarlos a la vista
			$datos["response"] = json_encode($datos);
			//*********************************************************************************
			var_dump($this -> url -> get_params());

			//*********************************************************************************
			//Cargamos la vista y le enviamos los datos que mostrara
 			$this -> load -> view("productos_view", $datos);
 			//*********************************************************************************
		}

		public function put_productos(){
			var_dump($this -> url -> get_query());
		}

		public function delete_productos(){
			var_dump($this -> url -> get_query());
		}

		public function post_productos(){
			var_dump($this -> url -> get_query());
		}
	}
?>