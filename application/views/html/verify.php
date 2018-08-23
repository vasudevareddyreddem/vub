
<div class="content-wrapper bg-white">
	<div class="body-start-page ">
<!-- Main content -->
    
	<section class="content  pad-100">
      <div class="row">
		<div class="col-md-4 col-md-offset-4 border-ddd" >
		<h3 class="text-center">Mobile  Number Verification</h3>
		<hr>
		<form id="defaultForm" method="post" class="" action="<?php echo base_url('user/otpverifciationpost'); ?>">
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Mobile </label>
								<div class="">
									<input type="text" class="form-control" id="mobile" readonly="true" name="mobile" value="<?php echo isset($user_details['mobile'])?$user_details['mobile']:''; ?>" placeholder="Enter Mobile" />
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">OTP</label>
								<div class="">
									<input type="text" class="form-control" id="otp"  name="otp" value="" placeholder="Enter Mobile Number Verification Code" />
								</div>
							</div>
                        </div>
						
						<div class="clearfix">&nbsp;</div>
						 <div class="form-group">
                            <div class="col-lg-2 col-lg-offset-1">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">verify</button>
								
								
                                
                            </div> 
							<div class="col-lg-2 col-lg-offset-3">
                                <a href="<?php echo base_url('user/resendotp'); ?>" type="button" class="btn btn-primary" name="ResendOTP" value="Resend OTP">Resend OTP</a>
							</div>
                        </div>
						
                    </form>
		
			
		</div>
    </section>
    <!-- /.content -->
  </div>	
  </div>	
 <script>
 $(document).ready(function() {
	    $(".select2").select2();
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//      
        fields: {
           
			otp: {
                validators: {
					notEmpty: {
						message: 'OTP is required'
					},
					 regexp: {
					regexp:  /^[0-9]{6}$/,
					message:'OTP must be 6 digits'
					}
				}
            },
          
            captcha: {
                validators: {
                    callback: {
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
 </script>


