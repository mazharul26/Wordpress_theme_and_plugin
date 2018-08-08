<h1>Social Networking</h1>


<form method="post" action="options.php">
    <?php settings_fields("idb_sn_register_setting") ?> 
    
    <?php do_settings_sections("idb_socil_network")  ?>
       <?php // settings_fields("idb_page_register_setting") ?> 
    <?php submit_button()    ?>
    
</form>