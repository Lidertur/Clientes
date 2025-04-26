<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Ruta.php');
class RutaControllers {
    private $ruta;
    public function __construct() {
        $this->ruta = new ruta();
    }
    public function index() {
        require_once 'views/Ruta/ruta.php';
    }
    public function Formcrear(){
        $titulo="Registrar";
        $p=new ruta;
        if(isset($_GET['id_R'])){
            $p=$this->ruta->obtener($_GET['id_R']);
            $titulo="Actualizar";
        }
        require_once('views/Ruta/cruta.php');
    }
    public function crear(){
        try{    
            $p = new ruta();
            $p->setnombre($_POST['nombre']);    
            $this->ruta->crear($p); // SOLO crear
    
            header('Location: ?c=ruta');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function actualizar(){
        try{
            $p = new ruta();
            $p->setid_R((int)$_POST['id_R']); // Necesita el ID para saber a cuál actualizar
            $p->setnombre($_POST['nombre']);    
            $this->ruta->actualizar($p); // SOLO actualizar
    
            header('Location: ?c=ruta');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Borrar(){
        $this->ruta->eliminar($_GET["id_R"]);
        header('location:?c=ruta');
    }
}
