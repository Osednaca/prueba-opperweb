<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentarios::orderBy("created_at","desc")->get();
        return response()->json($comentarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comentarios::create([
            "contenido" => $request->contenido,
            "post_id" => $request->post_id,
        ]);
        return response()->json(["response"=>true,"mensaje"=>"Comentario creado correctamente!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentarios::find($id);
        return response()->json($comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentario)
    {
        $request->validate([
            "contenido" => "required|min:5|max:500"
        ]);
        $comentario->update([
            "contenido" => $request->contenido,
            "post_id" => $request->post_id,
        ]);
        return response()->json(["response"=>true,"mensaje"=>"Comentario actualizado correctamente!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comentarios::where('id', $id)->delete();
        return response()->json(["response"=>true,"mensaje"=>"Comentario eliminado correctamente!"]);
    }
}
