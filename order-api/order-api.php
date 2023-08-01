<?php
/*
Plugin Name: Order API
Plugin URI: https://www.google.com.bd/
Description: This is a custom order API plugin which gives you total sales amount and total price based on every month and year. 
Author: Souvik
Author URI: https://www.google.com.bd/
Text Domain: orderapi
Version: 1.0
*/

define("ORDER_API_PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));

function apifile_inclusion() {
	include_once ORDER_API_PLUGIN_DIR_PATH."/include/custom-api.php";
}

add_action('init','apifile_inclusion');

function order_api_custom_menus() {
	add_menu_page("orderapi","Order API","manage_options","order-api","order_api_view");
	
}

function order_api_view() {
	include_once ORDER_API_PLUGIN_DIR_PATH."/include/view-api-endpoint.php";
}
add_action("admin_menu","order_api_custom_menus");