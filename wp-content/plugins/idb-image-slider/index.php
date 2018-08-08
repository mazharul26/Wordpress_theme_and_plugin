<?php

/*
  Plugin Name: Idb Image Slider
  Plugin URI: https://www.wpmart.org/downloads/team-showcase-supreme/
  Description: Basic Image slider for Evidence
  Author: Sk. Abul Hasan
  Author URI: http://www.wpmart.org/
  Version: 1.0
 */

define('iis_plugin_url', plugin_dir_path(__FILE__));

function iis_image_slider_shortcode($atts) {
    global $wpdb;
    $sliderTable = $wpdb->prefix . "iis_slider";
    $imageTable = $wpdb->prefix . "iis_image";
    extract(shortcode_atts(array('id' => ' ',), $atts));
    $sliderId = $atts['id'];
    require iis_plugin_url . "shortcode.php";
}


function idb_image_slider_menu() {

    add_menu_page('Image Slider', 'IIS Slider', 'manage_options', 'idb-image-slider', 'idb_image_slider_all_image');

    add_submenu_page('idb-image-slider', 'All Image', 'All Image', 'manage_options', 'idb-image-slider', 'idb_image_slider_all_image');

    add_submenu_page('idb-image-slider', 'Add Image', 'Add Image', 'manage_options', 'idb-add-image-slider', 'iis_add_image');

    add_submenu_page('idb-image-slider', 'View Sliders', 'View Sliders', 'manage_options', 'idb-view-slider', 'iis_view_slider');
}

add_action('admin_menu', 'idb_image_slider_menu');

// view slider
function iis_view_slider() {
    global $wpdb;
    $sliderTable = $wpdb->prefix . "iis_slider";
    $imageTable = $wpdb->prefix . "iis_image";
    
    wp_enqueue_style('iis-style', plugins_url('style.css', __FILE__));
    wp_enqueue_style("iis-bootstrap-css", plugins_url('css/bootstrap.min.css', __FILE__));
    wp_enqueue_script("iis-bootstrap-js", plugins_url('js/bootstrap.min.js', __FILE__), array("jquery"), "4.0", TRUE);

    if (isset($_GET['sliderId']) && $_GET['sliderId'] > 0) {
        require iis_plugin_url . "add-slider.php";
    } else {
        require iis_plugin_url . "view-slider.php";
    }
}

function idb_image_slider_all_image() {
    global $wpdb;
    $imageTable = $wpdb->prefix . "iis_image";
    wp_enqueue_style('iis-style', plugins_url('style.css', __FILE__));

    if (isset($_GET['imageid']) && $_GET['imageid'] > 0) {
        require iis_plugin_url . "edit-image.php";
    } else {
        require iis_plugin_url . "view-image.php";
    }
}

function iis_add_image() {
    global $wpdb;
    require iis_plugin_url . "add-image.php";
}

register_activation_hook(__FILE__, 'iis_install');

function iis_install() {
    global $wpdb;
    $imageTable = $wpdb->prefix . "iis_image";
    $sliderTable = $wpdb->prefix . "iis_slider";

    $sql1 = "CREATE TABLE IF NOT EXISTS $imageTable (
		id mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
                title varchar(100) NOT NULL,
                details varchar(100) NOT NULL,
                link text NOT NULL,
                image text NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    $sql2 = "CREATE TABLE IF NOT EXISTS $sliderTable (
		id mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
                name varchar(255) NOT NULL,              
                imageid text NOT NULL default '',                
                css text NOT NULL default '',
		PRIMARY KEY (id)
                
	) $charset_collate;";


    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql1);
    dbDelta($sql2);
}
