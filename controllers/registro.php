<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Registro.php');
class RegistroControllers {
    private $Registro;
    public function __construct() {
        $this->Registro = new Registro();
    }
    public function index() {
        require_once 'views/Cliente/registro.php';
    }
    public function Formcrear(){
        $titulo="Registrar";
        $p=new Registro;
        if(isset($_GET['id_RE'])){
            $p=$this->Registro->obtener($_GET['id_RE']);
            $titulo="Actualizar";
        }
        require_once('views/Cliente/cregistro.php');
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
                $this->Registro->actualizar($p);
            } else {
                $this->Registro->crear($p);
            }
            header('location:?c=conductor');
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}
