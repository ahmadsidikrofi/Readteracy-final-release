@include('partials.navbarAuth')

<main>
    <title>Readteracy - Edit Book Admin / Petugas</title>
    <link rel="stylesheet" href="/css/addForm.css">
    <style>
        .bg {
            background-color: #e8e8e8;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/o61nnuwogclhd3z601n2k0zh479m9kbnsivauhaxrlu4jco0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: ['emoticons', 'fullscreen'],
            fullscreen_native: true,
        });
    </script>
</head>
<body class="bg">
    <section class="mb-5 mt-5 py-5">
        <div class="container py-vh-5 mb-5">
            <form action="/Readteracy/catalogue/editBook/{{ $book_edit->slug }}/store" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone mx-auto" >
                @method('put')
                @csrf
                <div class="card mt-5 mx-auto">
                    <a class="crud">Update Buku</a>
                    <div class="inputBox">
                        <input type="text" name="judul" id="judul" required="required" value="{{ $book_edit->judul }}">
                        <span class="">Judul</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="sinopsis" id="sinopsis" required="required" value="{{ $book_edit->sinopsis }}">
                        <span>Sinopsis</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="nama_penulis" id="nama_penulis" required="required" value="{{ $book_edit->nama_penulis }}">
                        <span>Nama Penulis</span>
                    </div>

                    <div class="col-sm-7">
                        <label for="genre" class="form-label">Genre</label>
                        <select name="genre[]" id="genre" class="form-control multiple-genre" multiple>
                            <option value="" disabled>
                                Current Genre :
                                @foreach ( $book_edit->genre as $currentGenre )
                                    {{ $currentGenre->nama_genre }}
                                @endforeach
                            </option>
                            @foreach ( $genre as $item )
                                <option value="{{ $item->id }}">{{ $item->nama_genre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="tahun_terbit" id="tahun_terbit" required="required" value="{{ $book_edit->tahun_terbit }}">
                        <span>Tahun Terbit</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="nama_penerbit" id="nama_penerbit" required="required" value="{{ $book_edit->nama_penerbit }}">
                        <span>Nama Penerbit</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="halaman" id="halaman" required="required" value="{{ $book_edit->halaman }}">
                        <span>Total Halaman</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="isbn" id="isbn" required="required" value="{{ $book_edit->isbn }}">
                        <span>ISBN</span>
                    </div>

                    <textarea name="isi_buku" id="isi_buku">{{ $book_edit->isi_buku }}</textarea>

                    <label for="" class="text-blue fw-bold ">Drag & Drop gambar atau pilih </label>
                    <div class="text-center border bg-dark rounded-5">
                        <div id="dropArea">
                            @if ($book_edit->image === NULL)
                                <img id="img" src="https://kodfun.github.io/Reels/ImagePreview/choose.png" height="200">
                                <input type="file" class="form-control mt-2" name="image" id="input" multiple>
                            @else
                                <img id="img" src="/img/buku/{{ $book_edit->image }}" height="200" alt="">
                                <input type="file" class="form-control mt-2" name="image" id="input" multiple>
                            @endif
                        </div>
                    </div>
                    <button class="enter" type="submit">Enter</button>
                </div>
            </form>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.multiple-genre').select2();
    });
</script>


<script>
    let dropArea = document.getElementById('dropArea');
    let img = document.getElementById('img');
    let input = document.getElementById('input');

    dropArea.addEventListener('dragenter', dragEnter, false);
    dropArea.addEventListener('dragover', dragOver, false);
    dropArea.addEventListener('dragleave', dragLeave, false);
    dropArea.addEventListener('drop', drop, false);

    function dragEnter(e) {
        e.stopPropagation();
        e.preventDefault();
        dropArea.classList.add('dragover');
    }

    function dragOver(e) {
        e.stopPropagation();
        e.preventDefault();
    }

    function dragLeave(e) {
        e.stopPropagation();
        e.preventDefault();
        dropArea.classList.remove('dragover');
    }

    function drop(e) {
        e.stopPropagation();
        e.preventDefault();
        dropArea.classList.remove('dragover');

        let files = e.dataTransfer.files;
        if (files.length > 0) {
            input.files = files;
            img.src = URL.createObjectURL(files[0]);
        }
    }

    input.onchange = (e) => {
        if (input.files[0]) {
            img.src = URL.createObjectURL(input.files[0]);
            dropArea.classList.remove('dragover');
        }
    };
</script>

@include('partials.footer')
</main>
