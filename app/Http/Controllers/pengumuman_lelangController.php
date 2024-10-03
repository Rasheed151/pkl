<?php

namespace App\Http\Controllers;

use App\Models\data_perkiraan;
use App\Models\data_rkp;
use App\Models\pengumuman_lelang;
use App\Models\jadwal;
use Illuminate\Http\Request;

class pengumuman_lelangController extends Controller
{
    public function index(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        $nama_kegiatan = $request->query('nama_kegiatan'); // Ambil nama_kegiatan dari query string jika dibutuhkan
        $pengumuman_lelang = pengumuman_lelang::where('kegiatanId', $kegiatanId)->get();
        $jadwal = jadwal::where('kegiatanId', $kegiatanId)->where('nama_kegiatan', $nama_kegiatan)->first();
    
        return view('pelaksanaan.lelang.index', compact('pengumuman_lelang', 'kegiatanId','nama_kegiatan'));
    }

    public function create(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        return view('pelaksanaan.lelang.index', compact('kegiatanId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengumuman' => 'required',
            'waktu_pengumuman' => 'required',
            'tempat_pengumuman' => 'required',
            'tanggal_pendaftaran' => 'required',
            'waktu_pendaftaran' => 'required',
            'tempat_pendaftaran' => 'required',
            'tanggal_pemasukan' => 'required',
            'waktu_pemasukan' => 'required',
            'tempat_pemasukan' => 'required',
            'tanggal_evaluasi' => 'required',
            'waktu_evaluasi' => 'required',
            'tempat_evaluasi' => 'required',
            'tanggal_negosiasi' => 'required',
            'waktu_negosiasi' => 'required',
            'tempat_negosiasi' => 'required',
            'tanggal_penepatan' => 'required',
            'waktu_penepatan' => 'required',
            'tempat_penepatan' => 'required',
            'kegiatanId' => 'required',
        ]);

        $pengumuman = $request->input('tanggal_pengumuman') . ', ' . $request->input('waktu_pengumuman'). ', ' . $request->input('tempat_pengumuman');
        $pendaftaran = $request->input('tanggal_pendaftaran') . ', ' . $request->input('waktu_pendaftaran'). ', ' . $request->input('tempat_pendaftaran');
        $pemasukan = $request->input('tanggal_pemasukan') . ', ' . $request->input('waktu_pemasukan'). ', ' . $request->input('tempat_pemasukan');
        $evaluasi = $request->input('tanggal_evaluasi') . ', ' . $request->input('waktu_evaluasi'). ', ' . $request->input('tempat_evaluasi');
        $negosiasi = $request->input('tanggal_negosiasi') . ', ' . $request->input('waktu_negosiasi'). ', ' . $request->input('tempat_negosiasi');
        $penepatan = $request->input('tanggal_penepatan') . ', ' . $request->input('waktu_penepatan'). ', ' . $request->input('tempat_penepatan');

        $ambil = jadwal::where('kegiatanId', $request->kegiatanId)->first();
        $rkp = data_rkp::where('id', $request->kegiatanId)->first();
        $jumlah_akhir = data_perkiraan::where('kegiatanId', $request->kegiatanId)->sum('jumlah_harga');


        // Simpan data ke database
        pengumuman_lelang::create([
            'nama_kegiatan' => $ambil->nama_kegiatan,
            'ketua_tpk' =>  $ambil->ketua_tpk,
            'sekertaris_tpk' =>  $ambil->sekertaris_tpk,
            'anggota_tpk' => $ambil->anggota_tpk,
            'lokasi_kegiatan' =>  $ambil->lokasi_kegiatan,
            'bidang' =>  $rkp->bidang,
            'total_nilai_hps' => $jumlah_akhir,
            'waktu_pelaksanaan' => $ambil->waktu_pelaksanaan,
            'waktu_pengumuman' => $pengumuman,
            'waktu_pendaftaran' => $pendaftaran,
            'waktu_pemasukan' => $pemasukan,
            'waktu_evaluasi' => $evaluasi,
            'waktu_negosiasi' => $negosiasi,
            'waktu_penepatan' => $penepatan,
            'kegiatanId' => $request->kegiatanId, // Dari form input
            'userId' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('pengumuman_lelang.index', ['kegiatanId' => $request->kegiatanId])
            ->with('success', 'Data analisa teknis berhasil ditambahkan');
    }

    public function show(pengumuman_lelang $pengumuman_lelang)
    {
        if ($pengumuman_lelang->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('pelaksanaan.lelang.index', compact('pengumuman_lelang'));
    }


    public function edit($id)
    {
        $pengumuman_lelang = pengumuman_lelang::findOrFail($id);

        $data = pengumuman_lelang::findOrFail($id);

        // Memisahkan tempat dan tanggal lahir
        $pengumuman = explode(', ', $data->waktu_pengumuman);
        $tanggal_pengumuman = $pengumuman[0] ?? '';
        $waktu_pengumuman = $pengumuman[1] ?? '';
        $tempat_pengumuman = $pengumuman[2] ?? '';

        $pendaftaran = explode(', ', $data->waktu_pendaftaran);
        $tanggal_pendaftaran = $pendaftaran[0] ?? '';
        $waktu_pendaftaran = $pendaftaran[1] ?? '';
        $tempat_pendaftaran = $pendaftaran[2] ?? '';

        $pemasukan = explode(', ', $data->waktu_pemasukan);
        $tanggal_pemasukan = $pemasukan[0] ?? '';
        $waktu_pemasukan = $pemasukan[1] ?? '';
        $tempat_pemasukan = $pemasukan[2] ?? '';

        $evaluasi = explode(', ', $data->waktu_evaluasi);
        $tanggal_evaluasi = $evaluasi[0] ?? '';
        $waktu_evaluasi = $evaluasi[1] ?? '';
        $tempat_evaluasi = $evaluasi[2] ?? '';

        $negosiasi = explode(', ', $data->waktu_negosiasi);
        $tanggal_negosiasi = $negosiasi[0] ?? '';
        $waktu_negosiasi = $negosiasi[1] ?? '';
        $tempat_negosiasi = $negosiasi[2] ?? '';

        $penepatan = explode(', ', $data->waktu_penepatan);
        $tanggal_penepatan = $penepatan[0] ?? '';
        $waktu_penepatan = $penepatan[1] ?? '';
        $tempat_penepatan = $penepatan[2] ?? '';

        return view('pelaksanaan.lelang.edit', compact('pengumuman_lelang', 'tanggal_pengumuman', 'waktu_pengumuman', 'tempat_pengumuman', 'tanggal_pendaftaran', 'waktu_pendaftaran', 'tempat_pendaftaran', 'tanggal_pemasukan', 'waktu_pemasukan', 'tempat_pemasukan', 'tanggal_evaluasi', 'waktu_evaluasi', 'tempat_evaluasi', 'tanggal_negosiasi', 'waktu_negosiasi', 'tempat_negosiasi', 'tanggal_penepatan', 'waktu_penepatan', 'tempat_penepatan'));

        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pengumuman' => 'required',
            'waktu_pengumuman' => 'required',
            'tempat_pengumuman' => 'required',
            'tanggal_pendaftaran' => 'required',
            'waktu_pendaftaran' => 'required',
            'tempat_pendaftaran' => 'required',
            'tanggal_pemasukan' => 'required',
            'waktu_pemasukan' => 'required',
            'tempat_pemasukan' => 'required',
            'tanggal_evaluasi' => 'required',
            'waktu_evaluasi' => 'required',
            'tempat_evaluasi' => 'required',
            'tanggal_negosiasi' => 'required',
            'waktu_negosiasi' => 'required',
            'tempat_negosiasi' => 'required',
            'tanggal_penepatan' => 'required',
            'waktu_penepatan' => 'required',
            'tempat_penepatan' => 'required',
        ]);

        // Temukan data aparat berdasarkan ID
        $data = pengumuman_lelang::findOrFail($id);
        $kegiatanId = $data->kegiatanId;
        $nama_kegiatan = $data->nama;

        // Gabungkan tempat lahir dan tanggal lahir
        $pengumuman = $request->input('tanggal_pengumuman') . ', ' . $request->input('waktu_pengumuman'). ', ' . $request->input('tempat_pengumuman');
        $pendaftaran = $request->input('tanggal_pendaftaran') . ', ' . $request->input('waktu_pendaftaran'). ', ' . $request->input('tempat_pendaftaran');
        $pemasukan = $request->input('tanggal_pemasukan') . ', ' . $request->input('waktu_pemasukan'). ', ' . $request->input('tempat_pemasukan');
        $evaluasi = $request->input('tanggal_evaluasi') . ', ' . $request->input('waktu_evaluasi'). ', ' . $request->input('tempat_evaluasi');
        $negosiasi = $request->input('tanggal_negosiasi') . ', ' . $request->input('waktu_negosiasi'). ', ' . $request->input('tempat_negosiasi');
        $penepatan = $request->input('tanggal_penepatan') . ', ' . $request->input('waktu_penepatan'). ', ' . $request->input('tempat_penepatan');

        // Update data
        $data->update([
           'waktu_pengumuman' => $pengumuman,
            'waktu_pendaftaran' => $pendaftaran,
            'waktu_pemasukan' => $pemasukan,
            'waktu_evaluasi' => $evaluasi,
            'waktu_negosiasi' => $negosiasi,
            'waktu_penepatan' => $penepatan,
        ]);

        return redirect()->route('pengumuman_lelang.index', [
            'kegiatanId' => $kegiatanId, 
            'nama_kegiatan' => $nama_kegiatan
        ])->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
    }
}
