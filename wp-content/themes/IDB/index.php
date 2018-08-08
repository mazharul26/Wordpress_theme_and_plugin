<?php
get_header();
?>













   <div class="container-fluid">
            <div class="row">
               
                <div class="w3-banner-heading" > <?php
                $header_image = esc_attr(get_option('header_image'));
                ?>
 <img src="<?php echo $header_image; ?>" class="img-responsive" alt="about image" />

                    <p><?php //echo get_comment()  ?></p>
                </div>
            </div>

        </div>


        <!-- banner ends -->
        <div class="container">
            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <!-- About Section -->

<div class="w3ls-about" id="about">
    <div class="container w3about">
        <div class="row">
            <div class="col-sm-6">
                <div class="about-txt">
                    <h2>Why Join Edumate </h2>
                    <br>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <br>
                    <ul class="agile-list">

                        <li><span class="arrow">&RBarr;</span><a href="#about"> Expert Teaching Skills</a></li>
                        <li><span class="arrow">&RBarr;</span><a href="#about"> Cultural Activities</a></li>
                        <li><span class="arrow">&RBarr;</span><a href="#about"> Exclusive Tutorials</a></li>
                        <li><span class="arrow">&RBarr;</span><a href="#about"> National Level Training</a></li>
                        <!--<li><span class="arrow">&RBarr;</span><a href="#about"> Complete Lab Facility</a></li>
                                <li><span class="arrow">&RBarr;</span><a href="#about"> Best Communication Skills</a></li> -->

                    </ul>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="about-img">
                    <?php
                    $font_image = esc_attr(get_option('font_image'));
                    ?>
                    <img src="<?php echo$font_image; ?>" class="img-responsive" alt="about image" />
                </div>


            </div>



        </div>
    </div>
</div> 
	<!-- //footer -->
	<!-- copyright -->
	<div class="agileits-w3layouts">
		<div class="container">
			<p>© 2018 Edumate. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
	<!-- //copyright -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
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
	<!-- //here ends scrolling icon -->
	<!-- scrolling script -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script> 
	<!-- //scrolling script -->


        <?php
        get_footer();
        ?>