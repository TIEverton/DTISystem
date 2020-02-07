<?php
require_once '../../model/suporte/Suporte.class.php';

    class suporte_DAO extends suporte_class{
        protected $tabela = 'suporte';

        public function findUnic($idSuporte){
            try {
                $sql = "SELECT * FROM $this->tabela WHERE idSuporte = :idSuporte";
                $exec = DB::prepare($sql);
                $exec->bindValue(':idSuporte', $idSuporte, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch();
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }
        public function findAll($idSuporte){
            try{
                $sql = "SELECT * FROM $this->tabela";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function insert($nomeEvento, $campusEvento, $espacoPrincipal, $dataEvento, $turnoEvento, $obsEvento){
            try{
                $sql = "INSERT INTO $this->tabela(nomeEvento, campusEvento, espacoPrincipal, dataEvento, turnoEvento, obsEvento, situacao)
             VALUES (:nomeEvento, :campusEvento, :espacoPrincipal, :dataEvento, :turnoEvento, :obsEvento, 'Aprovação pendente.')";
                $exec = DB::prepare($sql);
                $exec->bindParam(':nomeEvento',$nomeEvento);
                $exec->bindParam(':campusEvento',$campusEvento);
                $exec->bindParam(':espacoPrincipal',$espacoPrincipal);
                $exec->bindParam(':dataEvento',$dataEvento);
                $exec->bindParam(':turnoEvento',$turnoEvento);
                $exec->bindParam(':obsEvento',$obsEvento);
                echo "<script>alert('Evento enviado com sucesso, aguarde resposta do DTI!')';</script>";
                return $exec->execute();
              
            }catch(PDOException $erro){
                echo $erro->getMessage();
            } 
        }

        public function mudarSituacao($idSuporte){
            try{
                $sql = "INSERT INTO $this->tabela(nomeEvento, campusEvento, espacoPrincipal, dataEvento, turnoEvento, obsEvento, situacao)
             VALUES (:nomeEvento, :campusEvento, :espacoPrincipal, :dataEvento, :turnoEvento, :obsEvento, 'Aprovação pendente.')";
                $exec = DB::prepare($sql);
                $exec->bindValue(':idSuporte', $idSuporte, PDO::PARAM_INT);
                echo "<script>alert('Evento aceito.')';</script>";
                return $exec->execute();
              
            }catch(PDOException $erro){
                echo $erro->getMessage();
            } 
        }

        function listarSuporte(){
            $resultado = "SELECT * from $this->tabela
            ORDER BY idSuporte ASC";

            $resultado = DB::prepare($resultado);
            $resultado->execute();
            if($resultado->rowCount()>0){
                while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $result[] = array(
                        'idSuporte' => $dados['idSuporte'],
                        'nomeEvento' => $dados['nomeEvento'],
                        'campusEvento' => $dados['campusEvento'],
                        'espacoPrincipal' => $dados['espacoPrincipal'],
                        'dataEvento' => $dados['dataEvento'],
                        'turnoEvento' => $dados['turnoEvento'],
                        'obsEvento' => $dados['obsEvento'],
                        'situacao' => $dados['situacao'],
                    );
                }
                return $result;
            }
        }
        
    }
?>
