<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;

class tesController extends Controller
{
    public function index()
{
    // Ambil data kegiatan dari database
    $kegiatan = announcement::where('user_id', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('preparation.technical_specifications.choose', compact('kegiatan'));
}


public function price_analysis()
{
    // Ambil data kegiatan dari database
    $kegiatan = announcement::where('user_id', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('persiapan.analisa.pilih', compact('kegiatan'));
}


public function price_estimate()
{
    // Ambil data kegiatan dari database
    $kegiatan = announcement::where('userId', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('persiapan.perkiraan.pilih', compact('kegiatan'));
}

public function pengumuman()
{
    // Ambil data kegiatan dari database
    $kegiatan = jadwal::where('userId', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('pelaksanaan.lelang.pilih', compact('kegiatan'));
}

public function penyerahan()
{
    // Ambil data kegiatan dari database
    $kegiatan = jadwal::where('userId', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('penyerahan.penyedia.pilih', compact('kegiatan'));
}

}
