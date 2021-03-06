<?php 
include_once '../../config/sessions.php';
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
    <title>DTI - Cadastro Usuário &copy;</title>
    <script src="../../js/validacao.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script>$(document).ready(function(){
     $('.cpf').mask("99999999999");
    });</script>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 
?>
<!-- FIM INCLUDE MENU -->

<div class="container" onload="validate()">
<form method="POST" action="../../controller/usuario/Usuario.controller.php" class="needs-validation" novalidate>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="form-group" style="margin-top: 3%;">
    <input type="hidden" name="id" value="" />
      <b>Nome:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>perm_contact_calendar</i></span>
            </div>
            <input type="text" name="nome" id="validationCustom03" class="form-control" placeholder="Digite seu nome e sobrenome." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar um <b>nome</b> e <b>sobrenome.</b>
            </div>
      </div>
      

      <b>Login:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>account_circle</i></span>
            </div>
            <input type="text" name="login" class="form-control" placeholder="Digite um login." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar um <b>nome de usuário.</b>
            </div>
      </div>

      <b>Senha:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>lock</i></span>
            </div>
            <input type="password" name="senha" class="form-control" placeholder="Digite uma senha." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar uma <b>senha.</b>
            </div>
      </div>

      <b>Email:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>email</i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Digite um email válido." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar um <b>email.</b>
            </div>
      </div>

      <b>CPF:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>call_to_action</i></span>
            </div>
            <input type="text" name="cpf" class="form-control cpf" placeholder="Digite seu CPF." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
             É necessário informar um <b>CPF.</b>
            </div>
      </div>

      <b>Nível de Acesso:</b>
      <select class="form-control custom-select" name="nivel" id="exampleFormControlSelect1" required>
          <option value="">Selecione um nível de acesso:</option>
          <option value="0">Administrador / Funcionário</option>
          <option value="1">Professor / Responsável</option>
      </select>
      <div class="invalid-feedback" style="margin-bottom: -7px;">
        É necessário informar um <b>nível de acesso!</b>
      </div>
      <input type="hidden" name="acao" class="form-control" value="inserir">
      <div class="botaoentrar" style="margin-top: 10px;">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button></a>
          <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Limpar</button></a>
          <a href="listarusuario.php"><button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button></a>
      </div>
    </div>
  
  </div>
</div>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="modalNotificacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Notificações de problemas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped custab text-center" border="1">
                <thead>
                    <tr class="text-center" style="background-color: #0052aa; color: white;">
                        <th>Professor</th>
                        <th>Sala</th>
                        <th>Descrição</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                        <tr>
                            <td>Everton Pinheiro da Silva</td>
                            <td>14/05/2002</td>
                            <td>Datashow piscando</td>
                            <td>
                              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check-square" aria-hidden="true"></i></span> </a>
                              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-times-circle" aria-hidden="true"></i></span> </a>
                            </td>
                        </tr>
                </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>