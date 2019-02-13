@extends('layouts.coord')
@section('conteudo')

<!-- Buscar  -->
<!-- <div class="row">
<div class="col-md-8">
     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de alunos</h3>
		@include('coordenador.search')
	</div>
</div>
</div> -->

<div class="row">
	<div class="col-md-8">
			<table class="table table-hover ">
				<thead>
					<th >Aluno</th>
					<th >Matricula</th>					
					<th >Opções</th>
					<th>Acesso</th>
				</thead>
               @foreach ($aluno as $alu)               	
				<tr>
					<td>{{ $alu->nome}}</td>
					<td>{{ $alu->matricula}}</td>
	                 <td>
	            			<a href="/coordenador/show/{{$alu->id}}" class="btn btn-primary">
							     <span class="glyphicon glyphicon-pencil"></span> Atividades
							</a>
							<a href="/coordenador/geraRelatorio/{{$alu->id}}" class="btn btn-info">
							     <span class="glyphicon glyphicon-file"></span> Relátorio
							</a>
			          </td>
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
		          

	</div>
</div>
@stop