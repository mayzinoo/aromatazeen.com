
<!DOCTYPE HTML>
<html>
<head>
<base href="<?php echo base_url(); ?>">
<title>Laser | iT & Mobile Co.,Ltd</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/flatmenu.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="Telephone Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>

 <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,300italic,400italic' rel='stylesheet' type='text/css'>
<!--/script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>


<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<!--light-box-files -->
<script type="text/javascript" >
$(function() {
	$('.gallery a').Chocolat();
});
</script>
<!-- //gallery -->
<!-- flat menu -->
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- header -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class=" logo">
					<img src="images/logo.png" class="img-responsive">
				</div>	
			</div>
			<div class="col-md-offset-2 col-md-2 padding_md">
				<div class="row noppadding">
					<div class="col-md-4">
						<img src="images/envelope.png" class="img-responsive">
					</div>
					<div class="col-md-8">Email Us at
					</div>
				</div>
			</div>
			<div class="col-md-2 padding_md">
				<div class="row noppadding">
					<div class="col-md-4">
						<img src="images/mobile.png" class="img-responsive">
					</div>
					<div class="col-md-8">Call Us at
					</div>
				</div>
			</div>
			<div class="col-md-2 padding_md">
				<div class="row noppadding">
					<div class="col-md-4">
						<img src="images/fax.png" class="img-responsive">
					</div>
					<div class="col-md-8">Fax
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="menu">	
			<div class="container">
				<div id='cssmenu'>
					<ul>
					   <li><a href='#'>Home</a></li>
					   <li><a href='#'>About</a></li>
					   <li class='active'><a href='#'>Products</a>
					      <ul>
					         <li><a href='#'>Product 1</a>
					            <ul>
					               <li><a href='#'>Sub Product</a></li>
					               <li><a href='#'>Sub Product</a></li>
					            </ul>
					         </li>
					         <li><a href='#'>Product 2</a>
					            <ul>
					               <li><a href='#'>Sub Product</a></li>
					               <li><a href='#'>Sub Product</a></li>
					            </ul>
					         </li>
					      </ul>
					   </li>
					  <li><a href='#'>Services</a></li>
					   <li><a href='#'>Contact</a></li>
					</ul>
				</div>
			</div>
		</div> 
		
				<div class="clearfix"></div>
	</div>
</header>					
<!-- header -->

<!-- banner -->

	<style>
            /* jssor slider loading skin spin css */
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }
       </style>
    <div class="row">
	<div id="slider1_container" style="visibility: hidden; position: relative; margin: 0 auto; width: 1140px; height: 314.033px; overflow: hidden;">
            
            <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1140px; height: 442px;
            overflow: hidden;">
                <div>
                    <img src="<?php echo base_url(); ?>/images/slide001.jpg" class="img-responsive">
                </div>
                <div>
                    <img src="<?php echo base_url(); ?>/images/slide001.jpg" class="img-responsive">
                </div>                
            </div>
            
            <!--#region Bullet Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
            <style>
                .jssorb031 {position:absolute;}
                .jssorb031 .i {position:absolute;cursor:pointer;}
                .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
                .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
                .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
                .jssorb031 .i.idn {opacity:.3;}
                .pagi{
                	top:-30px !important;
                }
            </style>
            <div data-u="navigator" class="jssorb031 pagi" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            
            <style>
                .jssora051 {display:block;position:absolute;cursor:pointer;}
                .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                .jssora051:hover {opacity:.8;}
                .jssora051.jssora051dn {opacity:.5;}
                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
            </style>
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
            <!--#endregion Arrow Navigator Skin End -->
    </div><!-- end slider -->
	</div>

	


<!--about -->
<div class="row">
<div class="about" id="about">
  <div class="container">
      <div class="col-md-6 ab-right w3l">
			<h3>LASER <span style="font-size:25px;">iT Mobile Tech Co.,Ltd</span></h3>
			<h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur.</h4>
			<a href="" class="view">Read More</a>
		</div>
			<div class="clearfix"></div>
  </div>
</div>
</div>
<!--//about-->
<!-- gallery -->
			<div id="gallery" class="gallery">
				<!-- <div class="container"> -->
				<h3 class="tittle">IT Collections</h3>
				<div class="gallery-grids w3l-agile">
					<div class="baner-row">
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/carmera.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/carmera.jpg" alt="" class="img-responsive" />
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Photography</h4></a>
										
									</figcaption>
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/computer.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/computer.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Computers</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/tv.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/tv.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">TV & Entertainment</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/video.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/video.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Professional Video</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="clearfix"> </div>
					</div>	
					<div class="baner-row">
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/mobile.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/mobile.jpg" alt="" class="img-responsive" />
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Mobile</h4></a>
											
									</figcaption>
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/audio.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/audio.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Pro Audio</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/photo-acceesories.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/photo-acceesories.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Photo Accessories</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/drone.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/drone.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Drone & Camcorders</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="clearfix"> </div>
					</div>		
					<div class="baner-row">
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/lighting.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/lighting.jpg" alt="" class="img-responsive" />
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Lighting</h4></a>
										
									</figcaption>
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/cctv.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/cctv.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Surveillance</h4></a>
										
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/audio.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/audio.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">Pro Audio</h4></a>
											
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="col-md-3 baner-bottom">
							<figure class="effect-bubba">
								<a href="images/tv.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
									<img src="images/tv.jpg" alt=""/ class="img-responsive" >
									<figcaption>
										<a href="Main/product_info"><h4 class="sec">TV & Entertainment</h4></a>									
									</figcaption>	
								</a>
							</figure>	
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
			<!-- </div> -->
	</div>
<!-- //gallery -->
<!-- <div id="hotitem" class="hotitem">
	<div class="container">
		sdfas
	</div>
</div> -->
<!-- fast-service -->
<div class="fast service" id="services">
	<div class="container">
	<h3 class="tittle">Our Services</h3>
	<div class="serve">
		<div class="col-md-6 fast-left w3ls">
			<img src="images/service1.jpg" class="img-responsive" alt="">
		</div>
		<div class="col-md-6 fast-right">
			<h3>Fast service</h3>
			<h5>Lorem ipsum dolor sit amet</h5>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
			<a class="view scroll" href="#gallery">READ MORE<i class="arrow-rt1"></i></a>
		</div>
				<div class="clearfix"></div>
		</div>
			<div class="fast-srve">
				<div class="col-md-6 fast-right1">
					<h3>Service service</h3>
					<h5>Lorem ipsum dolor sit amet</h5>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
					<a class="view scroll" href="#gallery">READ MORE<i class="arrow-rt1"></i></a>
				</div>
				<div class="col-md-6 fast-left1">
					<img src="images/service2.jpg" class="img-responsive" alt="">
				</div>
					<div class="clearfix"></div>
			</div>
	</div>
</div>
<!-- fast-service -->






<!--/footer-->
	     <div class="footerTestimonials padding_md">	    
	     <div class="container">
				 <div class="footer-top">
				    <div class="col-md-4 footer-grid">
					     <h4>Lorem sadipscing </h4>
						 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore</p>
				    </div>
					  <div class="col-md-4 footer-grid">
					     <h4>Address</h4>
				            <ul class="bottom">
						     <li><i class="glyphicon glyphicon-home"></i> 
							 Address Name St. 63, City Name, Country Name </li>
							  <li><i class="glyphicon glyphicon-earphone"></i>0986 345 321</li>
							 <li><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@example.com">mail@example.com</a></li>
						   </ul>
				    </div>
					<div class="col-md-4 footer-grid third">
								<h4><span>Contact</span> Us</h4>
							        <div class="sign_up">
										
										<form action="#" method="post">
											
											<input type="text" name="Name" value="Name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name...';}" required="">
											<input type="text" name="Email" value="Email..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email...';}" required="">
											<input type="text" name="Subject" value="Subject..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject...';}" required="">
											<input type="submit" value="Submit">
										</form>
									</div>
						</div>
					<div class="clearfix"> </div>
				 </div>
				  </div>
	     </div>
		<div class="copy">
		    <p>&copy; 2019 Laser iT & Mobile Co.,Ltd. All Rights Reserved | Design by <a href="http://w3layouts.com/">Mingun Technology</a> </p>
		</div>
	 <div class="clearfix"> </div>
	</div>

	<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //footer-section --><!--start-smoth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>

<!-- footer -->
</body>
</html>
				
				<script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <!-- jssor slider scripts-->
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: 1,                                       //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 2000,                                        //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: 1,   			                //[Optional] Steps to go for each navigation request by pressing arrow key, default value is 1.
                $SlideEasing: $Jease$.$OutQuint,                    //[Optional] Specifies easing for right to left animation, default value is $Jease$.$OutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide, default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $SpacingX: 12,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
