<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Atividade;
use App\Curso;
use App\Usuario;
use App\Grupo;
use Barryvdh\DomPDF\Facade as PDF;
use App;
use DB;




class AlunoController extends Controller
{
    public function index()
    { 
        session_start();
        if ((isset($_SESSION["login"]))) {
        
        $aluno= Aluno::where('usuario_id', '=', $_SESSION["id"])->first();
        if($aluno->situacao == "1")
         {  

          $atvidade = Atividade::select('*')->where('aluno_id','=',$aluno->id)->get();
          $atividades = $aluno->atividades_aluno()->where('situacao','=', 'Validada')->groupBy('grupo_id')->select(DB::raw('sum(qtdhoras) as qtdhoras, grupo_id'))->get();
           
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

            $grupo=Grupo::select('id','descricao','qtdHoras')->get(); 
            $horas = Curso::select('horas')->where('id', '=', $aluno->curso_id)->first();
            
             
           $certo = $qtdHorasAluno*100/$horas->horas;
            

            // echo $qtdHorasAluno;
            // testando para avisar aluno; 
            if ($certo < 100) {
             return view('aluno.index', compact('atividades','certo','grupo','atvidade')); 
            
            }
            if ($certo >= 100) {
             
             $erro="Parabéns você concluiu as ". $horas->horas ." horas de atividades complementares" ;
             $certo = 100;
             return view('aluno.index', compact('atividades','certo','grupo','atvidade','erro')); 

            }
            
        }else //else do segundo if
         {
           echo "<script>
                      alert('Aguarde a validação de seu coordenador para o acesso do site');
                      window.location.replace('');
                  </script>";
         } 
      }else{
        return view('/welcome');  
      } 

      
      

    }

    public function create()
    {
    
           $curso=DB::table('curso') ->get();
           return view ('aluno.create', ["curso"=>$curso]);

    }

    public function store(Request $req)
    {   
        session_start();
       if (!(isset($_SESSION["login"]))) {

            $usuario = new Usuario();
            $usuario->login = $req->input('matricula');
            $usuario->senha = $req->input('senha');
            $usuario->nivelAcesso = $req->input('nivelAcesso','0');
            $usuario->save();
            $usuario_id = $usuario->id;
     

            $aluno = new Aluno();
            $aluno->matricula = $req->get('matricula');
            $aluno->nome = $req->get('nome');
            $aluno->email = $req->get('email');
            $aluno->senha = $req->get('senha');
            $aluno->situacao= $req->get('situacao','0');
            $aluno->curso_id = $req->input('curso_id');
            $aluno->usuario_id = $usuario_id;

            $objAlu = Aluno::select('*')->where('matricula','=',$aluno->matricula)->get();
            $objAluEmail = Aluno::select('*')->where('email','=',$aluno->email)->get();
            $linhas = count($objAlu);
            $linhas2 = count($objAluEmail);
            echo $linhas2;

            if($linhas==0 && $linhas2==0){
              $aluno->push();    

              if($aluno){
                return redirect()->route('aluno.index')
                ->withInput()
                ->with(['insert' => true, 'matricula' => $aluno->matricula]);
              }
            }else{
              echo "deu ruim";
            }  
       }    
}

    
    public function show($id){
     session_start();
    if ((isset($_SESSION["login"]))) {
         $aluno= Aluno::where('usuario_id', '=', $_SESSION["id"])->first();
         $nomeGrupo=Grupo::select('id','descricao')->get(); 
         $atvidade = Atividade::select('*')->where('aluno_id','=',$aluno->id)->get();
         $atividades = $aluno->atividades_aluno()->where('situacao','=', 'Validada')->groupBy('grupo_id')->select(DB::raw('sum(qtdhoras) as qtdhoras, grupo_id'))->get();
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

         $horas = Curso::select('horas')->where('id', '=', $aluno->curso_id)->first();
        
              $restante =  $horas->horas - $qtdHorasAluno; 

          if ($restante <= 0 ) {
              
              $qtdHorasAluno= $horas->horas;              
              $restante = 0;

               $pdf = App::make('dompdf.wrapper');
              $pdf = PDF::loadView('aluno.show', compact('qtdHorasAluno','restante','atvidade','nomeGrupo'));
               return $pdf->stream('invoice.pdf');  

          }else{ 

          

            
              $pdf = App::make('dompdf.wrapper');
              $pdf = PDF::loadView('aluno.show', compact('qtdHorasAluno','restante','atvidade','nomeGrupo'));
               return $pdf->stream('invoice.pdf');   

               }  
       }
       else{
          return view( '/welcome' );
       }


    }

    
    public function edit()
    { 
      session_start();
      if ((isset($_SESSION["login"]))) {
          $aluno= Aluno::where('usuario_id', '=', $_SESSION["id"])->first();
          $aluno = Aluno::findOrFail($aluno->id);
          $curso=DB::table('curso') ->get();

           return view("aluno.edit", 
            ["aluno"=>$aluno, "curso"=>$curso]);
      }
      else{
        return view( '/welcome');
      }     
    }

    public function update(Request $req)
    {
      session_start();
      if ((isset($_SESSION["login"]))) {
          $aluno= Aluno::where('usuario_id', '=', $_SESSION["id"])->first();
          $usu = Usuario::select('id')->where('login' , '=', $aluno->matricula)->first();
          $aluno=Aluno::findOrFail($aluno->id);
          $usu=Usuario::findOrFail($usu->id);
                                
          $aluno->nome = $req->input('nome');
          $aluno->matricula = $req->input('matricula');
          $aluno->email = $req->input('email');
          $aluno->senha = $req->input('senha');
          $usu->senha = $req->input('senha');
          
          $aluno->update();
          $usu->update();

           return redirect()->route('aluno.index'); 

      }
       else{
          return view( '/welcome' );
       } 
    }

  
    public function destroy($id)
    {
        
    }

    public function valida(){

       $valida = Aluno::get();
       return view('aluno.valida', compact('aluno'));
    
    }
  

}

