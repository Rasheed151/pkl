<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kak_data;
use App\Models\announcement;
use App\Models\rkp_data;

class kak_dataController extends Controller
{
    public function index()
    {
        $kak_data = kak_data::where('user_id', auth()->id())->with('rkp_data','announcement')->get();
        $announcement = announcement::where('user_id', auth()->id())->with('rkp_data','tpk_data')->get();
        $rkp_data = rkp_data::where('user_id', auth()->id())->get();
        return view('preparation.kak_data.index', compact('kak_data','announcement','rkp_data'));
    }

    public function create()
    {

        return view('preparation.kak_data.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rkp_id' => 'required',
            'background' => 'required',
        ]);

        kak_data::create($request->merge(['user_id' => auth()->id()])->all());

        return redirect()->route('kak_data.index')
            ->with('success', 'Data umum created successfully.');
    }
    

    public function show(kak_data $kak_data)
    {
        if ($kak_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('preparation.kak_data.index', compact('kak_data'));
    }

    public function edit($id)
    {
        $kak_data = kak_data::findOrFail($id);

        return view('preparation.kak_data.edit', compact('kak_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'background' => 'required|',
        ]);

        $data = kak_data::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('kak_data.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(announcement $announcement)
    {
        if ($announcement->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $announcement->delete();

        return redirect()->route('kak_data.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
