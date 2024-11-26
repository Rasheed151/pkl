<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\village_data;
use App\Models\officials_data;
use App\Models\pka_data;

class adminController extends Controller
{
    public function index()
    {
        $user = user::all();

        return view('admin.index', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
        ]);

        village_data::create([
            'province' => 'provinsi',
            'district' => 'kabupaten',
            'subdistrict' => 'kecamatan',
            'village' => 'desa',
            'village_code' => '123',
            'office_address' => 'alamat_kantor',
            'email' => 'email@gmail.com',
            'npwp' => 'npwp',
            'pbj_decree_number' => 'no_tahun_perpub_pjb',
            'pbj_decree_date' => '2024-08-20',
            'dpa_approval_number' => 'no_pengesahan_dpa',
            'dpa_approval_date' => '2024-08-20',
            'village_head_name' => 'nama_kades',
            'fiscal_year' => '2024-08-19',
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.index')
            ->with('success', 'Data umum created successfully.');
    }


    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus.');
    }

    public function edit($id)
    {
        // Mengambil data berdasarkan user_id
        $village_data = village_data::where('user_id', $id)->first();

        return view('admin.edit', compact('village_data'));
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

        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function choose($id)
    {

        $user_id = $id;

        return view('admin.choose', compact('user_id'));
    }

    public function officials_data($user_id)
    {
        $officials_data = officials_data::where('user_id', $user_id)->get();

        return view('general_data.officials_data.index', compact('officials_data'));
    }

    public function pka_data($user_id)
    {
        $pka_data = pka_data::where('user_id', $user_id)->get();
        $officials_data = officials_data::where('user_id', $user_id)->get();
        return view('general_data.pka_data.index', compact('pka_data','officials_data'));
    }
}
