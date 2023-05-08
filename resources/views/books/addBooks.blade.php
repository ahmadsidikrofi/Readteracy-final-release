@include('partials.navbarAuth')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Readteracy - Add Book Admin / Petugas</title>
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
            <form action="/Readteracy/catalogue/addBook/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mt-5 mx-auto">
                    <a class="crud">Tambah Buku</a>
                    <div class="inputBox1">
                        <input type="text" name="judul" id="judul" required="required">
                        <span class="">Judul</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="sinopsis" id="sinopsis" required="required">
                        <span>Sinopsis</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="nama_penulis" id="nama_penulis" required="required">
                        <span>Nama Penulis</span>
                    </div>

                    <div class="col-sm-7">
                        <label for="genre" class="form-label">Genre</label>
                        <select name="genre[]" id="genre" class="form-control multiple-genre" multiple>
                            @foreach ( $genre as $item )
                                <option value="{{ $item->id }}">{{ $item->nama_genre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="tahun_terbit" id="tahun_terbit" required="required">
                        <span>Tahun Terbit</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="nama_penerbit" id="nama_penerbit" required="required">
                        <span>Nama Penerbit</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="halaman" id="halaman" required>
                        <span>Total Halaman</span>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="isbn" id="isbn" required="required">
                        <span>ISBN</span>
                    </div>

                    <textarea name="isi_buku" id="isi_buku">Tulis ceritamu</textarea>

                    <div class="col">
                        <span class="form-text">Image</span>
                        <input type="file" class="form-control mt-2" name="image" id="image" required multiple>
                    </div>

                    <div class="text-center border bg-dark rounded-5">
                        <img id="img" src="https://kodfun.github.io/Reels/ImagePreview/choose.png" height="200">
                        <input type="file" class="form-control mt-2" name="image" id="input" required multiple>
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
    let img = document.getElementById("img");
    let input = document.getElementById("input");

    input.onchange = (e) => {
    if (input.files[0]) img.src = URL.createObjectURL(input.files[0]);
    };

</script>
</html>


@include('partials.footer')
