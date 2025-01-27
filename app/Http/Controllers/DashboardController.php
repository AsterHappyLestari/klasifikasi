<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Hasil;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function dashboard()
    {
        $totalData = Data::count();
        $totalKlasifikasi = Hasil::count();
        $dataBelumKlasifikasi = Data::whereDoesntHave('hasil')->count();

        $tinggi = DB::table('tb_hasil')->where('status', '=', 'tinggi')->count();
        $sedang = DB::table('tb_hasil')->where('status', '=', 'sedang')->count();
        $rendah= DB::table('tb_hasil')->where('status', '=', 'rendah')->count();

        return view('dashboard.index', compact('totalData', 'totalKlasifikasi', 'dataBelumKlasifikasi', 'tinggi', 'sedang', 'rendah'));
}


}