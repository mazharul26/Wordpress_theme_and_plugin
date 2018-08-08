<?php

$idb_post_formets =  get_option("idb_post_formets");
$formats =array();
if(is_array($idb_post_formets)){
foreach ($idb_post_formets as $key=>$value ){
   $formats[]=$key;
   
}
}


add_theme_support( 'post-formats', $formats);

$idb_post_header=  get_option("idb_custom_header");
if(isset($idb_post_header) && $idb_post_header==1){
add_theme_support("custom-header");
}





function idb_register_nav_menu() {
    register_nav_menu('primary', 'Header Navigation Menu');
}

add_action('after_setup_theme', 'idb_register_nav_menu');


function idb_theme_setup(){
    add_theme_support("post-thumbnails");
}
add_action('after_setup_theme', 'idb_theme_setup');

function idb_posted_footer() {
    $comments_num = get_comments_number();
    if (comments_open()) {
        if ($comments_num == 0) {
            $comments = __(' 0');
        } elseif ($comments_num > 1) {
            $comments = $comments_num . __(' ');
        } else {
            $comments = __(' 1');
        }
        $comments = '<a href="' . get_comments_link() . '">' . $comments . ' <span class="sunset-icon sunset-comment"></span></a>';
    } else {
        $comments = __('Comments are closed');
    }
    return $comments;
}

function idbourWidgetsInit() {
    register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="gadget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
    register_sidebar( array(
		'name' => 'Footer Left',
		'id' => 'idbfooterleft1',
		
	));
}
add_action('widgets_init', 'idbourWidgetsInit');

add_action('customize_register', 'idb_customize_register');

function idb_customize_register($wp_customize){
    $wp_customize->add_setting('idb_link_color', array(
		'default' => '#337ab7',
		'transport' => 'refresh',
	));    
    $wp_customize->add_setting('idb_link_hover_color', array(
		'default' => '#337ab7',
		'transport' => 'refresh',
	));
    
    $wp_customize->add_section('idb_standard_colors', array(
		'title' => __('Standard Colors', 'idb'),
		'priority' => 30,
	));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idb_link_color_control', array(
		'label' => __('Link Color', 'idb'),
		'section' => 'idb_standard_colors',
		'settings' => 'idb_link_color',
	) ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idb_link_hover_color_control', array(
		'label' => __('Link Hover Color', 'idb'),
		'section' => 'idb_standard_colors',
		'settings' => 'idb_link_hover_color',
	) ) );
}

function idb_customize_css(){
    ?>
<style type="text/css">
    a{
        color: <?php echo get_theme_mod('idb_link_color'); ?>;
    }
    a:hover{
        color: <?php echo get_theme_mod('idb_link_hover_color'); ?>;
    }
</style>
    <?php
}

add_action('wp_head', 'idb_customize_css');

?>
