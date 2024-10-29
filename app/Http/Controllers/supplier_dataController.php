<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier_data;

class supplier_dataController extends Controller
{
    public function index()
    {
        $supplier_data = supplier_data::where('user_id', auth()->id())->get();
        return view('general_data.supplier_data.index', compact('supplier_data'));
    }

    public function create()
    {
        return view('general_data.supplier_data.index');
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
            'company_name' => 'required',
            'company_address' => 'required',
            'phone_number' => 'required',
            'npwp' => 'required',
            'nib' => 'required',
        ]);

        $birthplace_date = $request->input('birth_date') . ', ' . $request->input('birth_place');

        $data = $request->all();
        $data['birthplace_date'] = $birthplace_date;
        $data['user_id'] = auth()->id();

        supplier_data::create($data);

        return redirect()->route('supplier_data.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(supplier_data $supplier_data)
    {

        return view('general_data.supplier_data.index', compact('supplier_data'));
    }

    public function edit($id)
    {
        $supplier_data = supplier_data::findOrFail($id);

        $birthplace_date = explode(', ', $supplier_data->birthplace_date);
        $birth_date = $birthplace_date[0] ?? '';
        $birth_place = $birthplace_date[1] ?? '';

        return view('general_data.supplier_data.edit', compact('supplier_data', 'birth_date', 'birth_place'));
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
            'company_name' => 'required',
            'company_address' => 'required',
            'phone_number' => 'required',
            'npwp' => 'required',
            'nib' => 'required',
        ]);

        $data = supplier_data::findOrFail($id);

        $birthplace_date = $request->input('birth_date') . ', ' . $request->input('birth_place');

        $data->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'birthplace_date' => $birthplace_date,
            'nik' => $request->input('nik'),
            'address' => $request->input('address'),
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'phone_number' => $request->input('phone_number'),
            'npwp' => $request->input('npwp'),
            'nib' => $request->input('nib'),

        ]);

        return redirect()->route('supplier_data.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = supplier_data::find($id); // Mencari item berdasarkan ID
        if ($item) {
            $item->delete(); // Menghapus item jika ditemukan
            return redirect()->route('supplier_data.index')->with('success', 'Item deleted successfully.');
        } else {
            return redirect()->route('supplier_data.index')->with('error', 'Item not found.');
        }
    }
}
