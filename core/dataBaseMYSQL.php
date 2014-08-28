<?php

class DataBaseMysql extends DataBaseAbstract{
	
###########################################################################METODOS DE CLASS DataBaseMysql#####################################################################

# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE 
	function execute_query() {          
		$this -> open_connection();         
		$this -> dbs_connect -> query($this -> dbs_query); 
			if( $this -> dbs_connect -> errno == 0){ 
					$this -> close_connection(); 
					return TRUE; 
			}else{
					$this -> save_error();
					$this -> close_connection();     
					return FALSE;
				}
	}

# Traer resultados de una consulta en un Array
	function get_results_from_query() {         
		$this -> open_connection();         
		$result = $this -> dbs_connect -> query($this -> dbs_query);          
			if( $this -> dbs_connect -> errno == 0){ 
					while ($this -> dbs_rows[] = $result -> fetch_assoc()); 
						  	$result -> close();      
							$this -> close_connection(); 
							array_pop($this->dbs_rows); 												
							return TRUE;				
			}else{
					$this -> save_error();
					$this -> close_connection();     
					return FALSE;
				}
	}

# Guardar el error	
	private function save_error(){
		$this -> dbs_error_message = $this -> dbs_connect -> errno . ": " . $this -> dbs_connect -> error;
	}
# Retornar el mensaje de error
	public function get_error_message(){
		return $this -> dbs_error_message;
	}

#######################################################METODOS A IMPLEMENTAR DE LA CLASS ABSTARCT DataBaseSkeleton############################################################
# conectar a la base de datos
	function open_connection(){
		$this -> dbs_connect = new mysqli($this -> dbs_host, $this -> dbs_username, $this -> dbs_password, $this -> dbs_database);
			if ($this -> dbs_connect -> connect_errno) {
			    	$this -> dbs_error_message = "Fallo al contenctar a MySQL: (" . $this -> dbs_connect -> connect_errno . ") " . $this -> dbs_connect -> connect_error;
			    	return false;
			}
		return true;  
	}
	
# cerrar la conexion a la base de datos
	function close_connection(){
		$this -> dbs_connect -> close();
		return true; 
	}

# Traer datos
	public function get($query){
		$this -> dbs_query = $query;
		return $this -> get_results_from_query();
		//echo "get mysql";
	}

# Insertar datos
    public function insert($query){
    	$this -> dbs_query = $query;    	
    	return $this -> execute_query();

    }

# Eliminar registros
    public function delete($query){
    	$this -> dbs_query = $query;
    	return $this -> execute_query();
    }


# Modificar registros
    public function update($query){
    	$this -> dbs_query = $query;
    	return $this -> execute_query();

    }

# metodo inicializador de la clase
	function __construct($host, $username, $password, $database){

		$this -> dbs_host = $host;
		$this -> dbs_username = $username;
		$this -> dbs_password = $password;
		$this -> dbs_database = $database;
	}
}	
?>