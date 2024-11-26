<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\technical_specifications;
use App\Models\rptkbps;
use App\Models\announcement;
use App\Models\rkp_data;

class rptkbpsController extends Controller
{
    public function index(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        $activity_name = $request->query('activity_name'); // Ambil activity_name dari query string jika dibutuhkan


        $technical_specifications_tenaga_kerja = technical_specifications::where('rkp_id', $rkp_id)->where('type','Tenaga Kerja')->get();
        $technical_specifications_bahan = technical_specifications::where('rkp_id', $rkp_id)->where('type','Bahan')->get();
        $technical_specifications_peralatan = technical_specifications::where('rkp_id', $rkp_id)->where('type','Peralatan')->get();

        $rptkbps = rptkbps::where('rkp_id', $rkp_id)->get();
        $rptkbps_tenaga_kerja = rptkbps::where('rkp_id', $rkp_id)->whereHas('technical_specifications', function ($query) {
            $query->where('type', 'Tenaga Kerja');
        })->get();
        $rptkbps_bahan = rptkbps::where('rkp_id', $rkp_id)->whereHas('technical_specifications', function ($query) {
            $query->where('type', 'Bahan');
        })->get();
        $rptkbps_peralatan = rptkbps::where('rkp_id', $rkp_id)->whereHas('technical_specifications', function ($query) {
            $query->where('type', 'Peralatan');
        })->get();

        
        // Ambil jadwal yang sesuai
        $announcement = announcement::where('rkp_id', $rkp_id)->whereHas('rkp_data', function ($query) use ($activity_name) {
            $query->where('activity_name', $activity_name);
        })->first();

        // Kirim data ke view
        return view('preparation.swakelola.rptkbps.index', compact(
            'technical_specifications_tenaga_kerja',
            'technical_specifications_bahan',
            'technical_specifications_peralatan',
            'rptkbps_tenaga_kerja',
            'rptkbps_bahan',
            'rptkbps_peralatan',
            'rptkbps',
            'announcement',
            'rkp_id',
            'activity_name',
        ));
    }

    public function create(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        return view('preparation.swakelola.rptkbps.index', compact('rkp_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'technical_id' => 'required',
            'code' => 'required',
            'unit' => 'required',
            'coefficient' => 'required',
            'volume' => 'required',
            'rkp_id' => 'required',
        ]);
        
        $rkp_data = rkp_data::findOrFail($request->rkp_id);
        $amount = $request->volume * $request->coefficient;
        $final_amount = $amount / $rkp_data->implementation_time;
        // Simpan data ke database
        rptkbps::create([
            'technical_id' => $request->technical_id,
            'code' =>  $request->code,
            'unit' =>  $request->unit,
            'coefficient' =>  $request->coefficient,
            'volume' =>  $request->volume,
            'amount'   => $amount,
            'final_amount'   => $final_amount,
            'rkp_id' => $request->rkp_id, // Dari form input
            'user_id' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('rptkbps.index', ['rkp_id' => $request->rkp_id])
            ->with('success', 'Data analisa teknis berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $rptkbps = rptkbps::findOrFail($id);
        $rkp_id = $rptkbps->rkp_id;

        $rptkbps->delete();

        return redirect()->route('rptkbps.index', ['rkp_id' => $rkp_id])
            ->with('success', 'Data spesifikasi teknis berhasil dihapus');
    }

}
