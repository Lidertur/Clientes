<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Movil.php');
class MovilControllers {
    private $movil;
    public function __construct() {
        $this->movil = new movil();
    }
    public function index() {
        require_once 'views/Movil/movil.php';
    }
    public function Formcrear(){
        $titulo="Registrar";
        $p=new movil;
        if(isset($_GET['id_M'])){
            $p=$this->movil->obtener($_GET['id_M']);
            $titulo="Actualizar";
        }
        require_once('views/Movil/cmovil.php');
    }
    public function crear(){
        try{    
            $p = new movil();
            $p->setN_movil($_POST['N_movil']);
            $p->setplaca($_POST['placa']);
            $this->movil->crear($p); // SOLO crear
    
            header('Location: ?c=movil');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function actualizar(){
        try{
            $p = new movil();
            $p->setid_M((int)$_POST['id_M']); // Necesita el ID para saber a cuál actualizar
            $p->setN_movil($_POST['N_movil']);
            $p->setplaca($_POST['placa']);
            $this->movil->actualizar($p); // SOLO actualizar
    
            header('Location: ?c=movil');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Borrar(){
        $this->movil->eliminar($_GET["id_M"]);
        header('location:?c=movil');
    }
}
