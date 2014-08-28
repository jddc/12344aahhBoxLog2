<?php
	class Loader{
		public $controller;

		public function __construct($controller){
			$this -> controller = $controller;
		}

		public function model($name_model){
			import("apps.models.$name_model");
			
			$this -> controller -> $name_model = new $name_model();
		}

		public function view($name_view = "", $data = NULL){
			foreach($data as $index => $value){
				$$index = $value;
			}

			require_once "apps/views/$name_view.php";
		}

		public function helper($name_helper = ""){
			import("core.helpers.$name_helper");
			$this -> controller -> $name_helper = new $name_helper();
		}
	}
?>