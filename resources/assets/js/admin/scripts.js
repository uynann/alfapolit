$(function() {

    $('.open-menu').click(function() {
        $('#admin-menu').addClass('admin-menu-mobile');
        $('#admin-body').addClass('admin-body-mobile');
    });

    $('.close-menu').click(function() {
        $('#admin-menu').removeClass('admin-menu-mobile');
        $('#admin-body').removeClass('admin-body-mobile');
    });

    $('.close-message').click(function() {
        $(this).parent().hide();
    });


    $('#froala-editor').froalaEditor({
        // Set the image upload parameter.
        imageUploadParam: 'image_param',

        imageMove: true,

        // Set the image upload URL.
        imageUploadURL: '/admin/upload-image',

        imageUploadParams: {
            _token: $("input[name='_token']").val() // This passes the laravel token with the ajax request.
        },

        // Set request type.
        imageUploadMethod: 'POST',

        // Set max image size to 5MB.
        imageMaxSize: 5 * 1024 * 1024,

        // Allow to upload PNG and JPG.
        imageAllowedTypes: ['jpeg', 'jpg', 'png']
    });



});
