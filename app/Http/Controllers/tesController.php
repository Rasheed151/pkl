<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;

class tesController extends Controller
{
    public function index()
{
    // Ambil data kegiatan dari database
    $kegiatan = jadwal::where('userId', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('persiapan.teknis.pilih', compact('kegiatan'));
}


public function coba()
{
    // Ambil data kegiatan dari database
    $kegiatan = jadwal::where('userId', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('persiapan.analisa.pilih', compact('kegiatan'));
}


public function bisa()
{
    // Ambil data kegiatan dari database
    $kegiatan = jadwal::where('userId', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

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
