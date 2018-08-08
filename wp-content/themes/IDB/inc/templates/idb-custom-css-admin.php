<h1>Custom CSS</h1>


<form method="post" action="options.php" id="save-custom-css-form">
    
    <?php  settings_fields("idb_custom_css_register_settings") ?> 
    
    <?php do_settings_sections("idb_custom_css_page")  ?>
    
       <?php // settings_fields("idb_page_register_setting") ?> 
    <?php submit_button()    ?>
    
</form>
