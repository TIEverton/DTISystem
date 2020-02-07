<?php
session_start();
require_once '../../config/startdb.php';
$a = $_GET['acao'];
$id = $_GET['id'];
if ($a == 'aceitar') {
    $sql = "UPDATE suporte SET situacao = 'Evento aceito.' WHERE idSuporte = $id";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('Evento aceito com sucesso!');window.location ='../../view/views/listarSuporte.php';</script>";
} else if ($a == 'rejeitar') {
    $sql = "UPDATE suporte SET situacao = 'Evento negado.' WHERE idSuporte = $id";
    $result = mysqli_query($con, $sql);
    echo "<script>alert('Evento negado!');window.location ='../../view/views/listarSuporte.php';</script>";
}

?>