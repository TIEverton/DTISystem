<?php

    require_once 'Campus.DAO.php';
    require_once '../../model/campus/Campus.class.php';
    $CampusClass = new campus_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        //comencortano
        $CampusClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($CampusClass->getnome()) || !empty($CampusClass->getBairro()) ||
           !empty($CampusClass->getCNPJ())   || !empty($CampusClass->getEndereco())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $CampusClass->setId($_POST['id']);
            }
            $CampusClass->setNome($_POST['nome']);
            $CampusClass->setCNPJ($_POST['cnpj']);
            $CampusClass->setEndereco($_POST['endereco']);
            $CampusClass->setBairro($_POST['bairro']);
        }
    }

switch($acao){
    case 'inserir':
        try{
            $CampusClass->insert($CampusClass->getNome(),$CampusClass->getCNPJ(),$CampusClass->getEndereco(),$CampusClass->getBairro());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $CampusClass->delete($CampusClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $CampusClass->update($CampusClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}