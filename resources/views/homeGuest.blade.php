@extends('partials.navbarGuest')

@section('content')
    <!DOCTYPE html>
    <html class="h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
        <title>Readteracy - Sewa Buku</title>
        <link rel="stylesheet" href="/css/theme.min.css">

        <style>
            /* inter-300 - latin */
            @font-face {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 300;
                font-display: swap;
                src: local(''),
                    url('/fonts/inter-v12-latin-300.woff2') format('woff2'),
                    url('/fonts/inter-v12-latin-300.woff') format('woff');
            }

            /* inter-400 - latin */
            @font-face {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: local(''),
                    url('/fonts/inter-v12-latin-regular.woff2') format('woff2'),
                    url('/fonts/inter-v12-latin-regular.woff') format('woff');
            }

            @font-face {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 500;
                font-display: swap;
                src: local(''),
                    url('/fonts/inter-v12-latin-500.woff2') format('woff2'),
                    url('/fonts/inter-v12-latin-500.woff') format('woff');
            }

            @font-face {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 700;
                font-display: swap;
                src: local(''),
                    url('/fonts/inter-v12-latin-700.woff2') format('woff2'),
                    url('/fonts/inter-v12-latin-700.woff') format('woff');
            }
        </style>
    </head>
    <body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
        <main>
            <div class="position-absolute w-100 h-50 bg-black top-0 start-0" data-aos="fade"></div>
            <div class="position-relative py-vh-5 bg-cover bg-center" style="background-image: url(/img/buku1.png)">
                <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow" style="margin-top: 80px;">
                    <div class="row d-flex align-items-center">
                        <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
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
                                        <p class="lead text-secondary">Dengan memberikan buku yang mereka cari kita dapat
                                            memberikan fasilitas membaca tanpa henti dan mengurangi rasa minat baca
                                            warga indonesia
                                        </p>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a href="/account/register" class="btn btn-xl btn-light">Join us
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-100 position-relative bg-black text-white bg-cover d-flex align-items-center mt-5">
                <div class="container-fluid px-vw-5">
                    <div class="position-absolute w-100 h-50 bg-dark bottom-0 start-0"></div>
                    <div class="row d-flex align-items-center position-relative justify-content-center px-0 g-5">
                        <div class="col-12 col-lg-6">
                            <img src="/img/buku1.png" width="2280" height="1732" alt="abstract image"
                                class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <img src="/img/buku2.png" width="1116" height="1578" alt="abstract image"
                                class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                                data-aos-duration="2000">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <img src="/img/buku3.png" width="1116" height="848" alt="abstract image"
                                class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                                data-aos-duration="3000">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-dark">
                <div class="container px-vw-5 py-vh-5">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-lg-7 text-lg-end" data-aos="fade-right">
                            <span class="h5 text-secondary fw-lighter">What we do</span>
                            <h3 class="display-4">
                                Kami khawatir dengan
                                kondisi minat baca di Indonesia yang
                                memprihatinkan, terletak di posisi 62
                                dari 70 negara, memposisikan kita
                                di 10 negara terbawah yang memiliki
                                tingkat literasi yang rendah.
                            </h3>
                        </div>
                        <div class="col-12 col-lg-5" data-aos="fade-up">
                            <h3 class="pt-5">Readteracy merupakan langkah selanjutnya dalam proses pinjam-meminjam buku.</h3>
                            <p class="text-secondary">Dengan Readteracy, anda dapat meminjam buku hanya dalam beberapa klik saja, praktis untuk masyarakat Indonesia yang kurang suka dengan segala suatu yang bersifat rumit.<br>
                                <a href="#" class="link-fancy link-fancy-light me-2">Tell me more</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </p>
                            <h3 class="border-top border-secondary pt-5 mt-5">Readteracy emberikan media pembelajaran yang efisien</h3>
                            <p class="text-secondary"> Saat para pelajar cenderung mudah bosan dan susah mencari jawaban,
                                maka buku elektornik ini bisa dimanfaatkan sebagai media pembelajaran yang efisien.
                                Dengan buku jenis ini, para pelajar akan lebih tertarik untuk mempelajarinya.<br>
                                <a href="#" class="link-fancy link-fancy-light me-2">Tell me more</a>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-black py-vh-3">
                <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">

                    <div class="row gx-5">
                        <div class="col-12 col-md-6">
                            @foreach ( $booksLeft as $book )
                                <div class="card bg-transparent mb-5" data-aos="zoom-in-up">
                                    <div class="bg-dark shadow rounded-5 p-0">
                                        <img src="/img/buku/{{ $book->image }}" width="532" height="227" alt="..."
                                            class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                        <div class="p-5">
                                            <h2 class="fw-lighter">Ipsum dolor est</h2>
                                            <p class="pb-4 text-secondary">Lorem ipsum dolor sit amet, consetetur sadipscing
                                                elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                                erat.</p>
                                            <a href="#" class="link-fancy link-fancy-light">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="p-5 pt-0 mt-5" data-aos="fade">
                                <span class="h5 text-secondary fw-lighter">What we don´t know</span>
                                <h2 class="display-4">There is a lot we don´t know. Here is a small sneak peek</h2>
                            </div>
                            @foreach ( $booksRight as $book )
                                <div class="card bg-transparent mb-5 mt-5" data-aos="zoom-in-up">
                                    <div class="bg-dark shadow rounded-5 p-0">
                                        <img src="/img/buku/{{ $book->image }}" width="582" height="390" alt="..."
                                            class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                        <div class="p-5">
                                            <h2 class="fw-lighter">Ipsum dolor est</h2>
                                            <p class="pb-4 text-secondary">
                                                Lorem ipsum dolor sit amet, consetetur sadipscing
                                                elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                                                erat.</p>
                                            <a href="#" class="link-fancy link-fancy-light">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

            <div class="bg-dark">
                <div class="container px-vw-5 py-vh-5">
                    <div class="row d-flex align-items-center">
                        <div class="col-12 col-lg-5 text-center text-lg-end" data-aos="zoom-in-right">
                            <span class="h5 text-secondary fw-lighter">What we charge</span>
                            <h2 class="display-4">You get all our knowledge for one simple price</h2>
                        </div>
                        <div class="col-12 col-lg-7 bg-dark rounded-5 py-vh-3 text-center my-5" data-aos="zoom-in-up">
                            <h2 class="display-huge mb-5">
                                <span class="fs-4 me-2 fw-light">Rp. </span><span
                                    class="border-bottom border-5">Free</span><span class="fs-6 fw-light">without tax</span>
                            </h2>
                            <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer')

    </body>
    </html>

@endsection
