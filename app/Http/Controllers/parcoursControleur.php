<?php

namespace App\Http\Controllers;

use App\parcours;
use Illuminate\Http\Request;

class parcoursControleur extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($et)
    {
        $page="matières";
        $parcours=parcours::toBase()->get();
        return view('parcours.index',compact('page','et','parcours'));
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
        $parcours=new parcours();
        $parcours->nomP=$request->nom;
        $parcours->save();
        return back()->with('success','Le parcours est enregistrée avec succès');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function show(parcours $parcours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function edit(parcours $parcours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parcours $parcours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\parcours  $parcours
     * @return \Illuminate\Http\Response
     */
    public function destroy(parcours $parcours)
    {
        //
    }
}
