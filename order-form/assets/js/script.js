jQuery (function(){

	jQuery("#cform-submit").on("click",function(e){
		e.preventDefault()
		var salutation = jQuery("#salutation").val();
		var first_name = jQuery("#first_name").val();
		var sur_name = jQuery("#sur_name").val();
		var company_name = jQuery("#company_name").val();
		var email = jQuery("#email").val();
		var phone_number = jQuery("#phone_number").val();

		var steet_house_no = jQuery("#steet_house_no").val();
		var zip_code = jQuery("#zip_code").val();
		var place = jQuery("#place").val();

		var hints = jQuery("#hints").val();
		var coupon_code = jQuery("#coupon_code").val();

		var salutationreq = jQuery("#salutation").attr("req");
		var fnamereq = jQuery("#first_name").attr("req");
		var surnamereq = jQuery("#sur_name").attr("req");
		var pnumberreq = jQuery("#phone_number").attr("req");
		var emailreq = jQuery("#email").attr("req");
		var companyreq = jQuery("#company_name").attr("req");

		var steet_house_noreq = jQuery("#steet_house_no").attr("req");
		var zip_codereq = jQuery("#zip_code").attr("req");
		var placereq = jQuery("#place").attr("req");

		var hintsreq = jQuery("#hints").attr("req");
		var coupon_codereq = jQuery("#coupon_code").attr("req");
		
		jQuery.ajax({
			url: ajax_obj.ajaxurl,
			type: "POST",
			data: {salutation:salutation,first_name:first_name,
			sur_name:sur_name,company_name:company_name,email:email,
			phone_number:phone_number,steet_house_no:steet_house_no,
			zip_code:zip_code,place:place,hints:hints,coupon_code:coupon_code,
			salutationreq:salutationreq,fnamereq:fnamereq,surnamereq:surnamereq,
			pnumberreq:pnumberreq,emailreq:emailreq,companyreq:companyreq,
			steet_house_noreq:steet_house_noreq,zip_codereq:zip_codereq,
			placereq:placereq,hintsreq:hintsreq,coupon_codereq:coupon_codereq,
			action:"cform_data"},
			dataType: "json",
			cache:false,
			beforeSend: function() {
				jQuery(".cform-submit-loader").show();
				jQuery(".coupon_msg").show();
			},
			success: function(data) {
				console.log(data);
				jQuery(".cform-submit-loader").hide();
				jQuery(".display-error").css("display","none");
				jQuery(".coupon_msg").hide();
				
				if (data.code == "200"){
                    //alert("Success: " +data.msg);
                    swal({
					  title: "Success",
					  text: data.msg,
					  icon: "success",
					  button: "Close"
					});
				jQuery("#cform")[0].reset();	
                } else {
                	jQuery(".display-error").css("display","block");
                    jQuery(".display-error").html("<ul>"+data.msg+"</ul>");

                }
			} 
				
		});
	});

	jQuery("#coupon-code-submit").on("click",function(e){
		e.preventDefault()
		var coupon_code = jQuery("#coupon_code").val();
		
		jQuery.ajax({
			url: ajax_obj.ajaxurl,
			type: "POST",
			data: {coupon_code:coupon_code, action:"getcoupon_data"},
			dataType: "json",
			cache:false,
			beforeSend: function() {
				jQuery(".coupon-submit-loader").show();
			},
			success: function(data) {
				console.log(data);
				jQuery(".coupon-submit-loader").hide();
				jQuery(".coupon_msg").text(data.msg);
				jQuery(".coupon_msg").show();
				
			} 
				
		});
	});	 

});



	
