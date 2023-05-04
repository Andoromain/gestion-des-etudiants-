<?php

namespace App\Http\Controllers;

use App\etudiant;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;


class etudiantControleur extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($et)
    {
        $page="etudiants";
        $etudiants=etudiant::where('id_etab',$et)->get();
        return view('etudiant.index',compact('page','et','etudiants'));
    }

    public function add($et)
    {
        $page="etudiant / ajouter";
        return view('etudiant.add',compact('page','et'));
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
    public function store(Request $request,$et)
    {
        if(etudiant::where('matricule',$request->matricule)->exists())
        {
            return back()->with('error','Le matricule de l\'etudiant est déjà enregistré !');
        }else{
             //upload fichier
           $fichier=$request->file('photo');
           $filename=$request->matricule.'(photo)'.'.'.$fichier->extension();
           $fichier->move(storage_path('app/public'),$filename);
           
            $etudiant=new etudiant();
            $etudiant->matricule=$request->matricule;
            $etudiant->id_etab=$request->etab;
            $etudiant->id_formation=$request->formation;
            $etudiant->nomEt=$request->nom;
            $etudiant->prenomEt=$request->prenom;
            $etudiant->emailEt=$request->email;
            $etudiant->datenaiss=$request->datenaiss;
            $etudiant->logEt=$request->logement;

            $etudiant->photo=$filename;
           //savoir si ecolage + que d'origine
            $forms=DB::table('formations')->where('id',$request->formation)->get()->first();
            //dd((double)$forms->ecolage.' '.(double)$request->frais);
            $ecolage=(double)$forms->ecolage;
            $frais=(double)$request->frais;
            if( $frais > $ecolage ){
                return back()->with('error','Le droit que vous saisisez est plus grand que le droit d\'inscription');
            }
            $etudiant->fraisSco=$request->frais;
            $etudiant->sexe=$request->sexe;
            $etudiant->save();
          
            DB::table('fichiers')->insert([
                'id_etudiant'=>$etudiant->id,
                'fichier'=>$filename,
            ]);

            if($request->hasFile('certificatMed')){
                $fichier=$request->file('certificatMed');
                $filename=$request->matricule.'(certificatMed)'.'.'.$fichier->extension();
                $fichier->move(storage_path('app/public'),$filename);
                
                DB::table('fichiers')->insert([
                    'id_etudiant'=>$etudiant->id,
                    'fichier'=>$filename,
                ]);
            }

            if($request->hasFile('actNaiss')){
                $fichier=$request->file('actNaiss');
                $filename=$request->matricule.'(actNaiss)'.'.'.$fichier->extension();
                $fichier->move(storage_path('app/public'),$filename);

                DB::table('fichiers')->insert([
                    'id_etudiant'=>$etudiant->id,
                    'fichier'=>$filename,
                ]);
            }

            if($request->hasFile('cin')){
                $fichier=$request->file('cin');
                $filename=$request->matricule.'(cin)'.'.'.$fichier->extension();
                $fichier->move(storage_path('app/public'),$filename);

                DB::table('fichiers')->insert([
                    'id_etudiant'=>$etudiant->id,
                    'fichier'=>$filename,
                ]);
            }
            if($request->hasFile('diplome')){
                $fichier=$request->file('diplome');
                $filename=$request->matricule.'(diplome)'.'.'.$fichier->extension();
                $fichier->move(storage_path('app/public'),$filename);

                DB::table('fichiers')->insert([
                    'id_etudiant'=>$etudiant->id,
                    'fichier'=>$filename,
                ]);
            }
            if($request->hasFile('bordereau')){
                $fichier=$request->file('bordereau');
                $filename=$request->matricule.'(bordereau)'.'.'.$fichier->extension();
                $fichier->move(storage_path('app/public'),$filename);

                DB::table('fichiers')->insert([
                    'id_etudiant'=>$etudiant->id,
                    'fichier'=>$filename,
                ]);
            }


            return back()->with('success','L\'etudiant est enregistré avec succes');

        }
         
        
        
        //return back()->with('success',);

    }


    public function detail($et,$id){
        $page="etudiant / details";
        $etudiant = etudiant::get();
        //$kode = rand();
        $data = etudiant::find($id);
        $fichiers=DB::table('fichiers')->where('id_etudiant',$id)->get();
        return view('etudiant.detail.detail',compact('page','etudiant','data','et','fichiers'));
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(etudiant $etudiant)
    {
        //
    }

   
    public function edit($et,$id)
    {
        $page="etudiant / modifier";
        $etudiant1 = etudiant::get();
        $dt1 = etudiant::find($id);
        return view('etudiant.edit.edit',compact('page','etudiant1','dt1','et'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('etudiants')->update([
            'nomEt'=>$request->nomEt,
            'prenomEt'=>$request->prenomEt,
            'sexe'=>$request->sexe,
            'datenaiss'=>$request->datenaiss,
            'matricule'=>$request->matricule,
            'emailEt'=>$request->emailEt,
            'logEt'=>$request->logEt,
            'fraisSco'=>$request->fraisSco,
        ]);

        return back()->with('success','L\'Etudiant est modifié avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        DB::table('fichiers')->where('id_etudiant',$id)->delete();
        DB::table('obtenirs')->where('id_etudiant',$id)->delete();
        DB::table('absences')->where('id_etudiant',$id)->delete();
        $etudiant = etudiant::findOrFail($id);
        $etudiant->delete();

        return back()->with('success','L\'Etudiant est supprimé avec succes');
    }
}
