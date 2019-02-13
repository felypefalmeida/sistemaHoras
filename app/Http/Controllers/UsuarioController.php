<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Aluno;
use App\Coordenador;





class UsuarioController extends Controller
{
    public function index()
    {

        
    
    public function create()
    {
      
         return view ('aluno.create');
    }

    public function store(Request $req)
    {

        $usuario =  Usuario::create([
            'login' => $req->input('matricula'),
            'senha' => $req->input('senha'),
            'nivelAcesso' => $req->input('nivelAcesso','0'),
            
        ]);

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }

}
