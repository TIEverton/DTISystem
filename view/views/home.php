<?php  
session_start();
if (!isset($_SESSION['logado'])) {
  header("location: index.php");

  session_destroy();
}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../../js/filtrotabela.js"></script>
    <title>DTI - Home &copy;</title>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 
?>
<!-- FIM INCLUDE MENU -->

<div class="container">
<br>
<center><h4 id="tituloCards">TABELA DE RESERVAS ATIVAS</h4>
<a href="" id="duvidasLink">Dúvidas sobre a reserva, clique aqui!</a>                      
</center>
<div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>search</i></span>
          </div>
          <input type="text" id="inputPesquisa" onkeyup="filtrarTable()" class="form-control w-25" style="margin-right: 10px;" name="endereco" placeholder="Consulte um item da tabela" aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($resultaEditar['endereco'])) { echo $resultaEditar['endereco']; } ?>">

      <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>location_city</i></span>
      <select class="form-control" id="select_campus" name="select_campus">
          <option value='0'>Filtre um Campus</option>
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
</div><br>

  <div class="row md-13">
        <table id="pesquisaTable" class="table table-striped custab text-center" border="1"style="margin: 0px;">
          <thead>
            <tr class="text-center" style="background-color: #0052aa; color: white;">
                <th>Professor</th>
                <th>Campus</th>
                <th>Sala</th>
                <th>Equipamento</th>
                <th>Data</th>
                <th>Turno</th>
                <th>Horário</th>
                <th>Observação</th>
                <th>Situação</th>
                <th class="text-center">Ação</th>
            </tr>
          </thead>
          <tbody class="table_body">
            </tbody>
        </table>
        </div>
    </div>
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

  <script>
    $(document).ready(function(){
      atualizarTabela()
      setInterval(() => {
        atualizarTabela()
      }, 10000)
      
      $('#select_campus').on('change', atualizarTabela)

      function atualizarTabela(){
        $.getJSON('../../querys/queryReservas.php?search=', {
          select_campus: $('#select_campus').val(),
          ajax: 'true',
        }, function(j){
          $('.table_body').empty()
          //$('.modals').empty()
          
          for(var reserva in j){
            alert(j[reserva])
            $('.table_body').append(`<tr class="reserva${reserva}"></tr>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].responsavel}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].campus}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].sala}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].equipamento} ${j[reserva].numeracaoEqui != null ? ' | N° ' + j[reserva].numeracaoEqui : ''}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].data}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].turno}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].horario}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].observacao}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].situacao}</td>`)

            $(`.reserva${reserva}`).append(`<td class="text-center"><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="${j[reserva].situacao == 'Não entregado' ? '#modalEntregar' + j[reserva].id : j[reserva].situacao == ('Devolvido' || 'Devolvido com problema') ? '' : '#modalDevolver' + j[reserva].id }" href=""><i class="fa fa-check-square" aria-hidden="true"></i></span>${ j[reserva].situacao == 'Não entregado' ? ' Entregar' : j[reserva].situacao == ('Devolvido' || 'Devolvido com problema') ? ' Devolvido' : ' Devolver' }</a></td>`)
            
            //MODAL ENTREGAR
            $('.modals').append(`
            <div class="modal fade" id="modalEntregar${j[reserva].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Deseja entregar qual ${j[reserva].equipamento} a <b>${j[reserva].responsavel}</b>?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="../../controller/reserva/Reserva.controller.php">
                  <div class="modal-body">
                    <b>Selecione um equipamento:</b>
                    <div class="input-group mb-3">
                      <span class="input-group-text" ><i class='material-icons left'>settings_input_hdmi</i></span>
                      <select class="form-control custom-select" name="select_equipamento${j[reserva].id}" id="select_equipamento${j[reserva].id}" required>
                        
                      </select>
                      &nbsp;
                    </div>

                    <input type="hidden" name="acao" class="form-control" value="mudarSituacao">
                    <input type="hidden" name="id" class="form-control" value="${j[reserva].id}">
                    <input type="hidden" name="funcao" class="form-control" value="entregar">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-primary">Sim</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>`)

            //MODAL DEVOLVER
            $('.modals').append(`
            <div class="modal fade" id="modalDevolver${j[reserva].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><b>Devolver</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="../../controller/reserva/Reserva.controller.php">
                  <div class="modal-body">
                      <b>Selecione um estado:</b>
                      <div class="input-group mb-3">
                        <span class="input-group-text" ><i class='material-icons left'>schedule</i></span>
                        <select class="form-control custom-select" name="select_estado${j[reserva].id}" id="select_estado${j[reserva].id}" required>
                          <option value="Devolvido">Sem problemas</option>
                          <option value="Devolvido com problema">Apresenta problemas</option>  
                        </select>
                        &nbsp;
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Comentário</label>
                        <textarea class="form-control" id="comentarioFunc${j[reserva].id}" name="comentarioFunc${j[reserva].id}" rows="3"></textarea>
                      </div>  

                      <input type="hidden" name="acao" class="form-control" value="mudarSituacao">
                      <input type="hidden" name="id" class="form-control" value="${j[reserva].id}">
                      <input type="hidden" name="funcao" class="form-control" value="devolver">
                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                  </form
                </div>
              </div>
            </div>`)
          }
        })
      }
    })
  </script> 
<div class="modals"></div>
</body>
</html>
