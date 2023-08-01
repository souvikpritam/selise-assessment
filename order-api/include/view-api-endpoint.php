<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class OrderAPITableList extends WP_List_Table {
	var $data = array(
		array("how_to_use" => "Endpoint without parameter", "endpoint" => "http://localhost/wordpress/wp-json/woocommerce/v1/order/"),
		array("how_to_use" => "Endpoint with parameter", "endpoint" => "http://localhost/wordpress/wp-json/woocommerce/v1/order/?year=value&month=value")
	);

	public function prepare_items() {
		$this->items = $this->data;
		$columns = $this->get_columns();
		$this->_column_headers = array($columns);
		
    }

  

    public function get_columns(){
    	$columns = array(
    		"how_to_use" => "Plugin Name",
    		"endpoint" => "Endpoint(s)"
    	);

    	return $columns;
    }

    public function column_default($item,$column_name){
    	switch ($column_name) {

            case 'how_to_use':
            case 'endpoint':
                return $item[$column_name];
            default:
                return "no value";
        }

    }


}	
	

function endpoint_url_list_table() {
	$cform_table = new OrderAPITableList();
	$cform_table->prepare_items();
	echo '<h3>Endpoint Lists</h3>';
	$cform_table->display();
	
	
}

endpoint_url_list_table();


	