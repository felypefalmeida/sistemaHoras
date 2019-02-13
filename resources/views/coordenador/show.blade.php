@extends('layouts.coord')
@section('conteudo')

<div class="row">
	<div class="col-md-12">
			<table class="table table-hover ">
				<thead>
					<th >Descrição</th>
					<th >Horas</th>					
					<th >Arquivo</th>
					<th >Grupo</th>
					<th >Outros</th>

				</thead>
               @foreach ($atividade as $atv)
				
                  
	              @if($atv->situacao == "Aguardando")  
				<tr class="warning">
					<td>{{ $atv->descricao}}</td>
					<td>{{ $atv->qtdhoras}}</td>
					<td><a href="/arquivos/{{$atv->arquivo}}">{{ $atv->arquivo}}</a></td>
					<td>
						@foreach($grupo as $grupos)
                          @if($atv->grupo_id == $grupos->id)
                               {{$grupos->descricao}}
                          @endif
                      @endforeach	
					</td>
                
	              
	                <td>
	            			<a href="/coordenador/rejeitaAtividade/{{$atv->id}}" class="btn btn-danger">
							     <span class="glyphicon glyphicon-remove"></span> Rejeitar
							</a>
							<a href="/coordenador/validaAtividade/{{$atv->id}}" class="btn btn-success">
							     <span class="glyphicon glyphicon-ok"></span> Validar
							</a>
			        </td>
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
		                               {{$grupos->descricao}}
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
@stop