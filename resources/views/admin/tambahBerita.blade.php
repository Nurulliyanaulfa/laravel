<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Tambahkan gaya CSS khusus di sini */
        .navbar {
            background-color: #94AF9F;
        }

        .card {
            width: 800px;
            margin: 0 auto;
            margin-top: 4em;
        }

        .form-group {
            margin-top: 1em;
        }

        .btn-success {
            margin-top: 5em;
        }
    </style>
    <title>Tambah Data Berita</title>
</head>

<body>
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rakayasa Perangkat Lunak</a>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.berita') }}">
            <i class="bi-arrow-left h1"></i>
        </a>
        <div class="container mt-3">
            @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tambah Data Berita</h5>
                        <form action="{{ route('postTambahBerita') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="text-secondary mb-2">Judul Berita</label>
                                <input type="text" class="form-control border border-secondary form-control" name="judulBerita" required value="{{ old('judulBerita') }}">
                                <span class="text-danger">
                                    @error('judulBerita')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Isi Berita</label>
                                <textarea class="form-control" name="isiBerita" placeholder="Tulis isi berita disini...." style="height: 250px" required value="{{ old('isiBerita') }}"></textarea>
                                <span class="text-danger">
                                    @error('isiBerita')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Gambar Berita</label>
                                <input class="form-control" type="file" name="gambarBerita">
                                <div class="form-text">Maksimal ukuran gambar berita 5MB</div>
                            </div><br>
                            <button type="submit" class="btn btn-success mt-5">Tambah Data Berita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
