<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;

class chooseController extends Controller
{
    public function index()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','Penyedia')->get();

        // Kirim data ke view
        return view('preparation.supplier.technical_specifications.choose', compact('kegiatan'));
    }


    public function price_analysis()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','Penyedia')->get();

        // Kirim data ke view
        return view('preparation.supplier.price_analysis.choose', compact('kegiatan'));
    }


    public function price_estimate()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','Penyedia')->get();

        // Kirim data ke view
        return view('preparation.supplier.price_estimate.choose', compact('kegiatan'));
    }

    public function technical_specifications_swakelola()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','swakelola')->get();

        // Kirim data ke view
        return view('preparation.swakelola.technical_specifications.choose', compact('kegiatan'));
    }

    public function price_analysis_swakelola()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','swakelola')->get();

        // Kirim data ke view
        return view('preparation.swakelola.price_analysis.choose', compact('kegiatan'));
    }

    public function rab_data()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','swakelola')->get();

        // Kirim data ke view
        return view('preparation.swakelola.rab_data.choose', compact('kegiatan'));
    }

    public function rptkbps()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','swakelola')->get();

        // Kirim data ke view
        return view('preparation.swakelola.rptkbps.choose', compact('kegiatan'));
    }
    

    public function submission_supplier_choose()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','Penyedia')->get();

        // Kirim data ke view
        return view('submission.supplier.choose', compact('kegiatan'));
    }

    public function submission_swakelola_choose()
    {
        // Ambil data kegiatan dari database
        $kegiatan = announcement::where('user_id', auth()->id())->where('procurement_method','swakelola')->get();

        // Kirim data ke view
        return view('submission.swakelola.choose', compact('kegiatan'));
    }
}
