<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupo;
use App\Usuario;

class GrupoController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
         return view ('grupo.create');
    }

    public function store(Request $req)
    {  
        session_start();
    

          $grupo = new Grupo();
            $grupo->descricao = $req->get('descricao');
             $grupo->qtdHoras = $req->get('qtdHoras');
             $grupo->curso_id = $_SESSION["id"];

            if (isset($_POST['maxHoras']) && $_POST['maxHoras'] == 'checked')
                {
                   $grupo->maxHoras = $req->input('qtdHoras');
                    
                }else{
                    $grupo->maxHoras = $req->input('maxHoras') ;

                }
            
            $grupo->save();

            

        if($grupo){
            return redirect()->route('grupo.create')
                ->withInput()
                ->with(['insert' => true, 'descricao' => $grupo->descricao]);
        }   

     }

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

    public function delete($id)
    {   
        $grupo =Grupo::find($id);
        $p = $grupo->delete();
        if($p){
            return redirect()->route('coordenador.listaGrupo');   
        }
        return 'Nao foi possivel deletar!';
    }
}
