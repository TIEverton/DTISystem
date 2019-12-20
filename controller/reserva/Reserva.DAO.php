<?php
    session_start();
    require_once '../../model/reserva/Reserva.class.php';

    class reserva_DAO extends reserva_class{
        protected $tabela = 'reserva';
        
        public function findUnic($id){
            try{
                $sql = "SELECT * FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function findAll($id){
            try{
                $sql = "SELECT * FROM $this->tabela ";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function insert($idAgrupamento, $idSala, $idCampus, $idResponsavel, $data, $turno, $horario, $observacao){
            try{
                $sql = "INSERT INTO $this->tabela(agrupamento, sala, campus, responsavel, data, turno, horario, observacoes, situacao)
             VALUES (:idAgrupamento, :idSala, :idCampus, :idResponsavel, :data, :turno, :horario, :observacao, 'Não entregado')";
                $exec = DB::prepare($sql);
                $exec->bindParam(':idAgrupamento',$idAgrupamento);
                $exec->bindParam(':idSala',$idSala, PDO::PARAM_INT);
                $exec->bindParam(':idCampus',$idCampus);
                $exec->bindParam(':idResponsavel',$idResponsavel);
                $exec->bindParam(':data',$data);
                $exec->bindParam(':turno',$turno);
                $exec->bindParam(':horario',$horario);
                $exec->bindParam(':observacao',$observacao);
                if ($_SESSION['nivel'] != 0) {
                    echo "<script>window.location='../../view/professor/reservar.php'</script>";
                }else{
                    echo "<script>alert('Reserva Cadastrada com sucesso');window.location ='../../view/views/cadastroReserva.php';</script>";
                }
                
                return $exec->execute();
              
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET equipamento = :idEquipamento, sala = :idSala, campus = :idCampus, responsavel = :idResponsavel, data = :data, turno = :turno, horario = :horario, observacao = :observacao, situacao = :situacao WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':idEquipamento', $this->getEquipamento());
                $exec->bindValue(':idSala', $this->getSala());
                $exec->bindValue(':idCampus', $this->getCampus());
                $exec->bindValue(':idResponsavel', $this->getResponsavel());
                $exec->bindValue(':data', $this->getData());
                $exec->bindValue(':turno', $this->getTurno());
                $exec->bindValue(':horario', $this->getTurno());
                $exec->bindValue(':observacao', $this->getObservacao());
                $exec->bindValue(':situacao', $this->getSituacao());

                echo "<script>alert('Reserva Editada com Sucesso');window.location ='../../view/views/';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }

        }
        public function delete($id){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                echo "<script>alert('Reserva deletada com sucesso');window.location ='../../view/views/listarReserva.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function mudarSituacao($id, $funcao, $estado, $comentarioFunc, $numeracaoEquipamento){
            if($funcao == 'entregar'){
                try{
                    $sql = "UPDATE $this->tabela SET situacao = :situacao, equipamento = :numeracaoEqui WHERE id = :id";
                    $exec = DB::prepare($sql);
                    $exec->bindValue(':id', $id, PDO::PARAM_INT);
                    $exec->bindValue(':situacao', 'Entregado');
                    $exec->bindValue(':numeracaoEqui', $numeracaoEquipamento);
                    echo "<script>window.location ='../../view/views/home.php';</script>";
                    
                    return $exec->execute();
                }catch(PDOException $erro){
                    echo $erro->getMessage();
                }
            }else if($funcao == 'devolver'){
                try{
                    $sql = "UPDATE $this->tabela SET situacao = :situacao, comentario_funcionario = :comentarioFunc WHERE id = :id";
                    $exec = DB::prepare($sql);
                    $exec->bindValue(':id', $id, PDO::PARAM_INT);
                    $exec->bindValue(':situacao', $estado);
                    $exec->bindValue(':comentarioFunc', $comentarioFunc);
                    echo "<script>window.location ='../../view/views/home.php';</script>";
                    
                    return $exec->execute();
                }catch(PDOException $erro){
                    echo $erro->getMessage();
                }
            }
            echo $id;
            echo $funcao;
            echo $estado;
        }
        public function ListarReservas(){
            $resultado = "SELECT reserva.*, campus.`nome` AS campus, agrupamento.`nome` AS equipamento, reserva.equipamento AS numeracaoEqui,
            sala.`nome` AS sala, usuarios.`nome` AS responsavel FROM reserva 

            INNER JOIN campus
            INNER JOIN sala
            INNER JOIN agrupamento
            INNER JOIN usuarios
            ON reserva.`campus`= campus.`id` 
            AND reserva.`sala`= sala.`id`
            AND reserva.`agrupamento` = agrupamento.`id`
            AND reserva.`responsavel` = usuarios.`id`
            ORDER BY id ASC
            ";

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
                        'campus' => $dados['campus'],
                        'sala' => $dados['sala'],
                        'equipamento' => $dados['equipamento'],
                        'numeracaoEqui' => $dados['numeracaoEqui'],
                        'responsavel' => $dados['responsavel'],
                        'data' =>  date("d-m-y", strtotime($dados['data'])),
                        'turno' => $dados['turno'],
                        'horario' => $horario,
                        'observacao' => $dados['observacoes'],
                        'situacao' => $dados['situacao'],
                    );
                }
                return $result;
            }

        }

        public function ListarReservasDevolvidasPorData($dataInicial, $dataFinal, $campus) {
            if($campus != 0){
                $resultado = "SELECT reserva.*, campus.`nome` AS campus, agrupamento.`nome` AS equipamento, reserva.equipamento AS numeracaoEqui,
                sala.`nome` AS sala, usuarios.`nome` AS responsavel FROM reserva 

                INNER JOIN campus
                INNER JOIN sala
                INNER JOIN agrupamento
                INNER JOIN usuarios
                ON reserva.`campus`= campus.`id` 
                AND reserva.`sala`= sala.`id`
                AND reserva.`agrupamento` = agrupamento.`id`
                AND reserva.`responsavel` = usuarios.`id`
                WHERE (reserva.`data` BETWEEN :dataInicial AND :dataFinal)
                AND reserva.`campus` = :campus 
                ORDER BY id ASC
                ";

                $resultado = DB::prepare($resultado);
                $resultado->bindParam(':dataInicial',$dataInicial);
                $resultado->bindParam(':dataFinal',$dataFinal);
                $resultado->bindParam(':campus',$campus);

            }else{
                $resultado = "SELECT reserva.*, campus.`nome` AS campus, agrupamento.`nome` AS equipamento, reserva.equipamento AS numeracaoEqui,
                sala.`nome` AS sala, usuarios.`nome` AS responsavel FROM reserva 

                INNER JOIN campus
                INNER JOIN sala
                INNER JOIN agrupamento
                INNER JOIN usuarios
                ON reserva.`campus`= campus.`id` 
                AND reserva.`sala`= sala.`id`
                AND reserva.`agrupamento` = agrupamento.`id`
                AND reserva.`responsavel` = usuarios.`id`
                WHERE (reserva.`data` BETWEEN :dataInicial AND :dataFinal)
                ORDER BY id ASC
                ";

                $resultado = DB::prepare($resultado);
                $resultado->bindParam(':dataInicial',$dataInicial);
                $resultado->bindParam(':dataFinal',$dataFinal);
            }
            
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
                        'campus' => $dados['campus'],
                        'sala' => $dados['sala'],
                        'equipamento' => $dados['equipamento'],
                        'numeracaoEqui' => $dados['numeracaoEqui'],
                        'responsavel' => $dados['responsavel'],
                        'data' =>  date("d-m-y", strtotime($dados['data'])),
                        'turno' => $dados['turno'],
                        'horario' => $horario,
                        'observacao' => $dados['observacoes'],
                        'situacao' => $dados['situacao'],
                        'comentarioFunc' => $dados['comentario_funcionario']
                    );
                }
                return $result;
            }
          

        }
    }
?>