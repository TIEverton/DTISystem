<?php

    require_once '../../config/DB.php';
    class campus_class{
        protected $tabela;
        private $id;
        private $nome;
        private $CNPJ;
        private $endereco;
        private $rua;
        private $numero;

        //sets
        public function setId($id){$this->id = $id;}
        public function setNome($nome){$this->nome = $nome;}
        public function setCNPJ($cnpj){$this->CNPJ = $cnpj;}
        public function setEndereco($endereco){$this->endereco = $endereco;}
        public function setRua($rua){$this->rua = $rua;}
        public function setNumero($numero){$this->numero = $numero;}

        //gets
        public function getId(){return $this->id;}
        public function getNome(){return $this->nome;}
        public function getCNPJ(){return $this->CNPJ;}
        public function getEndereco(){return $this->endereco;}
        public function getRua(){return $this->rua;}
        public function getNumero(){return $this->numero;}
    }