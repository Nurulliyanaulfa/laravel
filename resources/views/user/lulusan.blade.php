<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.mi
n.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark  shadow-sm fixed-top" style="background-color: #94AF9F;">
        <div class="container ">
            <a class="navbar-brand mr-auto" href="/">Politeknik Negeri Bengkalis | DIV Rekayasa Perangkat Lunak</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('user.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('user.lulusan') }}">Lulusan</a>
                    </li>
                    <!-- <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('aktivitas') }}">Aktivitas</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min
.css">
        <title>Homepage</title>
    </head>

    <body>
        
            </div>
            <div class="container" style="margin-top: 150px">
        <div class="row mt-3 justify-content-center">
            <div class="col">
                <h4 class="text-secondary">Selamat Datang {{ Auth::user()->name }}</h4>
            </div>

            <div class="col-7">
                <form action="" method="GET" class="d-flex">
                    @csrf
                    <!-- Ini adalah token CSRF Laravel untuk keamanan form. -->
                    <input type="search" name="search" class="form-control rounded" placeholder="Cari lulusan"
                        aria-label="Search" aria-describedby="search-addon" />
                    <!-- Ini adalah kotak pencarian untuk mencari nama buku. -->
                    <button type="submit" class="btn btn-dark">Search</button>
                    <!-- Ini adalah tombol "search" untuk memulai pencarian. -->
                </form>
            </div>

            <div class="col-1">
                <a href="{{ route('logout') }}" style="text-decoration: none">
                    <button class="btn btn-dark">Logout</button>
                </a>
            </div>
        </div>
        <br><br>
        @foreach ($data as $lulusan)
        <!-- Ini adalah loop untuk data buku. -->
        <div class="card mb-4">
            <!-- Ini adalah kartu (card) untuk menampilkan detail buku. -->
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                    <img style="width: 50px" src="{{ asset('news_images/' . $lulusan->foto) }}" alt="foto Lulusan">
                        <!-- Ini adalah gambar sampul buku. -->
                    </div>
                    <div class="col-2">
                        <p class="fw-bold">Nama Lulusan</p>
                        <p class="fw-bold">Jurusan</p>
                        <p class="fw-bold">Judul</p>
                        <p class="fw-bold">ipk</p>
                    </div>
                    <div class="col-8">
                        
                        <p>{{ $lulusan->nama }}</p>
                <p>{{ $lulusan->jurusan }}</p>
                <p>{{ $lulusan->judul }}</p>
                <p>{{ $lulusan->ipk }}</p>


            
                        <!-- Ini adalah nilai-nilai atribut buku. -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $data->links() }}
        <!-- Ini adalah tautan navigasi halaman berikutnya. -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ini adalah tag untuk menyertakan file JavaScript Bootstrap. -->
</body>

</html>