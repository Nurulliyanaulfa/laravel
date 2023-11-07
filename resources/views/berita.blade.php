<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
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
    <div class="container mt-4" style="margin-top: 20px;">
        <h1 class="text-center"  style="margin-top: 90px;">Berita Mahasiswa</h1>
        <hr>

        <!-- Daftar Berita -->
        <div class="row">
            <!-- Berita 1 -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <img src="/img/a.PNG" class="card-img-top" alt="Gambar Berita 1">
                    <div class="card-body">
                        <h5 class="card-title">Jurusan Teknik Informatika Polbeng Sukses Melaksanakan Pelatihan Persiapan Uji Kompetensi Keahlian</h5>
                        <p class="card-text">pelatihan Android bagi pemula menggunakan MIT APP Inventor. Kegiatan yang dilaksanakan mulai tanggal 10-29 Januari 2022 ini di ikuti oleh sekitar 21 orang siswa/ siswi dan sebanyak 2 orang guru pendamping dari sekolah SMK IT Zunur’ ain Aqila Zahra.

Direktur Politeknik Negeri Bengkalis (Polbeng), Johny Custer,S.T.,M.T dalam sambutannya menyampaikan bahwa  kegiatan ini bertujuan untuk meningkatkan kemampuan siswa/siswi dalam bidang Android mengingat saat ini perkembangan IT sangat pesat.

Johny pun berharap keikutsertaan peserta pada pelatihan pelatihan ini bukan hanya sekedar untuk mendapatkan sertifikat semata. Dengan mengikuti Pelatihan Android ini para peserta diharapkan dapat terus berupaya untuk mengembangkan kompetensi dan kinerja dan dapat memberikan manfaat dalam rangka peningkatan pengetahuan siswa.</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Berita 2 -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <img src="/img/a.PNG" class="card-img-top" alt="Gambar Berita 2">
                    <div class="card-body">
                        <h5 class="card-title">Judul Berita 2</h5>
                        <p class="card-text">Deskripsi singkat berita 2.</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Tambahkan Berita Lainnya di sini -->

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
