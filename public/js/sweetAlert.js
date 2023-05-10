
$('.deleteBook').click(function (e) {
    var bookCatalogue = $(this).attr('book-id');
    e.preventDefault()
    Swal.fire({
        title: 'Yakin Ingin Di Hapus?',
        text: "Ntar Ribet Kalo Mau Nambah Buku Lagi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#11111',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '/Readteracy/catalogue'
            Swal.fire(
            'Sukses Terhapus!',
            'Kitchen Set Berhasil Di Hapus',
            'BERHASIL'
            )
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            {
                Swal.fire(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
        }
    })
});

