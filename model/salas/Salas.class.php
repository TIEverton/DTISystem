<?php

    require_once '../../config/DB.php';
    class salas_class{
        protected $tabela;
        private $id;
        private $nome;
        private $campus;
        private $situacao;

        //set's
        public function setId($id){$this->id = $id;}
        public function setNome($nome){$this->nome = $nome;}
        public function setCampus($campus){$this->campus = $campus;}
        public function setSituacao($situacao){$this->situacao = $situacao;}
        //get's
        public function getId(){return $this->id;}
        public function getNome(){return $this->nome;}
        public function getCampus(){return $this->campus;}
        public function getSituacao(){return $this->situacao;}
    }
?>