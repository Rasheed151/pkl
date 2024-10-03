<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use App\Models\data_rkp;
use App\Models\data_kak;

class data_kakController extends Controller
{

    public function index()
    {
        $data_kak = data_kak::where('userId', auth()->id())->get();
        $jadwal = jadwal::where('userId', auth()->id())->get();
        return view('persiapan.kak.index', compact('data_kak','jadwal'));
    }

    public function create()
    {

        return view('persiapan.kak.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'latar_belakang' => 'required',
        ]);
    
        // Ambil data 'jadwal' berdasarkan 'nama_kegiatan'
        $ambil = jadwal::where('nama_kegiatan', $request->nama_kegiatan)->first();
    
        // Ambil data 'rkp' berdasarkan 'kegiatan_id' yang sesuai
        $rkp = data_rkp::where('id', $ambil->kegiatanId)->first();
        $sasaran_manfaat = optional($rkp)->sasaran_manfaat;
    
        $cara_pengadaan = $request->cara_pengadaan ?: 'Penyedia';
    
        // Simpan data
        data_kak::create(array_merge([
            'nama_kegiatan' => $ambil->nama_kegiatan,
            'latar_belakang' => $request->latar_belakang,
            'sasaran_manfaat' => $sasaran_manfaat,
            'cara_pengadaan' => $cara_pengadaan,
            'ketua_tpk' => $ambil->ketua_tpk,
            'sekertaris_tpk' => $ambil->sekertaris_tpk,
            'anggota_tpk' => $ambil->anggota_tpk,
            'nama_kasi' => $ambil->nama_kasi,
            'jabatan_kasi' => $ambil->jabatan_kasi,
            'waktu_pelaksanaan' => $ambil->waktu_pelaksanaan,
            'tanggal_mulai' => $ambil->tanggal_mulai,
            'tanggal_selesai' => $ambil->tanggal_selesai,
            'jumlah_biaya' => $ambil->jumlah_biaya,
            'kegiatanId' => $ambil->kegiatanId,
        ], [
            'userId' => auth()->id(), // Tambahkan userId ke data yang disimpan
        ]));
    
        return redirect()->route('data_kak.index')
            ->with('success', 'Data umum created successfully.');
    }
    

    public function show(data_kak $data_kak)
    {
        if ($data_kak->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('persiapan.kak.index', compact('data_kak'));
    }

    public function edit($id)
    {
        $data_kak = data_kak::findOrFail($id);

        return view('persiapan.kak.edit', compact('data_kak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'latar_belakang' => 'required|',
        ]);

        $data = data_kak::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('data_kak.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(jadwal $jadwal)
    {
        if ($jadwal->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $jadwal->delete();

        return redirect()->route('data_kak.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
