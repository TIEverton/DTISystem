<?php

    require_once '../../model/endereco/Endereco.class.php';

    class endereco_DAO extends endereco_class{
        protected $tabela = 'endereco';

        public function findUnic($idEndereco){
            try{
                $sql = "SELECT * FROM $this->tabela WHERE idEndereco = :idEndereco";
                $exec = DB::prepare($sql);
                $exec->bindValue(':idEndereco', $idEndereco, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function findAll($idEndereco){
            try {
                $sql = "SELECT * FROM $this->tabela";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }
        public function insert($setor,$funcionario,$mac){
            try{
                $sql = "INSERT INTO $this->tabela(setor, funcionario, mac)
                VALUES (:setor, :funcionario, :mac)";
                    $exec = DB::prepare($sql);
                    $exec->bindParam(':setor',$setor);
                    $exec->bindParam(':funcionario',$funcionario);
                    $exec->bindParam(':mac',$mac);
                    echo "<script>alert('MAC cadastrado com sucesso!');window.location = '../../view/views/cadastroEndereco.php';</script>";
                    return $exec->execute();
            } catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function listarEndereco(){
            $resultado = "SELECT * FROM `endereco`";
            $resultado = DB::prepare($resultado);
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'setor' => $dados['setor'],
                        'funcionario' => $dados['funcionario'],
                        'mac' => $dados['mac'],
                    );
                }
                return $result;
            }
        }
    }

?>