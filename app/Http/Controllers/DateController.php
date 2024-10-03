<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use App\Models\pengumuman;

class DateController extends Controller
{
    // Menampilkan form
    public function index()
    {
        return view('hitungHari');
    }

    // Fungsi untuk menghitung jumlah hari
    public function hitungHari(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        // Menghitung jumlah hari
        $tanggal1 = new DateTime($tanggalAwal);
        $tanggal2 = new DateTime($tanggalAkhir);
        $selisih = $tanggal2->diff($tanggal1);
        $jumlahHari = $selisih->days;

        // Mengirim hasil ke view
        return view('hitungHari', compact('jumlahHari', 'tanggalAwal', 'tanggalAkhir'));
    }

    public function tampilkanTanggal()
    {
        $pengumuman = Pengumuman::where('id', 2)->first();

    // Pastikan data pengumuman ditemukan
    if ($pengumuman) {
        // Ambil tanggal dari kolom 'tanggal' dan ubah menjadi objek Carbon
        $tanggalMulai = Carbon::parse($pengumuman->tanggal);

        // Tambahkan 50 hari ke tanggal yang diambil dari database
        $tanggalSetelah50Hari = $tanggalMulai->addDays(50)->format('d-m-Y');
        
        // Oper variabel ke view
        return view('hitung-hari', compact('tanggalSetelah50Hari'));
    } else {
        return redirect()->back()->with('error', 'Data pengumuman tidak ditemukan');
    }
    }

}
