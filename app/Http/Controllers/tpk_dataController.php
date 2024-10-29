<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tpk_data;

class tpk_dataController extends Controller
{
    public function index()
    {
        $tpk_data = tpk_data::where('user_id', auth()->id())->get();
        return view('general_data.tpk_data.index', compact('tpk_data'));
    }

    public function create()
    {
        return view('general_data.tpk_data.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tpk_group_name'=>'required',
            'head_name'=>'required',
            'head_gender'=>'required',
            'head_birth_date' => 'required',
            'head_birth_place' => 'required',
            'head_nik'=>'required',
            'head_address'=>'required',
            'head_phone_number'=>'required',
            'secretary_name'=>'required',
            'secretary_gender'=>'required',
            'secretary_birth_date' => 'required',
            'secretary_birth_place' => 'required',
            'secretary_nik'=>'required',
            'secretary_address'=>'required',
            'secretary_phone_number'=>'required',
            'member_name'=>'required',
            'member_gender'=>'required',
            'member_birth_date' => 'required',
            'member_birth_place' => 'required',
            'member_nik'=>'required',
            'member_address'=>'required',
            'member_phone_number'=>'required',
            'village_decree_number'=>'required',
            'village_decree_date'=>'required',
        ]);

        $head_birthplace_date = $request->input('head_birth_date') . ', ' . $request->input('head_birth_place');
        $secretary_birthplace_date = $request->input('secretary_birth_date') . ', ' . $request->input('secretary_birth_place');
        $member_birthplace_date = $request->input('member_birth_date') . ', ' . $request->input('member_birth_place');

        $data = $request->all();
        $data['head_birthplace_date'] = $head_birthplace_date;
        $data['secretary_birthplace_date'] = $secretary_birthplace_date;
        $data['member_birthplace_date'] = $member_birthplace_date;
        $data['user_id'] = auth()->id();

        // Simpan data
        tpk_data::create($data);

        return redirect()->route('tpk_data.index')
            ->with('success', 'Data umum created successfully.');
    }

    public function show(tpk_data $tpk_data)
    {
        if ($tpk_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('general_data.tpk_data.index', compact('tpk_data'));
    }

    public function edit($id)
    {
        $tpk_data = tpk_data::findOrFail($id);

        $head_birthplace_date = explode(', ', $tpk_data->head_birthplace_date);
        $head_birth_date = $head_birthplace_date[0] ?? '';
        $head_birth_place = $head_birthplace_date[1] ?? '';

        $secretary_birthplace_date = explode(', ', $tpk_data->secretary_birthplace_date);
        $secretary_birth_date = $secretary_birthplace_date[0] ?? '';
        $secretary_birth_place = $secretary_birthplace_date[1] ?? '';

        $member_birthplace_date = explode(', ', $tpk_data->member_birthplace_date);
        $member_birth_date = $member_birthplace_date[0] ?? '';
        $member_birth_place = $member_birthplace_date[1] ?? '';

        return view('general_data.tpk_data.edit', compact('tpk_data', 'head_birth_date', 'head_birth_place', 'secretary_birth_date', 'secretary_birth_place', 'member_birth_date', 'member_birth_place'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tpk_group_name'=>'required',
            'head_name'=>'required',
            'head_gender'=>'required',
            'head_birth_date' => 'required',
            'head_birth_place' => 'required',
            'head_nik'=>'required',
            'head_address'=>'required',
            'head_phone_number'=>'required',
            'secretary_name'=>'required',
            'secretary_gender'=>'required',
            'secretary_birth_date' => 'required',
            'secretary_birth_place' => 'required',
            'secretary_nik'=>'required',
            'secretary_address'=>'required',
            'secretary_phone_number'=>'required',
            'member_name'=>'required',
            'member_gender'=>'required',
            'member_birth_date' => 'required',
            'member_birth_place' => 'required',
            'member_nik'=>'required',
            'member_address'=>'required',
            'member_phone_number'=>'required',
            'village_decree_number'=>'required',
            'village_decree_date'=>'required',
        ]);

        $data = tpk_data::findOrFail($id);

        $head_birthplace_date = $request->input('head_birth_date') . ', ' . $request->input('head_birth_place');
        $secretary_birthplace_date = $request->input('secretary_birth_date') . ', ' . $request->input('secretary_birth_place');
        $member_birthplace_date = $request->input('member_birth_date') . ', ' . $request->input('member_birth_place');

        $data->update([
            'tpk_group_name' => $request->input('tpk_group_name'),
            'head_name' => $request->input('head_name'),
            'head_gender' => $request->input('head_gender'),
            'head_birthplace_date' => $head_birthplace_date,
            'head_nik' => $request->input('head_nik'),
            'head_address' => $request->input('head_address'),
            'head_phone_number' => $request->input('head_phone_number'),
            'secretary_name' => $request->input('secretary_name'),
            'secretary_gender' => $request->input('secretary_gender'),
            'secretary_birthplace_date' => $secretary_birthplace_date,
            'secretary_nik' => $request->input('secretary_nik'),
            'secretary_address' => $request->input('secretary_address'),
            'secretary_phone_number' => $request->input('secretary_phone_number'),
            'member_name' => $request->input('member_name'),
            'member_gender' => $request->input('member_gender'),
            'member_birthplace_date' => $member_birthplace_date,
            'member_nik' => $request->input('member_nik'),
            'member_address' => $request->input('member_address'),
            'member_phone_number' => $request->input('member_phone_number'),
            'village_decree_number' => $request->input('village_decree_number'),
            'village_decree_date' => $request->input('village_decree_date'),
            
        ]);

        return redirect()->route('tpk_data.index')->with('success', 'Data aparat berhasil diperbarui.');
    }

    public function destroy(tpk_data $tpk_data)
    {
        if ($tpk_data->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        $tpk_data->delete();

        return redirect()->route('tpk_data.index')
            ->with('success', 'Data Umum deleted successfully.');
    }
}
