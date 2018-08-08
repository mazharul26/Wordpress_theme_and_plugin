<?php
wp_enqueue_style('iis-color-style', plugins_url('css/jquery.minicolors.css', __FILE__));
wp_enqueue_script('iis-color-js', plugins_url('js/jquery.minicolors.min.js', __FILE__), array('jquery'));

echo '<h1>Customize Slider</h1>';
$sliderId = (int) $_GET['sliderId'];
if (isset($_POST['add_image_to_slider'])) {
    $images = $_POST['imageid'];
    $imageid = "";

    if ($images) {
        foreach ($images as $image) {
            if ($imageid != "") {
                $imageid .= ",";
            }
            $imageid .= $image;
        }
    }

    $css = "";
    $css .= sanitize_text_field($_POST['effect_duration']);
    $css .= "|" . sanitize_text_field($_POST['prev_next']);
    $css .= "|" . sanitize_text_field($_POST['indicator_background_color']);
    $css .= "|" . sanitize_text_field($_POST['indicator_active_color']);
    $css .= "|" . sanitize_text_field($_POST['indicator_hover_color']);



    $wpdb->query($wpdb->prepare("update $sliderTable SET imageid = %s, css = %s where id=%d", $imageid, $css, $sliderId));
}

$selData = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $sliderTable . ' where id=%d', $sliderId), ARRAY_A);

$imgIds = $selData[0]['imageid'];
if ($imgIds != "") {
    $imgIds = explode(",", $imgIds);
} else {
    $imgIds = array();
}

$allCss = explode("|", $selData[0]['css']);

echo"<pre>";
print_r($allCss);
echo"</pre>";
?>

<input onclick="this.setSelectionRange(0, this.value.length)" value="[iis_image_slider id=&quot;<?php echo $sliderId ?>&quot;]" class="form-control" type="text">
<form action="" method="post">
    <?php wp_nonce_field("iis_nonce_field") ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Setting</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active container" id="home">
            <table>
                <tr>
                    <td>Choose Image</td>
                    <td>
                        <?php
                        $data = $wpdb->get_results('SELECT * FROM ' . $imageTable . ' ORDER BY id DESC', ARRAY_A);

                        foreach ($data as $value) {
                            foreach ($imgIds as $imgId) {
                                $checked = "";
                                if ($value['id'] == trim($imgId)) {
                                    $checked = "checked";
                                    break;
                                }
                            }
                            echo "
                                    <div class='sug'>
                                        <img src='{$value[image]}' width='70' />
                                        <input $checked type='checkbox' name='imageid[]' value='{$value['id']}' />{$value['title']}
                                    </div>
                                    ";
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="tab-pane container" id="menu1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-bordered">
                            <tr>
                                <td width="55%"><b>Effect Duration</b></td>
                                <td>
                                    <select name="effect_duration" class="form-control" >
                                        <?php
                                        $n = 1000;
                                        for ($m = 1; $m <= 20; $m++) {
                                            ?>
                                            <option value="<?php echo $n; ?>"<?php if ($allCss[0] == $n) echo " selected" ?>><?php echo $m ?> Seconds</option>

                                            <?php
                                            $n += 1000;
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td>Activate Previous/Next</td>
                                <td>
                                    
                                    <input type="radio" name="prev_next" value="true" <?php if ($allCss[1] == "true") echo " checked" ?> />Yes
                                    <input type="radio" name="prev_next" <?php if ($allCss[1] == "false") echo " checked" ?> value="false" />No
                                </td>
                            </tr>
                            <tr>
                                <td>Background Color</td>


                                <td><input type="text" name="indicator_background_color"  class="form-control iis_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allCss[1] ?>"></td>

                            </tr>

                            <tr>
                                <td>Previous/Next Color</td>


                                <td><input type="text" name="indicator_active_color"  class="form-control iis_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allCss[2] ?>"></td>

                            </tr>
                            <tr>
                                <td>Hover Color</td>


                                <td><input type="text" name="indicator_hover_color"  class="form-control iis_color_picker" data-format="rgb" data-opacity=".8" value="<?php echo $allCss[3] ?>"></td>

                            </tr>
                        </table> 





                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>

        </div>
        <div class="tab-pane container" id="menu2">...</div>
    </div>


    <input type="submit" name="add_image_to_slider" value="Save" />
</form>



<script>
    jQuery(document).ready(function () {
        jQuery('.iis_color_picker').each(function () {
            jQuery(this).minicolors({
                control: jQuery(this).attr('data-control') || 'hue',
                defaultValue: jQuery(this).attr('data-defaultValue') || '',
                format: jQuery(this).attr('data-format') || 'hex',
                keywords: jQuery(this).attr('data-keywords') || '',
                inline: jQuery(this).attr('data-inline') === 'true',
                letterCase: jQuery(this).attr('data-letterCase') || 'lowercase',
                opacity: jQuery(this).attr('data-opacity'),
                position: jQuery(this).attr('data-position') || 'bottom left',
                swatches: jQuery(this).attr('data-swatches') ? jQuery(this).attr('data-swatches').split('|') : [],
                change: function (value, opacity) {
                    if (!value)
                        return;
                    if (opacity)
                        value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });
        });
    });
</script>