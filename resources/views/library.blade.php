<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="mt-5 w-50 mx-auto">
        @if (session('success'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <table border="1" cellspacing="1", cellpadding="5">
        <tr>
            <td>Judul</td>
            <td>Sinopsis</td>
        </tr>

        @foreach ( $peminjaman as $borrowed )
        <tr>
            <td>{{ $borrowed->judul }}</td>
            <td>{{ $borrowed->sinopsis }}</td>
        </tr>
        @endforeach

    </table>
</body>
</html>
