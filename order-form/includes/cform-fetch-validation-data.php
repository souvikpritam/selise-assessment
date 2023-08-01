<?php

global $wpdb;
$prefix = $wpdb->prefix;
$tableName = $prefix."validation";

$first_name_label = '';
$first_name_error_msg = '';
$first_name_required = '';

$sur_name_label = '';
$sur_name_error_msg = '';
$sur_name_required = '';

$phone_number_label = '';
$phone_number_error_msg = '';
$phone_number_required = '';
$phone_number_max_input = '';
$phone_number_min_input = '';

$email_label = '';
$email_error_msg = '';	
$email_required = '';

$salutation_label = '';
$salutation_error_msg = '';	
$salutation_required = '';

$company_label = '';
$company_error_msg = '';	
$company_required = '';

$steet_house_no_label = '';
$steet_house_no_error_msg = '';	
$steet_house_no_required = '';

$zip_code_label = '';
$zip_code_error_msg = '';	
$zip_code_required = '';

$place_label = '';
$place_error_msg = '';	
$place_required = '';

$hints_label = '';
$hints_error_msg = '';	
$hints_required = '';

$coupon_code_label = '';
$coupon_code_error_msg = '';	
$coupon_code_required = '';

$firstname_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'first_name_key'");
foreach ($firstname_infos as $info) {
	$first_name_label= $info->label_name;
	$first_name_error_msg = $info->error_msg;
	$first_name_required = $info->required;
}

$surname_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'sur_name_key'");

foreach ($surname_infos as $info) {
	$sur_name_label = $info->label_name;
	$sur_name_error_msg = $info->error_msg;
	$sur_name_required = $info->required;
}

$phone_number_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'phone_number_key'");

foreach ($phone_number_infos as $info) {
	$phone_number_label = $info->label_name;
	$phone_number_error_msg = $info->error_msg;
	$phone_number_required = $info->required;
	$phone_number_max_input = $info->max_input;
	$phone_number_min_input = $info->min_input;
}

$email_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'email_key'");

foreach ($email_infos as $info) {
	$email_label = $info->label_name;
	$email_error_msg = $info->error_msg;	
	$email_required = $info->required;
}

$salutation_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'salutation_key'");

foreach ($salutation_infos as $info) {
	$salutation_label = $info->label_name;
	$salutation_error_msg = $info->error_msg;	
	$salutation_required = $info->required;
}

$company_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'company_key'");

foreach ($company_infos as $info) {
	$company_label = $info->label_name;
	$company_error_msg = $info->error_msg;	
	$company_required = $info->required;
}


$steet_house_no_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'steet_house_no_key'");

foreach ($steet_house_no_infos as $info) {
	$steet_house_no_label = $info->label_name;
	$steet_house_no_error_msg = $info->error_msg;	
	$steet_house_no_required = $info->required;
}

$zip_code_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'zip_code_key'");

foreach ($zip_code_infos as $info) {
	$zip_code_label = $info->label_name;
	$zip_code_error_msg = $info->error_msg;	
	$zip_code_required = $info->required;
}

$place_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'place_key'");

foreach ($place_infos as $info) {
	$place_label = $info->label_name;
	$place_error_msg = $info->error_msg;	
	$place_required = $info->required;
}

$hints_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'hints_key'");

foreach ($hints_infos as $info) {
	$hints_label = $info->label_name;
	$hints_error_msg = $info->error_msg;	
	$hints_required = $info->required;
}

$coupon_code_infos = $wpdb->get_results("SELECT * FROM {$tableName} WHERE validation_key = 'coupon_code_key'");

foreach ($coupon_code_infos as $info) {
	$coupon_code_label = $info->label_name;
	$coupon_code_error_msg = $info->error_msg;	
	$coupon_code_required = $info->required;
}