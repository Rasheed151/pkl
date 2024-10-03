<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_aparat;

class data_aparatController extends Controller
{
    public function index()
    {
        $data_aparat = data_aparat::where('userId', auth()->id())->get();
        return view('data_umum.data_aparat.data-aparat', compact('data_aparat'));
    }

    public function create()
    {
        return view('data_umum.data_aparat.data-aparat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'npwp' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);
        
        // Gabungkan tempat dan tanggal lahir
        $tempatTanggalLahir = $request->input('tanggal_lahir') . ', ' . $request->input('tempat_lahir');

        // Buat array data baru dengan tempat_tanggal_lahir yang digabungkan
        $data = $request->all();
        $data['tempat_tanggal_lahir'] = $tempatTanggalLahir;
        $data['userId'] = auth()->id();

        // Simpan data
        data_aparat::create($data);

        return redirect()->route('data_aparat.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(data_aparat $data_aparat)
    {
        if ($data_aparat->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('data_umum.data_aparat.data-aparat', compact('data_aparat'));
    }

    public function edit($id)
    {
        $data_aparat = data_aparat::findOrFail($id);

        $tempatTanggalLahir = explode(', ', $data_aparat->tempat_tanggal_lahir);
    $tanggal_lahir = $tempatTanggalLahir[0] ?? '';
    $tempat_lahir = $tempatTanggalLahir[1] ?? '';
    
        return view('data_umum/data_aparat/edit', compact('data_aparat', 'tempat_lahir', 'tanggal_lahir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|max:18',
            'alamat' => 'required|string|max:255',
            'npwp' => 'required|string|max:20',
            'no_hp' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        // Temukan data aparat berdasarkan ID
        $data = data_aparat::findOrFail($id);

        // Gabungkan tempat lahir dan tanggal lahir
        $tempatTanggalLahir = $request->input('tanggal_lahir') . ', ' . $request->input('tempat_lahir');

        // Update data
        $data->update([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_tanggal_lahir' => $tempatTanggalLahir,
            'nik' => $request->input('nik'),
            'alamat' => $request->input('alamat'),
            'npwp' => $request->input('npwp'),
            'no_hp' => $request->input('no_hp'),
            'jabatan' => $request->input('jabatan'),
        ]);

        return redirect()->route('data_aparat.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(data_aparat $data_aparat)
    {
        if ($data_aparat->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $data_aparat->delete();

        return redirect()->route('data_aparat.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
