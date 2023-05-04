<?php

namespace App\Http\Controllers;

use App\etablissement;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        $page="acceuil";
        $etabs=etablissement::toBase()->get();
        return view('home',compact('page','etabs'));
    }
    public function index2(Request $request)
    {
        $page="acceuil";
        $actif= etablissement::find($request->etab);
        $etabs=etablissement::toBase()->get();
        $et=$request->etab;
        return view('home2',compact('page','etabs','actif','et'));
    }
}
