
<?php
get_header();
?>

<br/><br/>

<div class="container">
    <div class="row">
        <div class="col-sm-6">

            <?php
            if (have_posts()) {
                $c = 1;
                while (have_posts()) {
                    the_post();
                    if ($c % 2 == 1) {
                        echo'<div class="about-txt">';
                    }
                    ?>
              <h2><a href=""> <?php echo ( get_the_title() ); ?></a></h2>
              <br/><br/>
                    <?php if (has_post_thumbnail()){  ?>
                  
              <div class="category_image" ><a  class="img-responsive" ><?php the_post_thumbnail() ?></a>

                     
                    </div>  
                    <?php  } ?>
              <br/><br/>
            <h3>Picture Must be 500*375 Px</h3>
                    <br/><br/>
                   

                    <p><?php the_content(); ?></p>
                    

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

    </div>
</div>

<div class="agileits-w3layouts">
		<div class="container">
			  <p> 2018 Edumate. All rights reserved | Design by <a href="http://w3layouts.com">World Famous Company BSW</a></p>
		</div>
	</div>
	
	<!-- //scrolling script -->


<?php
get_footer();
?>