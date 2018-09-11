
<div class="content-wrapper bg-white">
	<div class="body-start-page ">
<!-- Main content -->
    
	<section class="content " style="padding-top:50px;">
      <div class="row">
		<div class="col-md-4 col-md-offset-4 border-ddd" >
		<h3 class="text-center">Log in to <?php echo isset($user_details['source'])?$user_details['source']:''; ?></h3>
		<hr>
		<form id="defaultForm" method="post" class="" action="<?php echo base_url('user/verificationpost'); ?>">
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">source</label>
								<div class="">
									<input type="text" class="form-control" name="source" id="source" placeholder="Enter source" value="<?php echo isset($user_details['source'])?$user_details['source']:''; ?>" />
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Name</label>
								<div class="">
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter email" value="<?php echo isset($user_details['name'])?$user_details['name']:''; ?>" />
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Email</label>
								<div class="">
									<input type="text" class="form-control" id="email_id"  name="email_id" placeholder="Enter email" value="<?php echo isset($user_details['email_id'])?$user_details['email_id']:''; ?>" />
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Mobile </label>
								<div class="">
									<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" />
								</div>
							</div>
                        </div>
						
						
					
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">verify</button>
								
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
            source: {
				validators: {
                    notEmpty: {
						message: 'Source is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Detailed Address wont allow <> [] = % '
					}
                }
            },
			name: {
				validators: {
                    notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Name wont allow <> [] = % '
					}
                }
            },
            email_id: {
                validators: {
					notEmpty: {
						message: 'E-Mail ID is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			mobile: {
                validators: {
					notEmpty: {
						message: 'Mobile Number is required'
					},
					 regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 to 14 digits'
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


