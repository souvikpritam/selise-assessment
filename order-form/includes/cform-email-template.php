<?php
	
	/* User email */

	$subject = __("Confirmation mail");
	$to = $email;
	$body = "Hello"." ".$salutation." ".$first_name." ".$sur_name.","."\n";
	$body .=__("Thanks for your interest.")."\n";
	$body .=__("Your order has been received. You will be updated soon.");
	$headers = "From: rkjpritam@gmail.com";
	wp_mail($to,$subject,$body,$headers);

	/* Admin email */
	global $wpdb;
	$prefix = $wpdb->prefix;
	$tableName = $prefix."admin_email";
	$admin_email = '';
	$admin_email = $wpdb->get_var("SELECT admin_email FROM $tableName");

	$subject = __("Admin Confirmation mail");
	$to_email = $admin_email;
	$body = "Hello, \n";
	$body .=__("Sender Information below:")."\n"."\n";

	if(!empty($salutation) || !empty($first_name) || !empty($sur_name)) {
		$body .=__("Full Name: ").$salutation." ".$first_name." ".$sur_name.","."\n";
	}

	if(!empty($company_name)) {
		$body .=__("Company name: ").$company_name.","."\n";
	}
	
	if(!empty($email)) {	
		$body .=__("Email: ").$email.","."\n";
	}
	if(!empty($phone_number)) {	
		$body .=__("Phone number: ").$phone_number.","."\n";
	}
	
	if(!empty($street_house_no)) {		
		$body .=__("Street and house no: ").$street_house_no.","."\n";
	}
	
	if(!empty($zipcode)) {	
		$body .=__("ZIP Code: ").$zipcode.","."\n";
	}
	if(!empty($place)) {	
		$body .=__("Place: ").$place.","."\n";
	}

	if(!empty($coupon_code)) {
		$body .=__("Coupon code: ").$coupon_code;
	}

	wp_mail($to_email,$subject,$body,$headers);


