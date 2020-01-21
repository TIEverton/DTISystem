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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <title>DTI - Cadastro Eventos &copy;</title>
    <script src="../../js/validacao.js"></script>
    <script>$(document).ready(function(){
     $('.telefone').mask("99/99/9999 à 99/99/9999");
    });</script>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 
?>
<!-- FIM INCLUDE MENU -->
<div class="container">
<form method="POST" action="../../controller/salas/Salas.controller.php" class="needs-validation" novalidate>
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="form-group" style="margin-top: 3%;">

      <b>Nome do evento:</b>
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>text_fields</i></span>
            </div>
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do evento." aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
              É necessário informar um <b>nome</b> para a <b>sala.</b>
            </div>
      </div>

      <b>Campus:</b>
        <div class="input-group mb-3">
        <span class="input-group-text" ><i class='material-icons left'>location_city</i></span>
        <select class="form-control custom-select" id="select_campus" name="select_campus" required>
            <option value="">Selecione um campus:</option>
            <?php
                $result_campus = "SELECT * FROM campus";
                $exec = DB::prepare($result_campus);
                $exec->execute();
                while($dados = $exec->fetch(PDO::FETCH_ASSOC)):?>
                <option value="<?php echo $dados['id']?>">
                    <?php echo $dados['nome']?>
                </option>
            <?php
                endwhile;
                ?>
        </select>
        <div class="invalid-feedback" style="margin-bottom: -15px;">
            É necessário informar um <b>campus.</b>
        </div>
        </div>

      <b>Espaço Principal:</b>
        <div class="input-group mb-3">
            <span class="input-group-text" ><i class='material-icons left'>people</i></span>
        <select class="form-control custom-select" name="select_salas" id="select_salas" required>
            <option value="">Selecione uma Sala:</option>
        </select>
        <div class="invalid-feedback" style="margin-bottom: -15px;">
            É necessário informar um <b>espaço.</b>
        </div>
        </div>

        <b>Data do evento:</b>
            <div class="input-group mb-3">
            <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
            <input type="input" name="dataInicial" class="form-control telefone" placeholder="__/__/____ à __/__/____" aria-label="Username" aria-describedby="basic-addon1" required>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
            É necessário informar um <b>horário inicial e final.</b>
            </div>
            </div> 

        <b>Turno:</b>
            <div class="input-group mb-3">
                <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
            <select class="form-control custom-select" name="select_turno" id="select_turno" required>
                <option value="">Selecione um turno:</option>  
                <option>Manhã</option>
                <option>Tarde</option>
                <option>Noite</option>
                <option>Integral</option>
            </select>
            <div class="invalid-feedback">
            É necessário informar um <b>turno.</b>
            </div>
            </div>

        <b>Observação:</b>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" ><i class='material-icons left'>insert_comment</i></span>
            </div>
            <textarea id="observacao" placeholder="Digite os equipamentos que você precisa no seu evento." class="form-control" id="exampleFormControlTextarea1" rows="3" name="observacao" required></textarea>
            <div class="invalid-feedback" style="margin-bottom: -15px;">
            É necessário informar uma <b>observação.</b>
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

<script>
 $(function(){
    //PREENCHER SELECT_SALAS
    $('#select_campus').change(function(){
      $('#select_salas').empty()
      $('#select_salas').append(`<option value="">Selecione uma Sala</option>`); 

      if($(this).val()){
        $.getJSON('../../querys/querysSalas.php?search=', {
          select_campus: $('#select_campus').val(),
          ajax: 'true'
        },
        function(j){
            for(var i = 0; i < j.length; i++){
              id =j[i].id
              nome =j[i].nome
              $('#select_salas').append(`<option value="${id}">${nome}</option>`)
            }
        })
      }
    })   
  })
</script>
</body>
</html>