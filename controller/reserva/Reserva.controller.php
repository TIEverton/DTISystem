<?php

    require_once 'Reserva.DAO.php';
    require_once '../../model/reserva/Reserva.class.php';
    $ReservaClass = new reserva_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $ReservaClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($ReservaClass->getEquipamento()) || !empty($ReservaClass->getCampus())
        || !empty($ReservaClass->getSala()) || !empty($ReservaClass->getData()) || !empty($ReservaClass->getTurno()) 
        || !empty($ReservaClass->getHorario())|| !empty($ReservaClass->getObservacao())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $ReservaClass->setId($_POST['id']);
            }
            $horario = ''; 

            for ($i=$_POST['select_horario_inicial']; $i <= $_POST['select_horario_final']; $i++) { 
                $horario = $horario.$i;
            }

            $ReservaClass->setEquipamento($_POST['select_equipamentos']);
            $ReservaClass->seCampus($_POST['select_campus']);
            $ReservaClass->setSala($_POST['select_salas']);
            $ReservaClass->setData($_POST['data']);
            $ReservaClass->setHorario($horario);
            $ReservaClass->setTurno($_POST['select_turno']);
            $ReservaClass->setObservacao($_POST['observacao']);
            $ReservaClass->setResponsavel($_POST['responsavel']);
        }
    }

switch($acao){
    case 'inserir':
        try{
            $ReservaClass->insert($ReservaClass->getEquipamento(),$ReservaClass->getSala(),$ReservaClass->getCampus(), $ReservaClass->getResponsavel(), $ReservaClass->getData(),$ReservaClass->getTurno(),$ReservaClass->getHorario(), $ReservaClass->getObservacao() );
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $ReservaClass->delete($ReservaClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $ReservaClass->update($ReservaClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}