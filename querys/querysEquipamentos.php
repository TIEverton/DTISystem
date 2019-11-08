<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $result_equipamentos = "SELECT equipamento.id, equipamento.numeracao, agrupamento.nome FROM equipamento INNER JOIN agrupamento
    WHERE campus = '$campus' AND emprestado = 0";

    $exec = DB::prepare($result_equipamentos);
    $exec->execute();
    while($dados = $exec->fetch(PDO::FETCH_ASSOC)){
        $result[] = array(
            'id' => $dados['id'],
            'nome' => $dados['nome'],
            'numeracao' => $dados['numeracao']
        );
    }

    echo (json_encode($result));
    
?>
