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
            'kegiatanId' => 'required',
            'latar_belakang' => 'required',
        ]);

        data_kak::create($request->merge(['userId' => auth()->id()])->all());

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
