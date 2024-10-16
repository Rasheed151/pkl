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
        $pengumuman = pengumuman::where('userId', auth()->id())->with('data_rkp','data_tpk')->get();
        $data_rkp = data_rkp::where('userId', auth()->id())->get();
        $data_tpk = data_tpk::where('userId', auth()->id())->get();

        return view('perencanaan.pengumuman.index', compact('pengumuman', 'data_rkp', 'data_tpk'));
    }

    public function create()
    {

        $simpanData = data_rkp::all();

        return view('perencanaan.pengumuman.index', compact('simpanData'));
    }

    public function store(Request $request)
{
    $request->validate([
        'kegiatanId' => 'required',
        'cara_pengadaan' => 'required',
        'tpkId' => 'required',
        'tanggal' => 'required',
    ]);

    pengumuman::create($request->merge(['userId' => auth()->id()])->all());

    return redirect()->route('pengumuman.index')->with('success', 'Data berhasil disimpan');
}


    public function edit($id)
    {
        $pengumuman = pengumuman::findOrFail($id);
        $data_rkp = data_rkp::where('userId', auth()->id())->get();
        $data_tpk = data_tpk::where('userId', auth()->id())->get();

        if ($pengumuman->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('perencanaan.pengumuman.edit', compact('pengumuman', 'data_tpk', 'data_rkp'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatanId' => 'required|',
            'cara_pengadaan' => 'required|',
            'tpkId' => 'required|',
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
