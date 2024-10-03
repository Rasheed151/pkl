<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_penyedia;

class data_penyediaController extends Controller
{
    public function index()
    {
        $data_penyedia = data_penyedia::where('userId', auth()->id())->get();
        return view('data_umum.data_penyedia.index', compact('data_penyedia'));
    }

    public function create()
    {
        return view('data_umum.data_penyedia.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|',
            'jenis_kelamin' => 'required|',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|',
            'alamat' => 'required|',
            'nama_perusahaan' => 'required|',
            'alamat_perusahaan' => 'required|',
            'no_hp' => 'required|',
            'npwp' => 'required|',
            'nib' => 'required|',

        ]);

        $tempatTanggalLahir = $request->input('tanggal_lahir') . ', ' . $request->input('tempat_lahir');

        $data = $request->all();
        $data['tempat_tanggal_lahir'] = $tempatTanggalLahir;
        $data['userId'] = auth()->id();

        data_penyedia::create($data);

        return redirect()->route('data_penyedia.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(data_penyedia $data_penyedia)
    {

        return view('data_umum.data_penyedia.index', compact('data_penyedia'));
    }

    public function edit($id)
    {
        $data_penyedia = data_penyedia::findOrFail($id);

        $tempatTanggalLahir = explode(', ', $data_penyedia->tempat_tanggal_lahir);
        $tanggal_lahir = $tempatTanggalLahir[0] ?? '';
        $tempat_lahir = $tempatTanggalLahir[1] ?? '';

        return view('data_umum.data_penyedia.edit', compact('data_penyedia', 'tempat_lahir', 'tanggal_lahir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|',
            'jenis_kelamin' => 'required|',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|',
            'alamat' => 'required|',
            'nama_perusahaan' => 'required|',
            'alamat_perusahaan' => 'required|',
            'no_hp' => 'required|',
            'npwp' => 'required|',
            'nib' => 'required|',
        ]);

        $data = data_penyedia::findOrFail($id);

        $tempatTanggalLahir = $request->input('tanggal_lahir') . ', ' . $request->input('tempat_lahir');

        $data->update([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_tanggal_lahir' => $tempatTanggalLahir,
            'nik' => $request->input('nik'),
            'alamat' => $request->input('alamat'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'alamat_perusahaan' => $request->input('alamat_perusahaan'),
            'no_hp' => $request->input('no_hp'),
            'npwp' => $request->input('npwp'),
            'nib' => $request->input('nib'),

        ]);

        return redirect()->route('data_penyedia.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy($id) {
        $item = data_penyedia::find($id); // Mencari item berdasarkan ID
        if ($item) {
            $item->delete(); // Menghapus item jika ditemukan
            return redirect()->route('data_penyedia.index')->with('success', 'Item deleted successfully.');
        } else {
            return redirect()->route('data_penyedia.index')->with('error', 'Item not found.');
        }
    }

}
