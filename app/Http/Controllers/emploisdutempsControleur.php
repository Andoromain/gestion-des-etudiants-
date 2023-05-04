<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class emploisdutempsControleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$et,$formation)
    {
        DB::table('emploisdutemps')->insert([
            'id_frtion'=>$formation,
            'id_etab'=>$et,
            'id_frteur'=>$request->formateur,
            'id_parc'=>$request->matiere,
            'jour'=>$request->jour,
            'heureDebut'=>$request->debut,
            'heureFin'=>$request->fin,
        ]);
        return back()->with('success','L\'emplois du temps est enregistré avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('emploisdutemps')->where('id',$request->id)->where('id_etab',$request->et)->where('id_frtion',$request->formation)->update([
            'id_frteur'=>$request->formateur,
            'id_parc'=>$request->matiere,
            'jour'=>$request->jour,
            'heureDebut'=>$request->debut,
            'heureFin'=>$request->fin,
        ]);
        return back()->with('success','l\'emplois du temps est modifié avec success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('emploisdutemps')->where('id',$id)->delete();
    }
    public function listeEt()
    {
        return view('emploidutemps.liste');
    }
}
