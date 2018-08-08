

jQuery(document).ready(function ($) {
    var updateCSS = function () {
        $("#idb_custom_css").val(editor.getSession().getValue());
    }
    $("#save-custom-css-form").submit(updateCSS);
})

var editor = ace.edit("customCss");
editor.setTheme("ace/theme/kuroi");

editor.getSession().setMode("acs/mods/css");