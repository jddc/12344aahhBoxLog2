<?php
	/**
	* BoxPay
	*
	* @package    BoxPay
	* @license    
	* @author     José Manuel Chávez de la Cruz <jmchdlc@gmail.com>
	* @author     Victor Carlos Contreras Lorenzo <vjkc09@gmail.com>
	* @link       
	* @version    0.0.1
	*/

	require_once 'settings.php';	

	// security
	// router
	// response
	// BDS
	// validator


	import('core.app');
	import('core.loader');
	import('core.controllerAbstract');
	import('core.modelAbstract');
	import('core.requestParser');

	//Respuestas
	import('core.responseAbstract');

	//Router
	import('core.router');

	//Base de datos
	import('core.dataBaseAbstract');
	import('core.connection_handle');
	import('core.dataBaseMYSQL');


	App::init();
?>