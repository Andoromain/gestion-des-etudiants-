<?php

namespace App\Http\Controllers;

use App\evenement;
use App\etudiant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\MessageGoogle;
use Illuminate\Http\UploadedFile;
use Mail;
use App\User;

class evenementControleur extends Controller
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
        $page='evenements';
        $etudiants=etudiant::toBase()->get();
        return view('evenement.index',compact('page','et','etudiants'));
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
        //dd($request->id_et);
        $evenement=new evenement();
        $evenement->nomEvt=$request->nom;
        $evenement->jour=$request->jour;
        $evenement->heureDebut=$request->debut;
        $evenement->heureFin=$request->fin;
        $evenement->couleur=$request->couleur;
        $evenement->id_etab=$et;
        $evenement->id_formation=$formation;
        $evenement->save();
        foreach($request->id_et as $row){
            //dd($row);
            DB::table('obtenirs')->insert([
                'id_evt'=> $evenement->id,
                'id_etudiant' => $row
            ]);
        }
        return back()->with('success','l\'evenement est ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function show(evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(evenement $evenement)
    {
        //
    }

    public function update(Request $request)
    {
        //dd($request);
        DB::table('evenements')->where('id',$request->id)->where('id_etab',$request->et)->where('id_formation',$request->formation)->update([
            'nomEvt'=>$request->nom,
            'jour'=>$request->jour,
            'heureDebut'=>$request->debut,
            'heureFin'=>$request->fin,
            'couleur'=>$request->couleur,
        ]);
        DB::table('obtenirs')->where('id_evt',$request->id)->delete();
        if($request->id_et!=null){
        foreach($request->id_et as $row){
            //dd($row);
            DB::table('obtenirs')->insert([
                'id_evt'=> $request->id,
                'id_etudiant' => $row
            ]);
        }
        }
        return back()->with('success','l\'evenement est mofifié avec success');
    }

   
    public function destroy($id)
    {
        $evt=evenement::findorFail($id);
        $evt->delete();
        DB::table('obtenirs')->where('id_evt',$id)->delete();
    }

    public function listeEvt()
    {
        return view('evenement.liste');
    }
    public function mail(Request $request){
        //dd($request);
       /* Mail::send('welcome ',[],function($m){
            $email="andoajpr@gmail.com";
            $m->to($email);
            $m->subject('jkj');
            $m->from('noreply@example.com');
        });*/
        $fichier=$request->file('fichier');
        $filename=time().'.'.$fichier->extension();
        $fichier->move(storage_path('app/public'),$filename);
        $tout='';
        $etudiants=DB::table('etudiants')->join('obtenirs','obtenirs.id_etudiant','=','etudiants.id')->select('etudiants.emailEt')->get();
        $data=array();
        $data['objet']=$request->objet;
        $data['fichier']=$filename;
        foreach($etudiants as $etudiant){
            Mail::to($etudiant->emailEt)->bcc('andoajpr@gmail.com')
                        ->queue(new MessageGoogle($data));
            return back()->with('succes','L\'email est envoyé');
        }
    }
}
