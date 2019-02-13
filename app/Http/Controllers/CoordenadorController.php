<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Coordenador;
use App\Usuario;
use App\Atividade;
use App\Aluno;
use App\Grupo;
use App\Curso;


use App;
use Barryvdh\DomPDF\Facade as PDF;



class CoordenadorController extends Controller
{
  
    public function index(Request $request)
    {   
       session_start();            
        
       if ((isset($_SESSION["login"]))) {
                
       $teste= Coordenador::where('usuario_id', '=', $_SESSION["id"])->get();                    
        $aluno = Aluno::where('curso_id','=',$_SESSION["id"])->get();
              
              $query=trim($request->get('searchText'));
                
              $nome=Aluno::where('nome', 'LIKE', '%'.$query.'%')->get();
                
              return view('coordenador.index', compact('aluno','teste'),['searchText'=>$query]);


      }else
      {
         return view('/welcome');
      }

    }

    public function create()
    {
        return view ('coordenador.create');
    }

    public function store(Request $req) { 
      if (!(isset($_SESSION["login"]))) {
          $usuario = new Usuario();
                $usuario->login = $req->input('cpf');
                $usuario->senha = $req->input('senha');
                $usuario->nivelAcesso = $req->input('nivelAcesso','1');
                $usuario->save();
                $usuario_id = $usuario->id;


          $coordenador = new Coordenador();        
               $coordenador->cpf = $req->get('cpf');
                $coordenador->nome = $req->get('nome');
                $coordenador->email = $req->get('email');
                $coordenador->senha = $req->get('senha');
                $coordenador->usuario_id = $usuario_id;
                $coordenador->push();
          

            if($coordenador){
                return redirect()->route('coordenador.create')
                    ->withInput()
                    ->with(['insert' => true, 'cpf' => $coordenador->cpf]);}
      }else{
        echo "logado";
       }          
    }


    public function show($id)
    {
       
       session_start();
      if ((isset($_SESSION["login"]))) {

       $teste= Coordenador::where('usuario_id', '=', $_SESSION["id"])->get();
       $atividade = Atividade::where('aluno_id', '=', $id)->get();
       $grupo=Grupo::select('id','descricao')->get();

       return view('coordenador.show',compact("atividade",'teste', 'grupo'));
     }
     else{
          return view('/welcome'); 
     }

    }

   
    public function edit()
    {
      session_start();
      if ((isset($_SESSION["login"]))) {
            $coordenador= Coordenador::where('usuario_id', '=', $_SESSION["id"])->first();
            $coordenador = Coordenador::findOrFail($coordenador->id);
          
             return view("coordenador.edit",["coordenador"=>$coordenador]);
      }else{
        return view('/welcome');
      }

    }
   public function update(Request $req) {
        session_start();
         if ((isset($_SESSION["login"]))) {
            $coordenador= Coordenador::where('usuario_id', '=', $_SESSION["id"])->first();
            $usu = Usuario::select('id')->where('login' , '=', $coordenador->cpf)->first();
            $coordenador=Coordenador::findOrFail($coordenador->id);
            $usu=Usuario::findOrFail($usu->id);
               
                     
            $coordenador->nome = $req->input('nome');
            $coordenador->cpf = $req->input('cpf');
            $coordenador->email = $req->input('email');
            $coordenador->senha = $req->input('senha');
            $usu->senha = $req->input('senha');
            
            $coordenador->update();
            $usu->update();
            
            return redirect()->route('coordenador.index'); 

         }else{
        return view('/welcome');
      }    
    }

    public function destroy($id)
    {
        //
    }

    public function validaaluno(){
         session_start();
        if ((isset($_SESSION["login"]))) {
         $aluno = Aluno::where('curso_id','=',$_SESSION["id"])->get();
          
         return view('coordenador.validaaluno',compact("aluno"));

      }else{
        return view('/welcome');
      }      
    }

    public function atualizaSit($id){
       session_start();
     if ((isset($_SESSION["login"]))) {
              $alu = Aluno::find($id);
                      // $a = Aluno::where('curso_id','=',$_SESSION["id"])->get();
             // dd($aluno);

              if($alu->situacao == 0 ) 
                  $uacao = 1;
              else if($alu->situacao == 1) 
                $uacao = 0;

              $alu-> update([
                'situacao' => $uacao,
              ]);
               session_start();
                if ((isset($_SESSION["login"]))) {
                 $aluno = Aluno::where('curso_id','=',$_SESSION["id"])->get();
                  
                 // redirect("coordenador.index");
                 return redirect('/coordenador/index');        
            }

     }
    else{
      return view('/welcome');
    }
    

  }


   public function rejeitaAtividade($id){
    session_start();
    if ((isset($_SESSION["login"]))) {
        $atv = Atividade::find($id);
        
        $atividade = Atividade::where('id','=', $id)->get();
       
        if($atv->situacao === "Aguardando" ) 
              $sit = "Rejeitada";

          $atv->update([
            'situacao' => $sit,

          ]);

       
        if ((isset($_SESSION["login"]))) {
           $aluno = Aluno::where('curso_id','=',$_SESSION["id"])->get();
           return redirect('/coordenador/index');     
         }
    }
    else{
      return view('/welcome');
    }
    

  }

  public function validaAtividade($id){
   
    session_start();
      if ((isset($_SESSION["login"]))) {
           $atv = Atividade::find($id);
          $atividade = Atividade::where('id','=', $id)->get();
         
          if($atv->situacao === "Aguardando" ) 
                $sit = "Validada";

            $atv->update([
              'situacao' => $sit,

            ]);

             
              if ((isset($_SESSION["login"]))) {
               $aluno = Aluno::where('curso_id','=',$_SESSION["id"])->get();
                
               // redirect("coordenador.index");
               return redirect('/coordenador/index'); 
               }
      }
    else{
      return view('/welcome');
    }
    
  }

  public function geraRelatorio($id)
  {

     $atvidade = Atividade::select('*')->where('aluno_id','=',$id)->get();
     $nomeGrupo=Grupo::select('id','descricao')->get(); 
     $nomeAlu= Aluno::select('nome','matricula')->where('id','=',$id)->first();
     $testeHoras = Aluno::select('curso_id', 'id')->where('id','=',$id)->first();

     $atividades = Atividade::where('situacao','=', 'Validada')->groupBy('grupo_id')->select(DB::raw('sum(qtdhoras) as qtdhoras, grupo_id'))->where('aluno_id', '=', $id)->get();
     
      $qtdHorasAluno = 0;
           
            foreach($atividades as $atividade){
              $grupo = Grupo::where('id', $atividade->grupo_id)->first();
              $testes = Grupo::select('maxHoras')->where('id','=',$atividade->grupo_id)->first();         

              if($atividade->qtdhoras > $testes->maxHoras){
                 $qtdHorasAluno += $testes->maxHoras;
              }
              if ($atividade->qtdhoras <= $testes->maxHoras) {
                 $qtdHorasAluno += $atividade->qtdhoras;
              }

               if($testes->maxHoras == 0) {
                $qtdHorasAluno += $atividade->qtdhoras;
              }

         }                       
          $horas = Curso::select('horas')->where('id', '=', $testeHoras->curso_id)->first();
         
          $restante =  $horas->horas - $qtdHorasAluno;

   if ($restante <= 0 ) {
          
          $qtdHorasAluno= $horas->horas;              
          $restante = 0;

     $pdf = App::make('dompdf.wrapper');
     $pdf = PDF::loadView('coordenador.geraRelatorio', compact('qtdHorasAluno','restante','atvidade','nomeGrupo','nomeAlu'));
     return $pdf->stream('invoice.pdf');
   }else{
        $pdf = App::make('dompdf.wrapper');
     $pdf = PDF::loadView('coordenador.geraRelatorio', compact('qtdHorasAluno','restante','atvidade','nomeGrupo','nomeAlu'));
     return $pdf->stream('invoice.pdf');
   }

              
   } 

   public function listaGrupo(){

        $grupo = Grupo::select('*')->get();


        return view ('coordenador.listaGrupo', compact('grupo'));
   }


}
