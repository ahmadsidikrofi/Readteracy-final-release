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
                                <li class="breadcrumb-item active fs-2 mx-auto" aria-current="page">Akun Anda</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4" data-aos="zoom-in-right">
                            <form action="/Readteracy/account/{{ Auth::user()->id }}/profile-picture" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body text-center">
                                    @if (Auth::user()->image == null)
                                        <div class="img-wrap">
                                            <span class="close">
                                                <a href="/Readteracy/account/{{ Auth::user()->id }}/delete/profile-picture">
                                                    <i class="bi bi-trash3"
                                                        style="font-size: 1.5rem; color: rgb(255, 255, 255);"></i>
                                                </a>
                                            </span>
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=28a745"
                                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;"
                                                id="image_preview">
                                        </div>
                                    @else
                                        <div class="img-wrap">
                                            <span class="close">
                                                <a href="/Readteracy/account/{{ Auth::user()->id }}/delete/profile-picture">
                                                    <i class="bi bi-trash3"
                                                        style="font-size: 1.5rem; color: rgb(255, 255, 255);"></i>
                                                </a>
                                            </span>
                                            <img src="/img/profile/{{ Auth::user()->image }}" alt="avatar"
                                                class="rounded-circle img-fluid" style="width: 180px; height: 180px"
                                                id="image_preview">
                                        </div>
                                    @endif
                                    <div class="col mt-3">
                                        <label for="image" class="btn btn-dark"><i class="fa-solid fa-upload"></i> Pilih gambar</label>
                                        <input type="file" name="image" class="form-control" id="image"
                                            style="display: none;">
                                        <button class="btn btn-primary mt-3" name="updatePic">Ubah Gambar</button>
                                        {{-- <a class="btn btn-danger mt-3" href="/Readteracy/account/{{ Auth::user()->id }}/delete/profile-picture">Hapus Foto Profile</a> --}}
                                        <hr>
                                    </div>
                                    <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                    <p class="text-muted mb-1">
                                        @if (Auth::user()->role == 1)
                                            Admin
                                        @elseif (Auth::user()->role == 2)
                                            Petugas Perpustakaan
                                        @else
                                            Peminjam Buku
                                        @endif
                                    </p>
                                    <p class="text-muted mb-4">{{ Auth::user()->alamat }}</p>
                                </div>
                            </form>
                        </div>
                        <div class="card mb-4 mb-md-0" data-aos="zoom-in-up">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Mini Library</span>of {{ Auth::user()->name }}</p>
                                @if ($peminjaman->isEmpty())
                                    <div class="mb-0">
                                        <h6 class="text-danger">Kamu belum meminjam buku apapun nih</h6>
                                        <img data-aos="fade-up" data-aos-duration="70000" src="/img/emptyBook.gif" width="60px" height="60" alt="">
                                        <img data-aos="fade-up" data-aos-duration="1000000" src="/img/emptyBook.gif" width="130px" height="120" alt="">
                                        <img data-aos="fade-up" data-aos-duration="900000" src="/img/emptyBook.gif" width="90px" height="80" alt="">
                                    </div>
                                @else
                                    @foreach ($peminjaman as $borrow)
                                        <div class="row mb-2">
                                            <p class="mb-1 fw-bold">{{ $borrow->judul }}</p>
                                            <div class="col-xl-3">
                                                <img src="/img/buku/{{ $borrow->image }}" width="80px" alt="">
                                            </div>
                                            <div class="col-xl-7">
                                                <?php
                                                $sinopsis = $borrow->sinopsis;
                                                if (strlen($sinopsis) > 10) {
                                                    $sinopsis = Str::substr($sinopsis, 0, 50) .'...';
                                                    echo $sinopsis;
                                                }
                                                ?>
                                            </div>
                                            <form action="/Readteracy/return-book" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $borrow->id }}" name="id">
                                                <input type="hidden" value="{{ $borrow->user_id }}" name="user_id">
                                                <input type="hidden" value="{{ $borrow->book_id }}" name="book_id">
                                                @if ($borrow->tipe === 'Fisik' && $borrow->status === 'dikembalikan')
                                                    <a href="/Readteracy/detail/buku/{{ $borrow->book_id }}" class="btn btn-primary btn-sm mt-3">Pinjam lagi</a>
                                                @elseif ($borrow->tipe === 'Fisik')
                                                    <button class="btn btn-sm btn-dark mt-3" name="return_book">Return book</button>
                                                @endif
                                            </form>
                                        </div>
                                        <hr>
                                        @endforeach
                                        <span>click here to see more <a href="/Readteracy/history/borrowed">my libraries</a></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="zoom-in-left">
                        <div class="card mb-4">
                            <form action="/Readteracy/account/update" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Name</p>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="nameInput" type="text"
                                                value="{{ Auth::user()->name }}" name="name" readonly>
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
                                                value="{{ Auth::user()->email }}" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Mobile</p>
                                        </div>
                                        <div class="col-sm-4">
                                            @if (Auth::user()->no_hp === null)
                                                <input class="form-control" id="no_hpInput" type="text"
                                                    placeholder="No hp tidak tercantum" name="no_hp"
                                                    inputmode="numeric" readonly>
                                            @else
                                                <input class="form-control" id="no_hpInput" type="text"
                                                    value="{{ Auth::user()->no_hp }}" name="no_hp" inputmode="numeric"
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
                                            @if (Auth::user()->alamat == null)
                                                <input class="form-control" id="alamatInput" type="text"
                                                    placeholder="Belum memiliki alamat" name="alamat" readonly>
                                            @else
                                                <input class="form-control" id="alamatInput" type="text"
                                                    value="{{ Auth::user()->alamat }}" name="alamat" readonly>
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
                        @if (Auth::user()->role === 1 || Auth::user()->role === 2)
                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">Readteracy</span> Info
                                        </p>
                                        @if (Auth::user()->role === 2)
                                            <a href="/Readteracy/data-peminjaman" class="btn btn-primary btn-lg mb-3 col-sm-5">Data peminjaman buku</a>
                                            <a href="/Readteracy/genre/genreList" class="btn btn-primary btn-lg mb-3 col-sm-6">Tambah Genre</a>
                                        @elseif (Auth::user()->role === 1)
                                            <a href="/Readteracy/data-peminjaman" class="btn btn-primary btn-lg mb-3 w-100">Data peminjaman buku</a>
                                            <a href="/Readteracy/admin/all-users" class="btn btn-primary btn-lg mb-3 w-100">All User</a>
                                        @endif
                                        <div class="row">
                                            <div class="col">
                                                <div class="card mt-3 border shadow" style="width: 18rem;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <i class="fa-solid fa-book fa-4x mx-3 mt-3"></i>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Total books</h5>
                                                                <p class="card-text fw-bold">{{ $allBooks }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->role === 1)
                                            <div class="col">
                                                <div class="card mt-3 border shadow" style="width: 18rem;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <i class="fa-solid fa-users fa-4x mx-3 mt-3"></i>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Users</h5>
                                                                <p class="card-text fw-bold">{{ $count_users }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col">
                                                <div class="card mt-3 border shadow justify-content-center" style="width: 18rem;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <i class="fa-solid fa-layer-group fa-4x mx-3 mt-3"></i>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Genre's</h5>
                                                                <p class="card-text fw-bold">{{ $allGenres }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card mt-3 border shadow justify-content-center" style="width: 18rem;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <i class="fa-solid fa-layer-group fa-4x mx-3 mt-3"></i>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Total borrowed</h5>
                                                                <p class="card-text fw-bold">{{ $count_peminjaman }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->role === 2)
                                            <div class="col">
                                                <div class="card mt-3 border shadow justify-content-center" style="width: 18rem;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <i class="fa-solid fa-layer-group fa-4x mx-3 mt-3"></i>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Total Return</h5>
                                                                <p class="card-text fw-bold">{{ $count_pengembalian }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
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

        {{-- <script>
            $('#image').ijaboCropTool({
            preview : '',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("updateProfilePicture") }}',
            // withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
                alert(message);
            },
            onError:function(message, element, status){
                alert(message);
            }
            });
        </script> --}}
    </body>

    </html>
@endsection
