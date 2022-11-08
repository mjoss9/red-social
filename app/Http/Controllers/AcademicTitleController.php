<?php

namespace App\Http\Controllers;

use App\Models\AcademicTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AcademicTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $academictitles = AcademicTitle::latest()->get();
        return Inertia::render('ViewResumes/AcademicTitle', [
            'academictitles' =>$academictitles]);
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
        AcademicTitle::create([ 
            'titulo'=> $request->titulo,
            'universidad'=> $request->universidad,
            'añot'=> $request->añot,
            'horas'=> $request->horas,
         ]);
         return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcademicTitle  $academicTitle
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicTitle $academicTitle)
    {
        //
        $academictitles = AcademicTitle::latest()->get();
        return Inertia::render('ViewResumes/ViewResume', [
            'academictitles' =>$academictitles]);
        // return 'hola bro';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcademicTitle  $academicTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicTitle $academicTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicTitle  $academicTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicTitle $academicTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcademicTitle  $academicTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicTitle $academicTitle)
    {
        //
        $academicTitle->delete();
        return back(); 
    }
}
