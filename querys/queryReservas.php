<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    if($campus == 0){
        $resultado = "SELECT reserva.*, campus.`nome` AS campusNome, agrupamento.`nome` AS equipamentoNome, equipamento.`numeracao` AS numeracaoEqui,
        sala.`nome` AS salaNome, usuarios.`nome` AS responsavel FROM reserva 
    
        INNER JOIN campus
        INNER JOIN sala
        INNER JOIN equipamento
        INNER JOIN agrupamento
        INNER JOIN usuarios
        ON reserva.`campus`= campus.`id` 
        AND reserva.`equipamento`= equipamento.`id` 
        AND reserva.`sala`= sala.`id` 
        AND equipamento.`agrupamento` = agrupamento.`id`
        AND reserva.`responsavel` = usuarios.`id`
        ORDER BY id DESC
        ";
        
    }else{
        $resultado = "SELECT reserva.*, campus.`nome` AS campusNome, agrupamento.`nome` AS equipamentoNome, equipamento.`numeracao` AS numeracaoEqui,
        sala.`nome` AS salaNome, usuarios.`nome` AS responsavel FROM reserva 
    
        INNER JOIN campus
        INNER JOIN sala
        INNER JOIN equipamento
        INNER JOIN agrupamento
        INNER JOIN usuarios
        ON reserva.`campus`= campus.`id` 
        AND reserva.`equipamento`= equipamento.`id` 
        AND reserva.`sala`= sala.`id` 
        AND equipamento.`agrupamento` = agrupamento.`id`
        AND reserva.`responsavel` = usuarios.`id`
        WHERE reserva.`campus` = '$campus'
        ORDER BY id DESC
        ";
    }

    $resultado = DB::prepare($resultado);
    $resultado->execute();
    if($resultado->rowCount()>0){
        while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
            $result[] = array(
                'id' => $dados['id'],
                'campus' => $dados['campusNome'],
                'sala' => $dados['salaNome'],
                'equipamento' => $dados['equipamentoNome'],
                'numeracaoEqui' => $dados['numeracaoEqui'],
                'responsavel' => $dados['responsavel'],
                'data' => $dados['data'],
                'turno' => $dados['turno'],
                'horario' => $dados['horario'],
                'observacao' => $dados['observacoes'],
                'devolvido' => $dados['devolvido'],
            );
        }
        
        echo (json_encode($result));
    }

?>