<!doctype html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
    <title>Login For Readteracy</title>
    <link rel="stylesheet" href="/css/theme.min.css">
    <link rel="stylesheet" href="/css/toastrAuth.css">
    <style>
        .bg {
            background-image: url('/img/login.jpg');
            background-position: 0rem 0rem;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body class="d-flex h-100 w-100 bg-black text-white" data-bs-spy="scroll" data-bs-target="#navScroll">

    <div class="h-100 container-fluid">
        <div class="h-100 row d-flex align-items-stretch">

            <div class="col-12 col-md-7 col-lg-6 col-xl-5 d-flex align-items-start flex-column px-vw-5">

                <header class="mb-auto py-vh-2 col-12">
                    <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-stack" viewBox="0 0 16 16">
                            <path
                                d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                            <path
                                d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
                        </svg>
                        <span class="ms-md-1 mt-1 fw-bolder me-md-5">Readteracy</span>
                    </a>

                </header>
                <main class="mb-auto col-12">
                    <h1>Masuk dan mulai sewa</h1>
                    <form class="row" method="post" action="/account/login/store">
                        @csrf
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control form-control-lg bg-gray-800 border-dark"
                                    id="email" aria-describedby="emailHelp" name="email">
                                <div id="emailHelp" class="form-text">Santai emailmu aman bersama kami</div>
                                @if (session('error'))
                                    <small>
                                        <strong class="text-danger mb-5">{{ session('error') }}</strong>
                                        <br><br>
                                    </small>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg bg-gray-800 border-dark"
                                    id="password" name="password">

                                <i class="@error('password') is-invalid @enderror"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check py-3">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                @if (Cookie::get('remember') == 'remember')
                                    checked="checked"
                                @endif>
                                <label class="form-check-label" for="remember">
                                    <strong>Remember Me</strong>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-white btn-xl mb-3">Masuk!</button>
                            <p>Don't have account? <a href="/account/register" style="text-decoration: none;"> Get Here</a></p>
                        </div>
                    </form>

                </main>
            </div>

            {{-- <div class="col-12 col-md-5 col-lg-6 col-xl-7 gradient">

            </div> --}}
            <div class="bg col-12 col-md-5 col-lg-6 col-xl-7">
            </div>
        </div>

    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/toastAuth.js"></script>
    <script>
        @if (Session::has('wrongAuth'))
            toastr.error('Upss..email atau password kamu ada yang ga bener nih😐')
        @endif
    </script>
</html>
