<?php

namespace App\Http\Controllers;

use App\Models\SeminarCourse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SeminarCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seminarcourses = SeminarCourse::latest()->get();
        return Inertia::render('ViewResumes/SeminarCourse', [
            'seminarcourses' =>$seminarcourses]);
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
        SeminarCourse::create([ 
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
     * @param  \App\Models\SeminarCourse  $seminarCourse
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarCourse $seminarCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarCourse  $seminarCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(SeminarCourse $seminarCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeminarCourse  $seminarCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeminarCourse $seminarCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarCourse  $seminarCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeminarCourse $seminarCourse)
    {
        //
        $seminarCourse->delete();
        return back(); 
    }
}
