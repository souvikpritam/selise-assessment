<?php

global $wpdb;
require_once(ABSPATH .'wp-admin/includes/upgrade.php');

if(count($wpdb->get_results("SHOW TABLES LIKE 'wp_cform_plugin'")) == 0) {
	$sql_query_to_create_table = "CREATE TABLE `wp_cform_plugin` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `salutation` varchar(150) NOT NULL,
								  `first_name` varchar(150) NOT NULL,
								  `surname` varchar(150) NOT NULL,
								  `company_name` varchar(255) NOT NULL,
								  `phone_number` varchar(150) NOT NULL,
								  `email` varchar(255) NOT NULL,
								  `street_house_no` varchar(1000) NOT NULL,
								  `zip_code` varchar(150) NOT NULL,
								  `place` varchar(255) NOT NULL,
								  `hints` varchar(10000) NOT NULL,
								  `coupon_code` varchar(255) NOT NULL,
								  PRIMARY KEY (`id`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

	dbDelta($sql_query_to_create_table);
}


if(count($wpdb->get_results("SHOW TABLES LIKE 'wp_validation'")) == 0) {
	$sql_query_to_create_validation_table = "CREATE TABLE `wp_validation` (
								  `id` int(11) NOT NULL AUTO_INCREMENT,
								  `label_name` varchar(255) NOT NULL,
								  `validation_key` varchar(255) NOT NULL,
								  `error_msg` varchar(255) NOT NULL,
								  `required` varchar(255) NOT NULL,
								  `max_input` int(150) NOT NULL,
								  `min_input` int(150) NOT NULL,
								  PRIMARY KEY (`id`)
								) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

	dbDelta($sql_query_to_create_validation_table);
}




if(count($wpdb->get_results("SHOW TABLES LIKE 'wp_coupon_code'")) == 0) {
	$sql_query_to_create_coupon_code_table = "CREATE TABLE `wp_coupon_code` (
											  `id` int(11) NOT NULL AUTO_INCREMENT,
											  `coupon_code` varchar(255) NOT NULL,
											  PRIMARY KEY (`id`)
											) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

	dbDelta($sql_query_to_create_coupon_code_table);
}


if(count($wpdb->get_results("SHOW TABLES LIKE 'wp_admin_email'")) == 0) {
	$sql_query_to_create_admin_email_table = "CREATE TABLE `wp_admin_email` (
											  `id` int(11) NOT NULL AUTO_INCREMENT,
											  `admin_email` varchar(255) NOT NULL,
											  PRIMARY KEY (`id`)
											) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

	dbDelta($sql_query_to_create_admin_email_table);
}




