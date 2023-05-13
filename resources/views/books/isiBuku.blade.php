@extends('partials.navbarAuth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="/css/detailPage.css">
        <link rel="stylesheet" href="/css/dropdown.css">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="/css/commentButton.css">
        <link rel="stylesheet" href="/css/comment.css">
        <link rel="stylesheet" href="/css/toastr.css">
        <style>
            .detail-container {
                margin-top: 200px;
            }

            .list-group {
                margin-top: auto;
                margin-bottom: auto;
            }

            .card {
                background-color: rgb(235, 235, 235);
            }
        </style>
    </head>

    <body>
        <div class="detail-container container">
            <div class="card py-vh-3 rounded-5 shadow">
                <div class="card-body">
                    <h3 class="card-title text-center">{{ $isi_buku->judul }}</h3>
                </div>
                <div class="row justify-content-center mx-3">
                    <div class="col-lg-7 col-md-7 col-sm-10 ">
                        <?php
                        // $isi_buku = $isi_buku['isi_buku'];
                        // if (strlen($isi_buku) > 20) {
                        //     $isi_buku = Str::substr($isi_buku, 0, 1000) . '...';
                        //     echo $isi_buku;
                        // }
                        ?>
                        <p class="mx-auto">{!! $isi_buku->isi_buku !!}</p>
                    </div>
                </div>
                <div class="row mt-3 mx-3">
                    <div class="col-sm-8 col-lg-8 mx-auto">
                        <a class="btn btn-dark text-light w-100">Baca bagian selanjutnya</a>
                    </div>
                </div>
                <div class="row mt-3 mx-3">
                </div>
                <div class="row mx-3">
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://website-r41nxqdwxx.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>

                </div>
            </div>
        </div>
    </body>
    <script id="dsq-count-scr" src="//website-r41nxqdwxx.disqus.com/count.js" async></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/toastr.js"></script>
    <script>
        $(document).ready(function () {
            $('.comment-main-level').on('click', '.btn-reply-comment', function () {
                $(this).closest('.comment-box').find('.komentar-kolom').fadeToggle(500);
            });
        });
    </script>
    <script>
        @if (Session::has('komentarNull'))
            toastr.error('Komentar tidak boleh kosong');
        @endif
    </script>
    </html>
    @endsection

