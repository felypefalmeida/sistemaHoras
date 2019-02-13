@extends('app')
@section('conteudo')
<div class="card border">
    <div class="card-body">
        <form action="/coordenador/cadastrar" method="POST">
        	@csrf
            <div class= "row">
                <div class= "col-md-6"> 
                	<label for="Cpf">Cpf</label>
                	<input type="text" name="cpf" id="cpf" class="form-control" placeholder="Cpf">
            	</div>  
            </div>
            <div class="form-group">
               <label for="Nome">Nome</label>
                	<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
               <label for="E-mail">E-mail</label>
                	<input type="text" name="email" id="email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
               <label for="Senha">Senha</label>
                	<input type="text" name="senha" id="senha" class="form-control" placeholder="Senha">	
            </div>	


            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>      
    </div>
</div>

@endsection