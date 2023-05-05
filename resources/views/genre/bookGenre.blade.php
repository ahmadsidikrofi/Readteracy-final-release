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
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <link rel="stylesheet" href="/css/dropdown.css">
    </head>

    <body>
        <section class="mt-5">
            <div class="container">
                <div class="row py-5 text-center">
                    <div class="col">
                        <h1>Genre List</h1>
                        <div class="py-5 d-flex justify-content-end">
                            <a href="/Readteracy/addGenre/page" class="btn btn-primary">Tambah Genre</a>
                        </div>

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
            <div class="container">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $genreList as $genre )
                        <tr>
                            <td>{{ $genre->id }}</td>
                            <td>{{ $genre->nama_genre }}</td>
                            <td>
                                <a href="/Readteracy/editGenre/{{ $genre->slug }}" class="btn btn-success">Edit Genre</a>
                                <a href="/Readteracy/delete/{{ $genre->slug }}/genre" class="btn btn-danger">Hapus Genre</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="/js/genreData.js"></script>

    </html>

@endsection
