<?php

    require_once '../../config/DB.php';
    class agrupamento_class{
        protected $tabela;
        private $id;
        private $nome;


        //sets
        public function setId($id){$this->id = $id;}
        public function setNome($nome){$this->nome = $nome;}
       

        //gets
        public function getId(){return $this->id;}
        public function getNome(){return $this->nome;}

    }