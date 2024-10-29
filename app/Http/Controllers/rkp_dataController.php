<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rkp_data ;
use App\Models\officials_data;
use DateTime;

class rkp_dataController extends Controller
{
    public function index()
    {
        $rkp_data = rkp_data::where('user_id', auth()->id())->with('officials_data')->get();
        $officials_data = officials_data::where('user_id', auth()->id())->get();
        return view('planning.rkp_data.index', compact('rkp_data','officials_data'));
    }

    public function create()
    {
        return view('planning.rkp_data.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'field' => 'required',
            'sub_field' => 'required',
            'activity_name' => 'required',
            'activity_location' => 'required',
            'volume' => 'required',
            'unit' => 'nullable',
            'benefit_target' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:tanggal_awal',
            'total_cost' => 'required|numeric',
            'funding_source' => 'required',
            'self_management' => 'nullable|boolean',
            'village_cooperation' => 'nullable|boolean',
            'third_party' => 'nullable|boolean',
            'officials_id' => 'required',
        ]);

        $volume = $request->input('volume') . ', ' . $request->input('unit');;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Menghitung jumlah hari
        $date1 = new DateTime($startDate);
        $date2 = new DateTime($endDate);
        $difference = $date2->diff($date1);
        $number_of_days = $difference->days;
    
        $data = $request->all();
        $data['self_management'] = $request->input('self_management', 0); 
        $data['village_cooperation'] = $request->input('village_cooperation', 0);
        $data['third_party'] = $request->input('third_party', 0);
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['volume'] = $volume;
        $data['implementation_time'] = $number_of_days;
    
        rkp_data::create(array_merge($data, ['user_id' => auth()->id()]));
    
        return redirect()->route('rkp_data.index')->with('success', 'Data RKP berhasil ditambahkan.');
    }
    
    


    

    public function show(rkp_data $rkp)
    {
        if ($rkp->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('planning.rkp_data.index', compact('rkp'));
    }

    public function edit($id)
    {
        $rkp_data = rkp_data::findOrFail($id);
        $officials_data = officials_data::where('user_id', auth()->id())->get();
    
            $volumeParts = explode(', ', $rkp_data->volume);
            $volume = $volumeParts[0] ?? '';  // Ambil volume
            $unit = $volumeParts[1] ?? '';   // Ambil satuan

    
        return view('planning.rkp_data.edit', compact('rkp_data', 'officials_data', 'volume', 'unit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
           'field' => 'required',
            'sub_field' => 'required',
            'activity_name' => 'required',
            'activity_location' => 'required',
            'volume' => 'required',
            'unit' => 'nullable',
            'benefit_target' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:tanggal_awal',
            'total_cost' => 'required|numeric',
            'funding_source' => 'required',
            'self_management' => 'nullable|boolean',
            'village_cooperation' => 'nullable|boolean',
            'third_party' => 'nullable|boolean',
            'officials_id' => 'required',
        ]);

            $volume = $request->input('volume') . ', ' . $request->input('unit');

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // Menghitung jumlah hari
        $date1 = new DateTime($startDate);
        $date2 = new DateTime($endDate);
        $difference = $date2->diff($date1);
        $number_of_days = $difference->days;

       

        $data = $request->all();
        $data['self_management'] = $request->input('self_management', 0); 
        $data['village_cooperation'] = $request->input('village_cooperation', 0);
        $data['third_party'] = $request->input('third_party', 0);
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        $data['volume'] = $volume;
        $data['implementation_time'] = $number_of_days;
    
        $update = rkp_data::findOrFail($id);
    
        $update->update($data);
    
        return redirect()->route('rkp_data.index')
            ->with('success', 'Data aparat updated successfully.');
    }
    

    public function destroy($id)
    {
        $rkp_data = rkp_data::findOrFail($id);
        $rkp_data->delete();
    
        return redirect()->route('rkp_data.index')->with('success', 'Data berhasil dihapus.');
    }

}
