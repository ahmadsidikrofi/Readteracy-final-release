@extends('partials.navbarAuth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Readteracy - Proimage Account</title>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/css/dropdown.css">
        <style>
            input[readonly] {
                background-color: #f2f2f2;
            }

            .img-wrap {
                position: relative;
                display: inline-block;
                font-size: 0;
            }

            .img-wrap .close {
                position: absolute;
                top: 2px;
                right: 2px;
                z-index: 100;
                background-color: #f80000;
                padding: 10px 8px 8px;
                color: #000;
                font-weight: bold;
                cursor: pointer;
                opacity: .2;
                text-align: center;
                font-size: 22px;
                line-height: 10px;
                border-radius: 50%;
            }

            .img-wrap:hover .close {
                opacity: 1;
                transition: ease-in 1s;
                transform: translate(9px);
            }
        </style>

    </head>

    <body>
        <section class="mt-5" style="background-color: #3f3f3f;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" data-aos="fade-up">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active fs-2 mx-auto" aria-current="page">Akun {{ $userProfile->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4" data-aos="zoom-in-right">
                            <div class="card-body text-center">
                                @if ($userProfile->image == null)
                                    <div class="img-wrap">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($userProfile->name) }}&background=random&color=28a745"
                                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"
                                            id="image_preview">
                                    </div>
                                @else
                                    <div class="img-wrap">
                                        <img src="/img/profile/{{ $userProfile->image }}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 180px; height: 180px"
                                            id="image_preview">
                                    </div>
                                @endif
                                <h5 class="my-3">{{ $userProfile->name }}</h5>
                                <p class="text-muted mb-1">
                                    @if ($userProfile->role == 2)
                                        Petugas Perpustakaan
                                    @else
                                        Peminjam Buku
                                    @endif
                                </p>
                                <p class="text-muted mb-4">{{ $userProfile->alamat }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="zoom-in-left">
                        <div class="card mb-4">
                            <form action="/Readteracy/admin/update/member/{{ $userProfile->id }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Name</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="nameInput" type="text"
                                                value="{{ $userProfile->name }}" name="name" readonly>
                                        </div>
                                        <div class="col offset-sm-3">
                                            <a class="btn btn-dark" id="nameButton"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="emailInput" type="text"
                                                value="{{ $userProfile->email }}" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-4">
                                            @if ($userProfile->no_hp === null)
                                                <input class="form-control" id="no_hpInput" type="text"
                                                    placeholder="No hp tidak tercantum" name="no_hp"
                                                    inputmode="numeric" readonly>
                                            @else
                                                <input class="form-control" id="no_hpInput" type="text"
                                                    value="{{ $userProfile->no_hp }}" name="no_hp" inputmode="numeric"
                                                    readonly>
                                            @endif
                                        </div>
                                        <div class="col offset-sm-3">
                                            <a class="btn btn-dark" id="no_hpButton"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-4">
                                            @if ($userProfile->alamat == null)
                                                <input class="form-control" id="alamatInput" type="text"
                                                    placeholder="Belum memiliki alamat" name="alamat" readonly>
                                            @else
                                                <input class="form-control" id="alamatInput" type="text"
                                                    value="{{ $userProfile->alamat }}" name="alamat" readonly>
                                            @endif
                                        </div>
                                        <div class="col offset-sm-3">
                                            <a class="btn btn-dark" id="alamatButton"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <button type="submit" name="updateProfile" class="btn btn-dark">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
            crossorigin="anonymous"></script>
        <script src="/js/profile.js"></script>
        <script src="/js/aos.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/plugins/ijabocrop/ijaboCropTool.min.js"></script>
        <script>
            AOS.init({
                duration: 800, // values from 0 to 3000, with step 50ms
            });
        </script>

        <script>
            $(document).on('click', '#change_pic_btn', function() {
                $('#image').click();
            });
        </script>
    </body>

    </html>
@endsection
