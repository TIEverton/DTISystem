<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $result_salas = "SELECT sala.id, sala.nome FROM sala WHERE campus = '$campus' AND situacao = 1";
    $exec = DB::prepare($result_salas);
    $exec->execute();
    while($dados = $exec->fetch(PDO::FETCH_ASSOC)){
        $result[] = array(
            'id' => $dados['id'],
            'nome' => $dados['nome']
        );
    }

    echo (json_encode($result));
    
?>
           