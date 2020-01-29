<?php
session_start();
$host = 'localhost';		
$usuarioDB = 'root';			
$senhaDB = '';			
$user = $_SESSION['user_id'];
$db = 'dtisystem';		
$con = mysqli_connect($host, $usuarioDB, $senhaDB, $db) or die ("Erro ao se conectar com o servidor.");
echo $user;
date_default_timezone_set('America/Sao_Paulo');
$update = "UPDATE reserva SET pendencia = '1' WHERE situacao = 'Entregue'";
$result = mysqli_query($con, $update);
echo 'estro';

?>
