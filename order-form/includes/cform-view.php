<?php 
	include_once PLUGIN_DIR_PATH."/includes/cform-fetch-validation-data.php";

	
?>

<div class="cform-wrapper">
	<div class="container">
		<div class="row">
			<div class="cform-title col-md-12">
		    	<h3><?php esc_html_e('Personal Information');?></h3>
		    </div>
		</div>
	    <form method="POST" action="" id="cform">
	    	<div class="alert alert-danger display-error" role="alert" style="display: none">
	    	</div>

	    	<div class="row">
		    	<div class="cform-group col-md-12">
		            <label for="firstname" class="cform-label"><?php echo $salutation_label;?></label>
		            <div class="cform-dropdown-group">
		                <select name="salutation" id="salutation" req="<?php echo $salutation_required;?>">
		                	<option value="Select Salutation"><?php esc_html_e('Select Salutation');?></option>
		                	<option value="Mr."><?php esc_html_e('Mr.');?></option>
		                	<option value="Mrs."><?php esc_html_e('Mrs.');?></option>
		                </select>
		            </div>
		           
		            
		        </div>
		    </div>
		        
	        <div class="row">
		    	<div class="cform-group col-md-6">
		            <label for="firstname" class="cform-label"><?php echo $first_name_label; ?></label>
		            <div class="cform-input-group">
		                <input type="text" name="first_name" id="first_name" class="cform-control" placeholder="First name" req="<?php echo $first_name_required; ?>"/>
		            </div>
		           		        
		        </div>
		        

		        <div class="cform-group col-md-6">
		            <label for="surname" class="cform-label"><?php echo $sur_name_label; ?></label>
		            <div class="cform-input-group">
		                <input type="text" name="sur_name" id="sur_name" class="cform-control" placeholder="Surname" req="<?php echo $sur_name_required; ?>"/>
		            </div>
		        </div>
		        
		    </div>

		    <div class="row">   
		        <div class="cform-group col-md-12">
		            <label for="companyname" class="cform-label"><?php echo $company_label; ?></label>
		            <div class="cform-input-group">
		                <input type="text" name="company_name" id="company_name" class="cform-control" placeholder="Company name" req="<?php echo $company_required; ?>"/>
		            </div>
		        </div>
		    </div>    

		    <div class="row">
		        <div class="cform-group col-md-6">
		            <label for="phone_number" class="cform-label"><?php echo $phone_number_label; ?></label>
		            <div class="cform-input-group">
		                <input type="text" name="phone_number" id="phone_number" class="cform-control" placeholder="Phone number" req="<?php echo $phone_number_required; ?>" />
		            </div>
		        </div>

		        <div class="cform-group col-md-6">
		            <label for="email" class="cform-label"><?php echo $email_label;?></label>
		            <div class="cform-input-group">
		                <input type="email" name="email" id="email" class="cform-control" placeholder="Email" req="<?php echo $email_required;?>" />    
		            </div>
		        
		        </div>
		    </div>    

		    <div class="row">
		        <div class="cform-group col-md-4">
		            <label for="street&house_no" class="cform-label"><?php echo $steet_house_no_label;?></label>
		            <div class="cform-input-group">
		                <input type="text" name="steet_house_no" id="steet_house_no" class="cform-control" placeholder="Steet and house no" req="<?php echo $steet_house_no_required;?>"/>
		            </div>
		            
		        </div>

		        <div class="cform-group col-md-4">
		            <label for="zip_code" class="cform-label"><?php echo $zip_code_label;?></label>
		            <div class="cform-input-group">
		                <input type="text" name="zip_code" id="zip_code" class="cform-control" placeholder="ZIP Code" req="<?php echo $zip_code_required;?>"/>
		            </div>
		           
		        </div>

		        <div class="cform-group col-md-4">
		            <label for="place" class="cform-label"><?php echo $place_label;?></label>
		            <div class="cform-input-group">
		                <input type="text" name="place" placeholder="Place" id="place" class="cform-control" req="<?php echo $place_required;?>" />
		            </div>
		           
		        </div>
		    </div>
		      
		    <div class="row">    
		        <div class="cform-group col-md-12">
		            <label for="Hints" class="cform-label"><?php echo $hints_label;?></label>
		            <div class="cform-input-group">
		                <textarea name="hints" id="hints" placeholder="Hints" class="cform-control" rows="5" cols="40" req="<?php echo $hints_required;?>"></textarea>
		            </div>
		        </div>
		    </div>    

		    <div class="row">
		        <div class="cform-coupon-wrapper col-md-12">
		        	<h3><?php esc_html_e('Coupon');?></h3>
		        	<div class="cform-group">
		            	<label for="coupon_code" class="cform-label"><?php echo $coupon_code_label;?></label>
		            	<div class="cform-input-group">
		            		
		                	<input type="text" placeholder="Coupon code" name="coupon_code" id="coupon_code" class="cform-control coupon_code" req="<?php echo $coupon_code_required;?>"/>
		                	<input type="submit" name="coupon-code-submit" id="coupon-code-submit" value="<?php esc_html_e('Apply coupon code');?>" />
		                	<img src="<?php echo PLUGIN_URL; ?>/order-form/assets/images/loader/spinner.gif" class="coupon-submit-loader">
		               
		            	</div>
		            	<span class="coupon_msg"></span>
		        	</div>
		        </div>
		    </div>    
		    <div class="row">
		        <div class="cform-group col-md-12">
		            <input type="submit" name ="cform-submit" id="cform-submit" value="<?php esc_html_e('Proceed to payment');?>" />
		            <img src="<?php echo PLUGIN_URL; ?>/order-form/assets/images/loader/spinner.gif" class="cform-submit-loader">
		        </div>
		    </div>    
	    </form>
	</div>
</div>





		
	