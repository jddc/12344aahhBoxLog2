<?php
class Orders extends Controller {
	public function get_orders() {

		$this -> load -> model("orders_model");
		$this -> orders_model -> connection_set("MYSQL1");
		$id_sap_order = '';

		$query = $this -> url -> get_params();
        $id_sap_order = (!empty($query['items'][0])) ? $query['items'][0] : '';
        
		if(!empty($id_sap_order) && strlen($id_sap_order) <= 8) {
			$orders = $this -> orders_model -> get_order($id_sap_order);
        }else if ($id_sap_order == ''){
        	$limit = 10;
			$orders = $this -> orders_model -> get_orders($limit);
        }else
        	exit();

        if (!empty($orders)){
        	$datos["response"] = json_encode($orders,JSON_UNESCAPED_SLASHES);
        	$datos["httpResponse"] = 200;
        }else{
        	$datos["response"] = '';
        	$datos["httpResponse"] = 404;
        }
        $this -> load -> view("orders_view", $datos);
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

		if( !empty( $query) ) {
			foreach ($order as $key => &$value) {
				if (array_key_exists($key, $query['items'])) {
					$value = $query['items'][$key];	
				}
			}	
		}
		$datos["response"] = '';    
        if ($this -> orders_model -> put_order($order)) {
        	$datos["response"] = json_encode($order,JSON_UNESCAPED_SLASHES);
        	$datos["httpResponse"] = 201;
        }else
        	$datos["httpResponse"] = 400;

        $this -> load -> view("orders_view", $datos);       			
	}
}