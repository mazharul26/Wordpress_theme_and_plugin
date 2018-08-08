

jQuery(document).ready(function () {
    jQuery("body").on("click", "#facebook_image_upload", function (e) {
        e.preventDefault();          
        var image = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
                .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $("#idb_facebook_image").val(image_url);
                });
       
    });
    
    jQuery("body").on("click", "#facebook-image-remove", function (e) {
        e.preventDefault(); 
        $("#idb_facebook_image").val("");
    });
})




jQuery(document).ready(function () {
    jQuery("body").on("click", "#twitter_image_upload", function (e) {
        e.preventDefault();          
        var image = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open()
                .on('select', function (e) {
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $("#idb_twitter_image").val(image_url);
                });
       
    });
    
    jQuery("body").on("click", "#twitter_image_remove", function (e) {
        e.preventDefault(); 
        $("#idb_twitter_image").val("");
    });
})