<?php
/*
 database
El nombre de la base de datos.

hostname
El Host o la IP del servidor de la base de datos.

port
El puerto TCP/IP sobre el cual la base de datos está escuchando solicitudes.

username
El usuario con el que se conecta a la base de datos.

password
La contraseña con la que se conecta a la base de datos.

protocol
protocolo de comunicacion.
*/

abstract class DataBaseAbstract{
	protected $dbs_host;
	protected $dbs_username;
	protected $dbs_password;
	protected $dbs_database;
	protected $dbs_port;
	protected $dbs_protocol;	
	protected $dbs_query;
	protected $dbs_response = "";
	public    $dbs_rows = array();
	protected $dbs_connect;
	private   $dbs_error_message; 

	# métodos abstractos para DBS clases que hereden 

	abstract protected function get($query); //metodo para realizar consultas    
    abstract protected function insert($query);     
    abstract protected function update($query);     
    abstract protected function delete($query); 
    abstract protected function open_connection();//metodo para establecer cpnexion
    abstract protected function close_connection();//metodo para cerrar conexion


}

?>