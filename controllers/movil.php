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
        $p=new Movil;
        if(isset($_GET['id_M'])){
            $p=$this->movil->obtener($_GET['id_M']);
            $titulo="Actualizar";
        }
        require_once('views/movil/cmovil.php');
    }
    public function Crear(){
        try{    
            $p=new Movil();

            if (!empty($_POST['id_M'])){
                $p->setid_M((int)$_POST['id_M']);
            }
            $p->setN_movil($_POST['N_movil']);
            $p->setplaca($_POST['placa']);

            if ($p->setid_M() > 0) {
                $this->movil->actualizar($p);
            } else {
                $this->movil->crear($p);
            }
            header('location:?c=conductor');
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
