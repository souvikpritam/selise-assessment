<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class CformTableList extends WP_List_Table {

	public function prepare_items() {
		//$this->items = $this->data;
		$columns = $this->get_columns();
		$this->_column_headers = array($columns);
		$this->items = $this->cform_list_table_data();

		$data = $this->cform_list_table_data();
		$per_page = 2;
		$current_page = $this->get_pagenum();
		$total_items = count($data);
		$this->items = $data;
		$this->set_pagination_args(array(
			"total_items" => $total_items,
			"per_page" => $per_page
		));
		$this->items = array_slice($data,(($current_page - 1) * $per_page),$per_page);
    }

    public function cform_list_table_data() {
        global $wpdb;
        $prefix = $wpdb->prefix;
		$tableName = $prefix."cform_plugin";
        $datas = $wpdb->get_results("SELECT * FROM $tableName ORDER BY id DESC");
      
        $data_array = array();

        if(count($datas) > 0) {
        	$i = 1;
        	foreach ($datas as $data) {
        		$data_array[] = array(
        			"serial_id" => $i,
        			"id" => $data->id,
        			"fullname" => $data->salutation." ".$data->first_name." ".$data->surname,
        			"company_name" => $data->company_name,
        			"email" => $data->email,
        			"phone_number" => $data->phone_number,
        			"address" => $data->street_house_no.", ".$data->zip_code.", ".$data->place,
        			"hints" => $data->hints,
        			"coupon_code" => $data->coupon_code
        		);
        		$i++;
        	}
        	
        }
        return $data_array;
    }

    public function get_columns(){
    	$columns = array(
    		"serial_id" => "Serial No.",
    		"fullname" => "Full Name",
    		"company_name" => "Company Name",
    		"email" => "Email",
    		"phone_number" => "Phone Number",
    		"address" => "Address",
    		"hints" => "Hints",
    		"coupon_code" => "Coupon Code",
    		"action" => "Action"
    	);

    	return $columns;
    }

    public function column_default($item,$column_name){
    	switch ($column_name) {
    		case 'serial_id':
            case 'fullname':
            case 'company_name':
            case 'email':
            case 'phone_number':
            case 'address':
            case 'hints':
            case 'coupon_code':
                return $item[$column_name];
            case 'action':
            	return '<a onClick=\'javascript:return confirm ("Are you sure ?");\' href="?page='.$_GET['page'].'&action=cform-delete&list_id='.$item['id'].'" class="btn btn-danger">Delete</a>';
            default:
                return "no value";
        }

    }

    public function delete_data() {
    	global $wpdb;
    	$list_id = '';
    	$prefix = $wpdb->prefix;
		$tableName = $prefix."cform_plugin";
    	if(isset($_GET['list_id'])) {
    		$list_id = $_GET['list_id'];
    	}

    	$wpdb->query("DELETE FROM $tableName WHERE id = '$list_id'");
    	
    }

}	
	

function cform_show_data_list_table() {
	$cform_table = new CformTableList();
	$cform_table->delete_data();
	$cform_table->prepare_items();
	echo '<h3>Customer Lists</h3>';
	$cform_table->display();
	
	
}

cform_show_data_list_table();


	