<?php

    require_once '../../config/DB.php';
    class equipamento_class{
        protected $tabela;
        private $id;
        private $identificador;
        private $nome;
        private $quantidade;
        private $descricao;
        private $campus;

        //set's
        public function setId($id){$this->id = $id;}
        public function setIdentificador($i){$this->identificador = $i;}
        public function setNome($nome){$this->nome = $nome;}
        public function setQtd($q){$this->quantidade = $q;}
        public function setDescricao($descricao){$this->descricao = $descricao;}
        public function setCampus($campus){$this->campus = $campus;}
        //get's
        public function getId(){return $this->id;}
        public function getIdentificador(){return $this->identificador;}
        public function getNome(){return $this->nome;}
        public function getQtd(){return $this->quantidade;}
        public function getDescricao(){return $this->descricao;}
        public function getCampus(){return $this->campus;}
    }
?>