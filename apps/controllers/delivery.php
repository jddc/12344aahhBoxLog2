<?php

	class Delivery extends Controller {
		public function get_delivery(){
			$this -> load -> model("delivery_model");
			$this -> delivery_model -> connection_set("MYSQL1");
			$datos = $this -> delivery_model -> obtener_usuarios();

			foreach($datos as $row){
				echo $row["nombre"];
			}
		}

		public function post_delivery(){
			//$this -> load -> model("productos_model");
			//$this -> productos_model -> connection_set("MYSQL1");
			//$datos = $this -> productos_model -> obtener_usuarios(); 

			//foreach($datos as $row){
			//	echo $row["nombre"];
			//}
		}
	}
?>