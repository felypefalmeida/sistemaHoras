<!DOCTYPE html>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Relatorio de atividades</title>
         <!-- Latest compiled and minified CSS -->
         
           <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 

		    <style>
		.page-break {
		    page-break-after: always;
		}
		</style>

    </head>

    <body>
     <p align="center"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGQa_v8r8KDLK5AspsgrUEYgouD11xrfec6oLJjS5m84DH3mWPVg" class="img-absolute"  /></p>
 <br></br>
	<h1>Relatório de Atividades</h1>
		 <div class="pull-right">
		    </div>
		    <table class="table table-striped">
		    <thead>
		      <tr>
	
		        <th>Nome</th>
		        <th>Horas</th>
		        <th>Situação</th>
		        <th>Grupo</th>
		        <th>Arquivo</th>
		      </tr>
		    </thead>
	  <tbody>
      @foreach($atvidade as $value)
      <tr>
        <td>{{$value->descricao}}</td>
        <td>{{$value->qtdhoras}}</td>
        <td>{{$value->situacao}}</td>
		<td>
		  @foreach($nomeGrupo as $grupos)

	          @if($value->grupo_id == $grupos->id)
	               {{$grupos->descricao}}
          @endif

        @endforeach
        </td>
        <td><a href="/arquivos/{{$value->arquivo}}">{{ $value->arquivo}}</a></td>

      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
 
   <h3 class=" text-success"> Você possui <ins>{{$qtdHorasAluno}}</ins>  horas validadas.</h3>


	<h3 class="text-danger"> Você possui  <ins>{{$restante}}</ins> horas faltando. </h3>
 
 	

</body>

</div>
</html>