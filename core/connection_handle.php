<?php

	class ConnectionHandle{
		private static $connects;

		public static function set($id_connect = "", $obj){
			//self :: $connects[$id_connect] = "conexion";
			$obj -> db = self :: $connects[$id_connect];
			//print_r(self :: $connects);
		}

		public static function registrar_conexiones(){
			//Este metodo guardara  la  instnacias de conexion del archivo de  configuracion de  conexiones
			self :: $connects = array(
				"MYSQL1" => new DataBaseMysql("localhost","root","","boxlog"),
				"MYSQL2" => new DataBaseMysql("localhost","root","","otra")
			);
		}
	}
?>

