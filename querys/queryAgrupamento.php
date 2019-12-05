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
        $agrupamento = $dados['id'];
        $quant_equipamentos = "SELECT count(equipaemento.id) FROM equipamento WHERE agrupamento = '$agrupamento' AS qtd";

        $exec2 = DB::prepare($quant_equipamentos);
        $exec2->execute();
        while($dados2 = $exec2->fetch(PDO::FETCH_ASSOC)){
            $result[] = array(
                'quantidadeEqui' => $dados2['qtd']
            );
        }
    }

    echo (json_encode($result));
    
?>