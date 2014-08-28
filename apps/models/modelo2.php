<?php
	class Modelo2 extends Model{
		//Aqui iran todos los metodos que se encargaran de la extraccion de datos	

		public function obtenerUsuario(){
			$this -> db -> get("select * from user");
			return $this -> db -> dbs_rows;

			echo "SIII";
		}

		public function eliminarUsuario(){
			//$obj -> db -> get("select * from user");
			//return $obj -> db -> dbs_rows;
		}


	}
?>