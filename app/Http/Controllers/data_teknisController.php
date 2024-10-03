<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_teknis;
use App\Models\jadwal;

class data_teknisController extends Controller
{
    public function index(Request $request)
{
    $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
    $nama_kegiatan = $request->query('nama_kegiatan'); // Ambil nama_kegiatan dari query string jika dibutuhkan
    $data_teknis = data_teknis::where('kegiatanId', $kegiatanId)->get();
    $jadwal = jadwal::where('kegiatanId', $kegiatanId)->where('nama_kegiatan', $nama_kegiatan)->first();

    return view('persiapan.teknis.index', compact('data_teknis', 'kegiatanId','nama_kegiatan'));
}

    // Tampilkan form untuk menambah spesifikasi teknis
    public function create(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        return view('persiapan.teknis.index', compact('kegiatanId'));
    }

    // Simpan spesifikasi teknis baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesifikasi' => 'required',
            'jenis' => 'required',
            'kegiatanId' => 'required',
        ]);

        // Simpan data ke database
        data_teknis::create([
            'nama' => $request->nama,
            'spesifikasi' => $request->spesifikasi,
            'jenis' => $request->jenis,
            'kegiatanId' => $request->kegiatanId, // Dari form input
            'userId' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('data_teknis.index', ['kegiatanId' => $request->kegiatanId])
            ->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data_teknis = data_teknis::findOrFail($id);
    $kegiatanId = $data_teknis->kegiatanId; // Ambil kegiatanId dari data teknis

    return view('persiapan.teknis.edit', compact('data_teknis', 'kegiatanId'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'spesifikasi' => 'required',
        'jenis' => 'required',
    ]);

    // Temukan data berdasarkan ID
    $data = data_teknis::findOrFail($id);

    // Update data
    $data->update($request->all());

    // Ambil kegiatanId dan nama_kegiatan dari data yang diupdate
    $kegiatanId = $data->kegiatanId;
    $nama_kegiatan = $data->nama;

    // Redirect ke halaman index dengan parameter kegiatanId dan nama_kegiatan
    return redirect()->route('data_teknis.index', [
        'kegiatanId' => $kegiatanId, 
        'nama_kegiatan' => $nama_kegiatan
    ])->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
}

    // Hapus spesifikasi teknis
    public function destroy($id)
    {
        $data_teknis = data_teknis::findOrFail($id);
        $kegiatanId = $data_teknis->kegiatanId;

        $data_teknis->delete();

        return redirect()->route('data_teknis.index', ['kegiatanId' => $kegiatanId])
            ->with('success', 'Data spesifikasi teknis berhasil dihapus');
    }

}
