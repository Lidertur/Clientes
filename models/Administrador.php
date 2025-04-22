<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Administrador {
        private $administrador;
        private $id_A;
        private $nombre;
        private $contraseña;

        public function __construct() {
            $this->administrador = basedeDatos::conectar();
        }
        // Getters and setters
        public function getid_A() { return $this->id_A; }
        public function getnombre(): ?string { return $this->nombre; }
        public function getcontraseña(): ?string { return $this->contraseña; }

        public function setid_A($id_A) { $this->id_A = $id_A; }
        public function setnombre(string $nombre) { $this->nombre = $nombre; }
        public function setcontraseña(string $contraseña) { $this->contraseña = $contraseña; }

        public function autenticarA($nombre, $contraseña) {
            try {
                $consulta = $this->administrador->prepare("SELECT * FROM administrador WHERE nombre = :nombre");
                $consulta->bindParam(':nombre', $nombre);
                $consulta->execute();
                $administrador = $consulta->fetch(PDO::FETCH_ASSOC);        
                // Comparar contraseñas directamente
                if ($administrador && $contraseña === $administrador['contraseña']) {
                    error_log("Contraseña correcta para el usuario: $nombre.");
                    return $administrador;
                } else {
                    error_log("Contraseña incorrecta para el usuario: $nombre.");
                    return null;
                }
            } catch(PDOException $e) {
                error_log("error al autenticar admin: ". $e->getMessage());
            } 
            return null;
        }
        
    }