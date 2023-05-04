<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Fonction;

class utilisateurControleur extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($et)
    {
        $page="utilisateurs";
        $functions=DB::table('fonctions')->get();
        return view('user.index',compact('page','functions','et'));
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
        $this->validate($request,[
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        $user =  User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        if($user)
        {
            DB::table('fonction_user')->insert([
                'user_id' => $user->id,
                'fonction_id' => $request->fonction_id,
            ]);
            return back()->with('success',"Enregistrement effectuée!");
        }
        return back()->with('error',"Enregistrement non effectuée!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\formateur  $formateur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $functions = Fonction::get();
        
        $user = DB::table('users')->join('fonction_user','users.id','=','fonction_user.user_id')
                    ->select('users.id','users.username','fonction_user.fonction_id')
                    ->where('users.id',$id)->get()->first();
        return view('user.edit',compact('functions','user'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        $user =  DB::table('users')->where('users.id',$id)->update([
            'username'=>$request->username,
            'password' => bcrypt($request->password),
        ]);
        if($user)
        {
            DB::table('fonction_user')->where('fonction_user.user_id',$id)->update([
                'fonction_id' => $request->fonction_id,
            ]);
            return back()->with('success',"Modification effectuée!");
        }
        return back()->with('error',"Modification non effectuée!");
    }


    public function destroy($id)
    {
        $check = Auth::user()->authorizeFunctions(['admin']);
        if(!$check)
        {
            dd("Vous ne pouvez pas faire cette action, car vous n'avez pas la fonction administrateur!");
        }
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success','L\'utilisateur est supprimé avec succes');
    }
    
}
