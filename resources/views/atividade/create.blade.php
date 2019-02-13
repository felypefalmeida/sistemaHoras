@extends('layouts.aluno')
@section('conteudo')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
.inputstl { 
    padding: 9px; 
    border: solid 1px #173955; 
    outline: 0; 
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #AACCE8), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #AACCE8 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

    } 
   
</style>
<body>

<form class="form-horizontal" action="/atividade/cadastrar" method="POST" enctype="multipart/form-data">
   @csrf
<fieldset>
<div class="panel panel-primary">
    <div class="panel-heading">Nova Atividade</div>
    
<div class="panel-body">
<div class="form-group">

<div id="newpost">


          
<div class="form-group">
  <label class="col-md-1 control-label" for="Descrição"> Descrição<h11>*</h11></label>  
  <div class="col-md-5">
  <input id="descricao" name="descricao" placeholder="Ex: Monitor Disc Banco de dados" class="form-control input-md" required="" type="text">
  </div>
</div>

<div class="form-group">
  <label class="col-md-1 control-label" for="Grupo">Grupo<h11>*</h11></label>
  <div class="col-md-4">
    <select required id="grupo_id" name="grupo_id" class="form-control">
             @foreach($grupo as $grp)
                <option value="{{$grp->id}}">
                    {{$grp-> descricao }} 
                    {{$grp-> qtdHoras }}    

                </option>
            @endforeach
    </select>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-1 control-label" for="Horas">Horas<h11>*</h11></label>  
  <div class="col-md-2">
  <input id="qtdhoras" name="qtdhoras" placeholder="Ex: 40" class="form-control input-md" required="number" type="text" >
    
  </div>
</div>

<div class="form-group">
    <label for="arquivo"class="col-md-1 control-label">Arquivo:</label>
    <div class="col-sm-5">
      <input type="file" " name="arquivo" class="form-control">
    </div>
</div>





</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button type="submit" name="salvar" value="salvar" class="btn btn-primary btn-sm">Salvar</button>
    <a href="/aluno/index" class="btn btn-danger btn-sm">Cancelar</a>
  </div>
</div>
 </form>   
</div>
</div>


</fieldset>
</form>

</body>
</html>
@endsection