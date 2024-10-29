<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\rkp_data;
use App\Models\tpk_data;
use Carbon\Carbon;


class announcementController extends Controller
{
    public function index()
    {
        $announcement = announcement::where('user_id', auth()->id())->with('rkp_data','tpk_data')->get();
        $rkp_data = rkp_data::where('user_id', auth()->id())->get();
        $tpk_data = tpk_data::where('user_id', auth()->id())->get();

        return view('planning.announcement.index', compact('announcement', 'rkp_data', 'tpk_data'));
    }

    public function create()
    {

        return view('planning.announcement.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rkp_id' => 'required',
            'procurement_method' => 'required',
            'tpk_id' => 'required',
            'date' => 'required|date', // Pastikan 'date' adalah tanggal yang valid
        ]);

        // Ambil data RKP berdasarkan rkp_id yang dikirimkan
        $rkp = rkp_data::find($request->rkp_id);

        // Pastikan data RKP ditemukan
        if (!$rkp) {
            return redirect()->back()->with('error', 'RKP tidak ditemukan.');
        }

        // Hitung tanggal akhir berdasarkan tanggal mulai dan durasi dari RKP
        $startDate = Carbon::parse($request->date)->toDateString(); // Tanggal mulai acara (hanya tanggal)
    $endDate = Carbon::parse($request->date)->addDays($rkp->implementation_time)->toDateString(); // Tanggal berakhir acara (hanya tanggal)

        // Simpan data pengumuman dengan tanggal akhir
        announcement::create($request->merge([
            'user_id' => auth()->id(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ])->all());

        return redirect()->route('announcement.index')->with('success', 'Data berhasil disimpan');
    }


    public function edit($id)
    {
        $announcement = announcement::findOrFail($id);
        $rkp_data = rkp_data::where('user_id', auth()->id())->get();
        $tpk_data = tpk_data::where('user_id', auth()->id())->get();

        if ($announcement->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('planning.announcement.edit', compact('announcement', 'tpk_data', 'rkp_data'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'rkp_id' => 'required',
        'procurement_method' => 'required',
        'tpk_id' => 'required',
        'date' => 'required|date',
    ]);

    // Temukan data announcement berdasarkan id
    $announcement = announcement::findOrFail($id);

    // Pastikan user yang mengedit adalah user yang sama
    if ($announcement->user_id !== auth()->id()) {
        abort(403, 'Unauthorized access');
    }

    // Ambil rkp_data berdasarkan rkp_id
    $rkpData = rkp_data::findOrFail($request->rkp_id);

    // Hitung tanggal berakhir dengan menambahkan lamanya acara (implementation_time) ke tanggal mulai
    $startDate = Carbon::parse($request->date); // Tanggal mulai acara
    $endDate = $startDate->copy()->addDays($rkpData->implementation_time); // Tanggal berakhir acara

    // Update announcement dengan tanggal mulai dan tanggal berakhir
    $announcement->update([
        'rkp_id' => $request->rkp_id,
        'procurement_method' => $request->procurement_method,
        'tpk_id' => $request->tpk_id,
        'start_date' => $request->date, // Tanggal mulai
        'end_date' => $endDate, // Tanggal berakhir
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('announcement.index')->with('success', 'Data berhasil diperbarui.');
}


    public function destroy(announcement $announcement)
    {
        if ($announcement->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $announcement->delete();

        return redirect()->route('announcement.index')
            ->with('success', 'Data Umum deleted successfully.');
    }

    public function scheduleindex()
    {
        $announcement = announcement::where('user_id', auth()->id())->with('rkp_data','tpk_data')->get();

        return view('preparation.schedule.index', compact('announcement'));
    }

}
