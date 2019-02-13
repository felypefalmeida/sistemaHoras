@extends('layouts.coord')
@section('conteudo')

<h3> Permitir acesso do aluno </h3>

<div class="row">
	<div class="col-md-8">
		 <form method="GET">
        	
			<table class="table table-hover">
				<thead>
					<th>Nome</th>					
					<th>Matricula</th>
					<th>Acesso </th>
				</thead>
               @foreach ($aluno as $alu)
				<tr>
				 <td>{{$alu->nome}}</td>
				 <td>{{$alu->matricula}}</td>
				 @if($alu->situacao == 1)
					 <td><a href="/coordenador/atualizaSit/{{$alu->id}}" class="btn btn-danger">Desativar</a>
	 					</td>
 				 @else
				 	<td><a href="/coordenador/atualizaSit/{{$alu->id}}" class="btn btn-primary">Ativar</a>
 					</td>
 					@endif
				</tr>

				@endforeach
			</table>
        </form>
	</div>
</div>
@stop