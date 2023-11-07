<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link stylesheet Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Link Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Update Data Berita</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
        </div>
    </nav>
    <div class="container mt-3">
        <!-- Tampilkan pesan sukses jika ada -->
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Tampilkan pesan kesalahan jika ada -->
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="container mt-4">
        <a href="{{ route('admin.berita') }}" class="btn btn-secondary">
            <i class="bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="container mt-4">
        <div class="card" style="width: 800px">
            <div class="card-body">
                <h5 class="card-title text-center">Update Data Berita</h5>
                <!-- <form action="{{ route('postEditBerita', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data"> -->
                <form action="/postEditBerita/{{ $data->id }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <!-- form gambar berita -->
                    <div class="form-group">
                        <label class="text-secondary mb-2">Gambar Berita</label>
                        <input class="form-control mb-2" placeholder="Nama file lama: {{ $data->foto }}" disabled>
                        <input class="form-control" type="file" name="gambarBerita">
                        <div class="form-text">Maksimal ukuran gambar cover berita 5MB</div>
                        <img class="mt-3" style="width: 100px" src="{{ asset('images/' . $data->foto) }}" alt="gambarBerita">
                    </div>
                    <!-- update judul berita -->
                    <div class="form-group">
                        <label class="text-secondary mb-2">Judul Berita</label>
                        <input type="text" class="form-control border border-secondary form-control" name="judulBerita" required value="{{ $data->judul }}">
                        <span class="text-danger">
                            @error('judulBerita')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <!-- update isi berita -->
                    <div class="form-group">
                        <label class="text-secondary mb-2">Isi Berita</label>
                        <textarea class="form-control" name="isiBerita" style="height: 250px" required>{{ $data->isi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-5">Update Data Berita</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Link script Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
