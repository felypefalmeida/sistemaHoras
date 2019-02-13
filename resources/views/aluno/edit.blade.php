@extends('app')
@section('conteudo')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!-- Coloque o CSS no seu HEAD -->
<link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css">

<!-- Coloque o JS no seu FOOTER, logo depois da jQuery -->
<script src="//assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js"></script>
<!DOCTYPE html>
<body>

<form action="/aluno/update" method="POST" class="form-horizontal" >
    @csrf
<fieldset>
<div class="panel panel-primary">
     <div class="panel-heading">Editar perfil</div>
    <div class="panel-body">
<div class="form-group">

<div id="newpost">

  
<div class="form-group">
  <label class="col-md-1 control-label" for="Nome">Nome</label>  
  <div class="col-md-6">
  <input id="nome" name="nome" value="{{$aluno->nome}}" placeholder="" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-1 control-label" for="matricula">Matricula</label>  
  <div class="col-md-2">
  <input id="matricula" name="matricula" value="{{$aluno->matricula}}" placeholder="" class="form-control input-md" required="" type="text" pattern="[0-9]+$">
    
  </div>



  <label class="col-md-1 control-label" for="curso_id">Curso</label>
  <div class="col-md-4">
    <select required id="curso_id" name="curso_id" class="form-control">
            @foreach($curso as $c)
                    @if($c->id==$aluno->id)
                    <option value="{{$c->id}}" selected>
                    {{$c->nome}}
                    </option>
                    @else
                    <option value="{{$c->id}}">
                    {{$c->nome}}
                    </option>
                    @endif
                  @endforeach
    </select>
  </div>

</div>

<div class="form-group">
  <label class="col-md-1 control-label" for="prependedtext">Email</label>
  <div class="col-md-5">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" name="email" value="{{$aluno->email}}" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-1 control-label" for="prependedtext">Senha*</label>  
    <label class=" col-md-3">
      <div class="ls-label ls-prefix-group">
        <input type="password"  id="senha" name="senha" value="{{$aluno->senha}}">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha" href="#">
          </a>
      </div>
    </label>
</div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
    <button href="aluno/index"  class="btn btn-danger btn-sm">Voltar</button>
  </div>
</div>
</div>
</div>
</fieldset>
{!!Form::close()!!} 
</form>

</body>
</html>
@endsection
   