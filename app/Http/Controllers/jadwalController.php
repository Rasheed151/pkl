<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jadwal;
use App\Models\pengumuman;
use App\Models\data_aparat;
use App\Models\data_tpk;
use carbon\Carbon;

class jadwalController extends Controller
{
    public function index()
    {
        $pengumuman = pengumuman::where('userId', auth()->id())->with('data_rkp')->get();
        $jadwal = Jadwal::where('userId', auth()->id())->with('data_rkp', 'dataAparat','pengumuman', 'ketuaTpk','sekertarisTpk','anggotaTpk')->get();
        $data_tpk = data_tpk::where('userId', auth()->id())->get();
        $data_aparat = data_aparat::where('userId', auth()->id())->get();
        return view('persiapan.jadwal.index', compact('jadwal', 'data_tpk', 'data_aparat', 'pengumuman'));
    }

    public function create()
    {
        return view('persiapan.jadwal.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatanId' => 'required',
            'ketua_tpk' => 'required|string|max:255',
            'sekertaris_tpk' => 'required|string|max:255',
            'anggota_tpk' => 'required|string|max:255',
            'nama_kasi' => 'required|string|max:255',
        ]);

        jadwal::create($request->merge(['userId' => auth()->id()])->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(jadwal $jadwal)
    {
        if ($jadwal->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('persiapan.jadwal.index', compact('jadwal'));
    }

    public function edit($id)
    {
        $jadwal = jadwal::findOrFail($id);
        $data_tpk = data_tpk::where('userId', auth()->id())->get();
        $data_aparat = data_aparat::where('userId', auth()->id())->get();
        $pengumuman = pengumuman::where('userId', auth()->id())->get();

        return view('persiapan.jadwal.edit', compact('jadwal', 'data_tpk', 'data_aparat', 'pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ketua_tpk' => 'required|string|max:255',
            'sekertaris_tpk' => 'required|string|max:255',
            'anggota_tpk' => 'required|string|max:255',
            'nama_kasi' => 'required|string|max:255',
        ]);

        $data = jadwal::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(jadwal $jadwal)
    {
        if ($jadwal->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
