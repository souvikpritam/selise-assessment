<?php

global $wpdb;
$wpdb->query("DROP table IF Exists wp_cform_plugin");
$wpdb->query("DROP table IF Exists wp_validation");
$wpdb->query("DROP table IF Exists wp_coupon_code");
$wpdb->query("DROP table IF Exists wp_admin_email");