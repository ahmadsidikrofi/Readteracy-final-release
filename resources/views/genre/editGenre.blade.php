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
        <link rel="stylesheet" href="/css/dropdown.css">
    </head>

    <body>
        <section class="mt-5">
            <div class="container">
                <div class="row py-5 text-center">
                    <div class="col">
                        <h1>Edit Genre</h1>
                    </div>
                </div>
            </div>

            <div class="container w-50">
                <form action="/Readteracy/editGenre/{{ $editGenre->slug }}/store" method="post">
                    @method('put')
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <div class="">
                        <label for="nama_genre" class="form-label fw-bold fs-5">Edit nama genre</label>
                        <input type="text" name="nama_genre" class="form-control" id="nama_genre" placeholder="{{ $editGenre->nama_genre }}"
                        value="{{ $editGenre->nama_genre }}">
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary btn-lg" type="submit">Edit Data</button>
                        <a href="/Readteracy/genre/genreList" class="btn btn-dark btn-lg" type="submit">Back</a>
                    </div>
                </form>
            </div>
        </section>

    </body>

    </html>
@endsection
