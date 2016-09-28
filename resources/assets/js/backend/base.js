$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('div.alert').not('.alert-danger ').not('.alert-important').delay(3000).fadeOut(350);
