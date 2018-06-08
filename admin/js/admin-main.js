jQuery(document).ready(function($) {

    // Media Uploader
    var mediaUploader;

    $('#upload-button').click(function (e) {
        e.preventDefault();
        // If the uploader object has already been created, reopen the dialog
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            }, multiple: false
        });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#fdm_login_logo_optionssite_logo').val(attachment.url);
        });
        // Open the uploader dialog
        mediaUploader.open();
    });

    $('#reset-site-logo-uploader').click(function () {
        $('#fdm_responsive_menu_optionssite_logo').val('');
        $('#logo-image').toggle();
        $('#reset-site-logo-uploader').toggle();
    });

});