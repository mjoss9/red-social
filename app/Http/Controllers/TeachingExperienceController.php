<?php

namespace App\Http\Controllers;

use App\Models\TeachingExperience;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeachingExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachingexperiences = TeachingExperience::latest()->get();
        return Inertia::render('ViewResumes/TeachingExperience', [
            'teachingexperiences' =>$teachingexperiences]);
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
        TeachingExperience::create([ 
            'años'=> $request->años,
            'carrera'=> $request->carrera,
            'asignatura'=> $request->asignatura,
            'desde'=> $request->desde,
            'hasta'=> $request->hasta,
         ]);
         return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeachingExperience  $teachingExperience
     * @return \Illuminate\Http\Response
     */
    public function show(TeachingExperience $teachingExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachingExperience  $teachingExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachingExperience $teachingExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachingExperience  $teachingExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachingExperience $teachingExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeachingExperience  $teachingExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachingExperience $teachingExperience)
    {
        //
        $teachingExperience->delete();
        return back(); 
    }
}
