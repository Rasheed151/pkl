<?php

namespace App\Http\Controllers;

use App\Models\data_aparat;
use Illuminate\Http\Request;
use App\Models\data_pka;

class data_pkaController extends Controller
{
    public function index()
    {
        $data_pka = data_pka::where('userId', auth()->id())->get();
        $data_aparat = data_aparat::where('userId', auth()->id())->get();
        return view('data_umum.data_pka.index', compact('data_pka','data_aparat'));
    }

    public function create()
    {
        
        $simpanData = data_aparat::all();
        
        return view('data_umum.data_pka.index', compact('simpanData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_sk_kades' => 'required|string|max:255',
            'tanggal_sk_kades' => 'required|date', // Pastikan format tanggal benar
        ]);
    
        $ambil = data_aparat::where('nama', $request->nama)->first();
    
        if ($ambil) {
            // Simpan data baru di tabel data_pka
            data_pka::create(array_merge([
                'nama' => $ambil->nama,
                'tempat_tanggal_lahir' => $ambil->tempat_tanggal_lahir,
                'nik' => $ambil->nik,
                'jabatan' => $ambil->jabatan,
                'no_hp' => $ambil->no_hp,
                'alamat' => $ambil->alamat,
                'no_sk_kades' => $request->no_sk_kades,
                'tanggal_sk_kades' => $request->tanggal_sk_kades,
            ], [
                'userId' => auth()->id(), // Tambahkan userId ke data yang disimpan
            ]));
    
            return redirect()->route('data_pka.index')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->view('data_pka.index')->with('error', 'Data nama tidak ditemukan di tabel simpan.');
        }
    }

    public function show(data_pka $data_pka)
    {
        if ($data_pka->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('data_umum.data_pka.index', compact('data_pka'));
    }

    public function edit($id)
    {
        $data_pka = data_pka::findOrFail($id);

        if ($data_pka->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('data_umum.data_pka.edit', compact('data_pka'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_sk_kades' => 'required|string|max:255',
            'tanggal_sk_kades' => 'required|date',
        ]);

        $data = data_pka::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('data_pka.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(data_pka $data_pka)
    {
        if ($data_pka->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $data_pka->delete();

        return redirect()->route('data_pka.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
