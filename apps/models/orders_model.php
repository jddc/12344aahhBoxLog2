<?php
	class Orders_model extends Model{
		private $allow_null = array(
                    'details'
                );
                
		public function get_order($id_sap_order = ""){
			$this -> db -> get("select id_sap_order,state,details,date from orders where id_sap_order = ".$id_sap_order);
			return $this -> db -> dbs_rows;
		}

		public function get_orders(){	
			$this -> db -> get("select id_sap_order,state,details,date from orders");
			return $this -> db -> dbs_rows;
		}

		public function put_order($order = array()){
                    if (empty($order)) {
                        throw new Exception ('Please verify the array is not empty.', 500);
                    }
                    
                    if ($this -> valid($order)) {
                        $this -> db -> insert('INSERT INTO orders (id_sap_order, state, details, date) VALUES ('.$order['id_sap_order'].',"'.$order['state'].'","'.$order['details'].'", NOW())');
                        return true;
                    }
                    
                    return false;
		}
                
                public function valid($camps) {
                    $blank = 0;
                    
                    foreach ($camps AS $key => $value) {
                        if (!in_array($key, $this -> allow_null)) {
                            if (empty($value)) {
                                $blank ++;
                            }
                        }
                    }
                    
                    return ($blank > 0) ? false : true;
                }
	}	

