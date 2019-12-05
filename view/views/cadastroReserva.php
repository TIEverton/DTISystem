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
    <title>DTI - Reservar Equipamento &copy;</title>
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
  <div class="col-8">
    <div class="form-group" style="margin-top: 3%;">
        <center><h4 id="tituloCards">RESERVA DE EQUIPAMENTO</h4>
          <a href="" id="duvidasLink">Dúvidas sobre a reserva, clique aqui!</a>                      
        </center>
    <div class="accordion" id="accordionExample">
      <!-- CARD 1 -->
      <div class="card">
        <!-- Titulo do Card -->
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <div id="tituloCard1"><i class='material-icons'>location_city</i><p id="nameCard">Campus:</p></div>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
                <div class="form-group" >
                    <b>Campus:</b>
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
              
                    <b>Sala:</b>
                    <div class="input-group mb-3">
                      <span class="input-group-text" ><i class='material-icons left'>people</i></span>
                    <select class="form-control" name="select_salas" id="select_salas">
                        <option>Selecione uma Sala:</option>
                    </select>
                    </div>
                    
                    <input type="hidden" name="acao" class="form-control" value="inserir"/>
                    <input type="hidden" name="responsavel" value="<?php echo $_SESSION['user_id'];?>"/>
                  </div>
                </div>
        </div>

      </div>

          <!-- CARD 2 -->
          <div class="card">
            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <div id="tituloCard1">
                  <i class='material-icons left'>date_range</i><p id="nameCard2">Data e Horário:</p>
              </div>
        
            </div>

          <div id="collapseTwo" class="collapse" aria-labelledby="headingThree">
            <div class="card-body">
                <div class="form-group" >
                <b>Data:</b>
              <div class="input-group mb-3">
                    <span class="input-group-text" ><i class='material-icons left'>date_range</i></span>
                    <input type="date" name="data" class="form-control" placeholder="Escolha uma data." id="data">
              </div>
        
              <b>Turno:</b>
              <div class="input-group mb-3">
                    <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
              <select class="form-control" name="select_turno" id="select_turno">
                  <option>Selecione um turno:</option>  
                  <option>Manhã</option>
                  <option>Tarde</option>
                  <option>Noite</option>
              </select>
              </div>
        
              <b>Horário:</b>
              <div class="input-group mb-3">
              <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
              <select class="form-control" name="select_horario_inicial" id="select_horario_inicial">
                  <option>Selecione horário inicial:</option>
              </select>
              &nbsp;&nbsp;&nbsp;
              <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
              <select class="form-control" name="select_horario_final" id="select_horario_final">
                  <option>Selecione horário final:</option>
              </select>
              </div>
                    
                    <input type="hidden" name="acao" class="form-control" value="inserir"/>
                    <input type="hidden" name="responsavel" value="<?php echo $_SESSION['user_id'];?>"/>
                  </div>
                </div>
        </div>

      </div>
      
            <!-- CARD 3 -->
            <div class="card">
        <!-- Titulo do Card -->
          <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <div id="tituloCard3">
                <i class='material-icons left'>keyboard</i><p id="nameCard3">Equipamento:</p>
            </div>
          </div>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
        <div class="card-body">
              <div class="form-group" >
              
              <b>Agrupamento:</b>
              <div class="input-group mb-3">
                      <span class="input-group-text" ><i class='material-icons left'>keyboard</i></span>
              <select class="form-control" name="select_agrupamento" id="select_agrupamento">
                    <option>Selecione o tipo de Equipamento:</option>
                    <?php
                          $result_agrupamento = "SELECT * FROM agrupamento";
                          $exec = DB::prepare($result_agrupamento);
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
              
              <b>Equipamento:</b>
              <div class="input-group mb-3">
                    <span class="input-group-text" ><i class='material-icons left'>keyboard</i></span>
              <select class="form-control" name="select_equipamentos" id="select_equipamentos">
                  <option>Selecione um Equipamento:</option>
              </select>
              </div>
              
                            
              <b>Observação:</b>
              <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" ><i class='material-icons left'>insert_comment</i></span>
                    </div>
                    <textarea id="observacao" class="form-control" id="exampleFormControlTextarea1" rows="1" name="observacao"></textarea>
              </div>
              
              <input type="hidden" name="acao" class="form-control" value="inserir"/>
              <input type="hidden" name="responsavel" value="<?php echo $_SESSION['user_id'];?>"/>
              </div>
              </div>
        </div>

      </div>


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
      $('#select_horario_inicial').empty();
      $('#select_horario_final').empty();
      if($('#select_turno').val() == 'Noite'){
        //HORÁRIOS INICIAIS
        $('#select_horario_inicial').append('<option>Selecione um horário inicial:</option>')
        $('#select_horario_inicial').append('<option value="0">A - 18:30h</option>')
        $('#select_horario_inicial').append('<option value="1">B - 19:20h</option>')
        $('#select_horario_inicial').append('<option value="2">C - 20:30h</option>')
        $('#select_horario_inicial').append('<option value="3">D - 21:20h</option>')
        //HORÁRIOS FINAIS
        $('#select_horario_final').append('<option>Selecione um horário final:</option>')
        $('#select_horario_final').append('<option value="0">A - 19:20h</option>')
        $('#select_horario_final').append('<option value="1">B - 20:10h</option>')
        $('#select_horario_final').append('<option value="2">C - 21:20h</option>')
        $('#select_horario_final').append('<option value="3">D - 22:10h</option>')
      } else if($('#select_turno').val() == 'Manhã') {
        //HORÁRIOS INICIAIS
        $('#select_horario_inicial').append('<option>Selecione um horário inicial:</option>')
        $('#select_horario_inicial').append('<option value="0">A - 07:30h</option>')
        $('#select_horario_inicial').append('<option value="1">B - 08:20h</option>')
        $('#select_horario_inicial').append('<option value="2">C - 09:10h</option>')
        $('#select_horario_inicial').append('<option value="3">D - 10:20h</option>')
        $('#select_horario_inicial').append('<option value="4">E - 11:10h</option>')
        $('#select_horario_inicial').append('<option value="5">F - 12:00h</option>')
        //HORÁRIOS FINAIS
        $('#select_horario_final').append('<option>Selecione um horário final:</option>')
        $('#select_horario_final').append('<option value="0">A - 08:20h</option>')
        $('#select_horario_final').append('<option value="1">B - 09:10h</option>')
        $('#select_horario_final').append('<option value="2">C - 10:00h</option>')
        $('#select_horario_final').append('<option value="3">D - 11:10h</option>')
        $('#select_horario_final').append('<option value="4">E - 12:00h</option>')
        $('#select_horario_final').append('<option value="5">F - 12:50h</option>')
      } else if($('#select_turno').val() == 'Tarde') {
        //HORÁRIOS INICIAIS
        $('#select_horario_inicial').append('<option>Selecione um horário inicial:</option>')
        $('#select_horario_inicial').append('<option value="0">A - 13:30h</option>')
        $('#select_horario_inicial').append('<option value="1">B - 14:20h</option>')
        $('#select_horario_inicial').append('<option value="2">C - 15:30h</option>')
        $('#select_horario_inicial').append('<option value="3">D - 16:20h</option>')
        //HORÁRIOS FINAIS
        $('#select_horario_final').append('<option>Selecione um horário final:</option>')
        $('#select_horario_final').append('<option value="0">A - 14:20h</option>')
        $('#select_horario_final').append('<option value="1">B - 15:10h</option>')
        $('#select_horario_final').append('<option value="2">C - 16:20h</option>')
        $('#select_horario_final').append('<option value="3">D - 17:10h</option>')
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
    $('#select_campus, #data, #select_turno, #select_horario_inicial, #select_horario_final, #select_agrupamento').change(function(){
      $('#select_equipamentos').empty()
      $('#select_equipamentos').append(`<option value="">Selecione um Equipamento: </option>`); 

      if($(this).val()){
        $.getJSON('../../querys/querysEquipamentos.php?search=', {
          select_campus: $('#select_campus').val(),
          data: $('#data').val(),
          select_turno: $('#select_turno').val(),
          select_horario_inicial: $('#select_horario_inicial').val(),
          select_horario_final: $('#select_horario_final').val(),
          select_agrupamento: $('#select_agrupamento').val(),
          ajax: 'true'
        },
        function(j){
            $('#select_equipamentos').empty()
            for(var i = 0; i < j.length; i++){
              id =j[i].id
              nome =j[i].nome
              numeracao = j[i].numeracao
              $('#select_equipamentos').append(`<option value="${id}">${nome} | N° ${numeracao}</option>`)
            }
        })
      }

      // if($(this).val()){
      //   $.getJSON('../../querys/queryAgrupamento.php?search=', {
      //     select_campus: $('#select_campus').val(),
      //     data: $('#data').val(),
      //     select_turno: $('#select_turno').val(),
      //     select_horario_inicial: $('#select_horario_inicial').val(),
      //     select_horario_final: $('#select_horario_final').val(),
      //     ajax: 'true'
      //   },
      //   function(j){
      //       $('#select_agrupamento').empty()
      //       for(var i = 0; i < j.length; i++){
      //         quantidadeEqui = j[i].quantidadeEqui
      //         $('#select_agrupamento').append(`<option value="" | Quant. ${quantidadeEqui}</option>`)
      //       }
      //   })
      // }
    })
  })
  
</script>


</body>
</html>