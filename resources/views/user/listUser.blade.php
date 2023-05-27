@extends('partials.navbarAuth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Readteracy - Genre List</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <link rel="stylesheet" href="/css/dropdown.css">
        <link rel="stylesheet" href="/css/sweetAlert.css">
    </head>

    <body>
        <section class="mt-5">
            <div class="container">
                <div class="row py-5 text-center">
                    <div class="col">
                        <h1>User List</h1>

                        <div class="justify-content-start">
                            @if (session('berhasilEdit_genre'))
                                <div class="alert alert-success">
                                    {{ session('berhasilEdit_genre') }}
                                </div>
                            @endif
                        </div>
                        <div class="justify-content-start">
                            @if (session('delete'))
                                <div class="alert alert-danger">
                                    {{ session('delete') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-5">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1 ?>
                        @foreach ( $users as $user )
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="/Readteracy/admin/update-role/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div>
                                        <select name="role" id="role_{{ $user->id }}" class="btn btn-dark">
                                            <option @if ( $user->role === 0 ) selected @endif value="0">Peminjam Buku</option>
                                            <option @if ( $user->role === 1 ) selected @endif value="1">Admin</option>
                                            <option @if ( $user->role === 2 ) selected @endif value="2">Petugas Buku</option>
                                        </select>
                                        <button class="btn btn-dark updateRole" data-id-user="{{ $user->id }}">Konfirmasi</button>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a href="/Readteracy/see-profile/{{ $user->id }}" class="btn btn-success">Lihat profile</a>
                                <a href="/Readteracy/delete/{{ $user->id }}/user" class="bannedMember btn btn-danger" data-banned-member="{{ $user->id }}">Banned user</a>
                            </td>
                        </tr>
                        <?php $x++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/dataTable.js"></script>
    <script>
        $('.updateRole').click(function (e) {
            var ubahRole = $(this).attr('data-id-user');
            e.preventDefault()
            Swal.fire({
                title: 'Yakin ingin ubah rolenya?',
                text: "Dia gaakan sama kaya sebelumnya loh 🤨",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#11111',
                confirmButtonText: 'Iya, ubah dia'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/Readteracy/admin/update-role/' + ubahRole,
                        type: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'PUT', // Gunakan _method: 'PUT' untuk menandai permintaan sebagai metode PUT
                            role: $('#role_' + ubahRole).val()
                        },
                    });
                    Swal.fire(
                    'Berhasil diubah',
                    'Kini rolenya udah beda',
                    'BERHASIL'
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    {
                        Swal.fire(
                        'Gajadi',
                        'Rolenya masih aman kaya sebelumnya',
                        'error'
                        )
                    }
                }
            })
        });
    </script>

    <script>
        $('.bannedMember').click(function (e) {
            var banned_member = $(this).attr('data-banned-member');
            e.preventDefault()
            Swal.fire({
                title: 'Yakin mau banned?',
                text: "Dia bukan sembarang member lohh😥",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#11111',
                confirmButtonText: 'Maka Banned!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '/Readteracy/delete/'+banned_member+'/user'
                    Swal.fire(
                    'Sukses Terbann!',
                    'User terbanned Selamanya',
                    'BANNED!'
                    )
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    {
                        Swal.fire(
                        'Gajadi',
                        'Member masih aman dengan kami',
                        'error'
                        )
                    }
                }
            })
        });
    </script>

    </html>

@endsection
