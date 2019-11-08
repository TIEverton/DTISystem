<?php

    require_once '../../config/DB.php';
    class reserva_class{
        protected $tabela;
        private $id;
        private $campus;
        private $sala;
        private $equipamento;
        private $responsavel;
        private $data;
        private $turno;
        private $horario;
        private $observacao;
        private $devolvido;


        //set's
        public function setId($id){$this->id = $id;}
        public function seCampus($campus){$this->campus = $campus;}
        public function setSala($sala){$this->sala = $sala;}
        public function setEquipamento($equipamento){$this->equipamento = $equipamento;}
        public function setResponsavel($responsavel){$this->responsavel = $responsavel;}
        public function setData($data){$this->data = $data;}
        public function setTurno($turno){$this->turno = $turno;}
        public function setHorario($horario){$this->horario = $horario;}
        public function setObservacao($observacao){$this->observacao = $observacao;}
        public function setDevolvido($devolvido){$this->devolvido = $devolvido;}

        //get's
        public function getId(){return $this->id;}
        public function getCampus(){return $this->campus;}
        public function getSala(){return $this->sala;}
        public function getEquipamento(){return $this->equipamento;}
        public function getResponsavel(){return $this->responsavel;}
        public function getData(){return $this->data;}
        public function getTurno(){return $this->turno;}
        public function getHorario(){return $this->horario;}
        public function getObservacao(){return $this->observacao;}
        public function getDevolvido(){return $this->devolvido;}
        
    }
?>