<?php

	class Pay extends Controller{
		public function get_pay(){
			//Se pueden cargar N modelos en un controlador gestionando conexiones indepnedientes a una bd particular.
			
			$this -> load -> model("modelo1");
			$this -> modelo1 -> connection_set("MYSQL1");
	
			$resultado = $this -> modelo1 -> obtenerUsuario();

			foreach($resultado as $row){
				echo $row["nombre"];
			}
		}





		public function post_pay(){
			
		}
	}
?>