<?php include("header.php"); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Profile
        <small>Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">User information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 ">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                                     alt="User Pic">
                            </div>
                           
                        
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <th>User level:</th>
                                        <td>Administrator</td>
                                    </tr>
									  <tr>
                                        <th>User level:</th>
                                        <td>Administrator</td>
                                    </tr>
									  <tr>
                                        <th>User level:</th>
                                        <td>Administrator</td>
                                    </tr>
									
									  <tr>
                                        <th>User level:</th>
                                        <td>Administrator</td>
                                    </tr>
									  <tr>
                                        <th>User level:</th>
                                        <td>Administrator</td>
                                    </tr>
									
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  
                </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>	
  <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php include("footer.php"); ?>