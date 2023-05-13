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
                    <div class="col-sm-2 col-lg-8 mx-auto">
                        <a class="btn btn-dark text-light w-100">Baca bagian selanjutnya</a>
                    </div>
                </div>
                <div class="row mt-3 mx-3">
                    <div class="col-sm-2 col-lg-8 mx-auto">
                        <form id="comment-form" action="/Readteracy/comment/book/{{ $isi_buku->id }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="book_id" value="{{ $isi_buku->id }}">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-5" name="komentar"
                                    placeholder="Tulis komentar">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark rounded-circle" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                            <path
                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $comments as $comment )
                    <div class="comments-container">
                        <ul id="comments-list" class="comments-list">
                            <li>
                                <div class="comment-main-level">
                                    @if ($comment->user->image === NULL)
                                        <div class="comment-avatar"><img src="https://ui-avatars.com/api/?name={{ urlencode($comment->user->name) }}&background=random&color=28a745"
                                            alt="avatar" id="image_preview"> </div>
                                    @else
                                        <div class="comment-avatar"><img src="/img/profile/{{ $comment->user->image }}"> </div>
                                    @endif

                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name by-author"><a href="#">{{ $comment->user->name }}</a></h6>
                                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                                            <i class="btn fa fa-reply btn-reply-comment" id="btn-reply-{{ $comment->id }}"></i>
                                            <i class="btn fa fa-trash"></i>
                                        </div>
                                        <div class="comment-content">
                                            {{ $comment->komentar }}
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control komentar-kolom" name="komentar"
                                            placeholder="Balas komentar" id="komentar-kolom-{{ $comment->id }}" style="display: none;">
                                            <div class="input-group-append komentar-kolom" style="display: none;" id="komentar-kolom-{{ $comment->id }}">
                                                <button class="btn btn-outline-dark rounded-circle" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
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

