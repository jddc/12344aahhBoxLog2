<?php
class Orders extends Controller {
	public function get_orders() {
		$this -> load -> model("orders_model");
		$this -> orders_model -> connection_set("MYSQL1");
		$id_sap_order = "";
		$order = "";

		$query = $this -> url -> get_query();
		if (array_key_exists('id_sap_order', $query['items'])) {
                    $id_sap_order = $query['items']['id_sap_order'];	
		}		

		if(!empty($id_sap_order)) {
			$orders = $this -> orders_model -> get_order($id_sap_order);
                } else {
			$orders = $this -> orders_model -> get_orders();	
                }
                
		if (empty($orders)) {
			$datos["response"] = json_encode($orders);
			$this -> load -> view("orders_view", $datos);			
		}
	}

	public function post_orders(){
		$this -> load -> model("orders_model");
		$this -> orders_model -> connection_set("MYSQL1");
		$order = array(
    				"id_sap_order" => "",
    				"state" => "",
    				"details" => ""
		);
                
		$query = $this -> url -> get_query();

		foreach ($order as $key => &$value) {
			if (array_key_exists($key, $query['items'])) {
				$value = $query['items'][$key];	
			}
		}
                
                if ($this -> orders_model -> put_order($order)) {
                    echo 'ready <br />';
                    echo print_r($order,1);
                } else {
                    echo 'error';
                }
              			
	}
}