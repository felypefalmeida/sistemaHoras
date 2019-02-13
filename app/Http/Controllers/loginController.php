<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Aluno;
use App\Coordenador;
use App\Usuario;


class loginController extends Controller
{
    public function login(Request $request){
       $dados= $request->all();
       $login = $dados['login'];
       $senha = $dados['senha'];
      
    
       $consulta = DB::select("select * from usuario where login = '$login' and senha = '$senha'"  );
       $tamanho = count($consulta);
       
       if($tamanho == 1) {
           foreach ($consulta as $login2){
               session_start();
               $_SESSION["login"] = $login2->login;
               $_SESSION["id"] = $login2->id;
               $_SESSION["nivelAcesso"] = $login2->nivelAcesso;
              
              
               if($login2->nivelAcesso == 1){ 
                   return redirect()->route('coordenador.index');    
                }
                elseif ($login2->nivelAcesso == 0){
                   return redirect()->route('aluno.index');
                } 
                elseif ($login2->nivelAcesso == 2){
                   return redirect()->route('administrador.index');
                }
            }   
       }
       else {
           $erro="Login ou senha inválida!";
           return view('/welcome',compact('erro'));  

           }
                

    }

     public function sair(){
       if(session_start()){
       session_destroy();
          return view('/welcome');
       } 
       
   }

 
   public function resetPassword(){
     
    


        return view('resetPassword', compact('senhaCriptografada'));
     // echo $senhaCriptografada;

   }

   public function resetar(Request $req){
       
       $dados= $req->all();
       $email = $dados['email'];
       $valor = $email;
       $novaSenha = substr(md5(time()),0,6);
       $senhaCriptografada = md5(md5($novaSenha));

        $link = mysqli_connect("localhost","root","","sistemahoras");    
        $sql_query = mysqli_query($link,"UPDATE coordenador c, usuario u SET u.senha = '$senhaCriptografada', c.senha='$senhaCriptografada' WHERE c.email = '$email' AND c.usuario_id = u.id") or die ($mysqli->erro);   

        $sql_query = mysqli_query($link,"UPDATE aluno a, usuario u SET u.senha = '$senhaCriptografada', a.senha='$senhaCriptografada' WHERE a.email = '$email' AND a.usuario_id = u.id") or die ($mysqli->erro);

       // mail($email, "Sua nova senha", "Sua nova senha é:  ". $novaSenha);
       return view('resetPassword', compact('valor'));
       
      

   }

}


// if($logar->niveAcesso == 1){
//     return view(coordenador);
// } else{
//     return view(alunos);
// }



