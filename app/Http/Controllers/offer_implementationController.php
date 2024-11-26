<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offer_implementation;
use App\Models\announcement;
use App\Models\rkp_data;

class offer_implementationController extends Controller
{
    public function index(Request $request)
    {
        $offer_implementation = offer_implementation::where('user_id', auth()->id())
            ->with('rkp_data')
            ->get();
    
        // Pastikan 'announcement' adalah nama model yang benar, atau sesuaikan dengan model yang digunakan
        $announcement = announcement::where('user_id', auth()->id())->where('procurement_method','Penyedia')
            ->with('rkp_data', 'tpk_data')->get();
            
        return view('implementation.offer.index', compact('offer_implementation', 'announcement'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_opening' => 'required',
            'time_opening' => 'required',
            'place_opening' => 'required',
            'date_evaluation' => 'required',
            'time_evaluation' => 'required',
            'place_evaluation' => 'required',
            'date_negotiation' => 'required',
            'time_negotiation' => 'required',
            'place_negotiation' => 'required',
            'information' => 'nullable',
            'rkp_id' => 'required',
        ]);

        $opening = $request->input('date_opening') . ', ' . $request->input('time_opening'). ', ' . $request->input('place_opening');
        $evaluation = $request->input('date_evaluation') . ', ' . $request->input('time_evaluation'). ', ' . $request->input('place_evaluation');
        $negotiation = $request->input('date_negotiation') . ', ' . $request->input('time_negotiation'). ', ' . $request->input('place_negotiation');


        // Simpan data ke database
        offer_implementation::create([
            'opening_time' => $opening,
            'evaluation_time' => $evaluation,
            'negotiation_time' => $negotiation,
            'rkp_id' => $request->rkp_id, // Dari form input
            'user_id' => auth()->id(), // Dari user yang login
            'information' => $request->information,
        ]);

        return redirect()->route('offer_implementation.index')
            ->with('success', 'Data Pengumuman Lelang berhasil ditambahkan');
    }

    public function show(offer_implementation $offer_implementation)
    {
        if ($offer_implementation->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('implementation.offer.index', compact('offer_implementation'));
    }

    public function edit($id)
    {
        $offer_implementation = offer_implementation::findOrFail($id);

        $data = offer_implementation::findOrFail($id);

        // Memisahkan tempat dan tanggal lahir
        $opening = explode(', ', $data->opening_time);
        $date_opening = $opening[0] ?? '';
        $time_opening = $opening[1] ?? '';
        $place_opening = $opening[2] ?? '';

        $evaluation = explode(', ', $data->evaluation_time);
        $date_evaluation = $evaluation[0] ?? '';
        $time_evaluation = $evaluation[1] ?? '';
        $place_evaluation = $evaluation[2] ?? '';

        $negotiation = explode(', ', $data->negotiation_time);
        $date_negotiation = $negotiation[0] ?? '';
        $time_negotiation = $negotiation[1] ?? '';
        $place_negotiation = $negotiation[2] ?? '';

        return view('implementation.offer.edit', compact('offer_implementation', 'date_opening', 'time_opening', 'place_opening', 'date_evaluation', 'time_evaluation', 'place_evaluation', 'date_negotiation', 'time_negotiation', 'place_negotiation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
         'date_opening' => 'required',
            'time_opening' => 'required',
            'place_opening' => 'required',
            'date_evaluation' => 'required',
            'time_evaluation' => 'required',
            'place_evaluation' => 'required',
            'date_negotiation' => 'required',
            'time_negotiation' => 'required',
            'place_negotiation' => 'required',
            'information' => 'nullable',
        ]);

        // Temukan data aparat berdasarkan ID
        $data = offer_implementation::findOrFail($id);

        // Gabungkan tempat lahir dan tanggal lahir
        $opening = $request->input('date_opening') . ', ' . $request->input('time_opening'). ', ' . $request->input('place_opening');
        $evaluation = $request->input('date_evaluation') . ', ' . $request->input('time_evaluation'). ', ' . $request->input('place_evaluation');
        $negotiation = $request->input('date_negotiation') . ', ' . $request->input('time_negotiation'). ', ' . $request->input('place_negotiation');

        // Update data
        $data->update([
           'opening_time' => $opening,
            'evaluation_time' => $evaluation,
            'negotiation_time' => $negotiation,
            'information' => $request->information,
        ]);

        return redirect()->route('offer_implementation.index')->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
    }

    public function destroy( $id)
    {
        $offer_implementation = offer_implementation::findOrFail($id);

        $offer_implementation->delete();

        return redirect()->route('offer_implementation.index')
            ->with('success', 'Data Umum deleted successfully.');
    }

}
