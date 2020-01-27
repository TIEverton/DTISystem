<?php
  date_default_timezone_set('America/Sao_Paulo');
  require_once '../../config/DB.php';
  $daf = date('s');
  
  if ($daf == 10) {
      $sql = "SELECT responsavel FROM reserva WHERE situacao = 'Entregue' ";
  }
?>
