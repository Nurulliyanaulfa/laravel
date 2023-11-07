<?php
use App\Http\Controllers\LoginRegisterController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\ChartPeminjaman;


/*
|-----------------------------------------------------------------------
---
| Web Routes
|-----------------------------------------------------------------------
---
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
return view('home');
});

Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');


 Route::middleware(['guest'])->group(function () {
Route::get('/', function () {
        return view('home');
    });

    Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
   Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
   Route::get('/admin/tambahberita', [LoginRegisterController::class, 'tambahberita'])->name('tambahberita');
   Route::get('/admin/inputdosen', [LoginRegisterController::class, 'inputdosen'])->name('inputdosen');
   Route::post('/postBerita', [LoginRegisterController::class, 'postBerita'])->name('postBerita');
   Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
   Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
   Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
   Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku');
   Route::get('/admin/tambahBuku', [AdminController::class, 'tambahBuku'])->name('admin.tambahBuku');
   Route::get('/admin/editBuku/{id}', [AdminController::class, 'editBuku'])->name('admin.editBuku');
   Route::get('/admin/deleteBuku/{id}', [AdminController::class, 'deleteBuku'])->name('admin.deleteBuku');
   Route::get('/admin/peminjaman', [AdminController::class, 'adminPeminjaman'])->name('admin.peminjaman');

   Route::get('/admin/tambahPeminjaman', [AdminController::class, 'tambahPeminjaman'])->name('admin.tambahPeminjaman');
   Route::get('/admin/editPeminjaman/{id}', [AdminController::class, 'editPeminjaman'])->name('admin.editPeminjaman');
   Route::get('/admin/deletePeminjaman/{id}', [AdminController::class, 'deletePeminjaman'])->name('admin.deletePeminjaman');
   Route::get('/admin/detailPeminjaman/{id_peminjaman}/{id_user}/{id_buku}',[AdminController::class, 'detailPeminjaman'])->name('admin.detailPeminjaman');
   Route::get('/admin/cetakPeminjaman', [AdminController::class, 
'cetakDataPeminjaman'])->name('admin.cetakDataPeminjaman');

// berita
Route::get('/admin/berita', [AdminController::class, 'adminBerita'])->name('admin.berita');
Route::get('/admin/tambahBerita', [AdminController::class, 'tambahBerita'])->name('admin.tambahBerita');
Route::get('/admin/editBerita/{id}', [AdminController::class, 'editBerita'])->name('admin.editBerita');
Route::get('/admin/deleteBerita/{id}', [AdminController::class, 'deleteBerita'])->name('admin.deleteBerita');

// lulusan
Route::get('/admin/lulusan', [AdminController::class, 'adminLulusan'])->name('admin.lulusan');
Route::get('/admin/tambahLulusan', [AdminController::class, 'tambahLulusan'])->name('admin.tambahLulusan');
Route::get('/admin/editLulusan/{id}', [AdminController::class, 'editLulusan'])->name('admin.editLulusan');
Route::get('/admin/deleteLulusan/{id}', [AdminController::class, 'deleteLulusan'])->name('admin.deleteLulusan');
Route::get('/admin/cetakPeminjaman', [AdminController::class, 
'cetakDataPeminjaman'])->name('admin.cetakDataPeminjaman');



});

Route::post('/posttambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');
Route::post('/deleteAdmin/{id}', [AdminController::class, 'postdeleteAdmin'])->name('postdeleteAdmin');
Route::post('/postTambahBuku', [AdminController::class, 'postTambahBuku'])->name('postTambahBuku');
Route::post('/postEditBuku/{id}', [AdminController::class, 'postEditBuku'])->name('postEditBuku');

Route::post('/postTambahPeminjaman', [AdminController::class, 'postTambahPeminjaman'])->name('postTambahPeminjaman');
Route::post('/postEditPeminjaman/{id}', [AdminController::class, 'postEditPeminjaman'])->name('postEditPeminjaman');

// Route::post('/admin/tambahBerita', [AdminController::class, 'postTambahBerita'])->name('admin.postTambahBerita');
Route::post('/postTambahBerita', [AdminController::class, 'postTambahBerita'])->name('postTambahBerita');
Route::post('/postEditBerita/{id}', [AdminController::class, 'postEditBerita'])->name('postEditBerita');


Route::post('/postTambahLulusan', [AdminController::class, 'postTambahLulusan'])->name('postTambahLulusan');
Route::post('/postEditLulusan/{id}', [AdminController::class, 'postEditLulusan'])->name('postEditLulusan');
Route::post('/postDeleteLulusan/{id}', [AdminController::class, 'postDeleteLulusan'])->name('postDeleteLulusan');


// Route::post('/admin/editBerita/{id}', [AdminController::class, 'postEditBerita'])->name('admin.postEditBerita');


//  Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
//    Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
//    Route::get('/admin/tambahberita', [LoginRegisterController::class, 'tambahberita'])->name('tambahberita');
//    Route::get('/admin/inputdosen', [LoginRegisterController::class, 'inputdosen'])->name('inputdosen');
//    Route::post('/postBerita', [LoginRegisterController::class, 'postBerita'])->name('postBerita');
//    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
//    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
//    Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
//    Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku');
// Route::get('/admin/tambahBuku', [AdminController::class, 'tambahBuku'])->name('admin.tambahBuku');
// Route::get('/admin/editBuku/{id}', [AdminController::class, 'editBuku'])->name('admin.editBuku');
// Route::get('/admin/deleteBuku/{id}', [AdminController::class, 'deleteBuku'])->name('admin.deleteBuku');

//    });
//    Route::post('/posttambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
//    Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');
//    Route::post('/deleteAdmin/{id}', [AdminController::class, 'postdeleteAdmin'])->name('postdeleteAdmin');

Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
   Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
   Route::get('/user/berita', [LoginRegisterController::class, 'userBerita'])->name('user.berita');
   Route::get('/user/lulusan', [LoginRegisterController::class, 'userLulusan'])->name('user.lulusan');
   Route::get('/profile', function () {return view('profile');})->name('profile');
   Route::get('/aktivitas', function () {return view('aktivitas');})->name('aktivitas');
   Route::get('/berita', function () {return view('berita');})->name('berita');
  
});

Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');