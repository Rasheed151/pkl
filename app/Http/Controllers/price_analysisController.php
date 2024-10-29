<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\technical_specifications;
use App\Models\announcement;
use App\Models\price_analysis;

class price_analysisController extends Controller
{
    public function index(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        $activity_name = $request->query('activity_name'); // Ambil activity_name dari query string jika dibutuhkan

        // Ambil data teknis berdasarkan type dengan relasi ke price_analysis
        $technical_specifications_tenaga_kerja = technical_specifications::with('price_analysis')
            ->where('rkp_id', $rkp_id)
            ->where('type', 'Tenaga Kerja')
            ->get();

        $technical_specifications_bahan = technical_specifications::with('price_analysis')
            ->where('rkp_id', $rkp_id)
            ->where('type', 'Bahan')
            ->get();

        $technical_specifications_peralatan = technical_specifications::with('price_analysis')
            ->where('rkp_id', $rkp_id)
            ->where('type', 'Peralatan')
            ->get();

        // Ambil data price_analysis berdasarkan technical_specifications
        $price_analysis_tenaga_kerja = price_analysis::where('rkp_id', $rkp_id)
            ->whereHas('technical_specifications', function ($query) {
                $query->where('type', 'Tenaga Kerja');
            })
            ->get();

        $price_analysis_bahan = price_analysis::where('rkp_id', $rkp_id)
            ->whereHas('technical_specifications', function ($query) {
                $query->where('type', 'Bahan');
            })
            ->get();

        $price_analysis_peralatan = price_analysis::where('rkp_id', $rkp_id)
            ->whereHas('technical_specifications', function ($query) {
                $query->where('type', 'Peralatan');
            })
            ->get();

        // Ambil jadwal yang sesuai
        $announcement = announcement::where('rkp_id', $rkp_id)->whereHas('rkp_data', function ($query) use ($activity_name) {
            $query->where('activity_name', $activity_name);
        })->first();

        // Kirim data ke view
        return view('preparation.price_analysis.index', compact(
            'technical_specifications_tenaga_kerja',
            'technical_specifications_bahan',
            'technical_specifications_peralatan',
            'price_analysis_tenaga_kerja',
            'price_analysis_bahan',
            'price_analysis_peralatan',
            'announcement',
            'rkp_id',
            'activity_name'
        ));
    }


    public function create(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        return view('preparation.price_analysis.index', compact('rkp_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'technical_id' => 'required',
            'code' => 'required',
            'unit' => 'required',
            'coefficient' => 'required',
            'unit_price' => 'required',
            'rkp_id' => 'required',
        ]);

        // Simpan data ke database
        price_analysis::create([
            'technical_id' => $request->technical_id,
            'code' =>  $request->code,
            'unit' =>  $request->unit,
            'coefficient' =>  $request->coefficient,
            'unit_price' =>  $request->unit_price,
            'total_price' =>  $request->unit_price * $request->coefficient,
            'rkp_id' => $request->rkp_id, // Dari form input
            'user_id' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('price_analysis.index', ['rkp_id' => $request->rkp_id])
            ->with('success', 'Data analisa teknis berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $price_analysis = price_analysis::findOrFail($id);
        $rkp_id = $price_analysis->rkp_id;

        $price_analysis->delete();

        return redirect()->route('price_analysis.index', ['rkp_id' => $rkp_id])
            ->with('success', 'Data spesifikasi teknis berhasil dihapus');
    }
}
