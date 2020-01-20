<?php

    require_once 'Endereco.DAO.php';
    require_once '../../model/endereco/Endereco.class.php';
    $enderecoClass = new endereco_DAO();

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;   
    }
    if ($acao == "delete") {
        $enderecoClass->setIdEndereco($_GET['idEndereco']);
    }
    if ($acao != "delete") {
        if ($acao == "update") {
            $enderecoClass->setIdEndereco($_POST['idEndereco']);
        }
        $enderecoClass->setSetor($_POST['setor']);
        $enderecoClass->setFuncionario($_POST['funcionario']);
        $enderecoClass->setMac($_POST['mac']);
        
    }

    switch($acao){
        case 'inserir':
            try{
                $enderecoClass->insert($enderecoClass->getSetor(),$enderecoClass->getFuncionario(), $enderecoClass->getMac());
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
    }
?>