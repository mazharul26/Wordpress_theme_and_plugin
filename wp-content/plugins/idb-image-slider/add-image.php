


<?php
global $wpdb;
wp_enqueue_media();
wp_enqueue_style('iis-style', plugins_url('style.css', __FILE__));

if (isset($_POST['sub']) && $_POST['sub'] == 'Save') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'iis_nonce_field')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $imageTable = $wpdb->prefix . "iis_image";
        $wpdb->query($wpdb->prepare("insert into $imageTable SET title = %s, details = %s, link = %s, image = %s", sanitize_text_field($_POST['title']), sanitize_textarea_field($_POST['details']), sanitize_text_field($_POST['link']), sanitize_text_field($_POST['image_url'])));
        
        echo "Insert Successful";
    }
}
?>

<form action="" method="post">
    <?php wp_nonce_field("iis_nonce_field") ?>
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"  /></td>
        </tr>
        <tr>
            <td>Details</td>
            <td><textarea name="details"></textarea></td>
        </tr>
        <tr>
            <td>Link</td>
            <td><input type="text" name="link" /></td>
        </tr>
        <tr>
            <td>Image</td>
            <td>
                <input type="text" name="image_url" id="image_url" />
                <input type="button" name="image_btn" id="image_btn_new" value="Upload" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="sub" value="Save" />
            </td>
        </tr>
    </table>
</form>



<script>
    
    jQuery(document).ready(function () {
        jQuery("body").on("click", "#image_btn_new", function (e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                    .on('select', function (e) {
                        var uploaded_image = image.state().get('selection').first();
                        var image_url = uploaded_image.toJSON().url;
                        $("#image_url").val(image_url);
                    });

        });
    })

</script>