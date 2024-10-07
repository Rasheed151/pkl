<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_desa;

class data_desaController extends Controller
{
    public function index()
    {
        $data_desa = data_desa::where('userId', auth()->id())->get();
        
        // Kirim data ke view
        return view('home', compact('data_desa'));
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kode_desa' => 'required|',
            'alamat_kantor' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'npwp' => 'required|string|max:255',
            'no_tahun_perpub_pjb' => 'required|string|max:255',
            'tanggal_perpub_pjb' => 'required|date',
            'no_pengesahan_dpa' => 'required|string|max:255',
            'tanggal_pengesahan_dpa' => 'required|date',
            'nama_kades' => 'required|string|max:255',
            'tahun_anggaran' => 'required|string',
            

        ]);

        // Include the logged-in user ID
        data_desa::create(array_merge($request->all(), ['userId' => auth()->id()]));

        return redirect()->route('home')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(data_desa $data_desa)
    {
        // Ensure the data belongs to the logged-in user
        if ($data_desa->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('home', compact('data_desa'));
    }

    public function edit(data_desa $data_desa)
    {
        // Ensure the data belongs to the logged-in user
        if ($data_desa->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('home', compact('data_desa'));
    }

    public function update(Request $request, $id)
    {
        // Ensure the data belongs to the logged-in user


        $request->validate([
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'kode_desa' => 'required|string',
            'alamat_kantor' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'npwp' => 'required|string|max:255',
            'no_tahun_perpub_pjb' => 'required|string|max:255',
            'tanggal_perpub_pjb' => 'required|date',
            'no_pengesahan_dpa' => 'required|string|max:255',
            'tanggal_pengesahan_dpa' => 'required|date',
            'nama_kades' => 'required|string|max:255',
            'tahun_anggaran' => 'required|string',

        ]);

        $data_desa = data_desa::findOrFail($id);
        $data_desa->update($request->all());

        return redirect()->route('home.index')->with('success', 'Data berhasil diperbarui!');
    
    }

    public function destroy(data_desa $data_desa)
    {
        // Ensure the data belongs to the logged-in user
        if ($data_desa->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $data_desa->delete();

        return redirect()->route('home.index')
            ->with('success', 'Data Umum deleted successfully.');
    }

}
