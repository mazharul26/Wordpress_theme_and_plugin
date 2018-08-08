<?php
if (!empty($_POST['delete']) && isset($_POST['did']) && is_numeric($_POST['did'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'iis_image_delete')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $id = (int) $_POST['did'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$imageTable} WHERE id = %d", $id));
    }
}
?>
<a href="<?php echo admin_url("admin.php?page=idb-add-image-slider") ?>">New Image</a>
<table border='1' cellpadding='5' cellspacing='0'>
    <thead>
        <tr>
            <th style="width: 13%">Title</th>
            <th>Details</th>
            <th style="width: 30%">Link</th>
            <th style="width: 15%">Image</th>
            <th style="width: 13%">Edit Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = $wpdb->get_results('SELECT * FROM ' . $imageTable . ' ORDER BY id DESC', ARRAY_A);
        foreach ($data as $value) {
            echo '<tr>';
            echo '<td style="text-align: center">' . $value['title'] . '</td>';
            echo '<td style="text-align: center">' . $value['details'] . '</td>';
            echo '<td style="text-align: center">' . $value['link'] . '</td>';
            echo "<td style='text-align: center'><img src='{$value['image']}' style='width: 100%' /></td>";
            echo "<td style='text-align: center'>
                <a href='" . admin_url("admin.php?page=idb-image-slider&imageid={$value['id']}") . "'>Edit</a>
                <form action='' method='post'>
                    " . wp_nonce_field("iis_image_delete") . "
                    <input type='hidden' name='did' value='{$value['id']}' />
                    <input type='submit' name='delete'  value='Delete' />    
                </form>
            </td>";
            echo ' </tr>';
        }
        ?>
   
    </tbody>
</table> 
