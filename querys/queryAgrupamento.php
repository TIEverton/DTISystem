<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $data = $_REQUEST['data'];
    $turno = $_REQUEST['select_turno'];
    $horario_inicial = $_REQUEST['select_horario_inicial'];
    $horario_final = $_REQUEST['select_horario_final'];
    $agrupamento = $_REQUEST['agrupamento'];

    // $result_agrupamentos = "SELECT * FROM agrupamento";
    // $exec = DB::prepare($result_agrupamento);
    // $exec->execute();
    // while($dados = $exec->fetch(PDO::FETCH_ASSOC)){
    //     $agrupamento = $dados['id'];
        // $agrupamento = 1;

        $quant_equipamentos = "SELECT count(equipamento.id) as 'quantiaEquipamento', (SELECT count(reserva.id) FROM reserva
        INNER JOIN equipamento
        ON reserva.equipamento = equipamento.id
        AND equipamento.agrupamento = '$agrupamento'
        WHERE reserva.campus = '$campus'
        AND reserva.data = '$data'
        AND reserva.turno = '$turno'
        AND (reserva.horario LIKE '%$horario_inicial%'
        OR reserva.horario LIKE '%$horario_final%')
        AND reserva.devolvido = 0) as 'quantiaReserva',

        (SELECT equipamento.id FROM reserva
        RIGHT JOIN equipamento
        ON reserva.equipamento = equipamento.id
        AND reserva.campus = '$campus'
        AND reserva.data = '$data'
        AND reserva.turno = '$turno'
        AND (reserva.horario LIKE '%$horario_inicial%'
        OR reserva.horario LIKE '%$horario_final%')
        WHERE reserva.equipamento IS null
        AND equipamento.campus = '$campus'
        AND equipamento.agrupamento = '$agrupamento'
        GROUP BY agrupamento) as idEqui

        FROM equipamento WHERE agrupamento = '$agrupamento'
        AND campus = '$campus'";

        $exec2 = DB::prepare($quant_equipamentos);
        $exec2->execute();
        while($dados2 = $exec2->fetch(PDO::FETCH_ASSOC)){
            $result[] = array(
                'quantidadeEqui' => $dados2['quantiaEquipamento'] - $dados2['quantiaReserva'],
                'quantiaEquipamento' => $dados2['quantiaEquipamento'],
                'quantiaReserva' => $dados2['quantiaReserva'],
                'idEqui' => $dados2['idEqui']
            );
        }

    //     $resultado[] = array(
    //         'agrupamento' => $result[]
    //     );
        
    // }

    echo (json_encode($result));
    
?>