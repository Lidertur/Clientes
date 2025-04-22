<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Usuario {
        private $Usuario;
        private $id_U;
        private $documento;
        private $nombre;
        private $apellido;
        private $telefono;
        private $correo;
        private $direccion;
        private $cargo;
        private $base;
        private $zona;
        private $psl;
        private $id_C;

        public function __construct() {
            $this->Usuario = basedeDatos::conectar();
        }
        // Getters and setters
        public function getid_U() { return $this->id_U; }
        public function getdocumento(): ?string { return $this->documento; }
        public function getnombre(): ?string { return $this->nombre; }
        public function getapellido(): ?string { return $this->apellido; }
        public function gettelefono(): ?string { return $this->telefono; }
        public function getcorreo(): ?string { return $this->correo; }
        public function getdireccion(): ?string { return $this->direccion; }
        public function getcargo(): ?string { return $this->cargo; }
        public function getbase(): ?string { return $this->base; }
        public function getzona(): ?string { return $this->zona; }
        public function getpsl(): ?string { return $this->psl; }
        public function getid_C(): ?string { return $this->id_C; }

        public function setid_U($id_U) { $this->id_U = $id_U; }
        public function setnombre(string $nombre) { $this->nombre = $nombre; }
        public function setdocumento(string $documento) { $this->documento = $documento; }
        public function setapellido(string $apellido) { $this->apellido = $apellido; }
        public function settelefono(string $telefono) { $this->telefono = $telefono; }
        public function setcorreo(string $correo) { $this->correo = $correo; }
        public function setdireccion(string $direccion) { $this->direccion = $direccion; }
        public function setcargo(string $cargo) { $this->cargo = $cargo; }
        public function setBase(string $base) { $this->base = $base; }
        public function setzona(string $zona) { $this->zona = $zona; }
        public function setpsl(string $psl) { $this->psl = $psl; }
        public function setid_C(string $id_C) { $this->id_C = $id_C; }
    }