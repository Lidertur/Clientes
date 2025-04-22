<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Cliente {
        private $Cliente;
        private $id_C;
        private $nombre;
        private $contraseña;

        public function __construct() {
            $this->Cliente = basedeDatos::conectar();
        }
        // Getters and setters
        public function getid_A() { return $this->id_C; }
        public function getnombre(): ?string { return $this->nombre; }
        public function getcontraseña(): ?string { return $this->contraseña; }

        public function setid_A($id_C) { $this->id_C = $id_C; }
        public function setnombre(string $nombre) { $this->nombre = $nombre; }
        public function setcontraseña(string $contraseña) { $this->contraseña = $contraseña; }
    
        public function autenticar($nombre, $contraseña) {
            try {
                $consulta = $this->Cliente->prepare("SELECT * FROM cliente WHERE nombre = :nombre");
                $consulta->bindParam(':nombre', $nombre);
                $consulta->execute();
                $cliente = $consulta->fetch(PDO::FETCH_ASSOC); // Cambié $stmt por $consulta
        
                if ($cliente && $contraseña === $cliente ['contraseña']){
                    error_log("cliente no entonctrado: $nombre.");
                    return $cliente;
                }else {
                    error_log("contraseña incorrecta para el usuario : $nombre.");
                    return null;
                }
            } catch (PDOException $e) {
                error_log("Error al autenticar cliente: " . $e->getMessage());
            }
            return null;
        }
        
    
    }