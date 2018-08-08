<?php
if (isset($_POST['sub']) && $_POST['sub'] == "Save") {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'iis_nonce_field')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $wpdb->query($wpdb->prepare("insert into mazharul_iis_slider SET name = %s", sanitize_text_field($_POST['name'])));
        $id = $wpdb->insert_id;
        echo "<script type='text/javascript'>document.location.href='" . admin_url("admin.php?page=idb-view-slider&sliderId=$id") . "';</script>";
    }
}
?>
<br />
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
    Add Slider
</button>
<?php
echo '<h1>View Sliders</h1>';
?>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Slider</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post">
                <?php wp_nonce_field("iis_nonce_field") ?>
                <div class="modal-body">
                    <label>Slider Name</label>
                    <input type="text" value="" name="name" class="form-control" /> 
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" name="sub" class="btn btn-info" />  
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
