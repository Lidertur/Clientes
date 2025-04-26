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
        public function getid_M() { return $this->id_M; }
        public function getN_movil(): ?string { return $this->N_movil; }
        public function getplaca(): ?string { return $this->placa; }

        public function setid_M($id_M) { $this->id_M = $id_M; }
        public function setplaca(string $placa) { $this->placa = $placa; }
        public function setN_movil(string $N_movil) { $this->N_movil = $N_movil; }
    
        public function listarr(){
            try {
                $consulta = $this->movil->prepare("SELECT * from movil;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
        public function listar($id_M){
            try {
                $consulta = $this->movil->prepare("SELECT * FROM movil WHERE id_M = ?");
                $consulta->execute([$id_M]);
                return $consulta->fetch(PDO::FETCH_ASSOC);
            }catch (Exception $e){
                die($e->getMessage());
            }
        }
        public function crear(movil $p){
            try{
                $consulta="INSERT INTO movil ( N_movil, placa)
                VALUES (?,?);";
                $this->movil->prepare($consulta)
                ->execute(array(
                    $p->getN_movil(),
                    $p->getplaca(),
                ));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        public function obtener($movil){
            try{
                $consulta = $this->movil->prepare("SELECT * from movil where id_M = ?;");
                $consulta->execute(array($movil));
                $r=$consulta->fetch(PDO::FETCH_OBJ);
                $p= new movil();
                $p->setN_movil($r->N_movil);
                $p->setplaca($r->placa);
                $p->setid_M($r->id_M);
                return $p;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function actualizar(movil $p){
            try {
                $consulta ="UPDATE movil SET
                N_movil=?, placa=?
                where id_M=?;";
                $this->movil->prepare($consulta)
                ->execute([
                    $p->getN_movil(),
                    $p->getplaca(),
                    $p->getid_M()
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function eliminar($id_M) {
            try {
                $consulta ="DELETE FROM movil WHERE id_M=?;";
                $this->movil->prepare($consulta)->execute(array($id_M));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    }