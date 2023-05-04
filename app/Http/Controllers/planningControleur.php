<?php

namespace App\Http\Controllers;

use App\planning;
use App\formation;
use Illuminate\Http\Request;

class planningControleur extends Controller
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
        if($request->planning==1){
            $page="evenements";

            $f=formation::where('id',$request->formation)->get()->first();
            if($f->type=='court'){
                $formation='court';
                return view('evenement.index',compact('page','et','formation','f'));
            }else{
                $formation='long';
                return view('evenement.index',compact('page','et','formation','f'));
            }
            //$formations=formation::toBase()->where('type','court')->get();
            
        }else{
            $page="emploi du temps";

            $f=formation::where('id',$request->formation)->get()->first();
            if($f->type=='court'){
                $formation='court';
                return view('emploidutemps.index',compact('page','et','formation','f'));
            }else{
                $formation='long';
                return view('emploidutemps.index',compact('page','et','formation','f'));
            }
            //$formations=formation::toBase()->where('type','long ')->get();
           
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function show(planning $planning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function edit(planning $planning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, planning $planning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function destroy(planning $planning)
    {
        //
    }
}
