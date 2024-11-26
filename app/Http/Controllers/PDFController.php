<?php

namespace App\Http\Controllers;

// Atau, jika Laravel versi 9 ke atas

use FPDF;
use App\Models\village_data;
use Illuminate\Http\Request;
use App\Models\bamusrenbangdes;
use App\Models\rkp_data;
use App\Models\technical_specifications;
use App\Models\kak_data;
use App\Models\announcement;
use App\Models\price_analysis;
use App\Models\auction_announcements;
use App\Models\price_estimate;
use App\Models\pengumuman_lelang;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class PDFController extends Controller
{

    public function bamusrenbangdes($id)
    {
        $data = bamusrenbangdes::find($id);
        $id = Auth::id();
        $village_data = village_data::where('user_id', $id)->first();

        // Tampilkan HTML untuk preview
        $pdf = PDF::loadView('planning.bamusrenbangdes.pdf', compact('data', 'village_data'));

        // Set ukuran kertas ke A4 untuk preview
        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('preview.pdf');
    }

    public function rkp($user_id) // Menangkap parameter $user_id dari route
    {
        // Mengambil satu entitas rkp_data berdasarkan user_id
        $rkp_data = rkp_data::where('user_id', auth()->id())->get();
        $village_data = village_data::where('user_id', $user_id)->firstOrFail(); // Pastikan data village_data ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('planning.rkp_data.pdf', compact('rkp_data', 'village_data'));

        return $pdf->stream('data RKP ' . $village_data->fiscal_year . '.pdf');
    }

    public function announcement($user_id) // Menangkap parameter $user_id dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan user_id
        $announcement = announcement::where('user_id', auth()->id())->get();
        $village_data = village_data::where('user_id', $user_id)->firstOrFail(); // Pastikan data village_data ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('planning.announcement.pdf', compact('announcement', 'village_data'));

        return $pdf->stream('data Pengumuman Acara ' . $village_data->fiscal_year . '.pdf');
    }

    public function Schedule($id) // Menangkap parameter $user_id dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan user_id
        $announcement = announcement::find($id);
        $id = Auth::id();
        $village_data = village_data::where('user_id', $id)->first(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('preparation.supplier.schedule.pdf', compact('announcement', 'village_data'));

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream('data jadwal Acara ' . $announcement->rkp_data->activity_name . '.pdf');
    }

    public function kak($id) // Menangkap parameter $user_id dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan user_id
        $kak = kak_data::find($id);
        $id = Auth::id();
        $village_data = village_data::where('user_id', $id)->first(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('preparation.supplier.kak_data.pdf', compact('kak', 'village_data'));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('data kak Acara ' . $kak->rkp_data->activity_name . '.pdf');
    }

    public function technical_specifications($rkp_id)
    {
        // Ambil semua data technical_specifications terkait dengan $rkp_id
        $technical_specifications = technical_specifications::where('rkp_id', $rkp_id)->get();

        $id = Auth::id();
        $village_data = village_data::where('user_id', $id)->first(); // Pastikan data desa ditemukan

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('preparation.supplier.technical_specifications.pdf', compact('technical_specifications', 'village_data'));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('data teknis ' . ($technical_specifications->first()->rkp_data->activity_name ?? 'default') . '.pdf');
    }

    public function price_analysis($rkp_id)
    {
        // Mengambil data dari tabel `price_analysis` dan mengelompokkannya berdasarkan `type` dari relasi `technical_specifications`
        $price_analysis_Tenaga_Kerja = price_analysis::where('rkp_id', $rkp_id)
            ->whereHas('technical_specifications', function ($query) {
                $query->where('type', 'Tenaga Kerja');
            })
            ->get();

        $price_analysis_Bahan = price_analysis::where('rkp_id', $rkp_id)
            ->whereHas('technical_specifications', function ($query) {
                $query->where('type', 'Bahan');
            })
            ->get();

        $price_analysis_Peralatan = price_analysis::where('rkp_id', $rkp_id)
            ->whereHas('technical_specifications', function ($query) {
                $query->where('type', 'Peralatan');
            })
            ->get();

        // Hitung total harga untuk masing-masing tipe
        $total_price_Tenaga_Kerja = $price_analysis_Tenaga_Kerja->sum('total_price');
        $total_price_Bahan = $price_analysis_Bahan->sum('total_price');
        $total_price_Peralatan = $price_analysis_Peralatan->sum('total_price');
        $total_price = $total_price_Tenaga_Kerja + $total_price_Bahan + $total_price_Peralatan;
        $total_price_extends =  $total_price * 0.15;
        $total_price_end = $total_price + $total_price_extends;

        // Ambil data desa berdasarkan ID pengguna saat ini
        $id = Auth::id();
        $village_data = village_data::where('user_id', $id)->first();

        // Membuat PDF dengan data yang sudah difilter
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('preparation.supplier.price_analysis.pdf', compact(
            'price_analysis_Tenaga_Kerja',
            'price_analysis_Bahan',
            'price_analysis_Peralatan',
            'village_data',
            'total_price_Tenaga_Kerja',
            'total_price_Bahan',
            'total_price_Peralatan',
            'total_price',
            'total_price_extends',
            'total_price_end',
        ));

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream('data analisa harga ' . ($price_analysis_Peralatan->first()->rkp_data->activity_name ?? 'default') . '.pdf');
    }

    public function price_estimate($rkp_id)
{
    // Ambil semua data technical_specifications terkait dengan $rkp_id
    $price_estimate = price_estimate::where('rkp_id', $rkp_id)->get();
    $total_price = $price_estimate->sum('total_price');
    $ppn = $total_price * 0.11;
    $total_price_end = $total_price + $ppn;

    
    $id = Auth::id();
    $village_data = village_data::where('user_id', $id)->first(); // Pastikan data desa ditemukan

    // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('preparation.supplier.price_estimate.pdf', compact('price_estimate', 'total_price','ppn','total_price_end','village_data'));

    $pdf->setPaper('A4', 'portrait');

    return $pdf->stream('data teknis ' . ($price_estimate->first()->rkp_data->activity_name ?? 'default') . '.pdf');
}



    public function auction_announcements($id,$rkp_id) // Menangkap parameter $user_id dari route
    {
        // Mengambil satu entitas data_rkp berdasarkan user_id
        $data = auction_announcements::find($id);
        $id = Auth::id();
        $village_data = village_data::where('user_id', $id)->first();

        $announcement = explode(', ', $data->announcement_time);
        $date_announcement = $announcement[0] ?? '';
        $time_announcement = $announcement[1] ?? '';
        $place_announcement = $announcement[2] ?? '';
        $announcement_day = Carbon::parse($date_announcement)->format('l');

        $registration = explode(', ', $data->registration_time);
        $date_registration = $registration[0] ?? '';
        $time_registration = $registration[1] ?? '';
        $place_registration = $registration[2] ?? '';
        $registration_day = Carbon::parse($date_registration)->format('l');

        $submission = explode(', ', $data->submission_time);
        $date_submission = $submission[0] ?? '';
        $time_submission = $submission[1] ?? '';
        $place_submission = $submission[2] ?? '';
        $submission_day = Carbon::parse($date_submission)->format('l');

        $evaluation = explode(', ', $data->evaluation_time);
        $date_evaluation = $evaluation[0] ?? '';
        $time_evaluation = $evaluation[1] ?? '';
        $place_evaluation = $evaluation[2] ?? '';
        $evaluation_day = Carbon::parse($date_evaluation)->format('l');

        $negotiation = explode(', ', $data->negotiation_time);
        $date_negotiation = $negotiation[0] ?? '';
        $time_negotiation = $negotiation[1] ?? '';
        $place_negotiation = $negotiation[2] ?? '';
        $negotiation_day = Carbon::parse($date_negotiation)->format('l');

        $decision = explode(', ', $data->decision_time);
        $date_decision = $decision[0] ?? '';
        $time_decision = $decision[1] ?? '';
        $place_decision = $decision[2] ?? '';
        $decision_day = Carbon::parse($date_decision)->format('l');

        $price_estimate = price_estimate::where('rkp_id', $rkp_id)->get();
        $total_price = $price_estimate->sum('total_price');

        // Membuat PDF dan mengembalikannya untuk ditampilkan di browser
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('implementation.auction.pdf', compact('data', 'village_data', 'date_announcement', 'time_announcement', 'place_announcement', 'date_registration', 'time_registration', 'place_registration', 'date_submission', 'time_submission', 'place_submission', 'date_evaluation', 'time_evaluation', 'place_evaluation', 'date_negotiation', 'time_negotiation','place_negotiation', 'date_decision', 'time_decision', 'place_decision','announcement_day','registration_day','submission_day','evaluation_day','negotiation_day','decision_day','total_price'));

        return $pdf->stream('data Pengumuman_lelang Acara .pdf');
    }



    public function previewBamusrenbangdes($id)
{
    $data = bamusrenbangdes::find($id);
    $user_id = Auth::id();
    $village_data = village_data::where('user_id', $user_id)->first();

    // Load view untuk preview PDF
    $pdf = PDF::loadView('planning.bamusrenbangdes.pdf', compact('data', 'village_data'));

    // Set ukuran kertas ke A4 dengan orientasi landscape
    $pdf->setPaper('A4', 'landscape');

    // Return stream untuk ditampilkan sebagai PDF di dalam iframe
    return $pdf->stream('preview.pdf');
}

}
