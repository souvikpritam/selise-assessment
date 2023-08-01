<?php
if(isset($_POST['admin_submit'])) {
	$max_input = '';
	$min_input = '';
	$label_name = sanitize_text_field($_POST['label_name']);
	$error_msg = sanitize_text_field($_POST['error_msg']);
	$required = sanitize_text_field($_POST['required']);
	if(isset($_POST['max_input'])) {
		$max_input = sanitize_text_field($_POST['max_input']);
	}

	if(isset($_POST['min_input'])) {
		$min_input = sanitize_text_field($_POST['min_input']);
	}

	$validation_key = sanitize_text_field($_POST['validation_key']);

	global $wpdb;
	$prefix = $wpdb->prefix;
	$tableName = $prefix."validation";

	$salutation_key = 'salutation_key';
	$first_name_key = 'first_name_key';
	$sur_name_key = 'sur_name_key';
	$phone_number_key = 'phone_number_key';
	$email_key = 'email_key';
	$company_key = 'company_key';
	$steet_house_no_key = 'steet_house_no_key';

	$zip_code_key = 'zip_code_key';
	$place_key = 'place_key';
	$coupon_code_key = 'coupon_code_key';
	$hints_key = 'hints_key';

	/* First Name */

	if($validation_key == $first_name_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$first_name_key}'")) == 0) {
			$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
		} else {
			$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$first_name_key);	
		}

			$wpdb->query($insert_sql);
	}

	/* Sur Name */

	if($validation_key == $sur_name_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$sur_name_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$sur_name_key);
	}

		$wpdb->query($insert_sql);
		
	}

	/* Phone number */

	if($validation_key == $phone_number_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$phone_number_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required,max_input,min_input) VALUES (%s, %s, %s, %s,%d, %d)", $label_name, $validation_key, $error_msg,$required,$max_input,$min_input);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s', max_input = '%d', min_input = '%d' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$max_input,$min_input,$phone_number_key);
	}

		$wpdb->query($insert_sql);
	}


	/* Email */

	if($validation_key == $email_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$email_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$email_key);
	}

		$wpdb->query($insert_sql);
		
	}


	/* Salutation */

	if($validation_key == $salutation_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$salutation_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$salutation_key);
	}

		$wpdb->query($insert_sql);
		
	}


	/* Company name */

	if($validation_key == $company_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$company_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$company_key);
	}

		$wpdb->query($insert_sql);
		
	}

	/* Street & house no. */

	if($validation_key == $steet_house_no_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$steet_house_no_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$steet_house_no_key);
	}

		$wpdb->query($insert_sql);
		
	}


	/* ZIP Code. */

	if($validation_key == $zip_code_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$zip_code_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$zip_code_key);
	}

		$wpdb->query($insert_sql);
		
	}


	/* Place. */

	if($validation_key == $place_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$place_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$place_key);
	}

		$wpdb->query($insert_sql);
		
	}


	/* Coupon code. */

	if($validation_key == $coupon_code_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$coupon_code_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$coupon_code_key);
	}

		$wpdb->query($insert_sql);
		
	}



	/* Hinsts. */

	if($validation_key == $hints_key) {
		if(count($wpdb->get_results("SELECT ID FROM {$tableName} WHERE validation_key = '{$hints_key}'")) == 0) {
		$insert_sql = $wpdb->prepare("INSERT INTO {$tableName} (label_name,validation_key,error_msg,required) VALUES (%s, %s, %s, %s)", $label_name, $validation_key, $error_msg, $required);
	} else {
		$insert_sql = $wpdb->prepare("UPDATE {$tableName} SET label_name = '%s', error_msg = '%s', required = '%s' WHERE validation_key = '%s'",$label_name, $error_msg, $required,$hints_key);
	}

		$wpdb->query($insert_sql);
		
	}
	 

}

include_once PLUGIN_DIR_PATH."/includes/cform-fetch-validation-data.php";

?>

<div class="form-controller-wrapper">
	<div class="form-controller-title">
		<h3><?php esc_html_e('Form Controller');?></h3>
	</div>	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salutation">
	  <?php esc_html_e('Salutation');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#firstnameModal">
	  <?php esc_html_e('First Name');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#surnameModal">
	  <?php esc_html_e('Surname');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#company">
	  <?php esc_html_e('Company name');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#phone_number">
	  <?php esc_html_e('Phone number');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#email">
	  <?php esc_html_e('Email');?>
	</button>


	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#steet_house_no">
	  <?php esc_html_e('Street and house number');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#zip_code">
	  <?php esc_html_e('ZIP Code');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#place">
	  <?php esc_html_e('Place');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hints">
	  <?php esc_html_e('Hints');?>
	</button>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#coupon_code">
	  <?php esc_html_e('Coupon code');?>
	</button>
</div>	

<!-- First name Modal -->
<div class="modal fade" id="firstnameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('First Name');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $first_name_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $first_name_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($first_name_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($first_name_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="first_name_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>

<!-- Surname Modal -->
<div class="modal fade" id="surnameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Surname');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $sur_name_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $sur_name_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($sur_name_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($sur_name_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="sur_name_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Phone number Modal -->
<div class="modal fade" id="phone_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Phone number');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $phone_number_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $phone_number_error_msg; ?>" required/>
							</div>

							<label for="max_input" class="cform-label"><?php esc_html_e("Max input"); ?></label>
							<div class="cform-input-group">
								<input type="number" name="max_input" value="<?php echo $phone_number_max_input;?>"/>
							</div>

							<label for="min_input" class="cform-label"><?php esc_html_e("Min input"); ?></label>
							<div class="cform-input-group">
								<input type="number" name="min_input" value="<?php echo $phone_number_min_input;?>"/>	
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($phone_number_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($phone_number_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="phone_number_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Email Modal -->
<div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Email');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $email_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $email_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($email_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($email_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="email_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Salutation Modal -->
<div class="modal fade" id="salutation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Salutation');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $salutation_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $salutation_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($salutation_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($salutation_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="salutation_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>

<!-- Company Modal -->
<div class="modal fade" id="company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Company name');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $company_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $company_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($company_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($company_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="company_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Street and house number Modal -->
<div class="modal fade" id="steet_house_no" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Street and house number');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $steet_house_no_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $steet_house_no_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($steet_house_no_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($steet_house_no_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="steet_house_no_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- ZIP Code Modal -->
<div class="modal fade" id="zip_code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('ZIP Code');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $zip_code_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $zip_code_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($zip_code_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($zip_code_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="zip_code_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Place Modal -->
<div class="modal fade" id="place" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Place');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $place_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $place_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($place_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($place_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="place_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Hints Modal -->
<div class="modal fade" id="hints" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Hints');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $hints_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $hints_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($hints_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($hints_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="hints_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


<!-- Coupon Modal -->
<div class="modal fade" id="coupon_code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e('Coupon Code');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
						<div class="cform-group">
							<label for="firstname" class="cform-label"><?php esc_html_e("Label name"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="label_name" value="<?php echo $coupon_code_label;?>" required/>
							</div>	

							<label for="error_msg" class="cform-label"><?php esc_html_e("Error Msg"); ?></label>
							<div class="cform-input-group">
								<input type="text" name="error_msg" value="<?php echo $coupon_code_error_msg;?>" required/>
							</div>

							<div class="cform-input-group">	
								<?php esc_html_e('Required:');?> <input type="radio" name="required" value="yes" <?php if($coupon_code_required == "yes") {echo "checked";}?> required><label for="Yes"><?php esc_html_e('Yes');?></label>
									<input type="radio" name="required" value="no" <?php if($coupon_code_required == "no") {echo "checked";}?>><label for="No"><?php esc_html_e('No');?></label>
							</div>

							<input type="hidden" name="validation_key" value="coupon_code_key">

							 <div class="modal-footer">
	        				<button type="submit" name="admin_submit" class="btn btn-primary"><?php esc_html_e('Save');?></button>
	      				</div>
	      		</div>		
				</form>

      </div>
     
    </div>
  </div>
</div>


	



	