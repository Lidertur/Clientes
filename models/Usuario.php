<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require_once 'bd/Database.php';

    class Usuario {
        private $usuario;
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
        private $costo;
        private $id_C;

        public function __construct() {
            $this->usuario = basedeDatos::conectar();
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
        public function getcosto(): ?string { return $this->costo; }
        public function getid_C(): ?string { return $this->id_C; }

        public function setid_U($id_U) { $this->id_U = $id_U; }
        public function setnombre(string $nombre) { $this->nombre = $nombre; }
        public function setdocumento(string $documento) { $this->documento = $documento; }
        public function setapellido(string $apellido) { $this->apellido = $apellido; }
        public function settelefono(string $telefono) { $this->telefono = $telefono; }
        public function setcorreo(string $correo) { $this->correo = $correo; }
        public function setdireccion(string $direccion) { $this->direccion = $direccion; }
        public function setcargo(string $cargo) { $this->cargo = $cargo; }
        public function setbase(string $base) { $this->base = $base; }
        public function setzona(string $zona) { $this->zona = $zona; }
        public function setpsl(string $psl) { $this->psl = $psl; }
        public function setcosto(string $costo) { $this->costo = $costo;}
        public function setid_C(string $id_C) { $this->id_C = $id_C; }

        public function listar(){
            try{
                $consulta = $this->usuario->prepare("SELECT * from usuario;");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            }catch (exception $e){
                die ($e->getMessage());
            }
        }
        public function crear(usuario $p){
            try{
                $consulta="INSERT INTO usuario (documento, nombre, apellido, telefono, correo, direccion, cargo, base, zona, psl, costo, id_C)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?);";
                $this->usuario->prepare($consulta)
                ->execute(array(
                    $p->getdocumento(),
                    $p->getnombre(),
                    $p->getapellido(),
                    $p->gettelefono(),
                    $p->getcorreo(),
                    $p->getdireccion(),
                    $p->getcargo(),
                    $p->getbase(),
                    $p->getzona(),
                    $p->getpsl(),
                    $p->getcosto(),
                    $p->getid_C(),
                ));
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        public function obtener($id_U){
            try{
                $consulta = $this->usuario->prepare("SELECT * from usuario where id_U = ?;");
                $consulta->execute(array($id_U));
                $r=$consulta->fetch(PDO::FETCH_OBJ);
                $p= new usuario();
                $p->setid_U($r->id_U);
                $p->setdocumento($r->documento);
                $p->setnombre($r->nombre);
                $p->setapellido($r->apellido);
                $p->settelefono($r->telefono);
                $p->setcorreo($r->correo);
                $p->setdireccion($r->direccion);
                $p->setcargo($r->cargo);
                $p->setbase($r->base);
                $p->setzona($r->zona);
                $p->setpsl($r->psl);
                $p->setcosto($r->costo);
                $p->setid_C($r->id_C);
                return $p;
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function actualizar(usuario $p){
            try {
                $consulta ="UPDATE usuario SET
                documento=?, nombre=?,
                apellido=?, telefono=?,
                correo=?, direccion=?,
                cargo=?, base=?, zona=?,
                psl=?, costo=?, id_C=?
                where id_U=?;";
                $this->usuario->prepare($consulta)
                ->execute([
                    $p->getdocumento(),
                    $p->getNombre(),
                    $p->getApellido(),
                    $p->getTelefono(),
                    $p->getcorreo(),
                    $p->getdireccion(),
                    $p->getcargo(),
                    $p->getbase(),
                    $p->getzona(),
                    $p->getpsl(),
                    $p->getcosto(),
                    $p->getid_C(),
                    $p->getid_U(),
                ]);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function eliminar($id_U) {
            try {
                $consulta ="DELETE FROM usuario WHERE id_U=?;";
                $this->usuario->prepare($consulta)->execute(array($id_U));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }