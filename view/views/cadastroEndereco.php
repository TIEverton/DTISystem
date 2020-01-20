<?php 
include_once '../../config/sessions.php';
require_once '../../config/DB.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>DTI - Cadastro Mac &copy;</title>
    <script src="../../js/validacao.js"></script>
    <script>
    $(document).ready(function(){
      $('#mac').mask('(00) 0000-0000');
    });
    </script>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 
?>
<!-- FIM INCLUDE MENU -->
<div class="container">
<form method="POST" action="../../controller/endereco/Endereco.controller.php" class="needs-validation" novalidate>
<div class="row justify-content-center">
  <div class="col-md-6">
      
    <div class="form-group" style="margin-top: 3%;">
      <b><center>Cadastro Endereço Físico</center></b>
      <b>Setor:</b>
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>location_city</i></span>
      <select class="form-control custom-select" name="setor" id="exampleFormControlSelect1" required>
            <option value="">Selecione um setor:</option>
            <option value="DTI"> DTI</option>
      </select>
      <div class="invalid-feedback" style="margin-bottom: -15px;">
        É necessário selecionar um <b>setor.</b>
      </div>
      </div>

      <b>Funcionário:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>assignment_ind</i></span>
            </div>
            <input type="text" name="funcionario" class="form-control" placeholder="Digite o nome do Funcionário." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar um <b>nome</b> para a <b>sala.</b>
            </div>
      </div>
  
      <b>MAC:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>remove_from_queue</i></span>
            </div>
            <input type="text" id="mac" name="mac" class="form-control" placeholder="Digite o MAC do Computador." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar um <b>MAC</b>
            </div>
      </div>


      <input type="hidden" name="acao" class="form-control" value="inserir"/>
      <div class="botaoentrar" style="margin-top: 10px;">
         <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
          <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Limpar</button>
          <a href="listarsala.php"><button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button></a>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</body>
</html>