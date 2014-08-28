<?php
	class Orders_model extends Model{
		
		public function get_order($id_sap_order = ""){
			$this -> db -> get("select id_sap_order,state,details,date from `order` where id_sap_order = ".$id_sap_order);
			return $this -> db -> dbs_rows;
		}

		public function get_orders(){	
			$this -> db -> get("select id_sap_order,state,details,date from `order`");
			return $this -> db -> dbs_rows;
		}

		public function put_order($order = ""){
			$this -> db -> insert('INSERT INTO `order` (id_order, id_sap_order, state, details, date) VALUES (null, '.$order['id_sap_order'].',"'.$order['state'].'","'.$order['details'].'",NOW())');
		}
	}	
