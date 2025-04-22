<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Registro {
        private $Registro;
        private $id_RE;
        private $fecha;
        private $hora;
        private $documento;
        private $id_U;
        private $id_R;
        private $id_M;


        public function __construct() {
            $this->Registro = basedeDatos::conectar();
        }
        // Getters and setters
        public function getid_RE() { return $this->id_RE; }
        public function getfecha(): ?string { return $this->fecha; }
        public function gethora(): ?string { return $this->hora; }
        public function getdocumento(): ?string { return $this->documento; }
        public function getid_U(): ?string { return $this->id_U; }
        public function getid_R(): ?string { return $this->id_R; }
        public function getid_M(): ?string { return $this->id_M; }

        public function setid_RE($id_RE) { $this->id_RE = $id_RE; }
        public function sethora(string $hora) { $this->hora = $hora; }
        public function setfecha(string $fecha) { $this->fecha = $fecha; }
        public function setdocumento(string $documento) { $this->documento = $documento; }
        public function setid_U(string $id_U) { $this->id_U = $id_U; }
        public function setid_R(string $id_R) { $this->id_R = $id_R; }
        public function setid_M(string $id_M) { $this->id_M = $id_M; }
    }