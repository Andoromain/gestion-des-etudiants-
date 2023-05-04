<?php

namespace App\Http\Controllers;

use App\etablissement;
use App\formateur;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class formateurControleur extends Controller
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
        $page="formateurs";
        $formateurs=formateur::where('id_etab',$et)->get();
        $etabs=etablissement::toBase()->get();
        return view('formateur.index',compact('page','formateurs','etabs','et'));
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
        $formateur=new formateur();
        $formateur->id=0;
        $formateur->titreF=$request->titre;
        $formateur->id_etab=$request->etab;
        $formateur->nomF=$request->nom;
        $formateur->prenomF=$request->prenom;
        $formateur->emailF=$request->email;
        $formateur->tel=$request->tel;
        $formateur->save();
        return back()->with('success','Le formateur est enregistré avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function show(formateur $formateur)
    {
        //
    }

    public function edit($id)
    {
        $etabs=etablissement::toBase()->get();
        $formateur=formateur::findorFail($id);
        //return $formateur;
        return view('formateur.edit',compact('etabs','formateur'));
    }

   
    public function update(Request $request, $id)
    {
        DB::table('formateurs')->where('id',$id)->update([
            'nomF' => $request->nom,
            'prenomF' => $request->prenom,
            'emailF' => $request->email,
            'tel' => $request->tel,
            'id_etab' => $request->et,
        ]);
        return back()->with('success','Le formateur est modifié avec succes');
    }


    public function destroy($id)
    {
        $formateur=formateur::findorFail($id);
        $formateur->delete();
        DB::table('emploisdutemps')->where('id_frteur',$id)->delete();
        DB::table('syllabus')->where('id_frteur',$id)->delete();
        return 'ok';
    
    }
}
