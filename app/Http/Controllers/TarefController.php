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
    public function index()
    {
        //
        $tarefs = Taref::all();

        return response()->json(['data' => $tarefs]);
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
     * @param  \App\Http\Requests\StoreTarefRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTarefRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taref  $taref
     * @return \Illuminate\Http\Response
     */
    public function show(Taref $taref)
    {
        //
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
