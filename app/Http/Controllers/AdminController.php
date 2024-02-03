<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kendaraan;
use App\Charts\ChartKendaraan;
use App\Exports\ExportLaporan;
use App\Models\Pemesanan;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function dashboard(ChartKendaraan $chart){
        $user = Auth::user();
        $kendaraan = Kendaraan::all();
        $usersWithoutAdminRole = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        $sewa = Pemesanan::where(function ($query) {
            if (auth()->user()->hasRole('admin')) {
                $query->whereNotNull('atasan_id');
            } else {
                $query->where('atasan_id', auth()->id());
            }
        })->get();
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'user' => $user,
            'users' => $usersWithoutAdminRole,
            'kendaraan' => $kendaraan,
            'chart' => $chart->build(),
            'sewa' => $sewa,
            'kendaraan' => Kendaraan::all(),
        ]);
    }

    public function pesan()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();
        $sewa = Pemesanan::where(function ($query) {
            if (auth()->user()->hasRole('admin')) {
                $query->whereNotNull('atasan_id');
            } else {
                $query->where('atasan_id', auth()->id());
            }
        })->get();
        return view('sewa.daftarSewa', [
            'title' => 'Daftar sewa kendaraan',
            'sewa' =>   $sewa
        ]);
    }

    public function approved(Request $request, $id){
        $status = $request->input('status');
        Pemesanan::where('id', $id)->update(['status' => $status]);
        return redirect()->intended('/daftar/sewa');
    }

    public function kendaraan(){
        return view('kendaraan.kendaraan');
    }

    public function export(){
        return Excel::download(new ExportLaporan, "laporan_periodik.xlsx");
    }

    public function destroy(Pemesanan $pemesanan, $id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();

        return redirect()->intended('/daftar/sewa');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('public-login');
    }
}
