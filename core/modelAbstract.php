<?php
	abstract class Model{
		public $db;

		public function __construct(){
			//$this -> db =  new DataBaseMysql("localhost","root","","rest");
		}

		public function connection_set($id_connect = ""){
			ConnectionHandle :: set($id_connect, $this);

		}
	}
?>