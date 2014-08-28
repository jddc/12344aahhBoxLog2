<?php
	# Rutas absolutas
	const APP_ROOT = '';
	const APP_DIR = 'apps';

	# Estado de deploy
	const PRODUCTION = FALSE;

	# Archivo standar de respuestas
	const FILE_STANDAR_RESPONSE = 'responseHTTP';

	# Formato de respueta
	const FORMAT_RESPONSE = 'json';

	# Configuracion de directivas de php.ini
	if(!PRODUCTION){
		ini_set('error_reporting', E_ALL | E_NOTICE | E_STRICT);
    	ini_set('display_errors', '1');
    	ini_set('track_errors', 'On');
	}else{
		ini_set('display_errors', '0');
	}
	
	# Importación
	function import($string = ''){
	    $file = str_replace('.', '/', $string);

	    if(! file_exists(APP_ROOT . "$file.php"))
	    	exit("FATAL ERROR: No module named $string");

	    require_once "$file.php";
	}
?>