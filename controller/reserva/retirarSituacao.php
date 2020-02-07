<?php
session_start();
require_once '../../config/startdb.php';
$v = $_GET['id'];

$sql = "UPDATE reserva SET pendencia = '0' WHERE id = $v";
$result = mysqli_query($con, $sql);
echo "<script>alert('Pendência retirada com sucesso!');window.location ='../../view/views/listarReserva.php';</script>";
?>