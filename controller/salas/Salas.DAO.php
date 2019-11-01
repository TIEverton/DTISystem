<?php

    require_once '../../model/salas/Salas.class.php';

    class salas_DAO extends salas_class{
        protected $tabela = 'sala';
        
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
        public function insert($nome,$campus,$situacao){
            try{
                $sql = "INSERT INTO $this->tabela(nome, campus, situacao)
             VALUES (:nome, :campus, :situacao)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':nome',$nome);
                $exec->bindParam(':campus',$campus);
                $exec->bindParam(':situacao',$situacao);

                echo "<script>alert('Sala Cadastrado com sucesso');window.location ='../../view/views/cadastrosala.php';</script>";
                return $exec->execute();
              
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET nome = :nome, campus = :campus, situacao = :situacao WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':nome', $this->getNome());
                $exec->bindValue(':campus', $this->getCampus());
                $exec->bindValue(':situacao', $this->getSituacao());
                // echo "<script>alert('Sala Editada com Sucesso');window.location ='../../view/telas/TelaListar.php';</script>";
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
                echo "<script>alert('Sala deletada com sucesso');window.location ='../../view/telas/TelaListarSala.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }

        function listarSala(){
            $resultado = "SELECT sala.*, campus.`nome` AS campus
            FROM sala
            INNER JOIN campus
            ON sala.`campus` = campus.`id`
            ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'id' => $dados['id'],
                        'nome' => $dados['nome'],
                        'campus' => $dados['campus'],
                    );
                }
                return $result;
            }
       
        }
    }
?>