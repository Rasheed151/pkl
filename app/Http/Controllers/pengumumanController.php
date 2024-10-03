<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengumuman;
use App\Models\data_rkp;
use App\Models\data_tpk;

class pengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = pengumuman::where('userId', auth()->id())->get();
        $data_rkp = data_rkp::where('userId', auth()->id())->get();
        $data_tpk = data_tpk::where('userId', auth()->id())->get();
        
        return view('perencanaan.pengumuman.index', compact('pengumuman','data_rkp','data_tpk'));
    }

    public function create()
    {
        
        $simpanData = data_rkp::all();
        
        return view('perencanaan.pengumuman.index', compact('simpanData'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_kegiatan' => 'required|',
        'cara_pengadaan' => 'required|',
        'nama_tpk' => 'required|',
        'tanggal' => 'required|',
    ]);

    $ambil = data_rkp::where('nama_kegiatan', $request->nama_kegiatan)->first();
    
    if ($ambil) {
        // Pisahkan volume dan satuan
        $volumeExploded = explode(', ', $ambil->volume);
        $volume = $volumeExploded[0] ?? '';
        $satuan = $volumeExploded[1] ?? ''; // Pastikan satuan terdeteksi
        
        // Simpan data baru di tabel pengumuman
        pengumuman::create(array_merge([
            'nama_kegiatan' => $ambil->nama_kegiatan,
            'jumlah_biaya' => $ambil->jumlah_biaya,
            'cara_pengadaan' => $request->cara_pengadaan,
            'volume' => $volume,
            'satuan' => $satuan, // Menggunakan satuan dari hasil explode
            'nama_tpk' => $request->nama_tpk,
            'lokasi_kegiatan' => $ambil->lokasi_kegiatan,
            'tanggal' => $request->tanggal,
            'waktu_pelaksanaan' => $ambil->waktu_pelaksanaan,
            'kegiatanId' => $ambil->id,
        ], [
            'userId' => auth()->id(), // Tambahkan userId ke data yang disimpan
        ]));

        return redirect()->route('pengumuman.index')->with('success', 'Data berhasil disimpan!');
    } else {
        return redirect()->route('pengumuman.index')->with('error', 'Data nama tidak ditemukan di tabel simpan.');
    }
}


    public function show(pengumuman $pengumuman)
    {
        if ($pengumuman->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('perencanaan.pengumuman.index', compact('pengumuman'));
    }

    public function edit($id)
    {
        $pengumuman = pengumuman::findOrFail($id);
        $data_rkp = data_rkp::where('userId', auth()->id())->get();
        $data_tpk = data_tpk::where('userId', auth()->id())->get();

        if ($pengumuman->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('perencanaan.pengumuman.edit', compact('pengumuman','data_tpk','data_rkp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|',
            'cara_pengadaan' => 'required|',
            'nama_tpk' => 'required|',
            'tanggal' => 'required|',
        ]);

        $data = pengumuman::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('pengumuman.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(pengumuman $pengumuman)
    {
        if ($pengumuman->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
