@if ( Auth::user() )
    @include('partials.navbarAuth')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/detailPage.css">
        <link rel="stylesheet" href="/css/dropdown.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/formFisik.css">
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
                        <h3 class="card-title text-center">{{ $detail_book->judul }}</h3>
                        <h6 class="card-subtitle text-center">
                            @foreach ( $detail_book->genre as $currentGenre )
                                {{ $currentGenre->nama_genre }}
                            @endforeach
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="white-box text-center mx-3"><img src="/img/buku/{{ $detail_book->image }}" width="430px" height="600px" class="img-responsive rounded-5" alt=""></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5 mx-3">Sinopsis</h4>
                            <p class="mx-3">{{ $detail_book->sinopsis }}</p>
                            <button class="btn bg-warning mr-1 mt-3 mx-3" data-toggle="tooltip" title="Add to library" data-original-title="Add to library">
                                <i class="fa fa-plus"></i>
                            </button>

                            {{-- $detail_book->status == "in stock" && auth()->check() && auth()->user()->peminjamanBuku()->where('book_id', $detail_book->id)->exists() --}}
                            @if ($peminjamanBuku && $peminjamanBuku->status == "sedang dipinjam")
                                <a href="/Readteracy/baca-buku/{{ $peminjamanBuku->id }}" class="btn btn-dark mt-3">Ready to read</a>
                            @elseif ($detail_book->status == "in stock")
                                <button class="btn bg-dark text-white dropdown-toggle mt-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Want to read
                                </button>
                            @elseif($peminjamanBuku && $peminjamanBuku->status == "in stock")
                                <a href="/Readteracy/baca-buku/{{ $peminjamanBuku->id }}" class="btn btn-dark mt-3">Ready to read</a>
                            @elseif($peminjamanBuku && $peminjamanBuku->status == "dikembalikan")
                                <button class="btn bg-dark text-white dropdown-toggle mt-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Want to read
                                </button>
                            @else
                                <a href="#" class="btn btn-dark mt-3" disabled>Not available</a>
                            @endif

                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><button data-bs-toggle="modal" data-bs-target="#bukuFisik" class="dropdown-item" value="Fisik">Fisik</button></li>
                                <li><button data-bs-toggle="modal" data-bs-target="#bukuNonFisik" class="dropdown-item">Non-Fisik</button></li>
                            </ul>
                            <div class="col-md-4">
                                <div class="input-group has-validation">
                                <div></div>
                                </div>
                            </div>
                            <h3 class="box-title mt-5 mx-3">Key Highlights</h3>
                            <ul class="list-unstyled mx-3">
                                @if ($peminjamanBuku === NULL)
                                    <div class="rounded-3 border bg-secondary text-dark px-2 py-1 col-sm-6 col-lg-6">
                                        <li><i class="fa fa-check text-success"></i>Status : Belum dipinjam</li>
                                    </div>
                                    <li><i class="fa fa-check text-success"></i>Pengembalian : Tidak ada</li>
                                @else
                                    <div class="rounded-3 border bg-success text-light px-2 py-1 col-sm-6 col-lg-6">
                                        <li><i class="fa fa-check"></i>Status : {{ $peminjamanBuku->status }}</li>
                                    </div>
                                    <li><i class="fa fa-check text-success"></i>Deadline : {{ $peminjamanBuku->return_date }}</li>
                                @endif
                                @if ($detail_book->halaman == NULL)
                                    <li><b class="fw-bold text-danger">X</b>
                                        Halaman belum diketahui
                                    </li>
                                @else
                                    <li><i class="fa fa-check text-success"></i>
                                        {{ $detail_book->halaman }} Halaman
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center">
                            <h3 class="box-title mt-5 mx-3">General Info</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-product">
                                    <tbody>
                                        <tr>
                                            <td width="490">Judul</td>
                                            <td>{{ $detail_book->judul }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penulis</td>
                                            <td>{{ $detail_book->nama_penulis }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penerbit</td>
                                            @if ($detail_book->nama_penerbit == NULL)
                                                <td>Belum ada penerbit</td>
                                            @else
                                                <td>{{ $detail_book->nama_penerbit }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Genre</td>
                                            <td>
                                                @foreach ( $detail_book->genre as $currentGenre )
                                                    {{ $currentGenre->nama_genre }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Terbit</td>
                                            <td>{{ $detail_book->tahun_terbit }}</td>
                                        </tr>

                                        <tr>
                                            <td>Total Halaman</td>
                                            @if ($detail_book->halaman == NULL)
                                                <td>Tidak diketahui</td>
                                            @else
                                                <td>{{ $detail_book->halaman }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>ISBN</td>
                                            @if ($detail_book->isbn == NULL)
                                                <td>Belum Legal</td>
                                            @else
                                                <td>{{ $detail_book->isbn }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('books.modalFisik')

        @include('books.modalNonFisik')

        @include('partials.footer')
    </body>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 800, // values from 0 to 3000, with step 50ms
        });
    </script>
    </html>

@else
    @include('partials.navbarGuest')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/detailPage.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/formFisik.css">
        <link rel="stylesheet" href="/css/theme.min.css">
        <link rel="stylesheet" href="/css/theme.css">
        <link rel="stylesheet" href="/css/dropdown.css">

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
                        <h3 class="card-title text-center">{{ $detail_book->judul }}</h3>
                        <h6 class="card-subtitle text-center">
                            @foreach ( $detail_book->genre as $currentGenre )
                                {{ $currentGenre->nama_genre }}
                            @endforeach
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="white-box text-center mx-3"><img src="/img/buku/{{ $detail_book->image }}" width="430px" height="600px" class="img-responsive rounded-5" alt=""></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5 mx-3">Sinopsis</h4>
                            <p class="mx-3">{{ $detail_book->sinopsis }}</p>
                            <button class="btn bg-warning mr-1 mt-3 mx-3" data-toggle="tooltip" title="Add to library" data-original-title="Add to library">
                                <i class="fa fa-plus"></i>
                            </button>

                            {{-- $detail_book->status == "in stock" && auth()->check() && auth()->user()->peminjamanBuku()->where('book_id', $detail_book->id)->exists() --}}
                            <a href="/account/login-page" class="btn text-white btn-dark bg-dark btn-lg mt-3">Click here to login and read</a>
                            <div class="col-md-4">
                                <div class="input-group has-validation">
                                <div></div>
                                </div>
                            </div>
                            <h3 class="box-title mt-5 mx-3">Key Highlights</h3>
                            <ul class="list-unstyled mx-3">
                                <div class="rounded-3 border bg-secondary text-dark px-2 py-1 col-sm-6 col-lg-6">
                                    <li><i class="fa fa-check text-success"></i>Status : Belum dipinjam</li>
                                </div>
                                <li><i class="fa fa-check text-success"></i>Pengembalian : Tidak ada</li>
                                @if ($detail_book->halaman == NULL)
                                    <li><b class="fw-bold text-danger">X</b>
                                        Halaman belum diketahui
                                    </li>
                                @else
                                    <li><i class="fa fa-check text-success"></i>
                                        {{ $detail_book->halaman }} Halaman
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center">
                            <h3 class="box-title mt-5 mx-3">General Info</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-product">
                                    <tbody>
                                        <tr>
                                            <td width="490">Judul</td>
                                            <td>{{ $detail_book->judul }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penulis</td>
                                            <td>{{ $detail_book->nama_penulis }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penerbit</td>
                                            @if ($detail_book->nama_penerbit == NULL)
                                                <td>Belum ada penerbit</td>
                                            @else
                                                <td>{{ $detail_book->nama_penerbit }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Genre</td>
                                            <td>
                                                @foreach ( $detail_book->genre as $currentGenre )
                                                    {{ $currentGenre->nama_genre }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Terbit</td>
                                            <td>{{ $detail_book->tahun_terbit }}</td>
                                        </tr>

                                        <tr>
                                            <td>Total Halaman</td>
                                            @if ($detail_book->halaman == NULL)
                                                <td>Tidak diketahui</td>
                                            @else
                                                <td>{{ $detail_book->halaman }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>ISBN</td>
                                            @if ($detail_book->isbn == NULL)
                                                <td>Belum Legal</td>
                                            @else
                                                <td>{{ $detail_book->isbn }}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </body>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 800, // values from 0 to 3000, with step 50ms
        });
    </script>
    <script>
        let scrollpos = window.scrollY
        const header = document.querySelector(".navbar")
        const header_height = header.offsetHeight

        const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
        const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

        window.addEventListener('scroll', function() {
            scrollpos = window.scrollY;

            if (scrollpos >= header_height) {
                add_class_on_scroll()
            } else {
                remove_class_on_scroll()
            }

            console.log(scrollpos)
        })
    </script>
    </html>

@endif
