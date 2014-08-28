<?php
	class App{
		public static function init(){
			Response::$format_response = FORMAT_RESPONSE;
			import("core." . FILE_STANDAR_RESPONSE);

			ConnectionHandle::registrar_conexiones();

			//El router es  el encargado de incluir el controlodador adecuado e instanciar un objeto de este asi como de seleccionar  el metodo adecuado.
			//require_once 'apps/controllers/pay.php';

			$router = new Router();

			//$pay1 = new Pay();
			//$pay1 -> get_pay();
		}
	}
?>