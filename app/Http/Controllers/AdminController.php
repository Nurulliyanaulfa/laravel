<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Berita;
use App\Models\Lulusan;
use App\Charts\ChartPeminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;




class AdminController extends Controller
{
    public function tambah()
    {
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed', // Perbaikan pada validasi password
            'email' => 'required|email|unique:users,email', // Perbaikan pada validasi email
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->level = 'admin';
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin; // Perbaikan pada penamaan kolom jenis kelamin
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return back()->with('success', 'Admin baru berhasil ditambah!');
        } else {
            return back()->with('failed', 'Gagal menambah admin baru!');
        }
    }
    public function editAdmin($id){
        $data = User::find($id);
        return view('admin.edit', compact('data'));
        }
        public function postEditAdmin(Request $request, $id) {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email:dns',
         'jenisKelamin' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->save();
        if($user){
        return back()->with('success', 'Data admin berhasil di update!'); 
        } else {
        return back()->with('failed', 'Gagal mengupdate data admin!');
        }
        }
        public function deleteAdmin($id){
        $data = User::find($id);
        $data->delete();
        if($data){
        return back()->with('success', 'Data berhasil di hapus!'); 
        } else {
        return back()->with('failed', 'Gagal menghapus data!');
        }
        }


        public function adminBuku(Request $request){
            $search = $request->input('search');
            $data = Buku::where(function($query) use ($search) {
            $query->where('judul_buku', 'LIKE', '%' .$search. '%');
            })->paginate(5);
            return view('admin.buku', compact('data'));
            }
            public function tambahBuku(){
            return view('admin.tambahBuku');
            }
            public function postTambahBuku(Request $request){
            $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'required|image|max:5120',
             'deskripsi' => 'required',
             'kategori' => 'required',
            ]);
            $buku = new Buku;
            $buku->kode_buku = $request->kodeBuku;
            $buku->judul_buku = $request->judulBuku;
            $buku->penulis = $request->penulis;
            $buku->penerbit = $request->penerbit;
            $buku->tahun_terbit = $request->tahunTerbit;
             $buku->deskripsi = $request-> deskripsi;
             $buku->kategori = $request-> kategori;
            if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $buku->gambar = $filename;
            }
            $buku->save();
            if($buku) {
            return back()->with('success', 'Buku baru berhasil 
            ditambahkan!');
            } else{
            return back()->with('failed', 'Data gagal ditambahkan!');
            }
            }
            public function editBuku($id) {
            $data = Buku::find($id);
            return view('admin.editBuku', compact('data'));
            }
            public function postEditBuku(Request $request, $id) {
            $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required',
            'gambar' => 'image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required'
            ]);
            $buku = Buku::find($id);
            $buku->kode_buku = $request->kodeBuku;
            $buku->judul_buku = $request->judulBuku;
            $buku->penulis = $request->penulis;
            $buku->penerbit = $request->penerbit;
            $buku->tahun_terbit = $request->tahunTerbit;
            $buku->deskripsi = $request->deskripsi;
            $buku->kategori = $request->kategori;
            if($request->hasFile('gambar')) {
            $filepath = 'images/'.$buku->gambar;
            if(File::exists($filepath)) {
            File::delete($filepath);
            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $buku->gambar = $filename;
            }
            
            
            $buku->save();
            if($buku) {
            return back()->with('success', 'Buku berhasil diupdate!');
            } else{
            return back()->with('failed', 'Buku gagal diupdate!');
            }
            }
            public function deleteBuku($id) {
            $buku = Buku::find($id);
            $filepath = 'images/'.$buku->gambar;
            if(File::exists($filepath)) {
            File::delete($filepath);
            }
            $buku->delete();
            if($buku){
            return back()->with('success', 'Data buku berhasil di 
            hapus!'); 
            } else {
            return back()->with('failed', 'Gagal menghapus data buku!');
            }
        }
        public function adminPeminjaman(Request $request, ChartPeminjaman $chartPeminjaman) {
$chart = $chartPeminjaman->build();
$search = $request->input('search');
$data = Peminjaman::where(function($query) use ($search) {
$query->where('id_user', 'LIKE', '%' .$search. '%');
})->paginate(5);
return view('admin.peminjaman', compact('data', 'chart'));
}



public function tambahPeminjaman() {
    return view('admin.tambahPeminjaman');
    }
            public function postTambahPeminjaman(Request $request) {
            $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required|int',
            'tanggalPeminjaman' => 'required|date',
            'tanggalPengembalian' => 'required|date'
            ]);
            $peminjaman = new Peminjaman;
            $peminjaman->id_user = $request->idUser;
            $peminjaman->id_buku = $request->kodeBuku;
            $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
            $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
            $peminjaman->status = 'Belum Dikembalikan';
            $peminjaman->save();

            
            if($peminjaman) {
            return back()->with('success', 'Data peminjaman berhasil 
            ditambahkan!'); 
            } else {
            return back()->with('failed', 'Gagal menambahkan data 
            peminjaman!');
            }
            }
            public function editPeminjaman($id) {
            $data = Peminjaman::find($id);
            return view('admin/editPeminjaman', compact('data'));
            }
            public function postEditPeminjaman(Request $request, $id) {
            $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required|int',
            'tanggalPeminjaman' => 'required',
            'tanggalPengembalian' => 'required',
            'status' => 'required'
            ]);
            $peminjaman = Peminjaman::find($id);
            $peminjaman->id_user = $request->idUser;
            $peminjaman->id_buku = $request->kodeBuku;
            $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
            $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
            $peminjaman->status = $request->status;
            $peminjaman->save();
            if($peminjaman){
            return back()->with('success', 'Data peminjaman berhasil di 
            update!'); 
            } else {
            return back()->with('failed', 'Gagal mengupdate data 
            peminjaman!');
            }
            }
            
            public function deletePeminjaman($id) {
            $data = Peminjaman::find($id);
            $data->delete();
            if($data) {
            return back()->with('success', 'Data peminjaman berhasil di 
            hapus!'); 
            } else {
            return back()->with('failed', 'Gagal menghapus data 
            peminjaman!');
            }
            }
            //detail peminjaman
    public function detailPeminjaman($id_peminjaman, $id_user, $id_buku)
    {
        $detailPeminjaman = Peminjaman::select('peminjamen.*', 'buku.*', 'users.*')
            ->join('buku', 'peminjamen.id_buku', 'buku.id')
            ->join('users', 'peminjamen.id_user', 'users.id')
            ->where('peminjamen.id', $id_peminjaman)
            ->first();


        if (!$detailPeminjaman) {
            abort(404, 'Data tidak ditemukan.');
        }

        return view('admin.detailPeminjaman', compact('detailPeminjaman'));
    }


           // Cetak data peminjaman
    public function cetakDataPeminjaman()
    {
        $data = DB::table('peminjamen') // Perhatikan nama tabel 'peminjamen'
            ->join('users', 'users.id', '=', 'peminjamen.id_user')
            ->join('buku', 'buku.id', '=', 'peminjamen.id_buku') // Perhatikan nama tabel 'bukus'
            ->select('peminjamen.*', 'users.name', 'buku.judul_buku') // Perhatikan nama tabel 'peminjamen' dan 'bukus'
            ->get();

        $pdf = PDF::loadView('admin.cetakPeminjaman', ['data' => $data]);

        return $pdf->stream();
}
    

                public function adminBerita(Request $request){
                    $search = $request->input('search');
                    $data = Berita::where(function($query) use ($search) {
                        $query->where('judul', 'LIKE', '%' . $search . '%');
                    })->paginate(5);
                    return view('admin.berita', compact('data'));
                }
                public function tambahBerita() {
                    return view('admin.tambahBerita');
                    }
                
                    public function postTambahBerita(Request $request)
                    {
                        $request->validate([
                            'judulBerita' => 'required',
                            'isiBerita' => 'required',
                            'gambarBerita' => 'image|max:5120',
                        ]);
                    
                        $berita = new Berita;
                        $berita->judul = $request->judulBerita;
                        $berita->isi = $request->isiBerita;
                    
                        if ($request->hasFile('gambarBerita')) {
                            $file = $request->file('gambarBerita');
                            $extension = $file->getClientOriginalExtension();
                            $filename = time() . '.' . $extension;
                            $file->move('news_images/', $filename);
                            $berita->foto = $filename;
                        }
                    
                        $berita->save();
                    
                        if ($berita) {
                            return back()->with('success', 'Berita baru berhasil ditambahkan!');
                        } else {
                            return back()->with('failed', 'Data berita gagal ditambahkan!');
                        }
                    }
                    
                    public function editBerita($id) {
                        $data = Berita::find($id);
                        return view('admin/editBerita', compact('data'));
                        }

    public function postEditBerita(Request $request, $id)
    {
        // Validasi data yang diinputkan oleh pengguna untuk edit berita
        $request->validate([
            'judulBerita' => 'required',
            'isiBerita' => 'required',
        ]);

        // Mengambil data berita yang akan diedit berdasarkan ID
        $berita = Berita::find($id);

        // Mengisi properti-properti objek Berita dengan data dari formulir edit
        $berita->judul = $request->judulBerita;
        $berita->isi= $request->isiBerita;

        // Mengelola unggahan gambar hanya jika ada file gambar yang diunggah
        if ($request->hasFile('gambarBerita')) {
            $request->validate([
                'gambarBerita' => 'image|max:5120', // Gambar harus berupa gambar dan ukuran maksimum 5MB
            ]);

            $file = $request->file('gambarBerita');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
             // Menghapus gambar lama jika ada
             $oldFilePath = public_path('images/') . $berita->gambarBerita;
             if (file_exists($oldFilePath)) {
                 unlink($oldFilePath);
             }
             $berita->gambarBerita = $filename;
         }
 
         // Menyimpan objek Berita yang sudah diubah ke database
         $berita->save();
 
         // Mengembalikan pesan ke halaman sebelumnya
         if ($berita) {
             return back()->with('success', 'Berita berhasil diupdate!');
         } else {
             return back()->with('failed', 'Berita gagal diupdate!');
         }

        }


public function adminLulusan(Request $request){
    $search = $request->input('search');
    $data = Lulusan::where(function($query) use ($search) {
        $query->where('judul', 'LIKE', '%' . $search . '%');
    })->paginate(5);
    return view('admin.lulusan', compact('data'));
}
public function tambahLulusan()
{
    return view('admin.tambahLulusan');
}

public function postTambahLulusan(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jurusan' => 'required',
        'judul' => 'required',
        'ipk' => 'required',
        'foto' => 'image|nullable|max:5120',
    ]);

    $lulusan = new Lulusan;
    $lulusan->nama = $request->nama;
    $lulusan->jurusan = $request->jurusan;
    $lulusan->judul = $request->judul;
    $lulusan->ipk = $request->ipk;

    
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('news_images/', $filename);
        $lulusan->foto = $filename;
    }

    $lulusan->save();

    if ($lulusan) {
        return back()->with('success', 'Data lulusan baru berhasil ditambahkan!');
    } else {
        return back()->with('failed', 'Data gagal ditambahkan!');
    }
}

public function editLulusan($id)
{
    $data = Lulusan::find($id);
    return view('admin.editLulusan', compact('data'));
}

public function postEditLulusan(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jurusan' => 'required',
        'judul' => 'required',
        'ipk' => 'required',
        'foto' => 'image|nullable|max:5120',
    ]);

    $lulusan = Lulusan::find($id);
    $lulusan->nama = $request->nama;
    $lulusan->jurusan = $request->jurusan;
    $lulusan->judul = $request->judul;
    $lulusan->ipk = $request->ipk;

    if ($request->hasFile('foto')) {
        $filepath = 'images/' . $lulusan->foto;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/', $filename);
        $lulusan->foto = $filename;
    }

    $lulusan->save();

    if ($lulusan) {
        return back()->with('success', 'Data lulusan berhasil diupdate!');
    } else {
        return back()->with('failed', 'Data lulusan gagal diupdate!');
    }
}

public function deleteLulusan($id)
{
    $lulusan = Lulusan::find($id);
    $filepath = 'images/' . $lulusan->foto;
    if (File::exists($filepath)) {
        File::delete($filepath);
    }
    $lulusan->delete();

    if ($lulusan) {
        return back()->with('success', 'Data lulusan berhasil dihapus!');
    } else {
        return back()->with('failed', 'Gagal menghapus data lulusan!');
    }
}
                
            
            
    }