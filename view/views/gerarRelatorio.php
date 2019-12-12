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
    <script src="../../js/validacao.js"></script>
    <title>DTI - Relatórios &copy;</title>
</head>
<body>
<!-- INCLUDE MENU -->
<?php 
  include 'menu.php'; 
?>
<!-- FIM INCLUDE MENU -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group" style="margin-top: 3%;">
                    <center><h4 id="tituloCards">GERAR RELATÓRIOS: GERAL E POR CAMPUS.</h4>
                        <a href="" id="duvidasLink">Dúvidas sobre os relatórios, clique aqui!</a>                      
                    </center>

                    <div class="accordion" id="accordionExample">
                    <input type="hidden" name="acao" class="form-control" value="inserir"/>
                        <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <div id="tituloCard1"><i class='material-icons'>list_alt</i><p id="nameCard">Relatório de Reservas</p></div>    
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-group">
                                    <form method="POST" target="_blank" action="../../relatorio/reserva/relatorioreserva_geral.php" class="needs-validation" novalidate>
                                        <b>Selecione um Campus:</b>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" ><i class='material-icons left'>location_city</i></span>
                                            <select class="form-control custom-select" id="select_campus" name="select_campus" required>
                                                <option value="0">Todos os Campus</option>
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
                                        <b>Data inicial:</b>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" ><i class='material-icons left'>date_range</i></span>
                                            <input type="date" name="dataInicial" class="form-control" placeholder="Escolha uma data." id="data" required>
                                            <div class="invalid-feedback" style="margin-bottom: -15px;">
                                                É necessário informar uma <b>data inicial.</b>
                                            </div>
                                        </div>
                                        <b>Data final:</b>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" ><i class='material-icons left'>date_range</i></span>
                                            <input type="date" name="dataFinal" class="form-control" placeholder="Escolha uma data." id="data" required>
                                            <div class="invalid-feedback" style="margin-bottom: -15px;">
                                                É necessário informar uma <b>data final.</b>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success float-right" style="margin-bottom: 10px; margin-top: -5px;"><i class="fa fa-file-text" aria-hidden="true"></i> Gerar</button></a>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD 2 -->
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div id="tituloCard1"><i class='material-icons'>settings_input_hdmi</i><p id="nameCard">Relatório de Equipamentos</p></div>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form  method="POST" target="_blank" action="../../relatorio/equipamento/relatorioequipamento_geral.php" class="needs-validation" novalidate>                 
                                    <div class="form-group">
                                    <b>Selecione um Campus:</b>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" ><i class='material-icons left'>location_city</i></span>
                                            <select class="form-control custom-select" id="select_campus" name="select_campus" required>>
                                                <option value="0">Todos os Campus</option>
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
                                        <b>Data inicial:</b>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" ><i class='material-icons left'>date_range</i></span>
                                            <input type="date" name="dataInicial" class="form-control" placeholder="Escolha uma data." id="data" required>
                                            <div class="invalid-feedback" style="margin-bottom: -15px;">
                                                É necessário informar uma <b>data inicial.</b>
                                            </div>
                                        </div>
                                        <b>Data final:</b>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" ><i class='material-icons left'>date_range</i></span>
                                            <input type="date" name="dataFinal" class="form-control" placeholder="Escolha uma data." id="data" required>
                                            <div class="invalid-feedback" style="margin-bottom: -15px;">
                                                É necessário informar uma <b>data final.</b>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right" style="margin-bottom: 10px; margin-top: -5px;"><i class="fa fa-file-text" aria-hidden="true"></i> Gerar</button></a>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>