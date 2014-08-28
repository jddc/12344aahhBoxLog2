<?php


class Sanetize{

	public $dato;

	function __construct(){

	}

	function escapar($dato){
	$this -> dato = htmlspecialchars($dato, ENT_QUOTES);

	$fp = fopen("fichero.txt", "w");
	fputs($fp, $this -> dato);
	fclose($fp); 
	return $this -> dato;

	}

}

//$nuevo = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
//echo $nuevo; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
?>