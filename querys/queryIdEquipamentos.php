<?php
    require_once '../config/DB.php';
    $agrupamento = $_REQUEST['agrupamento'];
    $resultado = "SELECT * FROM equipamento WHERE agrupamento = '$agrupamento'";

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