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
});

