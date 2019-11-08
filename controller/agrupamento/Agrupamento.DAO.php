<?php 

    require_once '../../model/agrupamento/Agrupamento.class.php';

    class agrupamento_DAO extends agrupamento_class{
        protected $tabela = 'agrupamento';

        public function findUnic($id){
            try {
                $sql = "SELECT * FROM $this->tabela WHERE id = :id";
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch();
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function findAll($id){
            try {
                $sql = "SELECT * FROM $this->tabela ";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetch();
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function insert($nome){
            try {
                $sql = "INSERT INTO $this->tabela(nome) VALUES (:nome)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':nome',$nome);
                echo "<script>alert('Agrupamento cadastrado com sucesso!');window.location ='../../view/views/cadastroagrupamento.php';</script>";
                return $exec->execute();
            } catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }

        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET nome = :nome WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':nome', $this->getNome());
                echo "<script>alert('Agrupamento editado com sucesso!');window.location ='../../view/views/listaragrupamento.php';</script>";
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
                echo "<script>alert('Agrupamento deletado com sucesso!');window.location ='../../view/views/listaragrupamento.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }

        function listarAgrupamento(){
            $resultado = "SELECT * FROM agrupamento ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'id' => $dados['id'],
                        'nome' => $dados['nome'],
                    );
                }
                return $result;
            }
       
        }

    }