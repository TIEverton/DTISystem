<?php

    require_once 'Suporte.DAO.php';
    require_once '../../model/suporte/Suporte.class.php';
    $suporteClass = new suporte_DAO();
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if ($acao == "delete") {
        $suporteClass->setIdSuporte($_GET['id']);
    }
    if ($acao != "delete") {
        if ($acao == "update") {
            $suporteClass->setIdEvento($_POST['id']);
        }
        $suporteClass->setNomeEvento($_POST['nomeEvento']);
        $suporteClass->setCampusEvento($_POST['campusEvento']);
        $suporteClass->setEspacoPrincipal($_POST['espacoEvento']);
        $suporteClass->setDataEvento($_POST['dataEvento']);
        $suporteClass->setTurnoEvento($_POST['turnoEvento']);
        $suporteClass->setObsEvento($_POST['obsEvento']);
        $suporteClass->setSituacao($_POST['situacao']);
    }

    switch($acao){
        case 'inserir':
            try {
                $suporteClass->insert($suporteClass->getNomeEvento)
            } catch (\Throwable $th) {
                //throw $th;
            }
    }


?>