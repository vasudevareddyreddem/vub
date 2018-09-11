<?php if(isset($home_page_video) && count($home_page_video)>0){ ?>
  <div class="">
    <div class="intro-video intro-dark-bg ">
		<video autoplay loop muted poster="screenshot.jpg" id="background" height="100%" width="100%" style="overflow:hidden">
        <source src="<?php echo base_url('assets/homepage_videos/'.$home_page_video['video_name']); ?>" type="video/mp4"  >
		  </video>
                <div class="overlay"></div>
                <div class="intro-body mobile-heading">
                    <div class="container ">
                       <h1 class="brand-heading"><?php echo isset($home_page_video['title'])?$home_page_video['title']:''; ?></h1>
                     </div>
                </div>
        </div>
    <!-- /.container -->
  </div>
  <?php } ?>
  </div>
<section id="" class="bg-white">
 
            <div class="container">
                <div class="row" data-scrollreveal="enter left over 1s">
                    <div class="col-lg-4 ">
					   <video class="thumbnail" width="100%" height="100%" controls   controlsList="nodownload">
							<source src="<?php echo base_url('assets/aboutus_video/'.$aboutus['video_name']) ?>" type="video/mp4">
							<source src="movie.ogg" type="video/ogg">
						</video>
                    </div>
                    <div class="col-lg-8 " data-scrollreveal="enter right over 1s">
                        <?php echo isset($aboutus['aboutus'])?$aboutus['aboutus']:''; ?>
                        
                    </div>
                </div>
            </div>
        </section>

        
		<?php if(isset($testimonial) && count($testimonial)>0){ ?>
        <section class="">
           <div class="container">

  <div class='row'>
    <div class='col-md-offset-2 col-md-8'>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
		<?php $cnt=0;foreach($testimonial as $list){ ?>
			  <?php if($cnt==0){ ?>
			  <li data-target="#quote-carousel" data-slide-to="<?php echo $cnt; ?>" class="active"></li>
			  <?php }else{ ?>
			       <li data-target="#quote-carousel" data-slide-to="<?php echo $cnt; ?>"></li>
			  <?php } ?>
			  
		  <?php $cnt++;} ?>
        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
		  <?php $cnt=0;foreach($testimonial as $list){ ?>
			  <?php if($cnt==0){ ?>
				  <div class="item active">
					<blockquote>
					  <div class="row">
						<div class="col-sm-3 text-center">
							<?php if($list['image_name']!=''){ ?>
							<img class="img-circle" src="<?php echo base_url('assets/testimonial/'.$list['image_name']); ?>"/>
							<?php }else{?>
								<div class="img-circle" ><?php echo $result = substr($list['author_name'], 0, 2); ?></div>

							<?php } ?>
						  
						
						</div>
						<div class="col-sm-9">
						  <?php echo isset($list['testimonial'])?$list['testimonial']:''; ?>
						  <small><?php echo isset($list['author_name'])?$list['author_name']:''; ?></small>
						</div>
					  </div>
					</blockquote>
				  </div>
			  <?php }else{ ?>
					<div class="item">
						<blockquote>
						   <div class="row">
									<div class="col-sm-3 text-center">
										<?php if($list['image_name']!=''){ ?>
										<img class="img-circle" src="<?php echo base_url('assets/testimonial/'.$list['image_name']); ?>"/>
										<?php }else{?>
											<div class="img-circle" ><?php echo $result = substr($list['author_name'], 0, 2); ?></div>

										<?php } ?>
									  
									
									</div>
									<div class="col-sm-9">
									  <?php echo isset($list['testimonial'])?$list['testimonial']:''; ?>
									  <small><?php echo isset($list['author_name'])?$list['author_name']:''; ?></small>
									</div>
								  </div>
						</blockquote>
				  </div>
			  <?php } ?>
			  
		  <?php $cnt++;} ?>
          
        </div>
        
        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>                          
    </div>
  </div>
</div>
        </section>
		<?php } ?>
		
<script>
$(document).ready(function() {
  //Set the carousel options
  $('#quote-carousel').carousel({
    pause: true,
    interval: 4000,
  });
});
</script>

