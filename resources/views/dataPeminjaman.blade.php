@extends('partials.navbarAuth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/theme.min.css">
        <link rel="stylesheet" href="/css/cardDataPeminjaman.css">
    </head>

    <body class="bg-black">
        <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>
        <div class="position-relative py-vh-5 bg-cover bg-center" style="background-image: url(/img/buku1.png)">
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <h1 class="mt-5 text-center text-dark">Data Peminjam Buku</h1>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    @foreach ( $borrowedBooks as $borrowedBook )
                        @foreach ( $siPeminjam as $peminjam )
                            @if ( $peminjam->id == $borrowedBook->user_id )
                                <div class="col">
                                    <div class="book mt-5 mb-5">
                                        <div class="row">
                                            <div class="col">
                                                <div class="container mx-auto">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <h5 class="mt-3 text-center">{{ $borrowedBook->judul }} ({{ $borrowedBook->book_id }})</h5>
                                                            <p class="mx-3">
                                                                <hr>
                                                                Peminjam : {{ $peminjam->name }} ({{ $borrowedBook->user_id }})
                                                                <hr>
                                                                @if ($borrowedBook->tipe === "Fisik")
                                                                    No Hp : {{ $peminjam->no_hp }}
                                                                    <hr>
                                                                @else
                                                                    Non-Fisik
                                                                    <hr>
                                                                @endif
                                                                Rent date : {{ $borrowedBook->rent_date }}
                                                                <hr>
                                                                Return date : {{ $borrowedBook->return_date }}
                                                                <hr>
                                                                Actual return : {{ $borrowedBook->actual_return_date }}
                                                            </p>
                                                            <hr>
                                                            <form action="/Readteracy/{{ $borrowedBook->id }}/ubah-status/data-peminjaman" method="post">
                                                                @method('put')
                                                                @csrf
                                                                <div class="">
                                                                    <select name="status" id="status">
                                                                        <option @if ( $borrowedBook->status === "in stock") selected @endif value="in stock">in stock</option>
                                                                        <option @if ( $borrowedBook->status === "sedang dipinjam") selected @endif value="sedang dipinjam">sedang dipinjam</option>
                                                                        <option @if ( $borrowedBook->status === "dikembalikan") selected @endif value="dikembalikan">dikembalikan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <button class="btn btn-lg btn-dark">Konfirmasi</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cover bg" style="background-image: url(/img/buku/{{ $borrowedBook->image }})">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    </body>

    </html>
    {{-- @include('partials.footer') --}}
@endsection
