    <!-- Modal Fisik -->
    <div class="modal fade" id="bukuFisik" tabindex="-1" aria-labelledby="ModalLabelFisik" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalLabelFisik">{{ $detail_book->judul }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="mt-3 img-fluid rounded" src="/img/buku/{{ $detail_book->image }}" alt="">
                            </div>

                            <div class="col-sm-6">
                                <h3 class="mt-3">Judul : {{ $detail_book->judul }}</h3>
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item">Genre :
                                                @foreach ( $detail_book->genre as $currentGenre )
                                                    {{ $currentGenre->nama_genre }}
                                                @endforeach
                                            </li>
                                            <li class="list-group-item">
                                                @if ($detail_book->halaman == NULL)
                                                <td>Halaman : Tidak diketahui</td>
                                                @else
                                                    <td>Halaman : {{ $detail_book->halaman }}</td>
                                                @endif
                                            </li>
                                            <li class="list-group-item">
                                                @if ($detail_book->isbn == NULL)
                                                    <td>Tidak diketahui</td>
                                                @else
                                                    <td>ISBN : {{ $detail_book->isbn }}</td>
                                                @endif
                                            </li>
                                            <br>
                                            <li class="list-group-item">{{ Auth::user()->name }}</li>
                                            @if ( Auth::user()->alamat === NULL || Auth::user()->no_hp === NULL )
                                                <li class="list-group-item"><p class="fw-bold">Silahkan lengkapi data diri</p></li>
                                            @else
                                                <li class="list-group-item">
                                                    <input type="text" placeholder="Alamat" value="{{ Auth::user()->alamat }}" readonly class="form-control">
                                                </li>
                                                <li class="list-group-item">
                                                    <input type="text" placeholder="No HP" value="{{ Auth::user()->no_hp }}" readonly class="form-control">
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <form action="/Readteracy/borrow/{{ $detail_book->id }}/fisik" method="post">
                                    @csrf
                                    <br>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <label for="rent_date"><p class="fw-bold">Tanggal Sewa</p></label>
                                            <input type="date" name="rent_date" class="form-control">
                                        </li>
                                    </ul>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="book_id" value="{{ $detail_book->id }}">
                                    <input type="hidden" name="image" value="{{ $detail_book->image }}">
                                    <input type="hidden" name="judul" value="{{ $detail_book->judul }}">
                                    <input type="hidden" name="sinopsis" value="{{ $detail_book->sinopsis }}">
                                    <input type="hidden" name="isi_buku" value="{{ $detail_book->isi_buku }}">
                                    @if ( Auth::user()->alamat === NULL || Auth::user()->no_hp === NULL )
                                        <p class="fw-bold">Baca keterangan diatas</p>
                                    @else
                                        <button type="submit" name="peminjaman" value="peminjaman" class="btn-form w-100 rounded-2 text-center">
                                            KIRIM!
                                            <span></span>
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')
