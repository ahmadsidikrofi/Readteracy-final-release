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
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="/css/detailPage.css">
        <link rel="stylesheet" href="/css/dropdown.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/commentButton.css">
        <style>
            .detail-container {
                margin-top: 200px;
            }

            .list-group {
                margin-top: auto;
                margin-bottom: auto;
            }
        </style>
    </head>

    <body>
        <div class="detail-container container">
            <div class="card bg-white py-vh-3 rounded-5 shadow">
                <div class="card-body">
                    <h3 class="card-title text-center">{{ $isi_buku->judul }}</h3>
                    <h6 class="card-subtitle text-center fw-bold">
                        @foreach ($isi_buku->genre as $isi)
                            {{ $isi->nama_genre }}
                        @endforeach
                    </h6>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <?php
                        $isi_buku = $isi_buku['isi_buku'];
                        if (strlen($isi_buku) > 20) {
                            $isi_buku = Str::substr($isi_buku, 0, 1000) . '...';
                            echo $isi_buku;
                        }
                        ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-8 mx-auto">
                        <a class="btn btn-dark text-light w-100">Baca bagian selanjutnya</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-8 mx-auto">
                      <div class="input-group">
                        <input type="text" class="form-control rounded-5" placeholder="Tulis komentar">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary rounded-circle" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                            </svg>
                          </button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
