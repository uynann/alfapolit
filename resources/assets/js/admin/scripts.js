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



    function showConfirmModal() {
        $('.confirm-modal').fadeIn('fast');
        $('.modal-overlay').fadeIn('fast');
        $('html, body').css('overflowY', 'hidden');
    }

    function closeConfirmModal() {
        $('.confirm-modal').fadeOut('fast');
        $('.modal-overlay').fadeOut('fast');
        $('html, body').css('overflowY', 'auto');
    }


    $('.delete-form').click(function(e) {
        e.preventDefault();
        showConfirmModal();

        var thisForm = $(this);

        $('button.confirm').click(function() {
            closeConfirmModal();
            thisForm.submit();
        });

        $('button.cancel, .modal-overlay, .close-modal').click(function() {
            closeConfirmModal();
        });

    });


    $('input:radio[name="subcategory"]').change(function() {
        if ($(this).is(':checked')) {
            $(this).parent('.subcategory').siblings('.category').children('input').prop('checked', true);
        }
    });

    $('input:radio[name="category"]').change(function() {
        if ($(this).is(':checked')) {
            $('input:radio[name="subcategory"]').prop("checked", false).end()
                .buttonset("refresh");
        }
    });



    $('#froala-editor').froalaEditor({
        imageUploadParam: 'image_param',
        imageMove: true,
        imageUploadURL: '/admin/upload-image',

        imageUploadParams: {
            _token: $("input[name='_token']").val() // This passes the laravel token with the ajax request.
        },

        imageUploadMethod: 'POST',

        imageMaxSize: 5 * 1024 * 1024,

        imageAllowedTypes: ['jpeg', 'jpg', 'png']
    });



});
