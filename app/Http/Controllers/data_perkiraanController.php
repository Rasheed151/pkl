<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_teknis;
use App\Models\jadwal;
use App\Models\data_perkiraan;

class data_perkiraanController extends Controller
{
    public function index(Request $request)
    {
        $kegiatanId = $request->query('kegiatanId'); // Ambil kegiatanId dari query string
        $nama_kegiatan = $request->query('nama_kegiatan'); // Ambil nama_kegiatan dari query string jika dibutuhkan
        $data_teknis = data_teknis::where('kegiatanId', $kegiatanId)->get();
        $jadwal = jadwal::where('kegiatanId', $kegiatanId)->where('nama_kegiatan', $nama_kegiatan)->first();
        $data_perkiraan = data_perkiraan::where('kegiatanId', $kegiatanId)->get();
    
        return view('persiapan.perkiraan.index', compact('data_teknis', 'kegiatanId','nama_kegiatan','data_perkiraan','jadwal'));
    }
    
        
        public function create(Request $request)
        {
            $kegiatanId = $request->query('kegiatanId'); 
            return view('persiapan.perkiraan.index', compact('kegiatanId'));
        }
    
        
        public function store(Request $request)
        {
            $request->validate([
                'nama' => 'required',
                'spesifikasi' => 'required',
                'volume' => 'required',
                'satuan' => 'required',
                'harga_satuan' => 'required',
                'kegiatanId' => 'required',
            ]);

            

            data_perkiraan::create([
                'nama' => $request->nama,
                'spesifikasi' => $request->spesifikasi,
                'volume'=> $request->volume,
                'satuan'=> $request->satuan,
                'harga_satuan'=> $request->harga_satuan,
                'jumlah_harga' =>  $request->harga_satuan * $request->satuan,
                'kegiatanId' => $request->kegiatanId, // Dari form input
                'userId' => auth()->id(), // Dari user yang login
            ]);
    
            return redirect()->route('data_perkiraan.index', ['kegiatanId' => $request->kegiatanId])
                ->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
        }
    
        // Hapus spesifikasi teknis
        public function destroy($id)
        {
            $data_perkiraan = data_perkiraan::findOrFail($id);
            $kegiatanId = $data_perkiraan->kegiatanId;
    
            $data_perkiraan->delete();
    
            return redirect()->route('data_perkiraan.index', ['kegiatanId' => $kegiatanId])
                ->with('success', 'Data spesifikasi teknis berhasil dihapus');
        }
    
}
