<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atividade;
use App\Grupo;
use App\Aluno;
use App\Curso;
use DB;


class AtividadeController extends Controller
{
    public function index()
    {
    
    }

    public function create()
    {

        session_start();
       
        $grupo=DB::table('grupo') ->get();
         return view ('atividade.create', ["grupo"=>
            $grupo]);
    }

    public function store(Request $req)
    {
        session_start();
       
        $aluno= Aluno::where('usuario_id', '=', $_SESSION["id"])->first();
       // dd($aluno);

        $curso= Curso::where('id', '=', $_SESSION["id"])->first();       
            
            if (isset($_POST['salvar'])&& $_POST['salvar']=='salvar'):
                   
                $arquivo = $_FILES['arquivo'];
                $nome = $arquivo['name'];
                $tmp = $arquivo['tmp_name'];

                $extensao = explode('.',$nome);
                $ext = end($extensao);

                $novoNome =date('Y-m-d').'.'.$ext;

                if(empty($arquivo)):
                   echo 'Selecione um arquivo';

                else:
                    if(move_uploaded_file($tmp,'arquivos/'.$novoNome)):
                    else:
                       echo "erro";   
                    endif;
                 endif;       
             endif;       


            $atividade =  Atividade::create([
                'descricao' => $req->input('descricao'),
                'qtdhoras' => $req->input('qtdhoras'),
                'situacao' => $req->input('situacao','Aguardando'),
                'grupo_id' =>$req->input('grupo_id'),
                'aluno_id'=>$aluno->id,                             
                'curso_id' =>$aluno->curso_id, 
                'arquivo' =>$novoNome,
                
                
            ]);


            if($atividade){
             //  dd($atividade);
                return redirect()->route('atividade.create')
                    ->withInput()
                    ->with(['insert' => true, 'descricao' => $atividade->descricao]);
            }
            
    }

    public function show($id)
    {
        // // $atvAlu = Aluno::find($id);
        // //    dd($atvAlu);
        //    echo "nao ta nada";
        // // return view('atividade.show',compact('atvAlu'));
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
