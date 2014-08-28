<?php
	abstract class Controller {
        public $load = null;
        protected $url = null;

        public function __construct($url){
            $this -> load = new Loader($this);
            $this -> url = $url;
        }
                

        public function get_num_params(){
        	return $this -> url -> get_params()['num_items'];
        }

        public function get_params(){
        	return count($this -> url -> get_params()['items']) > 0 ? $this -> url -> get_params()['items'] : $this -> params;
        }
        
    }
?>