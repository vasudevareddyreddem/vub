<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Institute Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Institute Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-md-6">
              <table id="" class="col-md-6 table table-bordered table-striped">
               
                <tbody>
                <tr>
                  <th>Institute Name</th>
                  <td><?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Institute Logo</th>
                    <td>
					<?php if($institute_details['i_logo']!=''){ ?>
						<img class="img-responsive" style="width:150px;height:auto;" src="<?php echo base_url('assets/institute_logo/'.$institute_details['i_logo']); ?>">
					<?php } ?>
					</td>
                </tr>
				<tr>
                  <th>About Institute</th>
                  <td><?php echo isset($institute_details['i_about'])?$institute_details['i_about']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Website</th>
                    <td><?php echo isset($institute_details['i_website'])?$institute_details['i_website']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Country</th>
                    <td><?php echo isset($institute_details['c_name'])?$institute_details['c_name']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>City</th>
                    <td><?php echo isset($institute_details['city_name'])?$institute_details['city_name']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Location</th>
                    <td><?php echo isset($institute_details['l_name'])?$institute_details['l_name']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Detailed Address</th>
                    <td><?php echo isset($institute_details['i_address'])?$institute_details['i_address']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Primary Contact</th>
                    <td><?php echo isset($institute_details['i_p_phone'])?$institute_details['i_p_phone']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Secondary Contact</th>
                    <td><?php echo isset($institute_details['i_s_phone'])?$institute_details['i_s_phone']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>E-Mail ID</th>
                    <td><?php echo isset($institute_details['i_email_id'])?$institute_details['i_email_id']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Founder Name</th>
                    <td><?php echo isset($institute_details['i_founder'])?$institute_details['i_founder']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>About Founder</th>
                    <td><?php echo isset($institute_details['i_f_about'])?$institute_details['i_f_about']:''; ?></td>
                 
                </tr>
				<tr>
                  <th>Contact Person</th>
                    <td><?php echo isset($institute_details['i_contact_person'])?$institute_details['i_contact_person']:''; ?></td>
                 
                </tr>
				<tr>
                  <th><a href="<?php echo base_url('institute/edit'); ?>">Edit</a></th>
                 
                </tr>
                
                </tbody>
             
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>	
  <