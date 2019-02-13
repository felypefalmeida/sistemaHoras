@extends('layouts.coord')
@section('conteudo')
<?php session_start();?>
<div class="card border">
    <div class="card-body">
        <form action="/grupo/cadastrar" method="POST">
        	@csrf
            <div class= "row">
                <div class= "col-md-8"> 
                    <label for="Descricao">Descricao</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descricao">
                </div>
                <div class= "col-md-8">
                    <label for="Horas">Horas</label>
                    <input type="text" name="qtdHoras" id="qtdHoras" class="form-control" placeholder="Horas">   
                </div>     
            </div>
            <label></label>

            <div class="form-check">
               <input type="checkbox" name="maxHoras" class="form-check-input" id="maxHoras" value="checked">
               <label class="form-check-label" for="exampleCheck1">Max Horas</label>
            </div>
            
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button  class="btn btn-danger btn-sm">Cancelar</button>
        </form>      
    </div>
</div>

@endsection