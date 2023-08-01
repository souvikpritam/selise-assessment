<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class ShortcodeTableList extends WP_List_Table {

	public function prepare_items() {
		$columns = $this->get_columns();
		$this->_column_headers = array($columns);
		$this->items = $this->shortcode_list_table_data();

    }

    public function shortcode_list_table_data() {
        $data_array = array();
    		$data_array[] = array(
    			"plugin_name" => "Order Form",
    			"shortcode" => "[order-form]"
    		);
        return $data_array;
    }

    public function get_columns(){
    	$columns = array(
    		"plugin_name" => "Plugin Name",
    		"shortcode" => "Shortcode"
    	);

    	return $columns;
    }

    public function column_default($item,$column_name){
    	switch ($column_name) {

            case 'plugin_name':
            case 'shortcode':
                return $item[$column_name];
            default:
                return "no value";
        }

    }


}	
	

function shortcode_data_list_table() {
	$cform_table = new ShortcodeTableList();
	$cform_table->prepare_items();
	echo '<h3>Shortcode Lists</h3>';
	$cform_table->display();
	
	
}

shortcode_data_list_table();


	