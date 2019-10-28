<?php 
session_start();
if (!isset($_SESSION['logado'])) {
  header("location: index.php");

    session_destroy();
}
if(isset($_GET['TelaLogin.php'])){
  session_destroy();
}

?>