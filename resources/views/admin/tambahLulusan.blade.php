<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Data Lulusan</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container">
        <a href="{{ route('admin.lulusan') }}">
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
                <strong>Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tambah Data Lulusan</h5>
                        <form action="{{ route('postTambahLulusan') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Foto Lulusan</label>
                                <input class="form-control" type="file" name="foto">
                                <div class="form-text">Maksimal ukuran gambar berita 5MB</div>
                            </div><br>

                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Mahasiswa</label>
                                <input type="text" class="form-control border border-secondary form-control" name="nama"
                                    required value="{{ old('nama') }}">
                                <span class="text-danger">
                                    @error('nama')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Jurusan</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="jurusan" required value="{{ old('jurusan') }}">
                                <span class="text-danger">
                                    @error('jurusan')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Judul Skripsi</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="judul" required value="{{ old('judul') }}">
                                <span class="text-danger">
                                    @error('judul')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">IPK</label>
                                <input type="text" class="form-control border border-secondary form-control" name="ipk"
                                    required value="{{ old('ipk') }}">
                                <span class="text-danger">
                                    @error('ipk')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <button type="submit" class="btn btn-success mt-5">Tambah Data Lulusan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan skrip JavaScript Bootstrap (jQuery dan Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>