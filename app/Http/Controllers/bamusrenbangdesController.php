<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bamusrenbangdes;
use App\Models\narasumber;

class bamusrenbangdesController extends Controller
{
    public function index()
{
    // Mengambil semua Bamusrenbangdes milik pengguna yang sedang login dengan narasumber terkait
    $bamusrenbangdes = Bamusrenbangdes::with('narasumbers')
        ->where('userId', auth()->id())
        ->get();

    // Tidak perlu mengambil narasumber secara terpisah
    return view('perencanaan.bamusrenbangdes.index', compact('bamusrenbangdes'));
}


    public function create()
    {
        return view('perencanaan.bamusrenbangdes.index');
    }

    public function store(Request $request)
{
    // Validasi input hanya untuk field lain yang diperlukan
    $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required|string',
        'tempat' => 'required|string',
        'bahas_kegiatan' => 'required|string',
        'materi_pembahasan' => 'required|string',
        'ketua_bpd' => 'required|string',
        'wakil_masyarakat' => 'required|string',
        'pimpinan_rapat' => 'required|string',
        'notulen' => 'required|string',
        'kesepakatan_akhir' => 'required|string',
        // Tidak ada validasi untuk narasumber
    ]);

    // Simpan data Bamusrenbangdes
    $bamusrenbangdes = Bamusrenbangdes::create(array_merge($request->all(), ['userId' => auth()->id()]));

    // Cek apakah 'narasumber' dan 'dari' ada dan merupakan array sebelum iterasi
    if ($request->has('narasumber') && is_array($request->narasumber) && is_array($request->dari)) {
        foreach ($request->narasumber as $index => $narasumber) {
            // Ambil nilai 'dari' berdasarkan indeks yang sama
            $dari = $request->dari[$index];

            // Simpan data Narasumber terkait
            Narasumber::create([
                'bamusrenbangdesId' => $bamusrenbangdes->id,
                'narasumber' => $narasumber,
                'dari' => $dari,
            ]);
        }
    }

    // Redirect dengan pesan sukses
    return redirect()->route('bamusrenbangdes.index')->with('success', 'Data berhasil disimpan!');
}



    public function edit($id)
    {
        $bamusrenbangdes = bamusrenbangdes::findOrFail($id);

        if ($bamusrenbangdes->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('perencanaan.bamusrenbangdes.edit', compact('bamusrenbangdes'));
    }

    public function update(Request $request, $id)
{
    // Validasi input hanya untuk field lain yang diperlukan
    $request->validate([
        'tanggal' => 'required|date',
        'jam' => 'required|string',
        'tempat' => 'required|string',
        'bahas_kegiatan' => 'required|string',
        'materi_pembahasan' => 'required|string',
        'ketua_bpd' => 'required|string',
        'wakil_masyarakat' => 'required|string',
        'pimpinan_rapat' => 'required|string',
        'notulen' => 'required|string',
        'kesepakatan_akhir' => 'required|string',
        // Validasi untuk narasumber dan dari
        'narasumber' => 'array',
        'narasumber.*' => 'required|string', // Validasi masing-masing narasumber
        'dari' => 'array',
        'dari.*' => 'required|string', // Validasi masing-masing dari
    ]);

    // Temukan data Bamusrenbangdes yang akan diupdate
    $bamusrenbangdes = Bamusrenbangdes::findOrFail($id);

    // Update data Bamusrenbangdes
    $bamusrenbangdes->update($request->all());

    // Hapus narasumber lama terkait dengan Bamusrenbangdes
    Narasumber::where('bamusrenbangdesId', $bamusrenbangdes->id)->delete();

    // Cek apakah 'narasumber' dan 'dari' ada dan merupakan array sebelum iterasi
    if ($request->has('narasumber') && is_array($request->narasumber) && is_array($request->dari)) {
        foreach ($request->narasumber as $index => $narasumber) {
            // Ambil nilai 'dari' berdasarkan indeks yang sama
            $dari = $request->dari[$index];

            // Simpan data Narasumber baru terkait
            Narasumber::create([
                'bamusrenbangdesId' => $bamusrenbangdes->id,
                'narasumber' => $narasumber,
                'dari' => $dari,
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
    $bamusrenbangdes->narasumbers()->delete(); // Hapus narasumber terkait

    return redirect()->route('bamusrenbangdes.index')->with('success', 'Data berhasil dihapus.');
}
}
