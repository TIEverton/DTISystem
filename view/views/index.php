<?php 
  session_start();
  if(isset($_SESSION['logado'])){
    header("location: home.php");

    session_destroy();
  }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>DTI - Login &copy;</title>
</head>
<body>
<form method="POST" action="../../controller/usuario/Usuario.controller.php">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
                <div class="img-login"> 
                     <img class="img-login" src="../../img/logodtisystembranca.png"> 
                 </div> 

            <div class="p-3 card">
                <div class="card-body">
                        <h1 class="text-login">ENTRAR</h1>
                    <div class="form-group">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>email</i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Seu email"  aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>

                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>lock</i></span>
                                </div>
                                <input type="password" name="senha" class="form-control"  placeholder="Sua senha" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
                        
                        <input type="hidden" id="acao" name="acao" value="autenticar">
                        <a href="" id="recuperar-senha">Solicitar recuperação de login</a>
                        <div class="botaoentrar">

                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
            </div>
        </div>

    </div> 
    </div>
    </div>

</body>
</html>