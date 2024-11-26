<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\technical_specifications;
use App\Models\announcement;

class technical_specificationsController extends Controller
{
    public function index(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        $activity_name = $request->query('activity_name'); // Ambil activity_name dari query string jika dibutuhkan
        $technical_specifications = technical_specifications::where('rkp_id', $rkp_id)->get();
        $announcement = announcement::where('rkp_id', $rkp_id)->whereHas('rkp_data', function ($query) use ($activity_name) {
            $query->where('activity_name', $activity_name);
        })->first();

        return view('preparation.supplier.technical_specifications.index', compact('technical_specifications', 'rkp_id', 'activity_name'));
    }

    // Tampilkan form untuk menambah spesifikasi teknis
    public function create(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        return view('preparation.supplier.technical_specifications.index', compact('rkp_id'));
    }

    // Simpan spesifikasi teknis baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'specification' => 'required',
            'type' => 'required',
            'rkp_id' => 'required',
        ]);

        // Simpan data ke database
        technical_specifications::create([
            'name' => $request->name,
            'specification' => $request->specification,
            'type' => $request->type,
            'rkp_id' => $request->rkp_id, // Dari form input
            'user_id' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('technical_specifications.index', ['rkp_id' => $request->rkp_id])
            ->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
    }

    public function edit($id)
    {
        $technical_specifications = technical_specifications::findOrFail($id);
        $rkp_id = $technical_specifications->rkp_id; // Ambil rkp_id dari data teknis
        $name_activity = technical_specifications::where('user_id', auth()->id())->with('rkp_data')->first();


        return view('preparation.supplier.technical_specifications.edit', compact('technical_specifications', 'rkp_id', 'name_activity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'specification' => 'required',
            'type' => 'required',
        ]);

        // Temukan data berdasarkan ID
        $data = technical_specifications::findOrFail($id);

        // Update data
        $data->update($request->all());

        // Ambil rkp_id dan activity_name dari data yang diupdate
        $rkp_id = $data->rkp_id;
        $activity_name = $data->nama;

        // Redirect ke halaman index dengan parameter rkp_id dan activity_name
        return redirect()->route('technical_specifications.index', [
            'rkp_id' => $rkp_id,
            'activity_name' => $activity_name
        ])->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
    }

    // Hapus spesifikasi teknis
    public function destroy($id)
    {
        $technical_specifications = technical_specifications::findOrFail($id);
        $rkp_id = $technical_specifications->rkp_id;

        $technical_specifications->delete();

        return redirect()->route('technical_specifications.index', ['rkp_id' => $rkp_id])
            ->with('success', 'Data spesifikasi teknis berhasil dihapus');
    }
}
