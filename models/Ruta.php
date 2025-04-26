<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Ruta {
        private $ruta;
        private $id_R;
        private $nombre;

        public function __construct() {
            $this->ruta = basedeDatos::conectar();
        }
        // Getters and setters
        public function getid_R() { return $this->id_R; }
        public function getnombre(): ?string { return $this->nombre; }

        public function setid_R($id_R) { $this->id_R = $id_R; }
        public function setnombre(string $nombre) { $this->nombre = $nombre; }
        
        public function listar(){
            try{
                $consulta = $this->ruta->prepare("SELECT * from ruta");
                $consulta->execute();
                return$consulta->fetchAll(PDO::FETCH_ASSOC);
            }catch (exception $e){
                die ($e->getMessage());
            }
        }
        public function obtenerPorId($id_R) {
            try {
                $stmt = $this->ruta->prepare("SELECT * FROM ruta WHERE id_R = ?");
                $stmt->execute([$id_R]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function crear(ruta $p){
            try{
                $consulta="INSERT INTO ruta ( nombre)
                VALUES (?);";
                $this->ruta->prepare($consulta)
                ->execute(array(
                    $p->getnombre(),
                ));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        public function obtener($ruta){
            try{
                $consulta = $this->ruta->prepare("SELECT * from ruta where id_R = ?;");
                $consulta->execute(array($ruta));
                $r=$consulta->fetch(PDO::FETCH_OBJ);
                $p= new ruta();
                $p->setnombre($r->nombre);
                $p->setid_R($r->id_R);
                return $p;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function actualizar(ruta $p){
            try {
                $consulta ="UPDATE ruta SET
                nombre=?
                where id_R=?;";
                $this->ruta->prepare($consulta)
                ->execute([
                    $p->getNombre(),
                    $p->getid_R()
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function eliminar($id_R) {
            try {
                $consulta ="DELETE FROM ruta WHERE id_R=?;";
                $this->ruta->prepare($consulta)->execute(array($id_R));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    
    }