<?php
include_once PLUGIN_DIR_PATH."/includes/get-coupon-form.php";

$coupon_code = '';
$coupon_msg = '';
global $wpdb;
$prefix = $wpdb->prefix;
$tableName = $prefix."coupon_code";

if(isset($_POST['coupon_submit'])) {
    $coupon_code = sanitize_text_field($_POST['coupon_code']);

    $get_coupon = $wpdb->get_results("SELECT * FROM {$tableName} WHERE coupon_code = '$coupon_code'");
  

    if($get_coupon) {
        $coupon_msg = "Coupon code already exits";
    } else {
            $insert_coupon = $wpdb->prepare("INSERT INTO {$tableName} (coupon_code) VALUES (%s)",$coupon_code);
            $succees = $wpdb->query($insert_coupon);

            if($succees) {
                $coupon_msg .= "Coupon code insert successfully";
            }   
    }

    echo "<span class='coupon-code-msg'>".$coupon_msg."</span>";
}


require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class CouponTableList extends WP_List_Table {

	public function prepare_items() {
		
		$columns = $this->get_columns();
		$this->_column_headers = array($columns);
		$this->items = $this->coupon_list_table_data();

        $data = $this->coupon_list_table_data();
        $per_page = 1;
        $current_page = $this->get_pagenum();
        $total_items = count($data);
        $this->items = $data;
        $this->set_pagination_args(array(
            "total_items" => $total_items,
            "per_page" => $per_page
        ));
        $this->items = array_slice($data,(($current_page - 1) * $per_page),$per_page);
    }

    public function coupon_list_table_data() {
        global $wpdb;
        $prefix = $wpdb->prefix;
		$tableName = $prefix."coupon_code";
        $datas = $wpdb->get_results("SELECT * FROM $tableName ORDER BY id DESC");
      
        $data_array = array();

        if(count($datas) > 0) {
            $i = 1;
        	foreach ($datas as $data) {
        		$data_array[] = array(
                    "serial_id" =>$i,
        			"id" => $data->id,
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
    		"coupon_code" => "Coupon Code",
    		"action" => "Action"
    	);

    	return $columns;
    }

    public function column_default($item,$column_name){
    	switch ($column_name) {
            case 'serial_id':
            case 'coupon_code':
                return $item[$column_name];
            case 'action':
            	return '<a onClick=\'javascript:return confirm ("Are you sure ?");\' href="?page='.$_GET['page'].'&action=coupon-delete&coupon_id='.$item['id'].'" class="btn btn-danger">Delete</a>';
            default:
                return "no value";
        }

    }

    public function delete_data() {
    	global $wpdb;
    	$coupon_id = '';
    	$prefix = $wpdb->prefix;
		$tableName = $prefix."coupon_code";
    	if(isset($_GET['coupon_id'])) {
    		$coupon_id = $_GET['coupon_id'];
    	}

    	$wpdb->query("DELETE FROM $tableName WHERE id = '$coupon_id'");
    	
    }

}	
	

function coupon_show_data_list_table() {
	$cform_table = new CouponTableList();
	$cform_table->delete_data();
	$cform_table->prepare_items();
	echo '<h3>Coupon Lists</h3>';
	$cform_table->display();
	
	
}

coupon_show_data_list_table();


	