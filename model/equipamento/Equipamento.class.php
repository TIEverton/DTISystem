<?php

    require_once '../../config/DB.php';
    class equipamento_class{
        protected $tabela;
        private $id;
        private $numeracao;
        private $agrupamento;
        private $campus;
        private $descricao;
        private $situacao;

        //set's
        public function setId($id){$this->id = $id;}
        public function setNumeracao($i){$this->numeracao = $i;}
        public function setAgrupamento($agrupamento){$this->agrupamento = $agrupamento;}
        public function setCampus($campus){$this->campus = $campus;}
        public function setDescricao($descricao){$this->descricao = $descricao;}
        public function setSituacao($situacao){$this->situacao = $situacao;}
        //get's
        public function getId(){return $this->id;}
        public function getNumeracao(){return $this->numeracao;}
        public function getAgrupamento(){return $this->agrupamento;}
        public function getCampus(){return $this->campus;}
        public function getDescricao(){return $this->descricao;}
        public function getSituacao(){return $this->situacao;}
    }
?>