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
    $('#content').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            // ['insert', ['link', 'picture', 'video']],
            ['insert', ['link']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    <!-- bs-custom-file-input -->
    bsCustomFileInput.init();

});

