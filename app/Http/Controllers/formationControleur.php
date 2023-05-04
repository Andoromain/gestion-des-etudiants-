<?php

namespace App\Http\Controllers;

use App\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formationControleur extends Controller
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
    public function index(Request $request,$et)
    {
        //$etabs=etablissement::toBase()->get();
        if($request->formation=='court'){
            $page="formations courts";
            $formations=formation::toBase()->where('type','court')->get();
            return view('formation.indexCourt',compact('page','et','formations'));
        }else{
            $page="formations longs";
            $formations=formation::toBase()->where('type','long ')->get();
            return view('formation.indexLong',compact('page','et','formations'));
        }
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
        if($request->debut>=$request->fin)
        {
            return back()->with('error','La date debut est plus recent que la date fin');
        }else{
            if($request->formation=='court'){
                //court
                //dd($request);
                $formation=new formation();
                //$formation->nomFormation=$request->nom;
                $formation->debut=$request->debut;
                $formation->fin=$request->fin;
                $formation->ecolage=$request->droit;
                $formation->type='court';
                $formation->save();
                return back()->with('success','La formation est enregistrée avec succès');
            }else{
                //long
                $formation=new formation();
                //$formation->nomFormation=$request->nom;
                $formation->debut=$request->debut;
                $formation->fin=$request->fin;
                $formation->ecolage=$request->droit;
                $formation->type='long';
                $formation->save();
                return back()->with('success','La formation est enregistrée avec succès');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(formation $formation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation=formation::findorFail($id);
        //return $formateur;
        return view('formation.edit',compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        DB::table('formations')->where('id',$id)->update([
            'debut' => $request->debut,
            'fin' => $request->fin,
            'type' => $request->formation,
            'ecolage' => $request->droit,
        ]);
        return back()->with('success','La formation est modifié avec succes');
    }

   
    public function destroy($id)
    {
        $formation=formation::findOrFail($id);
        $formation->delete();
        DB::table('emploisdutemps')->where('id_frtion',$id)->delete();
        //supression etudiant

        //suppression evenement
        //$evt=DB::table('evenements')->where('id_frtion',$id)->get()->first();
        DB::table('evenements')->where('id_formation',$id)->delete();
        //DB::table('obtenirs')->where('id_evt',$evt->id)->delete();

        return 'ok';
    }
    public function listeEtudiantCourt($et,$formation)
    {
        $page='formations courts / etudiants';
        $f=formation::where('id',$formation)->get()->first();
        $etudiants=DB::table('etudiants')->where('id_etab',$et)->where('id_formation',$formation)->get();
        return view('formation.listeEtCourt',compact('et','etudiants','formation','page','f'));
    }
    public function listeEtudiantLong($et,$formation)
    {
        $page='formations longs / etudiants';
        $f=formation::where('id',$formation)->get()->first();
        $etudiants=DB::table('etudiants')->where('id_etab',$et)->where('id_formation',$formation)->get();
        return view('formation.listeEtLong',compact('et','etudiants','formation','page','f'));
    }
}
