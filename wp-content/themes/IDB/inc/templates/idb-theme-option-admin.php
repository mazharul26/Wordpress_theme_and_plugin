<h1>Theme Options Setting</h1>


<form method="post" action="options.php">
    <?php settings_fields("idb-theme-option-group") ?> 
    
    <?php do_settings_sections("theme_option_settings")  ?>
       <?php // settings_fields("idb_page_register_setting") ?> 
    <?php submit_button()    ?>
    
</form>