
<div class="content-wrapper">
	<div class="body-start-page ">
<!-- Main content -->
    <section class="content">
      <div class="row">
		 <div class="col-md-2 no-padding bg-dark pos-ab-left" >
		 <div id="sticky-anchor"></div>
				<div id="sticky">
			<section class=" ">
      <!-- Sidebar user panel -->
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
	

       
       
    </section>
		 </div>
		 </div>
		 <div class="col-md-7 no- lib-item col-md-offset-2" data-category="view">
		  <marquee scrolldelay="150"  onmouseover="this.stop()" onmouseout="this.start()">Next Batch Will Be Started On 15-08-2018 <strong>Timings :</strong>11.Am to 1Pm and 3.Pm to 6.Pm</marquee>
                 <div class="article">
					   <div class="row">
						  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <div class="article-footer clearfix">
								<span class="pull-left">
								   <h4 class="text-white">Php Training Video</h4>
								</span>	
								<span class="pull-right">
									<button class="btn btn-primary btn-sm">Subscribe</button>
								</span>	
							 </div>
						  </div>
						  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <div class="article-body clearfix">
								<div class="row">
								   <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p0">
									  <div class="article-view">
										 <div class="">
										 <a href="videoplay.php">
										 <video width="100%" height="100%" class="thumbnail">
										  <source src="dist/video/back1.mp4" type="video/mp4">
										  <source src="movie.ogg" type="video/ogg">
										</video></a>
												
										 </div>
									  </div>
								   </div>
								   <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									  <div class="article-details">
										 <h4><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></h4>
										 
										 <h5><strong class="site-col-r">Course Name:</strong> Php Training Video</h5>
										 <h5><strong class="site-col-b">Training Mode:</strong> Offline</h5>
										 <h5><strong class="site-col-b">Training Mode:</strong> Offline</h5>
										 <h5><strong class="site-col-b">Trainer Name:</strong> Vubinxxxx</h5>
										 
									  </div>
								   </div>
								</div>
								
							 </div>
						  </div>
						    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <div class="article-head clearfix">
								<span class="">
								  <i class="fa fa-thumbs-up" aria-hidden="true"></i> 25
								</span>
								<span class="mar-l10">
								  <i class="fa fa-eye" aria-hidden="true"></i> 35
								</span>
								<span class="pull-right">
								   <h4 class="text-white" style="line-height:24px"><i class="fa fa-clock-o" aria-hidden="true"></i> Thu Jan 27 2011 02:05:17 </h4>
								</span>
							 </div>
						  </div>
					   </div>
					</div>
					 
					 
            </div>
			<div class="col-md-3 ">
				
				<div id="">
				
							<div class="sidebar-recent bg-white">
							<div class="bg-primary pad-10">
								<span class="">
								   <h3 class="text-white text-center">Latest Courses </h3>
								</span>	
							</div>	
							 <div class="pad-10 " >
								<ul class="list-courses">
									<li class=""><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></li>
									<li class=" class="pad-t10"><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></li>
									<li class="pad-t10"><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></li>
									<li class=" class="pad-t10"><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></li>
									<li class="pad-t10"><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></li>
									<li class=" class="pad-t10"><a href="#" target="_blank" style="color:#0062C4;">VideoTutorial 1 del Curso de PHP y MySQL Orientado a Objetos</a></li>
								</u>
								
							 </div>
						  </div>
						  <div class="clearfix">&nbsp;</div>	
					
						</div>
						</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>	
  </div>	
 
<script>
	function sticky_relocate() {
		var window_top = $(window).scrollTop();
		var footer_top = $("#footer").offset().top;
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

