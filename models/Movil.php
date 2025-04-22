<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Movil {
        private $movil;
        private $id_M;
        private $N_movil;
        private $placa;


        public function __construct() {
            $this->movil = basedeDatos::conectar();
        }
        // Getters and setters
        public function id_M() { return $this->id_M; }
        public function getN_movil(): ?string { return $this->N_movil; }
        public function getplaca(): ?string { return $this->placa; }

        public function setid_A($id_M) { $this->id_M = $id_M; }
        public function setplaca(string $placa) { $this->placa = $placa; }
        public function setN_movil(string $N_movil) { $this->N_movil = $N_movil; }
    

    public function listar(){
        try {
            $consulta = $this->movil->prepare("SELECT N_movil, placa from movil;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    }