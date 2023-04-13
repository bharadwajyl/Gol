//Content editable
$('body').on('focus','[contenteditable]', function() {
    $(this).append('<button class="save"><i class="fa fa-check"></i></button>');
});
