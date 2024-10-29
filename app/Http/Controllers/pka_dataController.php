<?php

namespace App\Http\Controllers;

use App\Models\officials_data;
use Illuminate\Http\Request;
use App\Models\pka_data;

class pka_dataController extends Controller 
{
    public function index()
    {
        $pka_data = pka_data::where('user_id', auth()->id())->with('officials_data')->get();
        $officials_data = officials_data::where('user_id', auth()->id())->get();
        return view('general_data.pka_data.index', compact('pka_data','officials_data'));
    }

    public function create()
    {
        
           return view('general_data.pka_data.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'officials_id' => 'required|string|max:255',
            'village_head_decree_number' => 'required|string|max:255',
            'village_head_decree_date' => 'required|date', // Pastikan format tanggal benar
        ]);
    
        $data = $request->all();
        $data['user_id'] = auth()->id();

        pka_data::create($data);

        return redirect()->route('pka_data.index')
            ->with('success', 'Data umum created successfully.');
        
    }

    public function show(pka_data $pka_data)
    {
        if ($pka_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('general_data.pka_data.index', compact('pka_data'));
    }

    public function edit($id)
    {
        $pka_data = pka_data::findOrFail($id);

        if ($pka_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('general_data.pka_data.edit', compact('pka_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'village_head_decree_number' => 'required|string|max:255',
            'village_head_decree_date' => 'required|date',
        ]);

        $data = pka_data::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('pka_data.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(pka_data $pka_data)
    {
        if ($pka_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $pka_data->delete();

        return redirect()->route('pka_data.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
