<?php

    require_once 'Salas.DAO.php';
    require_once '../../model/salas/Salas.class.php';
    $SalasClass = new salas_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $SalasClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($SalasClass->getNome()) || !empty($SalasClass->getCampus()) || !empty($SalasClass->getSituacao())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $SalasClass->setId($_POST['id']);
            }
            $SalasClass->setNome($_POST['nome']);
            $SalasClass->setCampus($_POST['select_campus']);
            $SalasClass->setSituacao($_POST['situacao']);
        }
    }

switch($acao){
    case 'inserir':
        try{
            $SalasClass->insert($SalasClass->getNome(),$SalasClass->getCampus(),$SalasClass->getSituacao());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $SalasClass->delete($SalasClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $SalasClass->update($SalasClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}