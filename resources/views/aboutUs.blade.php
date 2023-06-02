
@if (Auth::user())
    @include('partials.navbarAuth')
    <link rel="stylesheet" href="/css/aboutUsCard.css">
    <style>
        body {
            background: #292626
        }
    </style>
    <main class="py-vh-5">
        <div class="container py-vh-5">
            <div class="row" style="margin: 0 0 0 30px;">
                <div class="col mx-auto text-center text-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-stack" viewBox="0 0 16 16">
                        <path
                            d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                        <path
                            d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                    </svg>
                    <span class="ms-md-1 mt-1 fw-bolder fs-1 me-md-5">Readteracy</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://source.unsplash.com/random/1000x400?library,book" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/random/1000x400?book,bookshelf" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/random/1000x400?bookshelf" class="d-block w-100" alt="...">
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
        <div class="container text-light">
            <div class="row">
                <div class="col-sm-11 py-5 mx-auto">
                    <h2 class="fw-bold text-center">Tentang Kami</h2>
                    <p class="text-left">Readteracy menyewakan buku untuk masyarakat.
                        Dengan memberikan buku yang mereka cari kita dapat memberikan
                        fasilitas membaca tanpa henti dan meningkatkan rasa minat baca warga Indonesia.
                    </p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-5 mx-auto">
                    <h4 class="text-center">Visi</h4>
                    <p class="text-left">
                        Kami khawatir dengan
                        kondisi minat baca di Indonesia yang
                        memprihatinkan, terletak di posisi 62
                        dari 70 negara, memposisikan kita
                        di 10 negara terbawah yang memiliki
                        tingkat literasi yang rendah.
                    </p>
                </div>
                <div class="col-sm-5 mx-auto">
                    <h4 class="text-center">Misi</h4>
                    <p class="text-left"> Readteracy merupakan langkah selanjutnya dalam proses pinjam-meminjam buku.
                        Dengan Readteracy, anda dapat meminjam buku hanya dalam beberapa klik saja, praktis untuk masyarakat Indonesia yang kurang suka dengan segala suatu yang bersifat rumit.
                    </p>
                </div>
                <div class="col-sm-11 mx-auto text-left">
                    <p class="">Readteracy memberikan media pembelajaran yang
                        efisien. Saat para pelajar cenderung mudah bosan dan susah mencari jawaban,
                        maka buku elektornik ini bisa dimanfaatkan sebagai media pembelajaran yang efisien.
                        Dengan buku jenis ini, para pelajar akan lebih tertarik untuk mempelajarinya.
                    </p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col text-center">
                    <h2 class="fw-bold">Our Team</h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col mb-5">
                    <article class="card">
                        <div class="temporary_text">
                            Programmer-1
                        </div>
                        <div class="card_content">
                            <span class="card_title">Ahmad Sidik Rofiudin</span>
                                <span class="card_subtitle">Programmer - 1202204108</span>
                                <p class="card_description">
                                    Dalam mengembangkan website Readteracy saya membantu mengembangkan website ini
                                    menggunakan framework Laravel. Semoga kedepannya rakyat mampu
                                    meluangkan waktu untuk membaca buku
                                </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endif
