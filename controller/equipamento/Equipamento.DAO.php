<?php

    require_once '../../model/equipamento/Equipamento.class.php';

    class equipamento_DAO extends equipamento_class{
        protected $tabela = 'equipamento';
        
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
        public function insert($numeracao,$agrupamento,$campus,$descricao,$situacao){
            try{
                $sql = "INSERT INTO $this->tabela(numeracao, agrupamento, campus, descricao, situacao)
             VALUES (:numeracao, :agrupamento, :campus, :descricao, :situacao)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':numeracao',$numeracao);
                $exec->bindParam(':agrupamento',$agrupamento);
                $exec->bindParam(':campus',$campus);
                $exec->bindParam(':descricao',$descricao);
                $exec->bindParam(':situacao',$situacao);
                echo "<script>alert('Equipamento cadastrado com sucesso');window.location ='../../view/views/cadastroequipamento.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET numeracao = :numeracao ,agrupamento = :agrupamento,
                campus = :campus, descricao = :descricao, situacao = :situacao WHERE id = :id";

                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':numeracao', $this->getnumeracao());
                $exec->bindValue(':agrupamento', $this->getagrupamento());
                $exec->bindValue(':campus', $this->getCampus());
                $exec->bindValue(':descricao', $this->getDescricao());
                $exec->bindValue(':situacao', $this->getSituacao());
                echo "<script>alert('Equipamento Editado com sucesso!!');window.location ='../../view/views/listarEquipamento.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }

        }
        public function delete($id){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id', $id, PDO::PARAM_INT);
                echo "<script>alert('Equipamento deletado com sucesso');window.location ='../../view/views/listarEquipamento.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarEquipamento(){
            $resultado = "SELECT equipamento.*, agrupamento.`nome` AS agrupamento, campus.`nome` AS campus
            FROM equipamento
            INNER JOIN agrupamento
            INNER JOIN campus
            ON equipamento.`agrupamento` = agrupamento.`id`
            AND equipamento.`campus` = campus.`id`
            ORDER BY id ASC";

            $resultado = DB::prepare($resultado);
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'id' => $dados['id'],
                        'numeracao' => $dados['numeracao'],
                        'agrupamento' => $dados['agrupamento'],
                        'campus' => $dados['campus'],
                        'descricao' => $dados['descricao'],
                        'situacao' => $dados['situacao'],
                    );
                }
                return $result;
            }
        }
        function listarEquipamentoRelatorio($campus){
            if($campus != 0){
                $resultado = "SELECT equipamento.*, agrupamento.`nome` AS agrupamento, campus.`nome` AS campus
                FROM equipamento
                INNER JOIN agrupamento
                INNER JOIN campus
                ON equipamento.`agrupamento` = agrupamento.`id`
                AND equipamento.`campus` = campus.`id`
                AND equipamento.`campus` = :campus 
                ORDER BY id ASC";

                $resultado = DB::prepare($resultado);
                $resultado->bindParam(':campus',$campus);

            }else{
                $resultado = "SELECT equipamento.*, agrupamento.`nome` AS agrupamento, campus.`nome` AS campus
                FROM equipamento
                INNER JOIN agrupamento
                INNER JOIN campus
                ON equipamento.`agrupamento` = agrupamento.`id`
                AND equipamento.`campus` = campus.`id`
                ORDER BY id ASC";
                $resultado = DB::prepare($resultado);

            }
            
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'id' => $dados['id'],
                        'numeracao' => $dados['numeracao'],
                        'agrupamento' => $dados['agrupamento'],
                        'campus' => $dados['campus'],
                        'descricao' => $dados['descricao'],
                        'situacao' => $dados['situacao'] > 0 ? "Ativo" : "Inativo",
                    );
                }
                return $result;
            }
        }

    }
?>