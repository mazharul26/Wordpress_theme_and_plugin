<?php

function idb_load_admin_scripts($hook) {

    if ($hook == "idb_page_idb_socil_network") {
        wp_enqueue_script("idb-admin-script", get_template_directory_uri() . "/js/idb-admin.js", array("jquery"), '1.0.0');
    }
    if ($hook == "idb_page_idb_custom_css_page") {
        wp_enqueue_style("idb-custom-css", get_template_directory_uri() . "/css/custom-css.css");
        wp_enqueue_script("ace", get_template_directory_uri() . "/js/ace/ace.js", array("jquery"), '1.2.1', true);
        wp_enqueue_script("idb-custom-js", get_template_directory_uri() . "/js/idb-custom-css.js", array("jquery"), '1.0.0', true);
    }
}

add_action('admin_enqueue_scripts', 'idb_load_admin_scripts');

function idb_load_front_scripts() {
    wp_enqueue_style("idb-bootstrap", get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style("idb-style", get_template_directory_uri() . "/css/style.css");
    wp_enqueue_script("idb-move-top", get_template_directory_uri() . "/js/jquery.min.js", array("jquery"), '1.0.0');
    wp_enqueue_script("idb-easing", get_template_directory_uri() . "/js/easing.js", array("jquery"), '1.0.0');
   
   

    wp_enqueue_script("idb-easing", get_template_directory_uri() . "/js/numscroller-1.0.js", array("jquery"), '1.0.0');
}

add_action("wp_enqueue_scripts", "idb_load_front_scripts");



