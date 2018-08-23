<div class="content-wrapper">
<div class="body-start-page">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title">form Validations</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('institute/addpost'); ?>" enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Institute Name</label>
								<div class="">
									<input type="text" class="form-control" name="i_name" id="i_name" placeholder="Institute Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Institute Logo</label>
								<div class="">
									<input type="file" class="form-control" name="i_logo" id="i_logo" placeholder="Institute Logo" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">About Institute</label>
								<div class="">
									<input type="text" class="form-control" name="i_about" id="i_about" placeholder="About Institute" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Website</label>
								<div class="">
									<input type="text" class="form-control" name="i_website" id="i_website" placeholder="ex: http://Institute.com" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Country</label>
								<div class="">
								<select  class="form-control select2" onchange="get_city_list(this.value)" name="country_name" id="country_name">
								<option value="">Select</option>
								<?php if(isset($countries_list) && count($countries_list)>0){ ?>
								<?php foreach($countries_list as $list){ ?>
								<option value="<?php echo $list['c_id']; ?>"><?php echo $list['country_name']; ?></option>
								<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">City</label>
								<div class="">
								<select  class="form-control select2" onchange="get_location_list(this.value)" name="i_city" id="i_city">
								<option value="">Select</option>
							
								</select>
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Location</label>
								<div class="">
								<select  class="form-control select2" name="location_name" id="location_name">
								<option value="">Select</option>
							
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Detailed Address</label>
								<div class="">
									<input type="text" class="form-control" name="i_address" id="i_address" placeholder="Detailed Address" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Primary Contact</label>
								<div class="">
									<input type="text" class="form-control" name="i_p_phone" id="i_p_phone" placeholder="Primary Contact" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Secondary Contact</label>
								<div class="">
									<input type="text" class="form-control" name="i_s_phone" id="i_s_phone" placeholder="Secondary Contact" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">E-Mail ID</label>
								<div class="">
									<input type="text" class="form-control" name="i_email_id" id="i_email_id" placeholder="Email Id" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Founder Name</label>
								<div class="">
									<input type="text" class="form-control" name="i_founder" id="i_founder" placeholder="Founder Name" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">About Founder</label>
								<div class="">
									<input type="text" class="form-control" name="i_f_about" id="i_f_about" placeholder="About Founder" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Contact Person</label>
								<div class="">
									<input type="text" class="form-control" name="i_contact_person" id="i_contact_person" placeholder="Contact Person" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add</button>
								
                                
                            </div>
                        </div>
						
                    </form>
					<div class="clearfix">&nbsp;</div>
          </div>
          </div>
          
      
        </div>
		
      
      <!-- /.row -->
    </section> 
	
</div>
</div>

  <script type="text/javascript">
$(document).ready(function() {
	    $(".select2").select2();
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lastName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'The username is not available'
                    },
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            birthday: {
                validators: {
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The birthday is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            'languages[]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            },
            'programs[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
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
