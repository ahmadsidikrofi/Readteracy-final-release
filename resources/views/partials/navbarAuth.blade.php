<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Readteracy - Sewa Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
    <title>Readteracy - Sewa Buku</title>
    <style>
        /* inter-300 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-300.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-300.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        /* inter-400 - latin */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-regular.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-regular.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-500.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-500.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local(''),
                url('/fonts/inter-v12-latin-700.woff2') format('woff2'),
                /* Chrome 26+, Opera 23+, Firefox 39+ */
                url('/fonts/inter-v12-latin-700.woff') format('woff');
            /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
        }
    </style>
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="/css/dropdown.css">
    <link rel="stylesheet" href="/css/theme.min.css">
    <link rel="stylesheet" href="/css/theme.css">
</head>
<body>
    <header>
        <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
            <div class="container">
                <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="/Readteracy/home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-stack" viewBox="0 0 16 16">
                        <path
                            d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                        <path
                            d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                    </svg>
                    <span class="ms-md-1 mt-1 fw-bolder me-md-5">Readteracy</span>
                </a>

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
                    <li class="nav-item">
                        <a class="nav-link" href="/Readteracy/catalogue">
                            Katalog
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <input type="text" id="value" class="textBox" placeholder="Genre's" autocomplete="off">
                            <input type="text" placeholder="Genre's">
                            @if (Request::url() !== url('/Readteracy/genre/genreList'))
                                <div class="option">
                                    @foreach ( $genre as $items )
                                        <div onclick="show('{{ $items->nama_genre }}')"><ion-icon name="book" class="text-white"></ion-icon> <a style="text-decoration: none;" class="text-white" href="/Readteracy/catalogue?genre={{ $items->slug }}">{{ $items->nama_genre }}</a></div>
                                    @endforeach
                                </div>
                            @else
                                <div class="option">
                                    <div onclick="show('Historical')"><ion-icon name="planet"></ion-icon><a style="text-decoration: none;" class="text-white" href="/Readteracy/genre/Historical">Historical</a></div>
                                    <div onclick="show('Education')"><ion-icon name="book"></ion-icon><a style="text-decoration: none;" class="text-white" href="/Readteracy/genre/Education">Education</a></div>
                                    <div onclick="show('Romansa')"><ion-icon name="rose"></ion-icon><a style="text-decoration: none;" class="text-white" href="#">Romansa</a></div>
                                </div>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Readteracy/about-us">
                            Tentang
                        </a>
                    </li>
                </ul>

                {{-- <img src="/img/guest.png" alt="" class="userPic" onclick="toggleMenu()"> --}}
                @if (Auth::user())
                <img class="userPic me-3" onclick="toggleMenu()" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=28a745" alt="">
                <button class="btn btn-light" onclick="toggleMenu()">Menu</button>
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img class="userPic me-3" onclick="toggleMenu()" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random&color=28a745" alt="">
                            <h2 class="text-secondary">{{ Auth::user()->name }}</h2>
                        </div>

                        <a href="/account/register" class="sub-menu-link">
                            <img src="/img/password.png">
                            <p>Ubah Password</p>
                            <span>></span>
                        </a>
                        <a href="/Readteracy/history/borrowed" class="sub-menu-link">
                            <img src="/img/order.png">
                            <p>Riwayat</p>
                            <span>></span>
                        </a>
                        <a href="/Readteracy/profile" class="sub-menu-link">
                            <img src="/img/order.png">
                            <p>Profile</p>
                            <span>></span>
                        </a>
                        <a href="/account/auth/logout" class="sub-menu-link">
                            <img src="/img/logout.png">
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </nav>
    </header>

    @yield('content')

</body>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/aos.js"></script>
<script>
    AOS.init({
        duration: 800, // values from 0 to 3000, with step 50ms
    });
</script>
<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }

    function show(items) {
        document.querySelector('.textBox').value = items;
        document.getElementById('value').style.color = 'white';
    }

    var dropdown = document.querySelector('.dropdown');
    dropdown.onclick = function() {
        dropdown.classList.toggle('active');
    }

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


