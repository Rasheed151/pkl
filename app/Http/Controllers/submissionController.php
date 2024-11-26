<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class submissionController extends Controller
{
    public function index(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); 
        $activity_name = $request->query('activity_name'); 
        return view('submission.supplier.index', compact( 'rkp_id','activity_name'));
    }

    public function index_swakelola(Request $request)
    {
        $rkp_id = $request->query('rkp_id'); 
        $activity_name = $request->query('activity_name'); 
        return view('submission.swakelola.index', compact( 'rkp_id','activity_name'));
    }
}
