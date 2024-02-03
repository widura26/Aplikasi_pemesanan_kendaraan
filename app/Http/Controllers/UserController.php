<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Book;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
// use App\Models\Role;
use App\Models\Product;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(){
        return view('home.home', [
            'title' => 'Home'
        ]);
    }

    public function login() {
        return view('users.login', [
            'title' => 'Login'
        ]);
    }

    public function loginProcess(Request $request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('adminDashboard');
        }

        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }


    public function kendaraan(){
        $usersWithoutAdminRole = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get(); //from spatie
        return view('kendaraan.kendaraan', [
            'title' => 'daftar kendaraan',
            'kendaraan' => Kendaraan::all(),
            'atasan' =>   $usersWithoutAdminRole
        ]);
    }

    public function tambahPesanan(Request $request){
        $validated = $request->validate([
            'kendaraan_id' => 'required',
            'driver' => 'required',
            'tanggal_pemesanan' => 'required',
            'atasan_id' => 'required'
        ]);

        Pemesanan::create($validated);
        Riwayat::create([
            'kendaraan_id' => $validated['kendaraan_id'],
            'tanggal_pemesanan' => $validated['tanggal_pemesanan']
        ]);

        return redirect()->intended('/kendaraan');
    }

    public function home(){
        $user = Auth::user();
        return view('home.home', [
            'user' => $user ?? 'Anda belum login',
            'title' => 'Home',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }



}
