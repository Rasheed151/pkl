<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;

class chooseController extends Controller
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
    return view('preparation.price_analysis.choose', compact('kegiatan'));
}


public function price_estimate()
{
    // Ambil data kegiatan dari database
    $kegiatan = announcement::where('user_id', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('preparation.price_estimate.choose', compact('kegiatan'));
}

public function auction()
{
    // Ambil data kegiatan dari database
    $kegiatan = announcement::where('user_id', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('implementation.auction.choose', compact('kegiatan'));
}

public function submission()
{
    // Ambil data kegiatan dari database
    $kegiatan = announcement::where('user_id', auth()->id())->get(); // Misal data jadwal disimpan di tabel 'jadwal'

    // Kirim data ke view
    return view('submission.supplier.choose', compact('kegiatan'));
}
}
