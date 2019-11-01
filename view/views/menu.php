<?php
if(!isset($_SESSION)){ 
    session_start(); 
} 
?>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark lighten-1" style="z-index:1;">
        <a class="navbar-brand" href="#">
                <div class="img-login"> 
                        <img class="img-login" src="../../img/logodtisysteminicial.png" style="height: 60px;"> 
                </div> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
          aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555" style="background-color: #0052aa; cursor: pointer;">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Inicial
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-square" aria-hidden="true"></i> Cadastro
                    </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-555">
                    <a class="dropdown-item" href="cadastrousuario.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Usuário</a>
                    <a class="dropdown-item" href="cadastroequipamento.php"><i class="fa fa-keyboard-o" aria-hidden="true"></i> Equipamento</a>
                    <a class="dropdown-item" href="cadastrocampus.php"><i class="fa fa-university" aria-hidden="true"></i> Campus</a>
                    <a class="dropdown-item" href="cadastrosala.php"><i class="fa fa-users" aria-hidden="true"></i> Sala</a>
                    <a class="dropdown-item" href="cadastroReserva.php"><i class="fa fa-inbox" aria-hidden="true"></i> Reserva</a>
            </div>
            </li>

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="fa fa-id-badge" aria-hidden="true"></i> Documentos
                </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                <a class="dropdown-item" href="#"><i class="fa fa-address-card-o" aria-hidden="true"></i> Carteira de Estudante</a>
                <a class="dropdown-item" href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Crachá Estágio</a>
                <a class="dropdown-item" href="#"><i class="fa fa-address-card-o" aria-hidden="true"></i> Crachá Funcionário</a>
        </div>
        </li> 

            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text" aria-hidden="true"></i> Relatório
              </a>
              <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                <a class="dropdown-item" href="#"><i class="fa fa-university" aria-hidden="true"></i> Por campus</a>
                <a class="dropdown-item" href="#"><i class="fa fa-university" aria-hidden="true"></i> Geral</a>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item active">
              <a class="nav-link waves-effect waves-light" data-toggle="modal" data-target="#modalNotificacao">1
                <i class="fa fa-bell" aria-hidden="true"></i>
              </a>
            </li>
            <li class="nav-item avatar dropdown active">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_name'];?> <i class="fa fa-user-circle" aria-hidden="true"></i> 
              </a>
              <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                aria-labelledby="navbarDropdownMenuLink-55">
                <a class="dropdown-item" href="#"><i class="fa fa-id-card" aria-hidden="true"></i> Editar Perfil</a>
                <a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
<!--/.Navbar -->

