<link rel="stylesheet" href="/css/theme.min.css">
<footer class="bg-dark border-top border-dark">
    <div class="container py-vh-4 text-secondary fw-lighter">
        <div class="row">
            <div class="col-12 col-lg-5 py-4 text-center text-lg-start text-white">
                @if (Auth::user())
                    <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center " href="/Readteracy/home">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-stack" viewBox="0 0 16 16">
                            <path
                                d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                            <path
                                d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                        </svg>
                        <span class="ms-md-1 mt-1 fw-bolder me-md-5">Readteracy</span>
                    </a>
                @else
                    <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center " href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-stack" viewBox="0 0 16 16">
                            <path
                                d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                            <path
                                d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                        </svg>
                        <span class="ms-md-1 mt-1 fw-bolder me-md-5">Readteracy</span>
                    </a>
                @endif
            </div>

            <div class="col">
                <span class="h6"><p>Layanan Pengaduan</p></span>
                <small>PT Timbul Tenggelam</small>
                <small>Bandung, Jawa Barat</small>
                <small><p>Readteracy@gov.com / 085157455205</p></small>
            </div>

            <div class="col border-end border-dark">
                <span class="h6">Genre's</span>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/Readteracy/genre/Historical" class="link-fancy link-fancy-light">Historical</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Readteracy/genre/Education" class="link-fancy link-fancy-light">Education</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">Romansa</a>
                    </li>
                    <li class="nav-item">
                        <a href="/Readteracy/catalogue" class="link-fancy link-fancy-light">All Categories</a>
                    </li>
                </ul>
            </div>

            <div class="col">
                <span class="h6">Support</span>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">About us</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="link-fancy link-fancy-light">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>


@yield('footer')
