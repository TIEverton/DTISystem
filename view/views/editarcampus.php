<?php 
session_start();
if (!isset($_SESSION['logado'])) {
  header("location: index.php");
  session_destroy();
}
$id =  filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
include_once '../../config/config.php';

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
    <title>DTI - Editar Usuário &copy;</title>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 

  $resultaQuery = "SELECT * FROM campus where id= $id";

  //selecionar os registros
  $resulta = $conecta->prepare($resultaQuery);
  $resulta->execute();
  $resultaEditar = $resulta->fetch(PDO::FETCH_ASSOC);
?>
<!-- FIM INCLUDE MENU -->

<div class="container">
<form method="POST" action="../../controller/campus/Campus.controller.php">
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="form-group" style="margin-top: 3%;">
    <input type="hidden" name="id" value="" />

    Nome:
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>text_fields</i></span>
            </div>
            <input type="text" class="form-control" name="nome" placeholder="Digite o nome do Campus." aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($resultaEditar['nome'])) { echo $resultaEditar['nome']; } ?>">
      </div>

      CNPJ:
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>featured_play_list</i></span>
            </div>
            <input type="text" class="form-control" name="cnpj" placeholder="Digite o CNPJ do Campus." aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($resultaEditar['cnpj'])) { echo $resultaEditar['cnpj']; } ?>">
      </div>

      Endereço:
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>map</i></span>
            </div>
            <input type="text" class="form-control" name="endereco" placeholder="Digite o endereço do Campus." aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($resultaEditar['endereco'])) { echo $resultaEditar['endereco']; } ?>">
      </div>

      Rua:
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>my_location</i></span>
            </div>
            <input type="text" class="form-control" name="rua" placeholder="Digite a rua do Campus." aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($resultaEditar['rua'])) { echo $resultaEditar['rua']; } ?>">
      </div>

      Número:
      <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>filter_1</i></span>
            </div>
            <input type="text" class="form-control" name="numero" placeholder="Digite o número do Campus." aria-label="Username" aria-describedby="basic-addon1" value="<?php if(isset($resultaEditar['numero'])) { echo $resultaEditar['numero']; } ?>">
      </div>

      <input type="hidden" name="acao" class="form-control" value="update">
      <input type="hidden" name="id" class="form-control" value="<?php echo $id?>"/>
      <div class="botaoentrar" style="margin-top: 10px;">
          <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button></a>
          <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Limpar</button></a>
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