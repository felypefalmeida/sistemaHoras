<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();

        $coordenador=DB::table('coordenador') ->get();
        $instituicao=DB::table('instituicao') ->get();
         return view ('atividade.create', ["coordenador"=>
            $coordenador],["instituicao"=>
            $instituicao]);
    }

    public function store(Request $req)
    {
       session_start();
    

         $curso = new Curso();
        $curso->nome = $req->get('nome');
        $curso->horas = $req->get('horas');
        $curso->coordenador_id = $req->get('coordenador_id');
        $curso->instituicao_id = $req->get('instituicao_id');
        $curso->push();
    
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
