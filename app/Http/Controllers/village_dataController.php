<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\village_data;

class village_dataController extends Controller
{
    public function index()
    {
        $village_data = village_data::where('user_id', auth()->id())->get();

        // Kirim data ke view
        return view('home', compact('village_data'));
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'district' => 'required',
            'subdistrict' => 'required',
            'village' => 'required',
            'village_code' => 'required',
            'office_address' => 'required',
            'email' => 'required',
            'npwp' => 'required',
            'pbj_decree_number' => 'required',
            'pbj_decree_date' => 'required',
            'dpa_approval_number' => 'required',
            'dpa_approval_date' => 'required',
            'village_head_name' => 'required',
            'fiscal_year' => 'required',
        ]);

        // Include the logged-in user ID
        village_data::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('home')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(village_data $village_data)
    {
        // Ensure the data belongs to the logged-in user
        if ($village_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('home', compact('village_data'));
    }

    public function edit(village_data $village_data)
    {
        // Ensure the data belongs to the logged-in user
        if ($village_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('home', compact('village_data'));
    }

    public function update(Request $request, $id)
    {
        // Ensure the data belongs to the logged-in user


        $request->validate([
            'district' => 'required',
            'subdistrict' => 'required',
            'village' => 'required',
            'village_code' => 'required',
            'office_address' => 'required',
            'email' => 'required',
            'npwp' => 'required',
            'pbj_decree_number' => 'required',
            'pbj_decree_date' => 'required',
            'dpa_approval_number' => 'required',
            'dpa_approval_date' => 'required',
            'village_head_name' => 'required',
            'fiscal_year' => 'required',
        ]);

        $village_data = village_data::findOrFail($id);
        $village_data->update($request->all());

        return redirect()->route('home.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(village_data $village_data)
    {
        // Ensure the data belongs to the logged-in user
        if ($village_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $village_data->delete();

        return redirect()->route('home.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
