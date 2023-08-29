<?php

namespace App\Http\Controllers;

use App\Models\Taref;
use App\Http\Requests\StoreTarefRequest;
use App\Http\Requests\UpdateTarefRequest;

class TarefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tarefs)
    {
        //
        $tarefs = Taref::all($tarefs);

        return response()->json(['data' => $tarefs]);
    }

  
    public function store(StoreTarefRequest $request)
    {
       
    }

   
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taref  $taref
     * @return \Illuminate\Http\Response
     */
    public function edit(Taref $taref)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarefRequest  $request
     * @param  \App\Models\Taref  $taref
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarefRequest $request, Taref $taref)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taref  $taref
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taref $taref)
    {
        //
    }
}
