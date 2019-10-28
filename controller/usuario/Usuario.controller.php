<?php

    require_once 'Usuario.DAO.php';
    require_once '../../model/usuario/Usuario.class.php';
    $userClass = new usuario_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $userClass->setId($_GET['id']);
    }
    if($acao == "autenticar"){
            $userClass->setEmail($_POST['email']);
            $userClass->setSenha($_POST['senha']);
    }else if($acao != "delete"){
        if(!empty($userClass->getLogin()) || !empty($userClass->getSenha()) ||
           !empty($userClass->getCPF())   || !empty($userClass->getEmail()) ||
           !empty($userClass->getAcesso())|| !empty($userClass->getNivel())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $userClass->setId($_POST['id']);
            }
            $userClass->setLogin($_POST['login']);
            $userClass->setSenha($_POST['senha']);
            $userClass->setNome($_POST['nome']);
            $userClass->setCPF($_POST['cpf']);
            $userClass->setEmail($_POST['email']);
            $userClass->setNivel($_POST['nivel']);
        }
    }

switch($acao){
    case 'inserir':
        try{
            $userClass->insert($userClass->getLogin(),$userClass->getSenha(),$userClass->getNome(),$userClass->getCPF(),$userClass->getEmail(),$userClass->getNivel(),$userClass->getNivel());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $userClass->delete($userClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $userClass->update($userClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'autenticar':
        $userClass->autenticar($userClass->getEmail(), $userClass->getSenha());
    break;
}