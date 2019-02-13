@extends('layouts.aluno')
@section('conteudo')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

            

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>

<div class="col-md-12">
  <h2>Atividades Validadas</h2>
          
<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$certo}}%">
       {{$certo}}%
</div>
</div>
 @if(isset($erro))
    <dir>
      <small class="label pull-right bg-primary">{{$erro}}</small> 
    </dir>
@endif
</div>
 
 
 <!-- teste colapso nervoso  -->

 <div class="col-md-6">

  <h4>Listagem das atividades:</h4>

 </div> 
 

<!-- Ops -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed">
        <thead>
          <th>Descrição</th>
          <th>Qtd Hrs</th>
          <th>Arquivo</th>
          <th>Grupo - MaxHoras</th>
          <th>Situação</th>
        </thead>
        
        @foreach($atvidade as $atv)
          @if($atv->situacao == "Aguardando")
        
               <tr class="warning">  
                       <td>{{ $atv->descricao}}</td>        
                       <td>{{ $atv->qtdhoras}}</td>        
                       <td><a href="/arquivos/{{$atv->arquivo}}">{{ $atv->arquivo}}</a></td>
                       <td> 
                        @foreach($grupo as $grupos)
                          @if($atv->grupo_id == $grupos->id)
                               {{$grupos->descricao}}
                               {{$grupos->qtdHoras}}
                          @endif
                        @endforeach
                        </td>        
                       <td>{{ $atv->situacao}}</td>        
              </tr>
          @else
            @if($atv->situacao == "Rejeitada")
               <tr class="danger">  
                 <td>{{ $atv->descricao}}</td>        
                 <td>{{ $atv->qtdhoras}}</td>        
                 <td><a href="/arquivos/{{$atv->arquivo}}">{{ $atv->arquivo}}</a></td>   
                 <td>
                @foreach($grupo as $grupos)

                  @if($atv->grupo_id == $grupos->id)
                       {{$grupos->descricao}}                       
                       {{$grupos->qtdHoras}}                       
                  @endif

                @endforeach

</td>             
                 <td>{{ $atv->situacao}}</td>        
              </tr>
            @else


              <tr class="success">  
                 <td>{{ $atv->descricao}}</td>        
                 <td>{{ $atv->qtdhoras}}</td>        
                 <td><a href="/arquivos/{{$atv->arquivo}}">{{ $atv->arquivo}}</a></td>        
                 <td>
                 @foreach($grupo as $grupos)
                 
                  @if($atv->grupo_id == $grupos->id)
                       {{$grupos->descricao}} - 
                       {{$grupos->qtdHoras}}
                  @endif
            
                @endforeach
</td>        
                 <td>{{ $atv->situacao}}</td>        
              </tr>    
                  @endif
                @endif
          
        @endforeach

        
      </table>
    </div>
    
  </div>

</body>
</html>
@stop