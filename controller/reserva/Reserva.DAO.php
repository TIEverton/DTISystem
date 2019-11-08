<?php

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
        public function insert($idEquipamento, $idSala, $idCampus, idResponsavel, $data, $turno, $horario, $observacao){
            try{
                $sql = "INSERT INTO $this->tabela(equipamento, sala, campus, responsavel, data, turno, horario, observacao, devolvido)
             VALUES (:idEquipamento, :idSala, :idCampus, :idResponsavel, :data, :turno, :horario, :observacao, false)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':idEquipamento',$idEquipamento);
                $exec->bindParam(':idSala',$idSala, PDO::PARAM_INT);
                $exec->bindParam(':idCampus',$idCampus);
                $exec->bindParam(':idResponsavel',$idResponsavel);
                $exec->bindParam(':data',$data);
                $exec->bindParam(':turno',$turno);
                $exec->bindParam(':horario',$horario);
                $exec->bindParam(':observacao',$observacao);
                $exec->bindParam('false', false);


                echo "<script>alert('Reserva Cadastrada com sucesso');window.location ='../../view/telas/TelaRealizarReserva.php';</script>";
                return $exec->execute();
              
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET equipamento = :idEquipamento, sala = :idSala, campus = :idCampus, responsavel = :idResponsavel, data = :data, turno = :turno, horario = :horario, observacao = :observacao, devolvido = :devolvido WHERE id = :id";
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
                $exec->bindValue(':devolvido', $this->getDevolvido());

                echo "<script>alert('Reserva Editada com Sucesso');window.location ='../../view/telas/';</script>";
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
                echo "<script>alert('Reserva deletada com sucesso');window.location ='../../view/telas/TelaListarReserva.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function ListarReservas(){
            $resultado = "SELECT reserva.*, campus.`nome` AS campus, equipamento.`nome` AS equipamento, 
            sala.`nome` AS sala, usuario.`nome` AS reponsavel FROM reserva 

            INNER JOIN campus
            INNER JOIN sala
            INNER JOIN equipamento
            INNER JOIN usuario
            ON reserva.`campus`= campus.`id` 
            AND reserva.`equipamento`= equipamento.`id` 
            AND reserva.`sala`= sala.`id` 
            AND reserva.`responsavel` = usuario.`id`
            ORDER BY id ASC
            ";

            $resultado = DB::prepare($resultado);
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'campus' => $dados['campus'],
                        'sala' => $dados['sala'],
                        'equipamento' => $dados['equipamento'],
                        'data' => $dados['data'],
                        'turno' => $dados['turno'],
                        'horario' => $dados['horario'],
                        'observacao' => $dados['observacao'],
                        'devolvido' => $dados['devolvido'],


                    );
                }
                return $result;
            }

        }
    }
?>