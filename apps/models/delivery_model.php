<?php
	class Delivery_model extends Model{
		public function obtener_usuarios(){
			$this -> db -> get("select * from user");
			return $this -> db -> dbs_rows;
		}
	}
?>