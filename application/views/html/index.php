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
							<source src="<?php echo base_url(); ?>assets/vendor/front-end/video/back1.mp4" type="video/mp4">
							<source src="movie.ogg" type="video/ogg">
						</video>
                    </div>
                    <div class="col-lg-8 " data-scrollreveal="enter right over 1s">
                        <h2>About Us</h2>
                     
						<h3>Host videos in the highest quality possible</h3>
                        <p>Start uploading, and enjoy 4K Ultra HD with HDR, tools to manage and showcase videos, no ads before, during, or after your videos, AND professional live streaming plans.</p>
                      
                           
                        
                    </div>
                </div>
            </div>
        </section>

        

        <section class="">
           <div class="container">

  <div class='row'>
    <div class='col-md-offset-2 col-md-8'>
      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <div class="item active">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="http://www.reactiongifs.com/r/overbite.gif" style="width: 100px;height:100px;">
                
                </div>
                <div class="col-sm-9">
                  <p>Vubin is a valuable enterprise platform for businesses to share their high-quality, visual stories.</p>
                  <small>Someone famous</small>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p>
                  <small>Someone famous</small>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 3 -->
          <div class="item">
            <blockquote>
              <div class="row">
                <div class="col-sm-3 text-center">
                  <img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/keizgoesboom/128.jpg" style="width: 100px;height:100px;">
                </div>
                <div class="col-sm-9">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p>
                  <small>Someone famous</small>
                </div>
              </div>
            </blockquote>
          </div>
        </div>
        
        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>                          
    </div>
  </div>
</div>
        </section>
		
<script>
$(document).ready(function() {
  //Set the carousel options
  $('#quote-carousel').carousel({
    pause: true,
    interval: 4000,
  });
});
</script>

