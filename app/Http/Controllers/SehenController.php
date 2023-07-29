<?php

namespace App\Http\Controllers;

use App\Sehen;
use Illuminate\Http\Request;

class SehenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shnAll = Sehen::all();
        $shn = Sehen::orderBy('id','ASC')->paginate(2);
        return view('sehen.index')->with(['sehen'=>$shn,'alle'=>$shnAll]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sehen  $sehen
     * @return \Illuminate\Http\Response
     */
    public function show(Sehen $sehen)
    {
        return view('sehen.show')->with('row',$sehen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sehen  $sehen
     * @return \Illuminate\Http\Response
     */
    public function edit(Sehen $sehen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sehen  $sehen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sehen $sehen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sehen  $sehen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sehen $sehen)
    {
        //
    }
}
