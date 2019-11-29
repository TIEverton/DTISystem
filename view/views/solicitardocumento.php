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
    <title>DTI - Solicitações &copy;</title>
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
                    <center><h4 id="tituloCards">SOLICITAÇÕES DE DOCUMENTOS</h4>
                        <a href="" id="duvidasLink">Dúvidas sobre a reserva, clique aqui!</a>                      
                    </center>

                    <div class="accordion" id="accordionExample">
                    <input type="hidden" name="acao" class="form-control" value="inserir"/>
                        <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <div id="tituloCard1"><i class='material-icons'>featured_play_list</i><p id="nameCard">Carteira de Estudante:</p></div>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-group">
                                        <b>Nome do aluno(a):</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>perm_identity</i></span>
                                            </div>
                                            <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <b>Matrícula do aluno(a):</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>filter_9_plus</i></span>
                                            </div>
                                            <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <b>Curso do Aluno(a):</b>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" ><i class='material-icons left'>copyright</i></span>
                                            <select class="form-control" id="select_campus" name="select_campus">
                                                <option>Selecione um curso:</option>
                                                <option>Analíse de Sistemas</option>
                                                <option>Enfermagem</option>
                                                <option>Serviço Social</option>
                                            </select>
                                        </div>

                                        <b>Foto 3x4 do Aluno:</b>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" ><i class='material-icons left'>assignment_ind</i></span>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input">
                                            <label class="custom-file-label" for="customFileLang">Selecione uma imagem...</label>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right" style="margin-bottom: 10px; margin-top: -5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD 2 -->
                        <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div id="tituloCard1"><i class='material-icons'>assignment_ind</i><p id="nameCard">Crachá Estágio:</p></div>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-group">
                                        <b>Nome do aluno(a):</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>perm_identity</i></span>
                                            </div>
                                            <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <b>Matrícula do aluno(a):</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class='material-icons left'>filter_9_plus</i></span>
                                            </div>
                                            <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF." aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <b>Curso do Aluno(a):</b>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" ><i class='material-icons left'>copyright</i></span>
                                            <select class="form-control" id="select_campus" name="select_campus">
                                                <option>Selecione um curso:</option>
                                                <option>Analíse de Sistemas</option>
                                                <option>Enfermagem</option>
                                                <option>Serviço Social</option>
                                            </select>
                                        </div>

                                        <b>Foto 3x4 do Aluno:</b>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text" ><i class='material-icons left'>assignment_ind</i></span>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input">
                                            <label class="custom-file-label" for="customFileLang">Selecione uma imagem...</label>
                                        </div>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right" style="margin-bottom: 10px; margin-top: -5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i> Enviar</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="reset" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Limpar</button></a>
                <a href="listarsolicitacoes.php"><button type="button" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Ver Solicitações</button></a>
            </div>
        </div>
    </div>
    
</body>
</html>