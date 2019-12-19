<?php
    require_once '../config/DB.php';
    $campus = $_REQUEST['select_campus'];
    $data = $_REQUEST['data'];
    $turno = $_REQUEST['select_turno'];
    $horario_inicial = $_REQUEST['select_horario_inicial'];
    $horario_final = $_REQUEST['select_horario_final'];
    $agrupamento = $_REQUEST['agrupamento'];

    $intervalo_horario = '';

    for ($i=$horario_inicial; $i <= $horario_final; $i++) { 
        $intervalo_horario = $intervalo_horario.$horario_inicial;
    }

        $quant_equipamentos = "SELECT count(equipamento.id) as 'quantiaEquipamento', (SELECT count(reserva.id) FROM reserva
        WHERE reserva.campus = '$campus'
        AND reserva.agrupamento = '$agrupamento'
        AND reserva.data = '$data'
        AND reserva.turno = '$turno'
        AND ((reserva.horario LIKE '%$horario_inicial%'
        OR reserva.horario LIKE '%$horario_final%')
        OR (substring(reserva.horario, 1, 1) > '$horario_inicial' 
        AND right(reserva.horario, 1) < '$horario_final'))
        AND reserva.situacao != 'Devolvido'
        AND reserva.situacao != 'Devolvido com problema') as 'quantiaReserva'

        FROM equipamento
        WHERE agrupamento = '$agrupamento'
        AND campus = '$campus'
        AND equipamento.situacao = 1";

        $exec2 = DB::prepare($quant_equipamentos);
        $exec2->execute();
        while($dados2 = $exec2->fetch(PDO::FETCH_ASSOC)){
            $result[] = array(
                'quantidadeEqui' => $dados2['quantiaEquipamento'] - $dados2['quantiaReserva'],
                'quantiaEquipamento' => $dados2['quantiaEquipamento'],
                'quantiaReserva' => $dados2['quantiaReserva'],
                'idEqui' => $agrupamento
            );
        }

    //     $resultado[] = array(
    //         'agrupamento' => $result[]
    //     );
        
    // }

    echo (json_encode($result));
    
?>