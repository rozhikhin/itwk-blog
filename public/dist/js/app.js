function submitFormAfterConfirm(){
    let form;
    $('button[data-target="#confirm-delete"]').click(function (e){
        form = this.closest("form");
    });
    $('div#confirm-delete button.btn-ok').click(function (e){
        form.submit();
    });
}

$( document ).ready(function() {
    submitFormAfterConfirm();

    // Summernote
    $('#content').summernote();

    <!-- bs-custom-file-input -->
    bsCustomFileInput.init();

    // select2 init
    $('.select2').select2();

    // Remove image on post edit page
    $('.edit-image-preview .image-remove-btn').click(function (e){
        e.preventDefault();
        let action = $(this).data('href');
        let token = $("input[name='_token']").val();

        const data = {
            _method: 'PATCH',
            _token: token,
            isRemoveImage: $(this).data('imageRemove'),
        }

        $.ajax({
            method: 'post',
            url: action,
            data: data,
            success: function(data) {
                if (data.error) {
                    $('.edit-image-preview .image-remove-error').html(data.message);
                } else {
                    $('.edit-image-preview').remove();
                }
            }
        });
    });
});

