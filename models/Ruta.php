<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Ruta {
        private $Ruta;
        private $id_R;
        private $nombre;
        private $contraseña;

        public function __construct() {
            $this->Ruta = basedeDatos::conectar();
        }
        // Getters and setters
        public function getid_R() { return $this->id_R; }
        public function getnombre(): ?string { return $this->nombre; }
        public function getcontraseña(): ?string { return $this->contraseña; }

        public function setid_R($id_R) { $this->id_R = $id_R; }
        public function setnombre(string $nombre) { $this->nombre = $nombre; }
        public function setcontraseña(string $contraseña) { $this->contraseña = $contraseña; }
        
        public function autenticar($nombre, $contraseña) {
            try {
                $consulta = $this->Ruta->prepare("SELECT * FROM ruta WHERE nombre = :nombre");
                $consulta->bindParam(':nombre', $nombre);
                $consulta->execute();
                $ruta = $consulta->fetch(PDO::FETCH_ASSOC);
        
                if ($ruta && $contraseña === $ruta['contraseña']) {
                    error_log("ruta no encontrada: $nombre.");
                    return $ruta;
                }else{
                    error_log("contraseña incorrecta para el usuario: $ruta");
                    return null;
                }
            } catch (PDOException $e) {
                error_log("Error al autenticar ruta: " . $e->getMessage());
            }
        
            return null;
        }
        
    
    
    
    }