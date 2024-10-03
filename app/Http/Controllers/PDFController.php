<?php

namespace App\Http\Controllers;

// Atau, jika Laravel versi 9 ke atas

use FPDF;
use App\Models\data_desa;
use Illuminate\Http\Request;
use App\Models\bamusrenbangdes;
use App\Models\data_rkp;
use App\Models\jadwal;
use App\Models\data_kak;
use App\Models\pengumuman;
use App\Models\pengumuman_lelang;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PDFController extends Controller
{
    public function make($id)
    {
        // Mengambil satu entitas berdasarkan ID
        $data = bamusrenbangdes::find($id);

        $id = Auth::id();
        $desa = data_desa::where('userId', $id)->first();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('perencanaan.bamusrenbangdes.form', compact('data', 'desa'));

        return $pdf->download('laporan bamusrenbangdes tanggal' . $data->tanggal . '.pdf');
    }

    public function preview($id)
    {
        $data = bamusrenbangdes::find($id);
        $id = Auth::id();
        $desa = data_desa::where('userId', $id)->first();

        // Tampilkan HTML untuk preview
        $pdf = PDF::loadView('perencanaan.bamusrenbangdes.form', compact('data', 'desa'));

        // Set ukuran kertas ke A4 untuk preview
        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('preview.pdf');
    }

    public function testing($id = 1)
    {
        // Mengambil satu entitas berdasarkan ID
        $data = jadwal::find($id);

        $userId = Auth::id();  // Menggunakan variabel berbeda untuk Auth::id()
        $desa = data_desa::where('userId', $userId)->first();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('penyerahan.penyedia.pdf1', compact('data', 'desa'));

        return $pdf->download('laporan akhir kegiatan ' . $data->nama_kegiatan . '.pdf');
    }

    public function tesview($kegiatanId)
    {
        // Mengambil satu entitas berdasarkan kegiatanId
        $data = jadwal::find($kegiatanId);

        $userId = Auth::id();  // Menggunakan variabel berbeda untuk Auth::id()
        $desa = data_desa::where('userId', $userId)->first();

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('penyerahan.penyedia.pdf1', compact('data', 'desa'));

        return $pdf->stream('preview_laporan_akhir_kegiatan_' . $data->nama_kegiatan . '.pdf');
    }

    public function rkp($userId) // Menangkap parameter $userId dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan userId
        $data = data_rkp::where('userId', auth()->id())->get();
        $desa = data_desa::where('userId', $userId)->firstOrFail(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('perencanaan.rkp.pdf', compact('data', 'desa'));

        return $pdf->stream('data RKP ' . $desa->tahun_anggaran . '.pdf');
    }

    public function pengumuman($userId) // Menangkap parameter $userId dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan userId
        $pengumuman = pengumuman::where('userId', auth()->id())->get();
        $desa = data_desa::where('userId', $userId)->firstOrFail(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('perencanaan.pengumuman.pdf', compact('pengumuman', 'desa'));

        return $pdf->stream('data Pengumuman Acara ' . $desa->tahun_anggaran . '.pdf');
    }

    public function jadwal($id) // Menangkap parameter $userId dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan userId
        $jadwal = jadwal::find($id);
        $id = Auth::id();
        $desa = data_desa::where('userId', $id)->first(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('persiapan.jadwal.pdf', compact('jadwal', 'desa'));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('data jadwal Acara ' . $jadwal->nama_kegiatan . '.pdf');
    }

    public function kak($id) // Menangkap parameter $userId dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan userId
        $kak = data_kak::find($id);
        $id = Auth::id();
        $desa = data_desa::where('userId', $id)->first(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('persiapan.kak.pdf', compact('kak', 'desa'));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('data kak Acara ' . $kak->nama_kegiatan . '.pdf');
    }



    public function pengumuman_lelang($id) // Menangkap parameter $userId dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan userId
        $data = pengumuman_lelang::find($id);
        $id = Auth::id();
        $desa = data_desa::where('userId', $id)->first();

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

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pelaksanaan.lelang.pdf1', compact('data','desa', 'tanggal_pengumuman', 'waktu_pengumuman', 'tempat_pengumuman', 'tanggal_pendaftaran', 'waktu_pendaftaran', 'tempat_pendaftaran', 'tanggal_pemasukan', 'waktu_pemasukan', 'tempat_pemasukan', 'tanggal_evaluasi', 'waktu_evaluasi', 'tempat_evaluasi', 'tanggal_negosiasi', 'waktu_negosiasi', 'tempat_negosiasi', 'tanggal_penepatan', 'waktu_penepatan', 'tempat_penepatan'));

        return $pdf->stream('data Pengumuman_lelang Acara ' . $data->nama_kegiatan . '.pdf');
    }
}
