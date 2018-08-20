<?php include("header1.php"); ?>

<div class="content-wrapper">
	<div class="body-start-page ">
<!-- Main content -->
    <section class="content">
      <div class="row">
		 
		 <div class="col-md-8  lib-item " data-category="view">
			<div class="sidebar-recent bg-white">
				<video width="100%" height="100%" controls  autoplay controlsList="nodownload">
					<source src="dist/video/back1.mp4" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
				</video>
				<div class="video-content">
					<div class="row">
					<div class="col-md-9">
						<h4><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></h4>	
					</div>
					<div class="col-md-3">
						<span class="pull-right">
									<button class="btn btn-primary btn-sm">Subscribe</button>
								</span>
					</div>
					</div>
					 <hr>
						 <h5><strong class="site-col-r">Course Name:</strong> Php Training Video</h5>
						 <h5><strong class="site-col-b">Training Mode:</strong> Offline</h5>
						 <h5><strong class="site-col-b">Training Mode:</strong> Offline</h5>
						 <h5><strong class="site-col-b">Trainer Name:</strong> Vubinxxxx</h5>
						 <p class="vide0-parag">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
				</div>
			</div>
            </div>
				<div class="col-md-4 ">
					<div id="sticky-anchor"></div>
				<div id="sticky">
					<div class="sidebar-recent bg-white">
						<div class="bg-primary pad-10">
							
							   <h3 class="text-white pad-rl-15">Institute  Details</h3>
								
						</div>	
						   <div class="pad-15" >
							  <div class="user-panel">
								<div class="bg-white" style="padding:10px;border-radius:5px;">
								 <img  class="img-responsive" src="dist/img/in1.png" alt="naresh">
								</div>
							   
							  </div>
							
							  <!-- sidebar menu: : style can be found in sidebar.less -->
							  <div class="" style="overflow:hidden;">
								   <h4>Naresh Technologies</h4>
								   <small ><i class="fa fa-map-marker"> </i> &nbsp; Ameerpet,Hyderabad,India</small > 
							  <div class="help-side">
								   <small ><i class="fa fa-phone"> </i>&nbsp;  8500226782</small>
							  </div>  
							 <div class="help-side">
								   <small ><i class="fa fa-envelope"> </i>&nbsp;  vxxxx@gmail.com</small>
							  </div>   
							  <div class="help-side">
								   <small ><i class="fa fa-video-camera"> </i>&nbsp;  Total: 230</small>
							  </div> 
							</div> 
							</div> 
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>
				</div>
      </div>
	  
      <!-- /.row -->
    </section>
    <section class="content" id="recommended">
		<div class="">
			<div class="sidebar-recent bg-white pad-20">
				<h4>Similar videos</h4>
				<hr>
				<div class="row">
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="dist/video/back2.mp4" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15">Beginner PHP Tutorial - Part 1 - Introduction to PHP</div>
					</div>
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="dist/video/back2.mp4" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15">Beginner PHP Tutorial - Part 1 - Introduction to PHP</div>
					</div>
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="dist/video/back2.mp4" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15">Beginner PHP Tutorial - Part 1 - Introduction to PHP</div>
					</div>
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="dist/video/back2.mp4" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15">Beginner PHP Tutorial - Part 1 - Introduction to PHP</div>
					</div>
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="dist/video/back2.mp4" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15">Beginner PHP Tutorial - Part 1 - Introduction to PHP</div>
					</div>
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="dist/video/back2.mp4" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15">Beginner PHP Tutorial - Part 1 - Introduction to PHP</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- /.content -->
  </div>	
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  </div>	
 
<script>
	function sticky_relocate() {
		var window_top = $(window).scrollTop();
		var footer_top = $("#recommended").offset().top;
		var div_top = $('#sticky-anchor').offset().top - 80
		var div_height = $("#sticky").height();
		
		var padding = 20; 
		
		if (window_top + div_height > footer_top - padding)
			$('#sticky').css({top: (window_top + div_height - footer_top + padding) * -1})
		else if (window_top > div_top) {
			$('#sticky').addClass('stick');
			$('#sticky').css({top: 80})
		} else {
			$('#sticky').removeClass('stick');
		}
	}

	$(function () {
		$(window).scroll(sticky_relocate);
		sticky_relocate();
	});
</script>

<?php include("footer1.php"); ?>



