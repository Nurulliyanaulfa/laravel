<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
    <style>
        html, body {
            height: 100%;
        }

        .text-hijau {
            color: green;
        }

        /* body {
            display: flex;
            flex-direction: column;
        } */

        .container {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
        }

        body {
            background-image: url('/img/asu.JPG');
            background-size: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">Politeknik Negeri Bengkalis | DIV Rekayasa Perangkat Lunak</a>
        </div>
    </nav>

    <div class="container" style="margin-top: 150px">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-hijau">Selamat Datang</h1>
                <h4 class="mt-3" style="color: black;">Diperpustakaan Politeknik Negeri Bengkalis</h4>
                <h6 class="mt-3" style="color: black;">Silahkan
                    <a href="{{ route('auth.login') }}" style="text-decoration: none; color: green;">masuk</a>
                    atau
                    <a href="{{ route('auth.register') }}" style="text-decoration: none; color: green;">daftar</a> jika anda belum punya akun
                </h6>
            </div>
        </div>
    </div>

    <footer class="text-white text-center pb-5 shadow-sm fixed-bottom" style="background-color: #94AF9F;">
        <p>Created with <i class="bi bi-suit-heart-fill text-danger"></i> by <a class="text-white fw-bold" href="https://www.instagram.com/_nrlynulfa">Nurul Liyana Ulfa</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
