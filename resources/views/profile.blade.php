<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>profile mahasiswa</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark  shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/">Politeknik Negeri Bengkalis | DIV Rekayasa Perangkat Lunak</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('berita') }}">Berita</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('aktivitas') }}">Aktivitas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <h1 class="text-center" style="margin-top: 70px;">Profil Lulusan Jurusan RPL</h1>
        <hr>

        <!-- Profil Lulusan -->
        <div class="row">
            <!-- Profil Lulusan 1 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="/img/up.jpg" class="card-img-top" alt="Foto Lulusan 1">
                    <div class="card-body">
                        <h5 class="card-title">Nurul liyana ulfa</h5>
                        <p class="card-text">Lulusan tahun 2025 dengan ipk 3.90</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Profil Lulusan 2 -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="/img/up.jpg" class="card-img-top" alt="Foto Lulusan 2">
                    <div class="card-body">
                        <h5 class="card-title">Nama Lulusan 2</h5>
                        <p class="card-text">Deskripsi singkat profil lulusan 2.</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan Profil Lulusan Lainnya di sini -->

        </div>
    </div>
    <footer class="text-white text-center pb-5" style="background-color: #94AF9F; margin-top= 20px;">
  <p>Createt with <i class="bi bi-suit-heart-fill text-danger"></i> by <a class="text-black text-white fw-bold" href="https://www.instagram.com/_nrlynulfa" >Nurul liyana Ulfa</a></p>
</footer>
    <!-- Sertakan skrip JavaScript Bootstrap (JQuery dan Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
