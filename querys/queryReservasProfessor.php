<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $user = $_REQUEST['user'];
    if($campus == 0){
        $resultado = "SELECT reserva.*, campus.`nome` AS campusNome, agrupamento.`nome` AS equipamentoNome, reserva.equipamento AS numeracaoEqui,
        sala.`nome` AS salaNome, usuarios.`nome` AS responsavel FROM reserva 
    
        INNER JOIN campus
        INNER JOIN sala
        INNER JOIN agrupamento
        INNER JOIN usuarios
        ON reserva.`campus`= campus.`id` 
        AND reserva.`sala`= sala.`id` 
        AND reserva.`agrupamento` = agrupamento.`id`
        AND reserva.`responsavel` = usuarios.`id`
        WHERE reserva.`situacao` != 'Devolvido'
        AND reserva.`situacao` != 'Devolvido com problema'
        AND reserva.`responsavel` = '$user'
        ORDER BY id DESC
        ";
        
    }else{
        $resultado = "SELECT reserva.*, campus.`nome` AS campusNome, agrupamento.`nome` AS equipamentoNome, reserva.equipamento AS numeracaoEqui,
        sala.`nome` AS salaNome, usuarios.`nome` AS responsavel FROM reserva 
    
        INNER JOIN campus
        INNER JOIN sala
        INNER JOIN agrupamento
        INNER JOIN usuarios
        ON reserva.`campus`= campus.`id` 
        AND reserva.`sala`= sala.`id` 
        AND reserva.`agrupamento` = agrupamento.`id`
        AND reserva.`responsavel` = usuarios.`id`
        WHERE reserva.`campus` = '$campus'
        AND reserva.`responsavel` = '$user'
        AND reserva.`situacao` != 'Devolvido'
        AND reserva.`situacao` != 'Devolvido com problema'
        ORDER BY id DESC
        ";
    }

    $resultado = DB::prepare($resultado);
    $resultado->execute();
    if($resultado->rowCount()>0){
        while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
            
            $letrasHorario = array('A', 'B', 'C', 'D', 'E', 'F');
            $horario = '';
            for ($i=0; $i < strlen($dados['horario']); $i++) { 
                $posicaoLetra = $dados['horario'][$i];
                $horario = $horario.$letrasHorario[$posicaoLetra];
            }

            $result[] = array(
                'id' => $dados['id'],
                'campus' => $dados['campusNome'],
                'idCampus' => $dados['campus'],
                'sala' => $dados['salaNome'],
                'equipamento' => $dados['equipamentoNome'],
                'idAgrupamento' => $dados['agrupamento'],
                'numeracaoEqui' => $dados['numeracaoEqui'],
                'responsavel' => $dados['responsavel'],
                'data' => date("d-m-y", strtotime($dados['data'])),
                'turno' => $dados['turno'],
                'horario' => $horario,
                'observacao' => $dados['observacoes'],
                'situacao' => $dados['situacao'],
            );
        }
        
        echo (json_encode($result));
    }

?>