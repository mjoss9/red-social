<?php

namespace App\Http\Controllers;

use App\Models\ResumeData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ResumeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumedatas = ResumeData::latest()->get();
        return Inertia::render('ViewResumes/ResumeData', [
            'resumedatas' =>$resumedatas]);


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
        ResumeData::create([ 
            'nombre'=> $request->nombre,
            'apellidop'=> $request->apellidop,
            'apellidom'=> $request->apellidom,
            'carnet'=> $request->carnet,
            'correo'=> $request->correo,
            'mension'=> $request->mension,
            'direccion'=> $request->direccion,
            'celular'=> $request->celular,
            'nacimientof'=> $request->nacimientof,
            'nacimientol'=> $request->nacimientol,
            'sexo'=> $request->sexo,
            'telefono'=> $request->telefono,

         ]);
         return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResumeData  $resumeData
     * @return \Illuminate\Http\Response
     */
    public function show(ResumeData $resumeData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResumeData  $resumeData
     * @return \Illuminate\Http\Response
     */
    public function edit(ResumeData $resumeData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResumeData  $resumeData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResumeData $resumeData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResumeData  $resumeData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResumeData $resumeData)
    {
        //
        $resumeData->delete();
        return back(); 
    }
}
