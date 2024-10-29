<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officials_data;

class officials_dataController extends Controller
{
    public function index()
    {
        $officials_data = officials_data::where('user_id', auth()->id())->get();
        return view('general_data/officials_data/index', compact('officials_data'));
    }

    public function create()
    {
        return view('general_data/officials_data/index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'nik' => 'required',
            'address' => 'required',
            'npwp' => 'required',
            'phone_number' => 'required',
            'position' => 'required',
        ]);

        // Gabungkan tempat dan tanggal lahir
        $birthplace_date = $request->input('birth_date') . ', ' . $request->input('birth_place');
        // Buat array data baru dengan tempat_tanggal_lahir yang digabungkan
        $data = $request->all();
        $data['birthplace_date'] = $birthplace_date;
        $data['user_id'] = auth()->id();

        // Simpan data
        officials_data::create($data);

        return redirect()->route('officials_data.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(officials_data $officials_data)
    {
        if ($officials_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('general_data/officials_data/index', compact('officials_data'));
    }

    public function edit($id)
    {
        $officials_data = officials_data::findOrFail($id);

        $birthplace_date = explode(', ', $officials_data->birthplace_date);
        $birth_date = $birthplace_date[0] ?? '';
        $birth_place = $birthplace_date[1] ?? '';

        return view('general_data/officials_data/edit', compact('officials_data', 'birth_place', 'birth_date'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'nik' => 'required',
            'address' => 'required',
            'npwp' => 'required',
            'phone_number' => 'required',
            'position' => 'required',
        ]);

        // Temukan data aparat berdasarkan ID
        $data = officials_data::findOrFail($id);

        // Gabungkan tempat lahir dan tanggal lahir
        $birthplace_date = $request->input('birth_date') . ', ' . $request->input('birth_place');

        // Update data
        $data->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birthplace_date' => $birthplace_date,
            'nik' => $request->input('nik'),
            'address' => $request->input('address'),
            'npwp' => $request->input('npwp'),
            'phone_number' => $request->input('phone_number'),
            'position' => $request->input('position'),
        ]);

        return redirect()->route('officials_data.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(officials_data $officials_data)
    {
        if ($officials_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $officials_data->delete();

        return redirect()->route('officials_data.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
