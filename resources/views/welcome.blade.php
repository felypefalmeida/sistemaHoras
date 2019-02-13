
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{asset('css/welcome.min.css')}}">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
<!------ Include the above in your HEAD tag ---------->
<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form action="{{route('acesso.login')}}" method="post" id="formlogin" name="formlogin" role="login" >
           <div class="header">
              @if(isset($erro))
              <div class="alert alert-danger">
                  <p>{{$erro}}</p>
                  </div>
              @endif
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <fieldset id="fie">
          <img src="https://i2.wp.com/sensus.uz/wp-content/uploads/2018/10/exam-1024x1024.png?fit=200%2C200" class="img-responsive" alt="" />
          <input type="text" name="login" id="login"  placeholder="Matricula-Aluno / Cpf-Coord" required class="form-control input-lg"  />
          
          <input type="password" name="senha" id="senha" class="form-control input-lg"  placeholder="Senha" required="" />
             
           {{csrf_field()}}
          <button class="btn btn-success btn-block" type="submit" name="entrar" value="entrar"><i class="fas fa-sign-in-alt"></i> Login</button>
          <div>
          <a href="{{route('aluno.create')}}" hid="novo" >Novo cadastro</a> ou <a href="{{route('acesso.resetPassword')}}">Esqueceu senha</a>
          </div>
          </fieldset>
      
        </form>

      </section>  
      </div>
  </div> 
</div>
        