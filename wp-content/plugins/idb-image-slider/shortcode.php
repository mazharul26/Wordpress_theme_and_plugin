<?php
wp_enqueue_style("iis-owl-carousel-library-css", "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css");
wp_enqueue_script("iis-owl-carousel-library-js", "js/", array("jquery"));

wp_enqueue_style("iis-owl-carousel-library-css", plugins_url('css/owl.carousel.min.css', __FILE__));
wp_enqueue_script("iis-owl-carousel-library-js", plugins_url('js/owl.carousel.min.js', __FILE__), array("jquery"), "4.0", TRUE);
$sliderData = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $sliderTable . ' where id=%d', $sliderId), ARRAY_A);

$imageData = $wpdb->get_results("select * from $imageTable where id in ({$sliderData[0]['imageid']})", ARRAY_A);

$allCss = explode("|", $sliderData[0]['css']);

echo "<div class='carousel'>
            <div id='iis-slider-{$sliderId}' class='owl-carousel'>";
foreach ($imageData as $value) {
    echo "<div class='item'><img src='{$value[image]}' /></div>";
}

echo "</div></div>";
?>

<style>

    #iis-slider-<?php echo $sliderId ?> .owl-nav div {
        position: absolute;
        top: calc(50% - 35px);
        background: <?php echo $allCss[2]; ?>;
        color: #F00;
        margin: 0;
        transition: all 0.3s ease-in-out;        
        font-size: 18px;
        line-height: 44px;
        height: 44px;
        width: 34px;
        text-align: center;
        padding: 0;
    }
    #iis-slider-<?php echo $sliderId ?> .owl-nav div:hover{
        background: <?php echo $allCss[3]; ?>;        
        color: #000;        
    }
    #iis-slider-<?php echo $sliderId ?> .owl-nav div.owl-prev {
        left: 0;
        border-radius: 0 10% 10% 0;
    }
    #iis-slider-<?php echo $sliderId ?> .owl-nav div.owl-next {
        right: 0;
        border-radius: 10% 0 0 10%;
    }
    #iis-slider-<?php echo $sliderId ?> .owl-dots {
        text-align: center;
        padding-top: 15px;
    }
    #iis-slider-<?php echo $sliderId ?> .owl-dots div {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: inline-block;
        background-color: #ccc;
        margin: 0 5px;
    }
    #iis-slider-<?php echo $sliderId ?> .owl-dots div.active {
        background-color: #000;
    }
</style>

<script>

    var $ = jQuery;
    $(document).ready(function () {
        var owl = $("#iis-slider-<?php echo $sliderId ?>");
        owl.owlCarousel({
            autoplay: true,
            lazyLoad: true,
            loop: true,
            margin: 30,
            autoplayTimeout: <?php echo $allCss[0]; ?>,
            autoplayHoverPause: true,
            responsiveClass: true,
            autoHeight: true,
            nav: <?php echo $allCss[1]; ?>,
            dots: true,
            navText: ["<i class='fa cheveon-left'></i>", "<i class='fa cheveon-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 2
                },
                1366: {
                    items: 2
                }
            }
        });
        owl.on('mouseleave', function () {
            owl.trigger('stop.owl.autoplay');
            owl.trigger('play.owl.autoplay', [4000]);
        });
    });
</script>