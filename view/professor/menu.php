<?php
if ($_SESSION['nivel'] == 0) {
  echo "<script>alert('Sem autorização!');window.location='../views/home.php'</script>";
}
if(!isset($_SESSION)){ 
    session_start(); 
} 
?>
<style>
  .navbar {
    z-index: 1;
  }
</style>
<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark lighten-1">
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
            
            <li class="nav-item active">
              <a class="nav-link" href="reservar.php"><i class="fa fa-inbox" aria-hidden="true"></i> Reserva
                <span class="sr-only">(current)</span>
              </a>
            </li>

            
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="fa fa-id-badge" aria-hidden="true"></i> Solicitações
                </a>
                <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
                    <a class="dropdown-item" href="solicitardocumento.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Crachás/Carterinha</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-address-card" aria-hidden="true"></i> Suporte a Eventos</a>
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
                <a class="dropdown-item" href="editarperfil.php"><i class="fa fa-id-card" aria-hidden="true"></i> Mudar senha</a>
                <a class="dropdown-item" href="../views/index.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
<!--/.Navbar -->