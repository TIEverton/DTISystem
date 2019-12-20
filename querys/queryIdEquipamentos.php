<?php
    require_once '../config/DB.php';
    $agrupamento = $_REQUEST['agrupamento'];
    $campus = $_REQUEST['campus'];

    $resultado = "SELECT * FROM equipamento
    WHERE agrupamento = '$agrupamento'
    AND campus = '$campus'
    AND situacao != 0";

    $resultado = DB::prepare($resultado);
    $resultado->execute();
    if($resultado->rowCount()>0){
        while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
            $result[] = array(
                'numeracao' => $dados['numeracao']
            );
        }
        
        echo (json_encode($result));
    }

?>