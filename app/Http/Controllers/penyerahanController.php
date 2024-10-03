<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penyerahanController extends Controller
{
    public function index(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        return view('penyerahan.penyedia.index', compact( 'kegiatanId'));
    }
}
