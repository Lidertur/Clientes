<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Registro {
        private $registro;
        private $id_RE;
        private $fecha;
        private $hora;
        private $documento;
        private $id_U;
        private $id_R;
        private $id_M;


        public function __construct() {
            $this->registro = basedeDatos::conectar();
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

        public function listar(){
            try{
                $consulta =$this->registro->prepare("SELECT RE.*,R.nombre AS nombre_ruta, M.N_movil, M.placa, U.nombre AS nombre_usuario, U.apellido, U.psl AS PSL, U.costo as costo
                FROM registro RE INNER JOIN ruta R ON RE.id_R = R.id_R INNER JOIN movil M ON RE.id_M = M.id_M INNER JOIN usuario U ON RE.id_U = U.id_U;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            }catch (exception $e){
                die ($e->getMessage());
            }
        }
        public function listarPorFecha($startDate, $endDate){
            try {
                $consulta = $this->registro->prepare("
                    SELECT RE.*, R.nombre AS nombre_ruta, M.N_movil, M.placa, 
                           U.nombre AS nombre_usuario, U.apellido, U.psl AS PSL, U.costo as costo
                    FROM registro RE
                    INNER JOIN ruta R ON RE.id_R = R.id_R
                    INNER JOIN movil M ON RE.id_M = M.id_M
                    INNER JOIN usuario U ON RE.id_U = U.id_U
                    WHERE RE.fecha BETWEEN ? AND ?
                ");
                $consulta->execute([$startDate, $endDate]);
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function buscarUsuarioPorDocumento($documento) {
            try {
                $consulta = $this->registro->prepare("SELECT id_U FROM usuario WHERE documento = ?");
                $consulta->execute([$documento]);
                return $consulta->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                die('Error al buscar usuario: ' . $e->getMessage());
            }
        } 
        public function insertarRegistro($fecha, $hora, $documento, $id_U, $id_R, $id_M) {
            try {
                $consulta = $this->registro->prepare(
                    "INSERT INTO registro (fecha, hora, documento, id_U, id_R, id_M) VALUES (?, ?, ?, ?, ?, ?)"
                );
                $consulta->execute([$fecha, $hora, $documento, $id_U, $id_R, $id_M]);
            } catch (Exception $e) {
                die('Error al insertar registro: ' . $e->getMessage());
            }
        }

        
    }