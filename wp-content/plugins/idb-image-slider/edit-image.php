<?php
wp_enqueue_media();

if (isset($_POST['sub']) && $_POST['sub'] == 'Update') {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'iis_nonce_field')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $imageTable = $wpdb->prefix . "iis_image";
        $wpdb->query($wpdb->prepare("update $imageTable SET title = %s, details = %s, link = %s, image = %s where id=%d", sanitize_text_field($_POST['title']), sanitize_textarea_field($_POST['details']), sanitize_text_field($_POST['link']), sanitize_text_field($_POST['image_url']), (int) sanitize_text_field($_POST['id'])));

         echo "<script type='text/javascript'>document.location.href='".admin_url("admin.php?page=idb-image-slider")."';</script>";
    }
}


$ids = (int) $_GET['imageid'];
$data = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $imageTable . ' where id=%d', $ids), ARRAY_A);

foreach ($data as $value) {
    ?>

    <form action="" method="post">
        <?php wp_nonce_field("iis_nonce_field") ?>
        <input type="hidden" name="id" value="<?php echo $ids ?>" />
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo $value['title'] ?>"  /></td>
            </tr>
            <tr>
                <td>Details</td>
                <td><textarea name="details"><?php echo $value['details'] ?></textarea></td>
            </tr>
            <tr>
                <td>Link</td>
                <td><input type="text" name="link" value="<?php echo $value['link'] ?>" /></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>
                    <input type="text" name="image_url" id="image_url" value="<?php echo $value['image'] ?>" />
                    <input type="button" name="image_btn" id="image_btn_new" value="Upload" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="sub" value="Update" />
                </td>
            </tr>
        </table>
    </form>
    <?php
}
?>



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