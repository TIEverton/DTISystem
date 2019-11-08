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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>DTI - Cadastro Equipamento &copy;</title>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 
?>
<!-- FIM INCLUDE MENU -->
<div class="container">
<form method="POST" action="../../controller/reserva/Reserva.controller.php">
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="form-group" style="margin-top: 3%;">

      Campus:
      <div class="input-group mb-3">
      <span class="input-group-text" ><i class='material-icons left'>location_city</i></span>
      <select class="form-control" id="select_campus" name="select_campus">
          <option>Selecione um campus:</option>
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
      </div>

      Sala:
      <div class="input-group mb-3">
        <span class="input-group-text" ><i class='material-icons left'>people</i></span>
      <select class="form-control" name="select_salas" id="select_salas">
          <option>Selecione uma Sala:</option>
      </select>
      </div>

      Equipamento:
      <div class="input-group mb-3">
            <span class="input-group-text" ><i class='material-icons left'>keyboard</i></span>
      <select class="form-control" name="select_equipamentos" id="select_equipamentos">
          <option>Selecione um Equipamento:</option>
      </select>
      </div>

      Data:
      <div class="input-group mb-3">
            <span class="input-group-text" ><i class='material-icons left'>date_range</i></span>
            <input type="date" name="data" class="form-control" placeholder="Escolha uma data." id="data">
      </div>

      Turno:
      <div class="input-group mb-3">
            <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
      <select class="form-control" name="select_turno" id="select_turno">
          <option>Selecione um turno:</option>  
          <option>Manhã</option>
          <option>Tarde</option>
          <option>Noite</option>
      </select>
      </div>

      Horário:
      <div class="input-group mb-3">
            <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
      <select class="form-control" name="select_horario" id="select_horario">
          <option>Selecione uma Horário:</option>
          <option>AB</option>
          <option>CD</option>
      </select>
      </div>

      Observação:
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" ><i class='material-icons left'>insert_comment</i></span>
            </div>
            <textarea id="observacao" class="form-control" id="exampleFormControlTextarea1" rows="5" name="observacao"></textarea>
      </div>
      
      <input type="hidden" name="acao" class="form-control" value="inserir"/>
      <input type="hidden" name="responsavel" value="<?php echo $_SESSION['user_id'];?>"/>
      <div class="botaoentrar" style="margin-top: 10px;">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button></a>
          <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Limpar</button></a>
          <a href="listarReserva.php"><button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button></a>
      </div>
    </div>
  </div>
</div>
</form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalNotificacao" tabi="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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

<script>
  $(function(){
    // SELECT HORARIO
    $('#select_turno').change(function(){
      $('#select_horario').empty();
      if($('#select_turno').val() == 'Noite'){
        $('#select_horario').append('<option value="ab">AB</option>')
      }else{
        $('#select_horario').append('<option value="ab">AB</option>')
        $('#select_horario').append('<option value="cd">CD</option>')        
      }
    });
  });

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

  $(function(){
    //PREENCHER SELECT_EQUIPAMENTOS
    $('#select_campus').change(function(){
      $('#select_equipamentos').empty()
      $('#select_equipamentos').append(`<option value="">Selecione um Equipamento</option>`); 

      if($(this).val()){
        $.getJSON('../../querys/querysEquipamentos.php?search=', {
          select_campus: $('#select_campus').val(),
          ajax: 'true'
        },
        function(j){
            for(var i = 0; i < j.length; i++){
              id =j[i].id
              nome =j[i].nome
              numeracao = j[i].numeracao
              $('#select_equipamentos').append(`<option value="${id}">${nome} | N° ${numeracao}</option>`)
            }
        })
      }
    })
  })
  
</script>

</body>
</html>