<?php
/*
Plugin Name: ORDER Form
Plugin URI: https://www.google.com.bd/
Description: This is a Order Form Plugin. 
Author: Souvik
Author URI: https://www.google.com.bd/
Text Domain: orderform
Version: 1.0.0
*/

define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());
define("PLUGIN_VERSION","1.0.0");


function cform_uifile_inclusion() {
	ob_start();
	include_once PLUGIN_DIR_PATH."/includes/cform-view.php";
	$form_template = ob_get_contents();
	ob_end_clean();
	return $form_template;
}

add_shortcode('order-form','cform_uifile_inclusion');


function cform_plugin_assets(){
	/* Start of Enqueue CSS */

	wp_enqueue_style( 'cform-style', PLUGIN_URL.'/order-form/assets/css/custom.css', [], PLUGIN_VERSION,'all');
	wp_enqueue_style( 'bootstrap-style', PLUGIN_URL.'/order-form/assets/css/bootstrap.min.css', [], PLUGIN_VERSION);

	/* End of Enqueue CSS */

	/* Start of Enqueue JS */

	wp_enqueue_script( 'cform-script', PLUGIN_URL.'/order-form/assets/js/script.js', [],PLUGIN_VERSION, true );
	wp_enqueue_script( 'bootstrap-script', PLUGIN_URL.'/order-form/assets/js/bootstrap.min.js', [],PLUGIN_VERSION, true );
	wp_enqueue_script( 'sweetalert-script', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', null ,null, true );
	
	$args = array('ajaxurl' => admin_url('admin-ajax.php'));
	wp_localize_script("cform-script","ajax_obj", $args );

	/* End of Enqueue JS */
	
}

add_action("init","cform_plugin_assets");


function cform_plugin_tables(){
	include_once PLUGIN_DIR_PATH."/includes/create-cform-tables.php";	
}

register_activation_hook(__FILE__,"cform_plugin_tables");


function cform_plugin_drop_tables(){
	include_once PLUGIN_DIR_PATH."/includes/drop-cform-tables.php";
	
}

register_uninstall_hook(__FILE__,"cform_plugin_drop_tables");


function cform_custom_menus() {
	add_menu_page("orderform","Order FORM","manage_options","cform-plugin","cform_admin_view");
	add_submenu_page("cform-plugin","FORM Controller","FORM Controller","manage_options","cform-plugin","cform_admin_view");
	add_submenu_page("cform-plugin","View Form Data","View Form Data","manage_options","view-data","get_form_data");
	add_submenu_page("cform-plugin","Coupon Code Controller","Coupon Code Controller","manage_options","coupon-code","get_coupon_data");
	add_submenu_page("cform-plugin","View Shortcode","View Shortcode","manage_options","short-code","view_short_code");
	add_submenu_page("cform-plugin","Admin Email","Admin Email","manage_options","admin-email","control_admin_email");
}

function cform_admin_view(){
	ob_start();
	include_once PLUGIN_DIR_PATH."/includes/cform-admin-view.php";
	$template = ob_get_contents();
	ob_end_clean();
	echo $template;	
}

function get_form_data() {
	ob_start();
	include_once PLUGIN_DIR_PATH."/includes/render-form-data.php";
	$template = ob_get_contents();
	ob_end_clean();

	echo $template;
}

function get_coupon_data() {
	ob_start();
	include_once PLUGIN_DIR_PATH."/includes/render-coupon-data.php";
	$template = ob_get_contents();
	ob_end_clean();

	echo $template;
}

function view_short_code() {
	ob_start();
	include_once PLUGIN_DIR_PATH."/includes/view-short-code.php";
	$template = ob_get_contents();
	ob_end_clean();

	echo $template;
}

function control_admin_email() {
	ob_start();
	include_once PLUGIN_DIR_PATH."/includes/admin-email.php";
	$template = ob_get_contents();
	ob_end_clean();

	echo $template;
}

add_action("admin_menu","cform_custom_menus");



/* Order Form Controller */

function cform_data_handler() {
	global $wpdb;
	$errorMSG = "";
	$prefix = $wpdb->prefix;
	$tableName = $prefix."validation";

	/* Start of fetch validation error_msg */
	$firstName_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'first_name_key'");
	$surName_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'sur_name_key'");

	$pnumber_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'phone_number_key'");
	$pnumber_max_input = $wpdb->get_var("SELECT max_input FROM {$tableName} WHERE validation_key = 'phone_number_key'");
	$pnumber_min_input =  $wpdb->get_var("SELECT min_input FROM {$tableName} WHERE validation_key = 'phone_number_key'");

	$email_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'email_key'");

	$salutation_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'salutation_key'");

	$company_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'company_key'");

	$steet_house_no_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'steet_house_no_key'");

	$zip_code_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'zip_code_key'");

	$place_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'place_key'");

	$hints_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'hints_key'");

	$coupon_code_errorMSG = $wpdb->get_var("SELECT error_msg FROM {$tableName} WHERE validation_key = 'coupon_code_key'");

	/* End of fetch validation error_msg */

	/* Start of FORM Validation */
	if ($_POST['salutation'] == "Select Salutation") {
		if($_POST['salutationreq'] == 'yes') {
			$errorMSG = "<li>$salutation_errorMSG</li>";
		} else {
			$errorMSG .= '';
		}
        
    } else {
        $salutation = sanitize_text_field($_POST['salutation']);
    }

    if (empty($_POST['first_name'])) {
    	if($_POST['fnamereq'] =='yes') {
    		$errorMSG .= "<li>$firstName_errorMSG</li>";
    	}else {
    		$errorMSG .='';
    	}
		
	} else {
		$first_name = sanitize_text_field($_POST['first_name']);

		// check if first name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
			$errorMSG .= "<li>Only letters and white space allowed For First name</li>";
		}
		
	}

	if (empty($_POST['sur_name'])) {
		if($_POST['surnamereq'] =='yes') {
			$errorMSG .= "<li>$surName_errorMSG</li>";
		}else {
			$errorMSG .='';
		}	
	} else {
		$sur_name = sanitize_text_field($_POST['sur_name']);

		// check if surname only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z-' ]*$/",$sur_name)) {
			$errorMSG .= "<li>Only letters and white space allowed For Surname</li>";
		}		
	}

	if (empty($_POST['company_name'])) {
		if($_POST['companyreq'] =='yes') {
			$errorMSG .= "<li>$company_errorMSG</li>";
		} else {
			$errorMSG .='';
		}	
	} else {
		$company_name = sanitize_text_field($_POST['company_name']);

	}

	if (empty($_POST["phone_number"])) {
    	if($_POST['pnumberreq'] =='yes') {
    		$errorMSG .= "<li>$pnumber_errorMSG</li>";
    	} else {
    		$errorMSG .='';
    	}
		
	} else {
		$phone_number = sanitize_text_field($_POST['phone_number']);
		if (!preg_match("/^[+]*[0-9-' ]*$/",$phone_number)){
			$errorMSG .= "<li>Valid Phone number is required</li>";
		}	

		$pnumber_length = (strlen($phone_number) - substr_count($phone_number,' '));
		if(($pnumber_length >= $pnumber_min_input) && ($pnumber_length <= $pnumber_max_input)) {
			$errorMSG .= '';
		} else {
			$errorMSG .= "<li>Minimum $pnumber_min_input and Maximum $pnumber_max_input digits allowed for phone number (including '+' sign)</li>";
		}

	} 
		
		
	
	if (empty($_POST["email"])) {
		if($_POST['emailreq'] =='yes') {
        	$errorMSG .= "<li>$email_errorMSG</li>";
        } else {
        	$errorMSG .='';
        }	
    } else {
        $email = sanitize_text_field($_POST["email"]);

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        	$errorMSG .= "<li>Valid email address is required</li>";
        }
    }

    

	if (empty($_POST["steet_house_no"])) {
		if($_POST['steet_house_noreq'] == 'yes') {
			$errorMSG .= "<li>$steet_house_no_errorMSG</li>";
		} else {
			$errorMSG .= '';
		}
        
    } else {
        $street_house_no = sanitize_text_field($_POST["steet_house_no"]);
    }	


	if (empty($_POST["zip_code"])) {
		if($_POST['zip_codereq'] == 'yes') {
        	$errorMSG .= "<li>$zip_code_errorMSG</li>";
        } else {
        	$errorMSG .= '';
        }	
    } else {
        $zipcode = sanitize_text_field($_POST["zip_code"]);

        // check if ZIP Code is well-formed
        if (!is_numeric($zipcode)) {
        	$errorMSG .= "<li>Only number is allowed FOR ZIP Code</li>";
        }
    }


    if (empty($_POST["place"])) {
    	if($_POST['placereq'] == 'yes') {
        	$errorMSG .= "<li>$place_errorMSG</li>";
        } else {
        	$errorMSG .= '';
        }	
    } else {
        $place = sanitize_text_field($_POST["place"]);
        if (is_numeric($place)) {
        	$errorMSG .= "<li>No number is allowed For Place</li>";
        }
    }

    if (empty($_POST["hints"])) {
    	if($_POST['hintsreq'] == 'yes') {
        	$errorMSG .= "<li>$hints_errorMSG</li>";
        } else {
        	$errorMSG .= '';
        }	
    } else {
        $hints = sanitize_text_field($_POST["hints"]);
    }

    if (empty($_POST["coupon_code"])) {
    	if($_POST['coupon_codereq'] == 'yes') {
        	$errorMSG .= "<li>$coupon_code_errorMSG</li>";
        } else {
        	$errorMSG .= '';
        }	
    } else {
        $coupon_code = sanitize_text_field($_POST["coupon_code"]);
        
    }

    
    /* End of FORM Validation */	

	if(empty($errorMSG)) {
		
		global $wpdb;
		$prefix = $wpdb->prefix;
		$tableName = $prefix."cform_plugin";
		$sql = $wpdb->prepare("INSERT INTO {$tableName} (salutation,first_name,surname,company_name,email,phone_number,street_house_no,zip_code,place,hints,coupon_code) VALUES (%s, %s, %s, %s, %s, %s, %s, %d, %s, %s, %s)", $salutation, $first_name, $sur_name,$company_name, $email, $phone_number, $street_house_no, $zipcode, $place, $hints, $coupon_code);

		$wpdb->query($sql);

		include_once PLUGIN_DIR_PATH."/includes/cform-email-template.php";

		echo json_encode(['code'=>200, 'msg'=>'Data inserted successfully']);	
	} else {
		echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
	}	

	wp_die();
}

add_action("wp_ajax_cform_data","cform_data_handler");
add_action("wp_ajax_nopriv_cform_data","cform_data_handler");


/* Coupon Controller */

function coupon_data_handler() {
	if (isset($_POST["coupon_code"])) {    
        $coupon_code = sanitize_text_field($_POST["coupon_code"]);  
    }

    global $wpdb;
	
	$prefix = $wpdb->prefix;
	$tableName = $prefix."coupon_code";
	$get_coupon = $wpdb->get_results("SELECT * FROM {$tableName} WHERE coupon_code = '$coupon_code'");

	if($get_coupon) {
		$errorMSG = "Coupon Code is valid";
	} else if (empty($coupon_code)){
		$errorMSG .= "Please enter a coupon code";
	} else {
		$errorMSG .= "Coupon Code is not valid";
	}

	echo json_encode(['code'=>200, 'msg'=>$errorMSG]);

	wp_die();

}

add_action("wp_ajax_getcoupon_data","coupon_data_handler");
add_action("wp_ajax_nopriv_getcoupon_data","coupon_data_handler");
