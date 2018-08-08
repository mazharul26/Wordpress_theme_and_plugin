
<!DOCTYPE html>
<html <?php echo language_attributes() ?> >

    <head>


        <?php
        $favicon_image = esc_attr(get_option("fav_image"));
        ?>
        <link rel="icon" href="<?php echo $favicon_image ?>" type="image/x-icon"/>



        <?php
        $fn = esc_attr(get_option('first_name_url'));

        echo '<title>';
        if (!empty($fn)) {
            echo $fn;
        } else {

            bloginfo('name');
            wp_title();
        }
        echo '</title>';
        ?>
    <h3></h3><?php if (is_page('contact-us')) { ?>

    <?php } ?>
    
     <h3></h3><?php if (is_page('photo-gellery')) { ?>

    <?php } ?>
     <h3></h3><?php if (is_page('about-us')) { ?>

    <?php } ?>
     <h3></h3><?php if (is_page('our-product')) { ?>

    <?php } ?>
    

    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_singular() && pings_open(get_queried_object())): ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>

    <?php
    $idb_custom_css = esc_attr(get_option("idb_custom_css"));
    if ($idb_custom_css) {
        echo "<style>{$idb_custom_css}</style>";
    }
    ?>


</head>

<body <?php body_class(); ?>>

    <br/><br/><br/>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="agile-banner w3lshome" id="home">
                    <div class="navbar navbar-default navbar-fixed-top w3ls-navbar">
                        <div class= "container brand1">
                            <a href="#" class="navbar-brand w3-logo">Edumate</a>

                            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- navbar collapse -->



                            <div class="collapse navbar-collapse navHeaderCollapse">

                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav navbar-right w3ls-nav'
                                ));
                                ?>
                                <div>  <?php get_search_form() ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div> 

    </div>
