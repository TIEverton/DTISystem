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
        public function insert($identificador,$nome,$quantidade,$descricao,$campus){
            try{
                $sql = "INSERT INTO $this->tabela(identificador, nome, quantidade, descricao, campus)
             VALUES (:identificador, :nome, :quantidade, :descricao, :campus)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':identificador',$identificador);
                $exec->bindParam(':nome',$nome);
                $exec->bindParam(':quantidade',$quantidade);
                $exec->bindParam(':descricao',$descricao);
                $exec->bindParam(':campus',$campus);
                echo "<script>alert('Equipamento cadastrado com sucesso');window.location ='../../view/views/cadastroequipamento.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET identificador = :identificador ,nome = :nome, quantidade = :quantidade,
                descricao = :descricao, campus = :campus WHERE id = :id";

                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':identificador', $this->getIdentificador());
                $exec->bindValue(':nome', $this->getNome());
                $exec->bindValue(':quantidade', $this->getQtd());
                $exec->bindValue(':descricao', $this->getDescricao());
                $exec->bindValue(':campus', $this->getCampus());
                return $exec->execute();
                echo "<script>alert('Equipamento Editado com sucesso!!');window.location ='../../view/views/cadastroequipamento.php';</script>";
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }

        }
        public function delete($id){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id', $id, PDO::PARAM_INT);
                echo "<script>alert('Equipamento deletado com sucesso');window.location ='../../view/views/cadastroequipamento.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
    }
?>