<?php
session_start();
$host = 'localhost';		
$usuarioDB = 'root';			
$senhaDB = '';			
$db = 'dtisystem';
$v = $_GET['id'];
$con = mysqli_connect($host, $usuarioDB, $senhaDB, $db) or die ("Erro ao se conectar com o servidor.");

$sql = "UPDATE reserva SET pendencia = '0' WHERE id = $v";
$result = mysqli_query($con, $sql);
echo "<script>alert('Pendência retirada com sucesso!');window.location ='../../view/views/listarReserva.php';</script>";
?>