
@include('partials.navbarAuth')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/history.css">
    </head>
    <body>
        <main class="py-vh-5">
            <div class="container py-vh-5 mt-5">
                <div class="row">
                    <div class="col mt-5">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
                            <div class="carousel-indicators">
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner rounded-4">
                                <div class="carousel-item active">
                                    <img src="https://source.unsplash.com/random/1000x400?library,book" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://source.unsplash.com/random/1000x400?book" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://source.unsplash.com/random/1000x400?book" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @if ($peminjaman->isEmpty())
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="text-info">Kamu belum meminjam buku apapun nih</h2>
                            <img data-aos="fade-up" data-aos-duration="" src="/img/emptyHistory.gif" width="400" alt="">
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col fw-4 text-center text-danger fw-bolder">
                            <h2 class="fw-bolder mt-1">Buku milik {{ auth()->user()->name }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        @if (session('error'))
                            <div class="alert alert-primary text-light text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    @foreach ( $peminjaman as $borrow )
                        @if ($borrow->return_date < $borrow->actual_return_date)
                            <div class="row" id="returnBook-telat">
                                <div class="col-lg-6 col-md-12">
                                    <p class="alert bg-danger text-light">
                                        <span>Kamu telat melakukan pengembalian buku</span>
                                        <button type="button" class="btn-close btn-sm border btn-dark" onclick="hideWarningTelat()" aria-label="Close"></button>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        @foreach ( $peminjaman as $borrow )
                            <div class="col rounded-5 mt-3">
                                <div class="book-history">
                                    <div class="book-item">
                                        <div class="book-cover shadow">
                                            <img src="/img/buku/{{ $borrow->image }}" alt="Cover Buku">
                                            <div class="overlay">
                                            <a class="book-status bg-success text-light {{ $borrow->actual_return_date === NULL ? '' :
                                                ($borrow->return_date < $borrow->actual_return_date ? 'bg-danger text-light' : 'bg-success text-light') }}">{{ $borrow->status }}</a>
                                            <h6 class="mb-3">{{ optional($borrow->book)->nama_penulis }}</h6>
                                            @if ($borrow->status === "dikembalikan" || $borrow->status === "in stock")
                                                <a href="/Readteracy/detail/buku/{{ optional($borrow->book)->id }}" class="read-more-btn">Details</a>
                                            @elseif ($borrow->status === "sedang dipinjam")
                                                <a href="/Readteracy/baca-buku/{{ optional($borrow->book)->id }}" class="read-more-btn">Baca buku</a>
                                            @endif
                                            <h6 class="mt-3">{{ $borrow->tipe }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>
    </body>

    <script>
        function hideWarningTelat() {
            var warningTelat = document.getElementById('returnBook-telat');
            warningTelat.style.display = 'none';
        }
    </script>
