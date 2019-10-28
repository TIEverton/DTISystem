<?php

    require_once '../../config/DB.php';
    class usuario_class{
        protected $tabela;
        private $id;
        private $login;
        private $senha;
        private $nome;
        private $cpf;
        private $email;
        private $nivel;
        private $acesso;

        //set's
        public function setId($id){$this->id = $id;}
        public function setLogin($login){$this->login = $login;}
        public function setSenha($senha){$this->senha = $senha;}
        public function setNome($nome){$this->nome = $nome;}
        public function setCPF($cpf){$this->cpf = $cpf;}
        public function setEmail($email){$this->email = $email;}
        public function setNivel($nivel){$this->nivel = $nivel;}
        public function setAcesso($acesso){$this->acesso = $acesso;}
        //get's
        public function getId(){return $this->id;}
        public function getLogin(){return $this->login;}
        public function getSenha(){return $this->senha;}
        public function getNome(){return $this->nome;}
        public function getCPF(){return $this->cpf;}
        public function getEmail(){return $this->email;}
        public function getNivel(){return $this->nivel;}
        public function getAcesso(){return $this->acesso;}
    

    }
?>
