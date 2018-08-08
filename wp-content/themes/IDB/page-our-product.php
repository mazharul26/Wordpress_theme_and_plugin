
<?php
get_header();
?>



<br/><br/><br/>









<a href="images/4.jpg"><img src="images/4.jpg" height="yy" width="xx" alt="Ad_title"/>





























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





<!-- //footer -->
<!-- copyright -->
<div class="agileits-w3layouts">
    <div class="container">
        <p>© 2018 Edumate. All rights reserved | Design by <a href="http://w3layouts.com">World Famous Company BSW</a></p>
    </div>
</div>
<!-- //copyright -->
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<!-- //here ends scrolling icon -->
<!-- scrolling script -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script> 
<!-- //scrolling script -->


<?php
get_footer();
?>