<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Buku; 
use App\Models\Berita; 
use App\Models\Lulusan; 
use Illuminate\Pagination\Paginator; 

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function userHome(Request $request) {
        $search = $request->input('search');
        $data = Buku::where('judul_buku', 'LIKE', '%' . $search . '%')->paginate(5); // Pastikan nama kolom 'judul_buku' sesuai dengan yang ada dalam tabel
        return view('user.home', compact('data'));
    }

    public function adminHome(Request $request)
    {
        $search = $request->input('search');
        $data = User::where('level', 'admin')
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5);
        return view('admin.home', compact('data'));
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'jenisKelamin' => 'required',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin; // Pastikan Anda menggunakan nama kolom yang benar
        $user->password = Hash::make($request->password);
        $user->level = 'user';

        $user->save();

        if ($user) {
            return redirect('/auth/login')->with('success', 'Akun berhasil dibuat, silakan login!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:20',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->level == 'user') {
                return redirect('/user/home');
            } elseif ($user->level == 'admin') {
                return redirect('/admin/home');
            }
        }

        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function userBerita(Request $request) {
        $search = $request->input('search');
        $data = Berita::where('judul', 'LIKE', '%' . $search . '%')->paginate(5); // Pastikan nama kolom 'judul_buku' sesuai dengan yang ada dalam tabel
        return view('user.berita', compact('data'));
    }
    public function userLulusan(Request $request) {
        $search = $request->input('search');
        $data = Lulusan::where('judul', 'LIKE', '%' . $search . '%')->paginate(5); // Pastikan nama kolom 'judul_buku' sesuai dengan yang ada dalam tabel
        return view('user.lulusan', compact('data'));
    }
}
