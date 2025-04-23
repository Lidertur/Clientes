<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Ruta.php');
class RutaControllers {
    private $ruta;
    public function __construct() {
        $this->ruta = new Ruta();
    }
    public function index() {
        require_once 'views/Ruta/ruta.php';
    }
    public function Formcrear(){
        $titulo="Registrar";
        $p=new Ruta;
        if(isset($_GET['id_RE'])){
            $p=$this->ruta->obtener($_GET['id_RE']);
            $titulo="Actualizar";
        }
        require_once('views/Ruta/cruta.php');
    }
    public function Crear(){
        try{    
            $p=new Registro();

            if (!empty($_POST['id_RE'])){
                $p->setid_RE((int)$_POST['id_RE']);
            }
            $p->setfecha($_POST['fecha']);
            $p->sethora($_POST['hora']);
            $p->setdocumento($_POST['documento']);
            $p->setid_U($_POST['id_U']);
            $p->setid_R($_POST['id_R']);
            $p->setid_M($_POST['id_M']);

            if ($p->getid_RE() > 0) {
                $this->ruta->actualizar($p);
            } else {
                $this->ruta->crear($p);
            }
            header('location:?c=conductor');
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
