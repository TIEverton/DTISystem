<?php
    require_once '../../config/DB.php';
    class endereco_class{
        protected $tabela;
        private $idEndereco;
        private $setor;
        private $funcionario;
        private $mac;

        //set's
        public function setIdEndereco($idEndereco){$this->idEndereco = $idEndereco;}
        public function setSetor($setor){$this->setor = $setor;}
        public function setFuncionario($funcionario){$this->funcionario = $funcionario;}
        public function setMac($mac){$this->mac = $mac;}

        //get's
        public function getIdEndereco(){return $this->idEndereco;}
        public function getSetor(){return $this->setor;}
        public function getFuncionario(){return $this->funcionario;}
        public function getMac(){return $this->mac;}

    }
?>