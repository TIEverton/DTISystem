<?php

    require_once 'Agrupamento.DAO.php';
    require_once '../../model/agrupamento/Agrupamento.class.php';
    $AgrupamentoClass = new agrupamento_DAO();
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }

    if($acao == "delete"){
        $AgrupamentoClass->setId($_GET['id']);
    }
    if($acao != "delete"){   
            if($acao == "update"){
                $AgrupamentoClass->setId($_POST['id']);
            }
            $AgrupamentoClass->setNome($_POST['nome']);
    }

    switch($acao){
        case 'inserir':
            try{
                $AgrupamentoClass->insert($AgrupamentoClass->getNome());
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'delete':
            try{
                $AgrupamentoClass->delete($AgrupamentoClass->getId());
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'update':
            try{
                $AgrupamentoClass->update($AgrupamentoClass->getId());
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
    }


?>