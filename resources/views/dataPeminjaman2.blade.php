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
            <div class="row">
                <div class="col-lg-1 badge mt-3 bg-info ms-5">
                  <span class="badge text-bg-info">
                    <h5 class="mt-2 me-4">
                        <i class="bi bi-journal-code"></i> {{ $count_inStock }}
                    </h5>
                  </span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1 badge mt-3 bg-warning ms-5">
                  <span class="badge text-bg-warning">
                    <h5 class="mt-2 me-4">
                        <i class="bi bi-book-half"></i> {{ $count_sedangDipinjam }}
                    </h5>
                  </span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-1 badge mt-3 bg-success ms-5">
                  <span class="badge text-bg-success">
                    <h5 class="mt-2 me-4">
                        <i class="bi bi-bookmark-check-fill"></i> {{ $count_dikembalikan }}
                    </h5>
                  </span>
                </div>
            </div>
        </div>
        <section>
            <div class="container mt-5 dataTables_wrapper">
                <table id="dataPeminjaman" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>No Hp</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Actual Return</th>
                            <th>Tipe</th>
                            <th>Status</th>
                            @if (Auth::user()->role === 2)
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->role === 2)
                            @if (isset($notify) && $notify->status === "in stock")
                            <div class="col-sm-5 fw-bold">
                                <p class="alert bg-warning text-light">
                                    <span>Ada {{ $count_inStock }} peminjam yang lagi nunggu konfirmasimu</span>
                                </p>
                            </div>
                            @endif
                        @endif
                        @foreach ( $borrowedBooks as $borrowedBook )
                            @foreach ( $siPeminjam as $peminjam )
                                @if ( $peminjam->id === $borrowedBook->user_id )
                                    <tr class="{{ $borrowedBook->actual_return_date === NULL ? '' :
                                    ($borrowedBook->return_date < $borrowedBook->actual_return_date ? 'bg-danger text-light' : 'bg-success text-light') }}">
                                        <td>{{ $peminjam->name }}</td>
                                        <td>{{ $borrowedBook->judul }}</td>
                                        <td>{{ $peminjam->no_hp }}</td>
                                        <td>{{ $borrowedBook->rent_date }}</td>
                                        <td>{{ $borrowedBook->return_date }}</td>
                                        <td>{{ $borrowedBook->actual_return_date }}</td>
                                        <td>{{ $borrowedBook->tipe }}</td>
                                        <td>{{ $borrowedBook->status }}</td>
                                        @if (Auth::user()->role === 2)
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
                                                    <button class="btn btn-dark">Konfirmasi</button>
                                                </div>
                                                <div class="mt-3">

                                                </div>
                                            </form>
                                        </td>
                                        @endif
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
