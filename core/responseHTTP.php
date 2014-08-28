<?php
	
	class ResponseHTTP extends Response{
		//public function __construct(){
			static $responseCodes =  array(101 => array("code" => 101, "message" => "Conexion rechazada"),							  
							  				200 => array("code" => 200, "message" => "Ok"),
							 				201 => array("code" => 201, "message" => "La peticion ha sido completada y ha resultado en la creacion de un nuevo recurso"),
							  				400 => array("code" => 400, "message" => "Solicitud incorrecta"),
							  				403 => array("code" => 403, "message" => "Prohibido"),
							  				404 => array("code" => 404, "message" => "No encontrado"),
							  				500 => array("code" => 500, "message" => "Errores de servidor")							  				
								 	  );

			//$this -> format_response = $format_response;
		//}
	}
?>