<?php

function idb_theme_settings() {
    add_menu_page(
            "IDB theme Settings", "IDB", "manage_options", "theme_settings", "idb_general_settings", get_template_directory_uri() . "/img/icon.gif", 5);

    add_submenu_page(
            "theme_settings", "Post Settings", "Post", "manage_options", "post_settings", "idb_post_settings"
    );
    add_submenu_page(
            "theme_settings", "Theme Option Settings", "Theme Option", "manage_options", "theme_option_settings", "idb_theme_option_settings"
    );
    add_submenu_page(
            "theme_settings", "Profile settings", "Profile", "manage_options", "profile_settings", "idb_profile_settings"
    );
    add_submenu_page(
            "theme_settings", "Message settings", "Message", "manage_options", "Message_settings", "idb_Message_settings"
    );


    add_submenu_page("theme_settings", "Custom CSS settings", "Custom CSS", "manage_options", "idb_custom_css_page", "idb_custom_css_callback");


    add_submenu_page(
            "theme_settings", "Social Network Setting", "Social", "manage_options", "idb_socil_network", "idb_socil_network_callback");
}

add_action("admin_init", "idb_social_network");

add_action("admin_menu", "idb_theme_settings");

//----start----page---idb-social network-------
//-----Register----Settings----Start-----


function idb_social_network() {
    register_setting("idb_sn_register_setting", "first_name_url", "idb_text_filter_box_first");
    register_setting("idb_sn_register_setting", "last_name_url", "idb_text_filter_box_last");
    register_setting("idb_sn_register_setting", "fav_image");
     register_setting("idb_sn_register_setting", "header_image");
    register_setting("idb_sn_register_setting", "font_image");
    register_setting("idb_sn_register_setting", "facebook_url", "idb_text_filter_box_facebook");
    register_setting("idb_sn_register_setting", "facebook_image");
    register_setting("idb_sn_register_setting", "Twitter_url", "idb_text_filter_box_twitter");

    register_setting("idb_sn_register_setting", "per_page");
    register_setting("idb_sn_register_setting", "twietter_image");
    register_setting("idb_sn_register_setting", "google_url", "idb_text_filter_box_google");
    register_setting("idb_sn_register_setting", "google_image");


//-----Register----Settings----end-----
// setting section---------start-------

    add_settings_section("idb_sn_settings_section", "Social Network Setting", "idb_sn_settings_section_callback", "idb_socil_network");



// setting section---------end-------
// setting field---------start-------
    add_settings_field("idb_firstname", "First Name", "idb_fb_settings_field_first_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_favicon_image", "Favicon Image", "idb_fav_setting_image_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_header_image", "Header Image", "idb_header_setting_image_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_font_image", "Upload Image", "idb_fn_setting_image_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_facebook", "Facebook", "idb_fb_settings_field_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_facebook_image", "Facebook Image", "idb_fb_setting_image_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_twitter", "Twitter", "idb_tw_settings_field_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_twitter_image", "Twitter Image", "idb_tw_setting_image_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_per_page", "Per Page", "idb_page_settings_field_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_google", "Google", "idb_google_settings_field_callback", "idb_socil_network", "idb_sn_settings_section");
    add_settings_field("idb_google_image", "Google Image", "idb_google_setting_image_callback", "idb_socil_network", "idb_sn_settings_section");

//theme--post---format----


    register_setting("idb-theme-option-group", "idb_post_formets");
    register_setting("idb-theme-option-group", "idb_custom_header");

    add_settings_section("idb_theme_option_setting", "Theme Option Settings", "idb_theme_option_callback", "theme_option_settings");

    add_settings_field("idb_post_format_field", "Activate_Post Format", "idb_theme_post_format_field_callback", "theme_option_settings", "idb_theme_option_setting");

    add_settings_field("idb_custom_header_settings", "Use Custom Header", "idb_custom_header_settings_callback", "theme_option_settings", "idb_theme_option_setting");

    // Custom Setting CSS

    register_setting("idb_custom_css_register_settings", "idb_custom_css");
    add_settings_section("idb_custom_css_settings_section", "Write Your Own CSS", "idb_custom_css_settings_section_callback", "idb_custom_css_page");

    add_settings_field("idb_custom_css_settings_field", "Custom CSS", "idb_custom_css_settings_field_callback", "idb_custom_css_page", "idb_custom_css_settings_section");





    // setting section---------end-------
}
function idb_header_setting_image_callback(){
     wp_enqueue_media();
    $header_image = esc_attr(get_option("header_image"));
    if (isset($header_image) && $header_image != NULL) {
        echo"<img src=' $header_image' width='60px'/>";
        echo "<input type='button' id='header_image_upload' class='button button-primary' value='Change'/>";
        echo "<input type='button' id='header_image_remove' class='button button-primary' value='Remove'/>";
    } else {
        echo "<input type='button' id='header_image_upload' class='button button-primary' value='Add Image'/>";
    }
    echo "<input type='hidden' value='$header_image' name='header_image' id='idb_header_image'/>";
}
function idb_google_settings_field_callback() {
    
    $fn = esc_attr(get_option("google_url"));
    $ln = esc_attr(get_option("last_name_url"));

    echo "<input type='text' name='google_url' value='$fn' placeholder='Google Name'  /><p class='description'>Enter Your Google </p>";
}

function idb_google_setting_image_callback() {
    wp_enqueue_media();
    $google_image = esc_attr(get_option("google_image"));
    if (isset($google_image) && $google_image != NULL) {
        echo"<img src=' $google_image' width='60'/>";
        echo "<input type='button' id='google_image_upload' class='button button-primary' value='Change'/>";
        echo "<input type='button' id='google_image_remove' class='button button-primary' value='Remove'/>";
    } else {
        echo "<input type='button' id='google_image_upload' class='button button-primary' value='Add Image'/>";
    }
    echo "<input type='hidden' value='$google_image' name='google_image' id='idb_google_image'/>";
}

function idb_fn_setting_image_callback() {
    wp_enqueue_media();
    $font_image = esc_attr(get_option("font_image"));
    if (isset($font_image) && $font_image != NULL) {
        echo"<img src=' $font_image' width='60'/>";
        echo "<input type='button' id='font_image_upload' class='button button-primary' value='Change'/>";
        echo "<input type='button' id='font_image_remove' class='button button-primary' value='Remove'/>";
    } else {
        echo "<input type='button' id='font_image_upload' class='button button-primary' value='Add Image'/>";
    }
    echo "<input type='hidden' value='$font_image' name='font_image' id='idb_font_image'/>";
}

function idb_fav_setting_image_callback() {
    wp_enqueue_media();
    $favicon_image = esc_attr(get_option("fav_image"));
    if (isset($favicon_image) && $favicon_image != NULL) {
        echo"<img src=' $favicon_image' width='60'/>";
        echo "<input type='button' id='favicon_image_upload' class='button button-primary' value='Change'/>";
        echo "<input type='button' id='favicon_image_remove' class='button button-primary' value='Remove'/>";
    } else {
        echo "<input type='button' id='favicon_image_upload' class='button button-primary' value='Add Image'/>";
    }
    echo "<input type='hidden' value='$favicon_image' name='fav_image' id='idb_favicon_image'/>";
}

function idb_custom_css_settings_field_callback() {
    $idb_custom_css = esc_attr(get_option("idb_custom_css"));
    echo"<div id='customCss'>$idb_custom_css</div><textarea id='idb_custom_css' name='idb_custom_css' style='display:none;vibility:hidden'>$idb_custom_css</textarea>";
}

function idb_custom_css_settings_section_callback() {
    
}

function idb_custom_css_callback() {
    include get_template_directory() . "/inc/templates/idb-custom-css-admin.php";
}

function idb_custom_header_settings_callback() {
    $idb_post_header = get_option("idb_custom_header");
    $checked = "";
    if ($idb_post_header == 1) {
        $checked = "checked";
    }
    echo"<label><input type='checkbox' name='idb_custom_header'$checked  value='1' />Use Custom Header</label><br/>";
}

function idb_theme_post_format_field_callback() {

    $idb_post_formets = get_option("idb_post_formets");

    $format = array("aside", "gallery", "link", "image", "quote", "status", "video", "audio");


    foreach ($format as $value) {
        $checked = @($idb_post_formets[$value] ? "checked" : "");

        echo"<label><input type='checkbox' name='idb_post_formets[$value]'$checked  value='1' />$value</label><br/>";
    }
}

function idb_theme_option_callback() {
    
}

function idb_tw_setting_image_callback() {
    wp_enqueue_media();
    $twitter_image = esc_attr(get_option("twietter_image"));
    if (isset($twitter_image) && $twitter_image != NULL) {
        echo"<img src=' $twitter_image' width='60'/>";
        echo "<input type='button' id='twitter_image_upload' class='button button-primary' value='Change'/>";
        echo "<input type='button' id='twitter_image_remove' class='button button-primary' value='Remove'/>";
    } else {
        echo "<input type='button' id='twitter_image_upload' class='button button-primary' value='Add Image'/>";
    }
    echo "<input type='hidden' value='$twitter_image' name='twietter_image' id='idb_twitter_image'/>";
}

function idb_fb_setting_image_callback() {
    wp_enqueue_media();
    $facebook_image = esc_attr(get_option("facebook_image"));

    if (isset($facebook_image) && $facebook_image != NULL) {
        echo"<img src='$facebook_image' width='50'/>";

        echo "<input type='button' id='facebook_image_upload' class='button button-primary' value='Change'/>";
        echo "<input type='button' id='facebook-image-remove' class='button button-primary' value='Remove' />";
    } else {
        echo "<input type='button' id='facebook_image_upload' class='button button-primary' value='Add Image'/>";
    }
    echo "<input type='hidden' value='$facebook_image' name='facebook_image' id='idb_facebook_image'/>";
}

function idb_page_settings_section_callback() {
    
}

function idb_page_settings_field_callback() {
    $per_page = esc_attr(get_option("per_page"));

    $arr = array(5, 10, 20, 25, 30, 35, 40, 45, 50, 100);
    echo "<select name='per_page'>";
    foreach ($arr as $value) {
        if ($value == $per_page) {
            echo"<option value='$value'selected >{$value}</option>";
        } else {
            echo"<option >{$value}</option>";
        }
    }

    echo "</select>";
}

function idb_text_filter_box_first($input) {
    $first = sanitize_text_field($input);
    $first = str_replace("#", "", $first);
    $first = str_replace("@", "", $first);
    $first = str_replace("$", "", $first);
    return $first;
}

function idb_text_filter_box_last($input) {
    $last = sanitize_text_field($input);
    $last = str_replace("#", "", $last);
    $last = str_replace("@", "", $last);
    $last = str_replace("$", "", $last);
    return $last;
}

function idb_fb_settings_field_first_callback() {

    $fn = esc_attr(get_option("first_name_url"));
    $ln = esc_attr(get_option("last_name_url"));

    echo "<input type='text' name='first_name_url' value='$fn' placeholder='First Name'  /><input type='text' name='last_name_url' value='$ln' placeholder='Last Name'  /><p class='description'>Enter Your Name  </p>";
}

function idb_text_filter_box_twitter($input) {
    $twitter = sanitize_text_field($input);
    $twitter = str_replace("#", "", $twitter);
    $twitter = str_replace("@", "", $twitter);
    $twitter = str_replace("$", "", $twitter);
    return $twitter;
}

function idb_text_filter_box_facebook($input) {
    $output = sanitize_text_field($input);
    $output = str_replace("#", "", $output);
    $output = str_replace("@", "", $output);
    $output = str_replace("$", "", $output);
    return $output;
}

function idb_fb_settings_field_callback() {
    $fb = esc_attr(get_option("facebook_url"));
    echo "<input type='text' name='facebook_url' value='$fb' placeholder='Facebook'  /><p class='description'>Enter your facebook profile url</p>";
}

function idb_tw_settings_field_callback() {
    $tw = esc_attr(get_option("Twitter_url"));
    echo "<input type='text' name='Twitter_url' value='$tw' placeholder='Twitter'";
}

function idb_sn_settings_section_callback() {
    echo"Custom Setting";
}

function idb_socil_network_callback() {
    include get_template_directory() . "/inc/templates/idb-social-network-admin.php";
}

//social network----end----

function idb_message_settings() {
    echo"my message";
}

function idb_general_settings() {
    echo "Paisi";
}

function idb_profile_settings() {
    echo "My Profile";
}

function idb_post_settings() {
    echo "My Post";
}

function idb_theme_option_settings() {
    include get_template_directory() . "/inc/templates/idb-theme-option-admin.php";
}

?>