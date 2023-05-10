
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-bottom-right",
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "2000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
@if (Session::has('editBook'))
    toastr.success('Edit buku berhasil dilakukan')
@endif
@if (Session::has('addBook'))
    toastr.success('Buku berhasil ditambah')
@endif

