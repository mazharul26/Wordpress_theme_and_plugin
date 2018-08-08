 
<?php
get_header();
?>







<br/><br/><br/>


<h1>Quickly Contact Us</h1>


<br/><br/><br/>

<div class="w3ls-map">
    <div class="map1">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.2871743706564!2d-71.06165938447522!3d42.357718779187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3708485209583%3A0x6e248f25891a1cc4!2sSchool+St%2C+Boston%2C+MA+02108%2C+USA!5e0!3m2!1sen!2sin!4v1507011599646" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<div class="agile-contact" id="contact-form">

    <div class="container">

        <div class="w3ls-form">
            <h3>Contact Form</h3>
            <form action="/" method="post" class="form1">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required> </br>
                <input type="text" name="phone" placeholder="Phone" required>
                <input type="text" name="subject" placeholder="Subject" required> </br>
                <textarea placeholder="Message" name="message" rows="10" cols="30" required></textarea></br>
                <input type="submit" value="Submit Now"></br>
            </form>
        </div>
        <div class="contact-details">
            <h3>Visit Us</h3>
            <p class="p1">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem ip sum has been the industry's standard text ever.</p>
            <span class="fa fa-thumb-tack" aria-hidden="true"></span>
            <h3>Address:</h3>
            <p>Boston, MA 02108, USA</p>
            <span class="fa fa-envelope" aria-hidden="true"></span>
            <h3>Get Info</h3>
            <p><a href="mailto:yourmailid@company.com">info@edumateltd.com</a></p>
            <span class="fa fa-volume-control-phone" aria-hidden="true"></span>
            <h3>Call Us</h3>
            <p>852-957-1879 / 1880 </p>
        </div>
    </div>
</div>








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