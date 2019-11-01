<?php

    require_once '../../model/campus/Campus.class.php';

    class campus_DAO extends campus_class{
        protected $tabela = 'campus';
        
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
        public function insert($nome,$cnpj,$endereco,$bairro){
            try{
                $sql = "INSERT INTO $this->tabela(nome, cnpj, endereco , bairro)
             VALUES (:nome, :endereco , :cnpj, :bairro)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':nome',$nome);
                $exec->bindParam(':cnpj',$cnpj);
                $exec->bindParam(':endereco',$endereco);
                $exec->bindParam(':bairro',$bairro);
                echo "<script>alert('Campus cadastrado com sucesso!');window.location ='../../view/views/cadastrocampus.php';</script>";
                return $exec->execute();
              
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET nome = :nome, cnpj = :cnpj, endereco = :endereco, bairro = :bairro WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':nome', $this->getNome());
                $exec->bindValue(':cnpj', $this->getCNPJ());
                $exec->bindValue(':endereco', $this->getEndereco());
                $exec->bindValue(':bairro',$this->getbairro());
                echo "<script>alert('Campus editado com sucesso!');window.location ='../../view/views/listarcampus.php';</script>";
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
                echo "<script>alert('Campus deletado com sucesso!');window.location ='../../view/views/listarcampus.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarCampus(){
            $resultado = "SELECT * FROM campus ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'nome' => $dados['nome'],
                        'endereco' => $dados['endereco'],
                        'id' => $dados['id'],
                    );
                }
                return $result;
            }
       
        }
    }
?>