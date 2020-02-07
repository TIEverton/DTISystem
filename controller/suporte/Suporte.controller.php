<?php

    require_once 'Suporte.DAO.php';
    require_once '../../model/suporte/Suporte.class.php';
    $SuporteClass = new suporte_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $SuporteClass->setIdSuporte($_GET['idSuporte']);
    }
    if($acao != "delete"){
            if($acao == "update"){
                $SuporteClass->setIdSuporte($_POST['idSuporte']);
            }
            $SuporteClass->setNomeEvento($_POST['nomeEvento']);
            $SuporteClass->setCampusEvento($_POST['campusEvento']);
            $SuporteClass->setEspacoPrincipal($_POST['espacoPrincipal']);
            $SuporteClass->setDataEvento($_POST['dataEvento']);
            $SuporteClass->setTurnoEvento($_POST['turnoEvento']);
            $SuporteClass->setObsEvento($_POST['obsEvento']);
    }
  
switch($acao){
    case 'inserir':
        try{
            $SuporteClass->insert($SuporteClass->getNomeEvento(),$SuporteClass->getCampusEvento(),$SuporteClass->getEspacoPrincipal(),$SuporteClass->getDataEvento(),$SuporteClass->getTurnoEvento(),$SuporteClass->getObsEvento(),$SuporteClass->getSituacao());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'mudarSituacao':
        try {
            $SuporteClass->mudarSituacao($idSuporte, $situacao);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    break;

//     case 'delete':
//         try{
//             $SuporteClass->delete($SuporteClass->getIdSuporte());
//         }catch(Exception $e){
//             echo $e->getMessage();
//         }
//     break;
//     case 'update':
//         try{
//             $SuporteClass->update($SuporteClass->getIdSuporte());
//         }catch(Exception $e){
//             echo $e->getMessage();
//         }
//     break;
}