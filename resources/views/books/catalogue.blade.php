@if ( Auth::user() )
    @include('partials.navbarAuth')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Readteracy - Catalogue</title>
        <link rel="stylesheet" href="/css/card.css">
        <link rel="stylesheet" href="/css/buttonGenre.css">
        <link rel="stylesheet" href="/css/dropdown.css">
    </head>
    <body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
        <main>
            <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>
            <div class="position-relative py-vh-5 bg-cover bg-center"
                style="background-image: url(/img/buku1.png)">
                <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow" style="margin-top: 80px;">
                    <div class="row d-flex align-items-center">
                        <div class="w-100 overflow-hidden position-relative bg-black text-white">
                            <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
                            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                                <div style="border: whitesmoke;">
                                    @if (Auth::user()->role == 1)
                                        <h2 class="text-secondary">Welcome Admin</h2>
                                    @elseif (Auth::user()->role == 2)
                                        <h2 class="text-secondary">Welcome Petugas Perpustakaan</h2>
                                    @endif
                                </div>
                                <div class="row d-flex align-items-center justify-content-center py-vh-5">
                                    <div class="col-12 col-xl-10">
                                        <form action="" class="d-flex mb-5" role="search">
                                            <input class="me-3 form-control" type="search" placeholder="Judul Buku"
                                                aria-label="Search">
                                            <button class="btn btn-light" type="submit">Search</button>
                                        </form>
                                        <span class="h5 text-secondary fw-bold text-center">Our Mission</span>
                                        <h1 class="display-huge mt-3 mb-3 lh-1">Kita menyewakan buku untuk masyarakat</h1>
                                    </div>
                                    <div class="col-12 col-xl-8">
                                        <p class="lead text-secondary">
                                            Dengan memberikan buku yang mereka cari kita dapat
                                            memberikan fasilitas membaca tanpa henti dan mengurangi rasa minat baca
                                            warga indonesia
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col mt-5">
                        <h1 class="mt-5 text-center text-white">Catalogue</h1>
                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                            <div class="mx-auto text-center">
                                <a href="/Readteracy/catalogue/addBook" class="btn btn-light">Tambah Buku</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Start Book_Catalogue List --}}
            <section>
                <div class="container">
                    <div class="row">
                        @foreach ( $books as $book )
                        <div class="col">
                            <div class="book mt-5 mb-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="container mx-auto">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h3 class="mt-3 text-center">{{ $book->judul }}</h3>
                                                    <p class="mx-3">
                                                        <?php
                                                            $sinopsis = $book["sinopsis"];
                                                            if (strlen($sinopsis) > 20) {
                                                                $sinopsis = Str::substr($sinopsis, 0, 150) . '...';
                                                                echo $sinopsis;
                                                            };
                                                        ?>
                                                    </p>
                                                    <div class="justify-content-end mx-3">
                                                        <small><a href="/Readteracy/detail/{{ $book->id }}" class="link-fancy link-fancy-black">Read More</a></small>
                                                        <svg width="18" height="18" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 mt-3 d-flex">
                                                    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                                        <div class="mb-3">
                                                            <a href="/Readteracy/editBook/{{ $book->slug }}" class="buttonGenre">Edit</a>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <a href="/Readteracy/delete-book/{{ $book->slug }}" class="buttonGenre">Hapus</a>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="mx-3 mt-3">
                                                    @foreach ( $book->genre as $genre )
                                                        {{ $genre->nama_genre }}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cover bg" style="background-image: url(/img/buku/{{ $book->image }})">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            @include('partials.footer')
        </main>
    </body>
    <script src="/js/navbar.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/aos.js"></script>
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
@else
    @include('partials.navbarGuest')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Readteracy - Catalogue</title>
        <link rel="stylesheet" href="/css/card.css">
        <link rel="stylesheet" href="/css/buttonGenre.css">
        <link rel="stylesheet" href="/css/dropdown.css">
    </head>
    <body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
        <main>
            <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>
            <div class="position-relative py-vh-5 bg-cover bg-center"
                style="background-image: url(/img/buku1.png)">
                <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow" style="margin-top: 80px;">
                    <div class="row d-flex align-items-center">
                        <div class="w-100 overflow-hidden position-relative bg-black text-white">
                            <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
                            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                                <div class="row d-flex align-items-center justify-content-center py-vh-5">
                                    <div class="col-12 col-xl-10">
                                        <form action="" class="d-flex mb-5" role="search">
                                            <input class="me-3 form-control" type="search" placeholder="Judul Buku"
                                                aria-label="Search">
                                            <button class="btn btn-light" type="submit">Search</button>
                                        </form>
                                        <span class="h5 text-secondary fw-bold text-center">Our Mission</span>
                                        <h1 class="display-huge mt-3 mb-3 lh-1">Kita menyewakan buku untuk masyarakat</h1>
                                    </div>
                                    <div class="col-12 col-xl-8">
                                        <p class="lead text-secondary">
                                            Dengan memberikan buku yang mereka cari kita dapat
                                            memberikan fasilitas membaca tanpa henti dan mengurangi rasa minat baca
                                            warga indonesia
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col mt-5">
                        <h1 class="mt-5 text-center text-white">Catalogue</h1>
                    </div>
                </div>
            </div>

            {{-- Start Book_Catalogue List --}}
            <section>
                <div class="container">
                    <div class="row">
                        @foreach ( $books as $book )
                        <div class="col">
                            <div class="book mt-5 mb-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="container mx-auto">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h3 class="mt-3 text-center">{{ $book->judul }}</h3>
                                                    <p class="mx-3">
                                                        <?php
                                                            $sinopsis = $book["sinopsis"];
                                                            if (strlen($sinopsis) > 20) {
                                                                $sinopsis = Str::substr($sinopsis, 0, 150) . '...';
                                                                echo $sinopsis;
                                                            };
                                                        ?>
                                                    </p>
                                                    <div class="justify-content-end mx-3">
                                                        <small><a href="/Readteracy/detail/guest/{{ $book->id }}" class="link-fancy link-fancy-black">Read More</a></small>
                                                        <svg width="18" height="18" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <div class="mx-3 mt-3">
                                                    @foreach ( $book->genre as $genre )
                                                        {{ $genre->nama_genre }}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cover bg" style="background-image: url(/img/buku/{{ $book->image }})">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            @include('partials.footer')
        </main>
    </body>
    <script src="/js/navbar.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/aos.js"></script>
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
