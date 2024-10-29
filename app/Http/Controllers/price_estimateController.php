<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\price_estimate;       
class price_estimateController extends Controller
{
    public function index(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); // Ambil rkp_id dari query string
        $activity_name = $request->query('activity_name'); // Ambil activity_name dari query string jika dibutuhkan
        $price_estimate = price_estimate::where('rkp_id', $rkp_id)->get();
    
        return view('preparation.price_estimate.index', compact( 'rkp_id','activity_name','price_estimate'));
    }
    
        
        public function create(Request $request)
        {
            $rkp_id = $request->query('rkp_id'); 
            return view('preparation.price_estimate.index', compact('rkp_id'));
        }
    
        
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'specification' => 'required',
                'volume' => 'required',
                'unit' => 'required',
                'unit_price' => 'required',
                'rkp_id' => 'required',
            ]);

            

            price_estimate::create([
                'name' => $request->name,
                'specification' => $request->specification,
                'volume'=> $request->volume,
                'unit'=> $request->unit,
                'unit_price'=> $request->unit_price,
                'total_price' =>  $request->unit_price * $request->volume,
                'rkp_id' => $request->rkp_id, // Dari form input
                'user_id' => auth()->id(), // Dari user yang login
            ]);
    
            return redirect()->route('price_estimate.index', ['rkp_id' => $request->rkp_id])
                ->with('success', 'Data spesifikasi teknis berhasil ditambahkan');
        }
    
        // Hapus spesifikasi teknis
        public function destroy($id)
        {
            $price_estimate = price_estimate::findOrFail($id);
            $rkp_id = $price_estimate->rkp_id;
    
            $price_estimate->delete();
    
            return redirect()->route('price_estimate.index', ['rkp_id' => $rkp_id])
                ->with('success', 'Data spesifikasi teknis berhasil dihapus');
        }

}
