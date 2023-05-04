<?php

namespace App\Http\Controllers;

use App\etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class etablissementControleur extends Controller
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
        $page="etablissements";
        $etabs=etablissement::toBase()->get();
        return view('etablissement.index',compact('page','etabs','et'));
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
        $etab=new etablissement();
        $etab->id=0;
        $etab->nomEtab=$request->nom;
        $etab->lieu=$request->lieu;
        $etab->save();
        return back()->with('success','L\'etablissement est enregistré avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function show(etablissement $etablissement)
    {
        //
    }

    
    public function edit($id)
    {
        $etab=etablissement::findorFail($id);
        return view('etablissement.edit',compact('etab'));
    }

  
    public function update(Request $request, $id)
    {
        DB::table('etablissements')->where('id',$id)->update([
            'nomEtab' => $request->nom,
            'lieu' => $request->lieu
        ]);
        return back()->with('success','L\'etablissement est modifié avec succes');

    }

   
    public function destroy($id)
    {
        $etab=etablissement::findorFail($id);
        $etab->delete();
        return 'ok';
    
    }
}
