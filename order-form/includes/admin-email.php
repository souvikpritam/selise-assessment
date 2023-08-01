<?php
include_once PLUGIN_DIR_PATH."/includes/get-admin-email-form.php";

global $wpdb;
$prefix = $wpdb->prefix;
$tableName = $prefix."admin_email";
$admin_email = '';

if(isset($_POST['admin_email_submit'])) {
	$admin_email = sanitize_text_field($_POST['admin_email']);

	if(count($wpdb->get_results("SELECT ID FROM {$tableName}")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (admin_email) VALUES (%s)", $admin_email);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET admin_email = '%s'",$admin_email);	
	}

	$succees = $wpdb->query($insert_sql);

	if($succees) {
        $msg = "Admin email insert successfully";
    }

    echo "<span class='admin_email-msg'>".$msg."</span>";
}	
	 
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class AdminEmailTableList extends WP_List_Table {

	public function prepare_items() {
		$columns = $this->get_columns();
		$this->_column_headers = array($columns);
		$this->items = $this->shortcode_list_table_data();

    }

    public function shortcode_list_table_data() {

    	global $wpdb;
        $prefix = $wpdb->prefix;
		$tableName = $prefix."admin_email";
        $datas = $wpdb->get_results("SELECT * FROM $tableName");
        $data_array = array();
        if(count($datas) > 0) {
        	foreach ($datas as $data) {
	    		$data_array[] = array(
	    			"id" => $data->id,
	    			"admin_email" => $data->admin_email
	    		);
	    	}
	    }		
        return $data_array;
    }

    public function get_columns(){
    	$columns = array(
    		"admin_email" => "Admin Email"
    	);

    	return $columns;
    }

    public function column_default($item,$column_name){
    	switch ($column_name) {

            case 'admin_email':
                return $item[$column_name];
            default:
                return "no value";
        }

    }


}	
	

function admin_email_data_list_table() {
	$cform_table = new AdminEmailTableList();
	$cform_table->prepare_items();
	echo '<h3>Admin Email</h3>';
	$cform_table->display();
	
	
}

admin_email_data_list_table();