<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_teknis;
use App\Models\jadwal;
use App\Models\data_analisa;

class data_analisaController extends Controller
{
    public function index(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        $nama_kegiatan = $request->query('nama_kegiatan'); // Ambil nama_kegiatan dari query string jika dibutuhkan

        // Ambil data teknis berdasarkan jenis
        $data_teknis_tenaga_kerja = data_teknis::where('kegiatanId', $kegiatanId)
            ->where('jenis', 'Tenaga Kerja')
            ->get();

        $data_teknis_bahan = data_teknis::where('kegiatanId', $kegiatanId)
            ->where('jenis', 'Bahan')
            ->get();

        $data_teknis_peralatan = data_teknis::where('kegiatanId', $kegiatanId)
            ->where('jenis', 'Peralatan')
            ->get();

        $data_analisa_tenaga_kerja = data_analisa::where('kegiatanId', $kegiatanId)
            ->where('jenis', 'Tenaga Kerja')
            ->get();

        $data_analisa_bahan = data_analisa::where('kegiatanId', $kegiatanId)
            ->where('jenis', 'Bahan')
            ->get();

        $data_analisa_peralatan = data_analisa::where('kegiatanId', $kegiatanId)
            ->where('jenis', 'Peralatan')
            ->get();

        // Ambil jadwal yang sesuai
        $jadwal = jadwal::where('kegiatanId', $kegiatanId)
            ->where('nama_kegiatan', $nama_kegiatan)
            ->first();

        // Kirim data ke view
        return view('persiapan.analisa.index', compact(
            'data_teknis_tenaga_kerja',
            'data_teknis_bahan',
            'data_teknis_peralatan',
            'data_analisa_tenaga_kerja',
            'data_analisa_bahan',
            'data_analisa_peralatan',
            'jadwal',
            'kegiatanId',
            'nama_kegiatan'
        ));
    }

    public function create(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        return view('persiapan.analisa.index', compact('kegiatanId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'satuan' => 'required',
            'koefisien' => 'required',
            'harga_satuan' => 'required',
            'kegiatanId' => 'required',
            'jenis' => 'required',
        ]);

        // Simpan data ke database
        data_analisa::create([
            'nama' => $request->nama,
            'kode' =>  $request->kode,
            'satuan' =>  $request->satuan,
            'koefisien' =>  $request->koefisien,
            'harga_satuan' =>  $request->harga_satuan,
            'jumlah_harga' =>  $request->harga_satuan * $request->koefisien,
            'jenis' => $request->jenis,
            'kegiatanId' => $request->kegiatanId, // Dari form input
            'userId' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('data_analisa.index', ['kegiatanId' => $request->kegiatanId])
            ->with('success', 'Data analisa teknis berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $data_analisa = data_analisa::findOrFail($id);
        $kegiatanId = $data_analisa->kegiatanId;

        $data_analisa->delete();

        return redirect()->route('data_analisa.index', ['kegiatanId' => $kegiatanId])
            ->with('success', 'Data spesifikasi teknis berhasil dihapus');
    }
}
