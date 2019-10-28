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
        if(!empty($equipClass->getIdentificador()) || !empty($equipClass->getDescricao()) ||
           !empty($equipClass->getNome())   || !empty($equipClass->getCampus()) ||
           !empty($equipClass->getQtd())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $equipClass->setId($_POST['id']);
            }
            $equipClass->setIdentificador($_POST['identificador']);
            $equipClass->setNome($_POST['nome']);
            $equipClass->setQtd($_POST['quantidade']);
            $equipClass->setDescricao($_POST['descricao']);
            $equipClass->setCampus($_POST['campus']);
        }
    }


switch($acao){
    case 'inserir':
        try{
            $equipClass->insert($equipClass->getIdentificador(),$equipClass->getNome(),$equipClass->getQtd(), $equipClass->getDescricao(),$equipClass->getCampus());
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