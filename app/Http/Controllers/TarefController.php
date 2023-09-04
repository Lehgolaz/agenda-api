<?php

namespace App\Http\Controllers;

use App\Models\Taref;
use App\Http\Requests\StoreTarefRequest;
use App\Http\Requests\UpdateTarefRequest;
use App\Models\Tipo;

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

  
    public function store(StoreTarefRequest $request)
    {
       $data = $request->all();

      //$ttaref = Taref::create($request->all());
        $taref = Taref::create($data);

       return response()->json($taref,201);
    }

   
    public function show($id)
    {
        $taref = Taref::find($id);

        if(!$taref){
            return response()->json(['message' =>"Tarefa não encontrada!"],404);
        }

        return response()->json($taref);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarefRequest  $request
     * @param  \App\Models\Taref  $taref
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarefRequest $request, $id)
    {
           // Procure o tipo pela id
           $taref = Taref::find($id);


         
           if (!$taref) {
               return response()->json(['message' => 'Tarefa não encontrada!'], 404);
           }
   
           // Faça o update do tipo
           $taref->update($request->all());
   
           // Retorne o tipo
           return response()->json($taref);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taref  $taref
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $taref = Taref::find($id);
        if (!$taref) {
            return response()->json(['message' => 'Tarefa não encontrada!'], 404);
        }

        $taref->delete();

        return response()->json(['message' => 'Tarefa deletada com sucesso!'], 200);
    }
}
