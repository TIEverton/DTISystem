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

          for(var reserva in j){
            $('.table_body').append(`<tr class="reserva${reserva}"></tr>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].responsavel}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].campus}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].sala}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].equipamento} | N° ${j[reserva].numeracaoEqui}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].data}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].turno}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].horario}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].observacao}</td>`)
            $(`.reserva${reserva}`).append(`<td>${j[reserva].situacao}</td>`)

            $(`.reserva${reserva}`).append(`<td class="text-center"><a class="btn btn-primary btn-sm" href="#"><i class="fa fa-check-square" aria-hidden="true"></i></span>${ j[reserva].situacao === 'Não entregado' ? ' Entregar' : 'Devolver' }</a></td>`)
  
          }
        })
      }
    })
  </script>

</body>
</html>