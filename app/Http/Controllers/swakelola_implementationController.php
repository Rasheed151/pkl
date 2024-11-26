<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\rkp_data;
use App\Models\swakelola_implementation;


class swakelola_implementationController extends Controller
{
    public function index()
    {
        $swakelola_implementation = swakelola_implementation::where('user_id', auth()->id())->with('rkp_data')->get();
        $announcement = announcement::where('user_id', auth()->id())->where('procurement_method','swakelola')->get();

        return view('implementation.swakelola.index', compact('announcement', 'swakelola_implementation'));
    }

    public function store(){
        $data = request()->validate([
            'discussion' => 'required',
            'follow_up' => 'required',
            'rkp_id' => 'required',
        ]);

        $data['user_id'] = auth()->id();

        swakelola_implementation::create($data);

        return redirect()->route('swakelola_implementation.index');
    }
    
    public function show($id){
        $swakelola_implementation = swakelola_implementation::find($id);
        return view('implementation.swakelola.show', compact('swakelola_implementation'));
    }

    public function edit($id){
        $swakelola_implementation = swakelola_implementation::find($id);
        return view('implementation.swakelola.edit', compact('swakelola_implementation'));
    }

    public function update($id){
        $data = request()->validate([
            'discussion' => 'required',
            'follow_up' => 'required',
        ]);

        $swakelola_implementation = swakelola_implementation::find($id);
        $swakelola_implementation->update($data);

        return redirect()->route('swakelola_implementation.index');
    }

    public function destroy($id){
        $swakelola_implementation = swakelola_implementation::find($id);
        $swakelola_implementation->delete();

        return redirect()->route('swakelola_implementation.index');
    }
}
