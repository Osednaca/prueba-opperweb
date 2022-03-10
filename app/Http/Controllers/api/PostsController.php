<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy("created_at","desc")->get();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Posts::create([
            "titulo" => $request->titulo,
            "contenido" => $request->contenido,
            "categorias_id" => $request->categorias_id
        ]);
        return response()->json(["response"=>true,"mensaje"=>"Post creado correctamente!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $post->update([
            "titulo" => $request->titulo,
            "contenido" => $request->contenido,
            "categorias_id" => $request->categorias_id
        ]);
        return response()->json(["response"=>true,"mensaje"=>"Post actualizado correctamente!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posts::where('id', $id)->delete();
        return response()->json(["response"=>true,"mensaje"=>"Post eliminado correctamente!"]);
    }
}
