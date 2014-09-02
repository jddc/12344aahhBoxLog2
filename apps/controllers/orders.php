<?php
class Orders extends Controller {
	public function get_orders() {
		//Load model
		$this -> load -> model("orders_model");
		$this -> orders_model -> connection_set("MYSQL1");
		$id_sap_order = '';

		//Get query & id_sap
		$query = $this -> url -> get_params();
        $id_sap_order = (!empty($query['items'][0])) ? $query['items'][0] : '';
        
        //Verify id_sap 
		if(!empty($id_sap_order) && strlen($id_sap_order) <= 8) {
			$orders = $this -> orders_model -> get_order($id_sap_order);
        }else if ($id_sap_order == ''){
        	//Get & Restrict number of elements shown
        	$limit = 10;
			$orders = $this -> orders_model -> get_orders($limit);
        }else
        	exit();

        if (!empty($orders)){
        	$datos["response"] = json_encode($orders,JSON_UNESCAPED_SLASHES);
        	// httpResponse 200 is OK
        	$datos["httpResponse"] = 200;
        }else{
        	$datos["response"] = '';
        	// httpResponse 404 NOT FOUND
        	$datos["httpResponse"] = 404;
        }
        //Send data to the view
        $this -> load -> view("orders_view", $datos);
	}

	public function post_orders(){
		//Load model
		$this -> load -> model("orders_model");
		$this -> orders_model -> connection_set("MYSQL1");
		//Specifying parameters expected
		$order = array(
    				"id_sap_order" => "",
    				"state" => "",
    				"details" => ""
		);
        //Getting POST parameters        
		$query = $this -> url -> get_query();

		//Checking correlation between parameters expected with POST parameters
		if( !empty( $query) ) {
			foreach ($order as $key => &$value) {
				if (array_key_exists($key, $query['items'])) {
					$value = $query['items'][$key];	
				}
			}	
		}
		$datos["response"] = ''; 
		//Insert new order to DB   
        if ($this -> orders_model -> put_order($order)) {
        	$datos["response"] = json_encode($order,JSON_UNESCAPED_SLASHES);
        	$datos["httpResponse"] = 201;
        }else
        	$datos["httpResponse"] = 400;

        //Send data to the view
        $this -> load -> view("orders_view", $datos);       			
	}
}