@extends('layouts.coord')
@section('conteudo')


<div class="row">
	<div class="col-md-8">
			<table class="table table-hover ">
				<thead>
					<th >Descrição</th>
					<th >Horas</th>					
					<th >MaxHoras</th>
				</thead>
               @foreach ($grupo as $gru)               	
				<tr>
					<td>{{ $gru->descricao}}</td>
					<td>{{ $gru->qtdHoras}}</td>
					<td>{{ $gru->maxHoras}}</td>
	              <!--   <td>
	            		<a href="/grupo/delete/{{$gru->id}}" class="btn btn-danger">
							     <span class="glyphicon glyphicon-delete"></span> Excluir
							</a>
			          </td> -->

		          </tr>
				@endforeach

			</table>
		          

	</div>
</div>
@stop