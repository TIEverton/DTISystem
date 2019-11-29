<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $data = $_REQUEST['data'];
    $turno = $_REQUEST['select_turno'];
    $horario_inicial = $_REQUEST['select_horario_inicial'];
    $horario_final = $_REQUEST['select_horario_final'];

    $result_agrupamentos = "SELECT * FROM agrupamento";
    $exec = DB::prepare($result_agrupamento);
    $exec->execute();
    while($dados = $exec->fetch(PDO::FETCH_ASSOC)){

    }
    
    
    = "SELECT equipamento.id, equipamento.numeracao, agrupamento.nome AS nome FROM reserva
    RIGHT JOIN equipamento
    ON reserva.equipamento = equipamento.id
    AND reserva.campus = '$campus'
    AND reserva.data = '$data'
    AND reserva.turno = '$turno'
    AND (reserva.horario LIKE '%$horario_inicial%'
    OR reserva.horario LIKE '%$horario_final%')
    INNER JOIN agrupamento
    ON equipamento.agrupamento = agrupamento.id
    WHERE reserva.equipamento IS null
    AND equipamento.campus = '$campus'
    ORDER BY agrupamento.nome";

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