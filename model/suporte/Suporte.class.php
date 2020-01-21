<?php

    require_once '../../config/DB.php';
    class suporte_class{
        protected $tabela;
        private $idSuporte;
        private $nomeEvento;
        private $campusEvento;
        private $espacoPrincipal;
        private $dataEvento;
        private $turnoEvento;
        private $obsEvento;
        private $situacao;

        //SET'S
        public function setIdSuporte($idSuporte){$this->idSuporte = $idSuporte;}
        public function setNomeEvento($nomeEvento){$this->nomeEvento = $nomeEvento;}
        public function setCampusEvento($campusEvento){$this->campusEvento = $campusEvento;}
        public function setEspacoPrincipal($espacoPrincipal){$this->espacoPrincipal = $espacoPrincipal;}
        public function setDataEvento($dataEvento){$this->dataEvento = $dataEvento;}
        public function setTurnoEvento($turnoEvento){$this->turnoEvento = $turnoEvento;}
        public function setObsEvento($obsEvento){$this->obsEvento = $obsEvento;}
        public function situacao($situacao){$this->situacao = $situacao;}
        
        //GET'S
        public function getIdSuporte(){return $this->idSuporte;}
        public function getNomeEvento(){return $this->nomeEvento;}
        public function getCampusEvento(){return $this->campusEvento;}
        public function getEspacoPrincipal(){return $this->espacoPrincipal;}
        public function getDataEvento(){return $this->dataEvento;}
        public function getObsEvento(){return $this->obsEvento;}
        public function getSituacao(){return $this->situacao;}
        
    }

?>