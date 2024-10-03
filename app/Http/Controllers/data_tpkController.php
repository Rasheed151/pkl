<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_tpk;

class data_tpkController extends Controller
{
    public function index()
    {
        $data_tpk = data_tpk::where('userId', auth()->id())->get();
        return view('data_umum.data_tpk.index', compact('data_tpk'));
    }

    public function create()
    {
        return view('data_umum.data_tpk.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|',
            'jenis_kelamin' => 'required|',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|',
            'nik' => 'required|',
            'no_hp' => 'required|',
            'no_sk_desa' => 'required|',
            'tanggal_sk_desa' => 'required|',
            'jabatan' => 'required|'
        ]);

        $tempatTanggalLahir = $request->input('tanggal_lahir') . ', ' . $request->input('tempat_lahir');

        $data = $request->all();
        $data['tempat_tanggal_lahir'] = $tempatTanggalLahir;
        $data['userId'] = auth()->id();

        // Simpan data
        data_tpk::create($data);

        return redirect()->route('data_tpk.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(data_tpk $data_tpk)
    {
        if ($data_tpk->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('data_umum.data_tpk.index', compact('data_tpk'));
    }

    public function edit($id)
    {
        $data_tpk = data_tpk::findOrFail($id);

        $tempatTanggalLahir = explode(', ', $data_tpk->tempat_tanggal_lahir);
        $tanggal_lahir = $tempatTanggalLahir[0] ?? '';
        $tempat_lahir = $tempatTanggalLahir[1] ?? '';

        return view('data_umum.data_tpk.edit', compact('data_tpk', 'tempat_lahir', 'tanggal_lahir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'nik' => 'required|max:18',
            'no_hp' => 'required|string',
            'no_sk_desa' => 'required|max:255',
            'tanggal_sk_desa' => 'required|date',
            'jabatan' => 'required|string'
        ]);

        $data = data_tpk::findOrFail($id);

        $tempatTanggalLahir = $request->input('tanggal_lahir') . ', ' . $request->input('tempat_lahir');

        $data->update([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_tanggal_lahir' => $tempatTanggalLahir,
            'alamat' => $request->input('alamat'),
            'nik' => $request->input('nik'),
            'no_hp' => $request->input('no_hp'),
            'no_sk_desa' => $request->input('no_sk_desa'),
            'tanggal_sk_desa' => $request->input('tanggal_sk_desa'),
            'jabatan' => $request->input('jabatan')
        ]);

        return redirect()->route('data_tpk.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(data_tpk $data_tpk)
    {
        if ($data_tpk->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $data_tpk->delete();

        return redirect()->route('data_tpk.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
