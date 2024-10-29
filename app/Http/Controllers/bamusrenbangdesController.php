<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bamusrenbangdes;
use App\Models\resource_person;

class bamusrenbangdesController extends Controller
{
    public function index()
{
    // Mengambil semua Bamusrenbangdes milik pengguna yang sedang login dengan resource_person terkait
    $bamusrenbangdes = Bamusrenbangdes::with('resource_person')
        ->where('user_id', auth()->id())
        ->get();

    // Tidak perlu mengambil resource_person secara terpisah
    return view('planning.bamusrenbangdes.index', compact('bamusrenbangdes'));
}


    public function create()
    {
        return view('planning.bamusrenbangdes.index');
    }

    public function store(Request $request)
{
    // Validasi input hanya untuk field lain yang diperlukan
    $request->validate([
        'date'=> 'required',
        'time'=> 'required',
        'place'=> 'required',
        'activity_discussion'=> 'required',
        'discussion_material'=> 'required',
        'bpd_leader'=> 'required',
        'community_representative'=> 'required',
        'meeting_leader'=> 'required',
        'note'=> 'required',
        'final_agreement'=> 'required',
        // Tidak ada validasi untuk resource_person
    ]);

    // Simpan data Bamusrenbangdes
    $bamusrenbangdes = Bamusrenbangdes::create(array_merge($request->all(), ['user_id' => auth()->id()]));

    // Cek apakah 'resource_person' dan 'from' ada dan merupakan array sebelum iterasi
    if ($request->has('resource_person') && is_array($request->resource_person) && is_array($request->from)) {
        foreach ($request->resource_person as $index => $resource_person) {
            // Ambil nilai 'from' berdasarkan indeks yang sama
            $from = $request->from[$index];

            // Simpan data resource_person terkait
            resource_person::create([
                'bamusrenbangdes_id' => $bamusrenbangdes->id,
                'resource_person' => $resource_person,
                'from' => $from,
            ]);
        }
    }

    // Redirect dengan pesan sukses
    return redirect()->route('bamusrenbangdes.index')->with('success', 'Data berhasil disimpan!');
}



    public function edit($id)
    {
        $bamusrenbangdes = bamusrenbangdes::findOrFail($id);

        if ($bamusrenbangdes->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('planning.bamusrenbangdes.edit', compact('bamusrenbangdes'));
    }

    public function update(Request $request, $id)
{
    // Validasi input hanya untuk field lain yang diperlukan
    $request->validate([
      'date'=> 'required',
    'time'=> 'required',
    'place'=> 'required',
    'activity_discussion'=> 'required',
    'discussion_material'=> 'required',
    'bpd_leader'=> 'required',
    'community_representative'=> 'required',
    'meeting_leader'=> 'required',
    'note'=> 'required',
    'final_agreement'=> 'required',
    'resource_person' => 'required|array',
    'resource_person.*' => 'required|string',
    'from' => 'required|array',
    'from.*' => 'required|string',
    ]);

    // Temukan data Bamusrenbangdes yang akan diupdate
    $bamusrenbangdes = Bamusrenbangdes::findOrFail($id);

    // Update data Bamusrenbangdes
    $bamusrenbangdes->update($request->all());

    // Hapus resource_person lama terkait dengan Bamusrenbangdes
    resource_person::where('bamusrenbangdes_id', $bamusrenbangdes->id)->delete();

    // Cek apakah 'resource_person' dan 'from' ada dan merupakan array sebelum iterasi
    if ($request->has('resource_person') && is_array($request->resource_person) && is_array($request->from)) {
        foreach ($request->resource_person as $index => $resource_person) {
            // Ambil nilai 'from' berdasarkan indeks yang sama
            $from = $request->from[$index];

            // Simpan data resource_person baru terkait
            resource_person::create([
                'bamusrenbangdes_id' => $bamusrenbangdes->id,
                'resource_person' => $resource_person,
                'from' => $from,
            ]);
        }
    }

    // Redirect dengan pesan sukses
    return redirect()->route('bamusrenbangdes.index')->with('success', 'Data berhasil diperbarui!');
}

public function destroy($id)
{
    $bamusrenbangdes = Bamusrenbangdes::findOrFail($id);
    $bamusrenbangdes->delete();

    return redirect()->route('bamusrenbangdes.index')->with('success', 'Data berhasil dihapus.');
}
}
