<?php

    require_once 'Equipamento.DAO.php';
    require_once '../../model/equipamento/Equipamento.class.php';
    $equipClass = new equipamento_DAO();
    
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $equipClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($equipClass->getNumeracao()) || !empty($equipClass->getDescricao()) ||
           !empty($equipClass->getAgrupamento())   || !empty($equipClass->getCampus())
           ||!empty($equipClass->getSituacao())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $equipClass->setId($_POST['id']);
            }
            $equipClass->setNumeracao($_POST['numeracao']);
            $equipClass->setAgrupamento($_POST['agrupamento']);
            $equipClass->setCampus($_POST['campus']);
            $equipClass->setSituacao($_POST['situacao']);
            $equipClass->setDescricao($_POST['descricao']);
        }
    }


switch($acao){
    case 'inserir':
        try{
            $equipClass->insert($equipClass->getNumeracao(),$equipClass->getAgrupamento(), $equipClass->getCampus(), $equipClass->getDescricao(), $equipClass->getSituacao());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $equipClass->delete($equipClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $equipClass->update($equipClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}