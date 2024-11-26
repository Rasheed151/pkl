<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kak_data;
use App\Models\announcement;
use App\Models\rkp_data;

class kak_dataController extends Controller
{
    public function index()
    {
        $kak_data = kak_data::where('user_id', auth()->id())
    ->whereHas('announcement', function($query) {
        $query->where('procurement_method', 'Penyedia');
    })
    ->with('rkp_data', 'announcement') // Memuat relasi rkp_data dan announcement
    ->get();

        $announcement = announcement::where('user_id', auth()->id())->where('procurement_method','penyedia')->with('rkp_data','tpk_data')->get();
        $rkp_data = rkp_data::where('user_id', auth()->id())->get();
        return view('preparation.supplier.kak_data.index', compact('kak_data','announcement','rkp_data'));
    }

    public function create()
    {

        return view('preparation.supplier.kak_data.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rkp_id' => 'required',
            'background' => 'required',
        ]);

        kak_data::create($request->merge(['user_id' => auth()->id()])->all());

        if (Announcement::where('rkp_id', $request->rkp_id)
        ->where('procurement_method', 'Penyedia')
        ->exists()) {
        
        return redirect()->route('kak_data.index')
            ->with('success', 'Data umum created successfully.');
    } else {
        return redirect()->route('kak_data.index_swakelola')
            ->with('success', 'Data umum created successfully.');
    }
    
    }
    

    public function show(kak_data $kak_data)
    {
        if ($kak_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('preparation.supplier.kak_data.index', compact('kak_data'));
    }

    public function edit($id)
    {
        $kak_data = kak_data::findOrFail($id);

        return view('preparation.supplier.kak_data.edit', compact('kak_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'background' => 'required|',
        ]);

        $data = kak_data::findOrFail($id);

        $rkp_id = $data->announcement ? $data->announcement->rkp_id : null;

        $data->update($request->all());

        if ($rkp_id && Announcement::where('rkp_id', $rkp_id)
            ->where('procurement_method', 'Penyedia')
            ->exists()) {
            
            return redirect()->route('kak_data.index')
                ->with('success', 'Data umum deleted successfully.');
        } else {
            return redirect()->route('kak_data.index_swakelola')
                ->with('success', 'Data umum deleted successfully.');
        }
    }

    public function destroy($id)
    {
        // Temukan data kak_data berdasarkan ID
        $kak_data = kak_data::findOrFail($id);
        
        // Dapatkan nilai rkp_id dari relasi announcement
        $rkp_id = $kak_data->announcement ? $kak_data->announcement->rkp_id : null;
        
        // Hapus data kak_data
        $kak_data->delete();
    
        // Cek apakah ada data announcement dengan procurement_method 'Penyedia' berdasarkan rkp_id
        if ($rkp_id && Announcement::where('rkp_id', $rkp_id)
            ->where('procurement_method', 'Penyedia')
            ->exists()) {
            
            return redirect()->route('kak_data.index')
                ->with('success', 'Data umum deleted successfully.');
        } else {
            return redirect()->route('kak_data.index_swakelola')
                ->with('success', 'Data umum deleted successfully.');
        }
    }
    
    

    public function index_swakelola()
    {
        $kak_data = kak_data::where('user_id', auth()->id())
    ->whereHas('announcement', function($query) {
        $query->where('procurement_method', 'Swakelola');
    })
    ->with('rkp_data', 'announcement') // Memuat relasi rkp_data dan announcement
    ->get();

        $announcement = announcement::where('user_id', auth()->id())->where('procurement_method','Swakelola')->with('rkp_data','tpk_data')->get();
        $rkp_data = rkp_data::where('user_id', auth()->id())->get();
        return view('preparation.swakelola.kak_data.index', compact('kak_data','announcement','rkp_data'));
    }
}
