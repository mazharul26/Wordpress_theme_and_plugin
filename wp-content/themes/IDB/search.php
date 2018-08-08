
<?php
get_header();
?>

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


<div class="container">
    <div class="row">
        <div class="col-sm-9">

            <?php
            if (have_posts()) {
                $c = 1;
                while (have_posts()) {
                    the_post();
                    $p = idb_posted_footer();
                    if ($c % 2 == 1) {
                        echo'<div class="about-txt">';
                    }
                    ?>
                    <h2><a href="<?php the_permalink() ?>"> <?php echo ( get_the_title() ); ?></a></h2>
                    <br/><br/>
                    <?php if (has_post_thumbnail()) { ?>
                        <?php
                        $categories = get_the_category();
                        $output = '';
                        $i = 1;

                        foreach ($categories as $category) {
                            if ($i > 1) {
                                $output .= ", ";
                            }
                            $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr('View all posts inits', $category->name) . '">' . $category->cat_name . '</a>';
                            $i++;
                        }

                        echo "  Category:  " . $output;
                        ?><br/><br/>  
                        <div class="category_image" ><a href="<?php the_permalink() ?>" class="img-responsive" ><?php the_post_thumbnail() ?></a>

                            <br/><br/>
                            <h4>Posted by <a href=""><?php echo human_time_diff(get_the_time('U'), current_time("timestamp")) ?></a><span>          Comment:<?php echo strip_tags($p); ?></span>
                                </a></h4>

                        </div>  
                    <?php } ?>

                    <br/><br/>


                    <p><a href="<?php the_permalink() ?>"><?php the_excerpt(); ?></a></p>
                    <div class="">
                        <a href="<?php the_permalink() ?>"><?php _e('Read More') ?>&raquo;</a>
                    </div>

                    <?php
                    if ($c % 2 == 0) {
                        echo '<div class="clearfix"></div>';
                        echo"</div>";
                    }
                    $c++;
                }
                if ($c % 2 == 0) {
                    echo '<div class="clearfix"></div>';
                    echo"</div>";
                }
            }
            ?>
            <br>


        </div>
          <div class="col-sm-3">
      
          <h4> <?php if (is_active_sidebar('sidebar1')) : ?>
	
		<?php dynamic_sidebar('sidebar1'); ?></h4>
              <h2> <?php dynamic_sidebar('idbfooterleft1') ?></h2>
	<?php endif; ?>
    </div>

    </div>
</div>
  
   <?php  {  ?>

	<div class="contact w3ls-contact" id="contact">
		<div class="container w3-contact">
			<div class="list1">
			<ul class="contact-list">
				<li class="heading"> Contact Us</li>
				<li>02108 MA Boston</li>
				<li>852-957-1879</li>
				<li><a href="mailto:yourmailid@company.com">info@edumateltd.com</a></li>
			</ul>
			
			<ul class="contact-hrs">
				<li class="heading">Our Timings</li>
				<li>Monday - Saturday</li>
				<li>09:00 AM - 06:30 PM</li>
				<li>Weakly Special Class</li>
				<li>Parents Meeting</li>
			</ul>
			</div>
			<div class="list2">
			<ul class="social-links">
				<li class="heading">Follow Us </li>
				<li><a href="facebook.com">Facebook</a></li>
				<li><a href="twitter.com">Twitter</a></li>
				<li><a href="pinterest.com">Pinterest</a></li>
				<li><a href="plus.google.com">Google+ </a></li>
			</ul>
			
			<ul class="sub-scribe">
				<li class="heading">Subscribe</li>
				<li>
					<form action="/" method="post">
						<input type="email" name="email" placeholder="Enter Your E-Mail" required><br>
						<input type="submit" value="Subscribe"><br>
					</form>
				</li>
			</ul>
			</div>
		</div>
		
	</div>



   <?php }  ?>

	<!-- //footer -->
	<!-- copyright -->
	<div class="agileits-w3layouts">
		<div class="container">
			  <p> 2018 Edumate. All rights reserved | Design by <a href="http://w3layouts.com">World Famous Company BSW</a></p>
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
