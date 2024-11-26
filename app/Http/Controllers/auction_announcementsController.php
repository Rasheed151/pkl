<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auction_announcements;
use App\Models\announcement;
use App\Models\rkp_data;
use App\Models\price_estimate;


class auction_announcementsController extends Controller
{
    public function index(Request $request)
{
    $auction_announcements = auction_announcements::where('user_id', auth()->id())
        ->with('rkp_data')
        ->get();

    // Pastikan 'announcement' adalah nama model yang benar, atau sesuaikan dengan model yang digunakan
    $announcement = announcement::where('user_id', auth()->id())
        ->with('rkp_data', 'tpk_data')
        ->where('procurement_method','Penyedia')->get();


    return view('implementation.auction.index', compact('auction_announcements', 'announcement'));
}

    

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'date_announcement' => 'required',
            'time_announcement' => 'required',
            'place_announcement' => 'required',
            'date_registration' => 'required',
            'time_registration' => 'required',
            'place_registration' => 'required',
            'date_income' => 'required',
            'time_income' => 'required',
            'place_income' => 'required',
            'date_evaluation' => 'required',
            'time_evaluation' => 'required',
            'place_evaluation' => 'required',
            'date_negotiation' => 'required',
            'time_negotiation' => 'required',
            'place_negotiation' => 'required',
            'date_placement' => 'required',
            'time_placement' => 'required',
            'place_placement' => 'required',
            'rkp_id' => 'required',
        ]);

        $announcement = $request->input('date_announcement') . ', ' . $request->input('time_announcement'). ', ' . $request->input('place_announcement');
        $registration = $request->input('date_registration') . ', ' . $request->input('time_registration'). ', ' . $request->input('place_registration');
        $income = $request->input('date_income') . ', ' . $request->input('time_income'). ', ' . $request->input('place_income');
        $evaluation = $request->input('date_evaluation') . ', ' . $request->input('time_evaluation'). ', ' . $request->input('place_evaluation');
        $negotiation = $request->input('date_negotiation') . ', ' . $request->input('time_negotiation'). ', ' . $request->input('place_negotiation');
        $placement = $request->input('date_placement') . ', ' . $request->input('time_placement'). ', ' . $request->input('place_placement');


        // Simpan data ke database
        auction_announcements::create([
            'announcement_time' => $announcement,
            'registration_time' => $registration,
            'submission_time' => $income,
            'evaluation_time' => $evaluation,
            'negotiation_time' => $negotiation,
            'decision_time' => $placement,
            'rkp_id' => $request->rkp_id, // Dari form input
            'user_id' => auth()->id(), // Dari user yang login
        ]);

        return redirect()->route('auction_announcements.index')
            ->with('success', 'Data Pengumuman Lelang berhasil ditambahkan');
    }

    public function show(auction_announcements $auction_announcements)
    {
        if ($auction_announcements->userId !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        return view('implementation.auction.index', compact('auction_announcements'));
    }


    public function edit($id)
    {
        $auction_announcements = auction_announcements::findOrFail($id);

        $data = auction_announcements::findOrFail($id);

        // Memisahkan tempat dan tanggal lahir
        $announcement = explode(', ', $data->announcement_time);
        $date_announcement = $announcement[0] ?? '';
        $time_announcement = $announcement[1] ?? '';
        $place_announcement = $announcement[2] ?? '';

        $registration = explode(', ', $data->registration_time);
        $date_registration = $registration[0] ?? '';
        $time_registration = $registration[1] ?? '';
        $place_registration = $registration[2] ?? '';

        $income = explode(', ', $data->submission_time);
        $date_income = $income[0] ?? '';
        $time_income = $income[1] ?? '';
        $place_income = $income[2] ?? '';

        $evaluation = explode(', ', $data->evaluation_time);
        $date_evaluation = $evaluation[0] ?? '';
        $time_evaluation = $evaluation[1] ?? '';
        $place_evaluation = $evaluation[2] ?? '';

        $negotiation = explode(', ', $data->negotiation_time);
        $date_negotiation = $negotiation[0] ?? '';
        $time_negotiation = $negotiation[1] ?? '';
        $place_negotiation = $negotiation[2] ?? '';

        $placement = explode(', ', $data->decision_time);
        $date_placement = $placement[0] ?? '';
        $time_placement = $placement[1] ?? '';
        $place_placement = $placement[2] ?? '';

        return view('implementation.auction.edit', compact('auction_announcements', 'date_announcement', 'time_announcement', 'place_announcement', 'date_registration', 'time_registration', 'place_registration', 'date_income', 'time_income', 'place_income', 'date_evaluation', 'time_evaluation', 'place_evaluation', 'date_negotiation', 'time_negotiation', 'place_negotiation', 'date_placement', 'time_placement', 'place_placement'));

        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
          'date_announcement' => 'required',
            'time_announcement' => 'required',
            'place_announcement' => 'required',
            'date_registration' => 'required',
            'time_registration' => 'required',
            'place_registration' => 'required',
            'date_income' => 'required',
            'time_income' => 'required',
            'place_income' => 'required',
            'date_evaluation' => 'required',
            'time_evaluation' => 'required',
            'place_evaluation' => 'required',
            'date_negotiation' => 'required',
            'time_negotiation' => 'required',
            'place_negotiation' => 'required',
            'date_placement' => 'required',
            'time_placement' => 'required',
            'place_placement' => 'required',
        ]);

        // Temukan data aparat berdasarkan ID
        $data = auction_announcements::findOrFail($id);

        // Gabungkan tempat lahir dan tanggal lahir
        $announcement = $request->input('date_announcement') . ', ' . $request->input('time_announcement'). ', ' . $request->input('place_announcement');
        $registration = $request->input('date_registration') . ', ' . $request->input('time_registration'). ', ' . $request->input('place_registration');
        $income = $request->input('date_income') . ', ' . $request->input('time_income'). ', ' . $request->input('place_income');
        $evaluation = $request->input('date_evaluation') . ', ' . $request->input('time_evaluation'). ', ' . $request->input('place_evaluation');
        $negotiation = $request->input('date_negotiation') . ', ' . $request->input('time_negotiation'). ', ' . $request->input('place_negotiation');
        $placement = $request->input('date_placement') . ', ' . $request->input('time_placement'). ', ' . $request->input('place_placement');

        // Update data
        $data->update([
            'announcement_time' => $announcement,
            'registration_time' => $registration,
            'submission_time' => $income,
            'evaluation_time' => $evaluation,
            'negotiation_time' => $negotiation,
            'decision_time' => $placement,
        ]);

        return redirect()->route('auction_announcements.index')->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
    }

    public function destroy( $id)
    {
        $auction_announcements = auction_announcements::findOrFail($id);

        $auction_announcements->delete();

        return redirect()->route('auction_announcements.index')
            ->with('success', 'Data Umum deleted successfully.');
    }

}
