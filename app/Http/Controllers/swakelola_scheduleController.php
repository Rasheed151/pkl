<?php

namespace App\Http\Controllers;

use App\Models\rkp_data;
use Illuminate\Http\Request;
use App\Models\swakelola_schedule;


class swakelola_scheduleController extends Controller
{
    public function index()
    {
        $swakelola_schedule = swakelola_schedule::where('user_id', auth()->id())->with('rkp_data')->get();

        return view('preparation.swakelola.schedule.index', compact('swakelola_schedule'));
    }

    public function edit($id)
    {
        $swakelola_schedule = swakelola_schedule::findOrFail($id);
        $rkp_data = rkp_data::where('id', $swakelola_schedule->rkp_id)->first();
        $implementation_time = $rkp_data->implementation_time;

        return view('preparation.swakelola.schedule.edit', compact('swakelola_schedule', 'implementation_time'));
    }

    public function update(Request $request, $id)
    {
        // Hitung jumlah checkbox yang dicentang
        $checkedCount = count($request->input('progress', []));

        // Perbarui nilai progress di tabel jadwal
        $swakelola_schedule = swakelola_schedule::find($id);
        $swakelola_schedule->progress = $checkedCount;
        $swakelola_schedule->save();

        return redirect()->route('swakelola_schedule.index')->with('success', 'Data berhasil diperbarui.')->with('success', 'Progres berhasil diperbarui');
    }
}
