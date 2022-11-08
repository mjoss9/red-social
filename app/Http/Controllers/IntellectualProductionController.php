<?php

namespace App\Http\Controllers;

use App\Models\IntellectualProduction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IntellectualProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $intellectualproductions = IntellectualProduction::latest()->get();
        return Inertia::render('ViewResumes/IntellectualProduction', [
            'intellectualproductions' =>$intellectualproductions]);
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
        IntellectualProduction::create([ 
            'titulo'=> $request->titulo,
            'universidad'=> $request->universidad,
            'añoe'=> $request->añoe,
            'paginas'=> $request->paginas,
            'nregistro'=> $request->nregistro,
         ]);
         return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IntellectualProduction  $intellectualProduction
     * @return \Illuminate\Http\Response
     */
    public function show(IntellectualProduction $intellectualProduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IntellectualProduction  $intellectualProduction
     * @return \Illuminate\Http\Response
     */
    public function edit(IntellectualProduction $intellectualProduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IntellectualProduction  $intellectualProduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IntellectualProduction $intellectualProduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IntellectualProduction  $intellectualProduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntellectualProduction $intellectualProduction)
    {
        //
        $intellectualProduction->delete();
        return back(); 
    }
}
