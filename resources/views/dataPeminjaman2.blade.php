@extends('partials.navbarAuth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        {{-- <link rel="stylesheet" href="/css/theme.min.css"> --}}
        <style>
            div.dataTables_wrapper  {
                width: 1070px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body class="bg-light">
        <div class="position-absolute w-100 h-50 bg-light top-0 start-0"></div>
        <div class="position-relative py-vh-5 bg-cover bg-center">
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <h1 class="mt-5 text-center text-dark">Data Peminjam Buku</h1>
                </div>
            </div>
        </div>
        <section>
            <div class="container mt-5 dataTables_wrapper">
                <table id="dataPeminjaman" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>No Hp</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Actual Return</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $borrowedBooks as $borrowedBook )
                            @foreach ( $siPeminjam as $peminjam )
                                @if ( $peminjam->id === $borrowedBook->user_id )
                                    <tr>
                                        <td>{{ $peminjam->name }}</td>
                                        <td>{{ $borrowedBook->judul }}</td>
                                        <td>{{ $peminjam->no_hp }}</td>
                                        <td>{{ $borrowedBook->rent_date }}</td>
                                        <td>{{ $borrowedBook->return_date }}</td>
                                        <td>{{ $borrowedBook->actual_return_date }}</td>
                                        <td>{{ $borrowedBook->tipe }}</td>
                                        <td>{{ $borrowedBook->status }}</td>
                                        <td>
                                            <form action="/Readteracy/{{ $borrowedBook->id }}/ubah-status/data-peminjaman" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="">
                                                    <select name="status" id="status" class="btn btn-dark">
                                                        <option @if ( $borrowedBook->status === "in stock") selected @endif value="in stock" ><p class="text-left">in stock</p></option>
                                                        <option @if ( $borrowedBook->status === "sedang dipinjam") selected @endif value="sedang dipinjam">sedang dipinjam</option>
                                                        <option @if ( $borrowedBook->status === "dikembalikan") selected @endif value="dikembalikan">dikembalikan</option>
                                                    </select>
                                                    <button class="btn btn-lg btn-dark">Konfirmasi</button>
                                                </div>
                                                <div class="mt-3">

                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </body>

    </html>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#dataPeminjaman', {
            responsive: true,
            scrollX: true,
        });
    </script>
@endsection
