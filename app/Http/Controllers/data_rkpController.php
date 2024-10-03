<?php

namespace App\Http\Controllers;

use App\Models\data_aparat;
use Illuminate\Http\Request;
use App\Models\data_rkp ;
use DateTime;

class data_rkpController extends Controller
{
    public function index()
    {
        $data_rkp = data_rkp::where('userId', auth()->id())->get();
        $data_aparat = data_aparat::where('userId', auth()->id())->get();
        return view('perencanaan.rkp.index', compact('data_rkp','data_aparat'));
    }

    public function create()
    {
        return view('perencanaan.rkp.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bidang' => 'required',
            'sub_bidang' => 'required',
            'nama_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'volume' => 'required',
            'satuan' => 'nullable',
            'sasaran_manfaat' => 'required',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
            'jumlah_biaya' => 'required|numeric',
            'sumber_biaya' => 'required',
            'swakelola' => 'nullable|boolean',
            'kerjasama_desa' => 'nullable|boolean',
            'pihak_ketiga' => 'nullable|boolean',
            'rencana_pelaksana_kegiatan' => 'required',
        ]);
    
        if($request->bidang == 'Pembangunan Desa' && $request->has('satuan')){
            $volume = $request->input('volume') . ', ' . $request->input('satuan');
        } else {
            $volume = $request->input('volume');
        }

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        // Menghitung jumlah hari
        $tanggal1 = new DateTime($tanggalAwal);
        $tanggal2 = new DateTime($tanggalAkhir);
        $selisih = $tanggal2->diff($tanggal1);
        $jumlahHari = $selisih->days;
    
        $data = $request->all();
        $data['swakelola'] = $request->input('swakelola', 0); 
        $data['kerjasama_desa'] = $request->input('kerjasama_desa', 0);
        $data['pihak_ketiga'] = $request->input('pihak_ketiga', 0);
        $data['volume'] = $volume;
        $data['waktu_pelaksanaan'] = $jumlahHari;
    
        data_rkp::create(array_merge($data, ['userId' => auth()->id()]));
    
        return redirect()->route('data_rkp.index')->with('success', 'Data RKP berhasil ditambahkan.');
    }
    
    


    

    public function show(data_rkp $rkp)
    {
        if ($rkp->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('perencanaan.rkp.index', compact('rkp'));
    }

    public function edit($id)
    {
        $data_rkp = data_rkp::findOrFail($id);

        if ($data_rkp->bidang == 'Pembangunan Desa'){
            $volume = explode(', ', $data_rkp->volume);
        $volume = $volume[0] ?? '';
        $satuan = $volume[1] ?? '';
        }else{
            $volume = $data_rkp->volume;
        }

        return view('perencanaan.rkp.edit', compact('data_rkp'));
    }

    public function update(Request $request, data_rkp $data_rkp)
    {
        $request->validate([
            'bidang' => 'required',
            'sub_bidang' => 'required',
            'nama_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'volume' => 'required',
            'satuan' => 'nullable',
            'sasaran_manfaat' => 'required',
            'waktu_pelaksanaan' => 'required|date',
            'jumlah_biaya' => 'required|numeric',
            'sumber_biaya' => 'required',
            'swakelola' => 'nullable|boolean',
            'kerjasama_desa' => 'nullable|boolean',
            'pihak_ketiga' => 'nullable|boolean',
            'rencana_pelaksana_kegiatan' => 'required',
        ]);

        if($request->bidang == 'Pembangunan Desa' && $request->has('satuan')){
            $volume = $request->input('volume') . ', ' . $request->input('satuan');
        } else {
            $volume = $request->input('volume');
        }
    
        $data = $request->all();
        $data['swakelola'] = $request->filled('swakelola');
        $data['kerjasama_desa'] = $request->filled('kerjasama_desa');
        $data['pihak_ketiga'] = $request->filled('pihak_ketiga');
        $data['volume'] = $volume;
    
        $data_rkp->update($data);
    
        return redirect()->route('data_rkp.index')
            ->with('success', 'Data aparat updated successfully.');
    }
    

    public function destroy(data_rkp $data_rkp)
    {
        if ($data_rkp->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $data_rkp->delete();

        return redirect()->route('data_rkp.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
