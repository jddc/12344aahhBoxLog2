<?php
 class ValidateDate{
	public  $error_message;
	  	  
	private function save_error($error){
		$this -> error_message = $error;
	}

	public function get_error_message(){
		return $this -> error_message;
	}	

	public function telefono ($telefono){
		if(! is_int($telefono)){
			$this -> save_error("El numero telefonico no es un valor numerico: " . $telefono);
			return false;
		}

        if(! preg_match('/^[0-9]{10}$/',$telefono)){
			$this -> save_error("El numero telefonico no corresponde con el formato: " . $telefono);
			return false;
        }

    	return true;
	}
	
	public function tarjeta ($tarjeta){
		if (preg_match('/^[0-9]{12}$|^[0-9]{13}$/',$tarjeta)){
			$this -> tarjeta = $tarjeta;
			return true;
		}else{
			$this -> tarjeta = $tarjeta;
       		return false;
        }
	}

	public function numero_cliente ($numero_cliente){
		if (preg_match('/^[0-9]{10}$/',$numero_cliente)){
			$this -> numero_cliente = $numero_cliente;
    		return true;
    	}else{
			$this -> numero_cliente = $numero_cliente;
       		return false;
        }
	}
	
	public function nombre ($nombre){
		if (preg_match('/^([a-z ñáéíóú]{2,60})$/i',trim($nombre))){
			$this -> nombre = $nombre;
    		return true;
   		}else{
			$this -> nombre = $nombre;
        	return false;
        }
	}
}
?>