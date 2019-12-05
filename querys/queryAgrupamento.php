<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $data = $_REQUEST['data'];
    $turno = $_REQUEST['select_turno'];
    $horario_inicial = $_REQUEST['select_horario_inicial'];
    $horario_final = $_REQUEST['select_horario_final'];

    // $result_agrupamentos = "SELECT * FROM agrupamento";
    // $exec = DB::prepare($result_agrupamento);
    // $exec->execute();
    // while($dados = $exec->fetch(PDO::FETCH_ASSOC)){
        // $agrupamento = $dados['id'];
        $agrupamento = 1;

        $quant_equipamentos = "SELECT count(equipamento.id) as 'quantiaEquipamento', (SELECT count(reserva.id) FROM reserva
        INNER JOIN equipamento
        ON reserva.equipamento = equipamento.id
        WHERE reserva.campus = '$campus'
        AND reserva.data = '$data'
        AND reserva.turno = '$turno'
        AND (reserva.horario LIKE '%$horario_inicial%'
        OR reserva.horario LIKE '%$horario_final%')) as 'quantiaReserva' FROM equipamento WHERE agrupamento = '$agrupamento'";

        $exec2 = DB::prepare($quant_equipamentos);
        $exec2->execute();
        while($dados2 = $exec2->fetch(PDO::FETCH_ASSOC)){
            $result[] = array(
                'id' => $agrupamento,
                // 'nome' => $dados['nome'],
                'nome' => "caixa de som",
                'quantidadeEqui' => $dados2['quantiaEquipamento'] - $dados2['quantiaReserva']
            );
        }
        // $resultado[] = array(
        //     '$agrupamento' => $agrupamento
        // );
        
    //}

    echo (json_encode($result));
    
?>