<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Usuario.php');
class UsuarioControllers {
    private $usuario;
    public function __construct() {
        $this->usuario = new Usuario();
    }
    public function index() {
        require_once 'views/Usuarios/usuario.php';

    }
    public function Formcrear(){
        $titulo="Registrar";
        $p=new Usuario;
        if(isset($_GET['id_U'])){
            $p=$this->usuario->obtener($_GET['id_U']);
            $titulo="Actualizar";
        }
        require_once('views/Usuarios/cusuario.php');
    }
    public function crear(){
        try{    
            $p = new Usuario();
            $p->setdocumento($_POST['documento']);
            $p->setnombre($_POST['nombre']);
            $p->setapellido($_POST['apellido']);
            $p->settelefono($_POST['telefono']);
            $p->setcorreo($_POST['correo']);
            $p->setdireccion($_POST['direccion']);
            $p->setcargo($_POST['cargo']);
            $p->setbase($_POST['base']);
            $p->setzona($_POST['zona']);
            $p->setpsl($_POST['psl']);
            $p->setcosto($_POST['costo']);
            $p->setid_C($_POST['id_C']);
    
            $this->usuario->crear($p); // SOLO crear
    
            header('Location: ?c=usuario');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function actualizar(){
        try{
            $p = new Usuario();
            $p->setid_U((int)$_POST['id_U']); // Necesita el ID para saber a cuál actualizar
            $p->setdocumento($_POST['documento']);
            $p->setnombre($_POST['nombre']);
            $p->setapellido($_POST['apellido']);
            $p->settelefono($_POST['telefono']);
            $p->setcorreo($_POST['correo']);
            $p->setdireccion($_POST['direccion']);
            $p->setcargo($_POST['cargo']);
            $p->setbase($_POST['base']);
            $p->setzona($_POST['zona']);
            $p->setpsl($_POST['psl']);
            $p->setcosto($_POST['costo']);
            $p->setid_C($_POST['id_C']);
    
            $this->usuario->actualizar($p); // SOLO actualizar
    
            header('Location: ?c=usuario');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function Borrar(){
        $this->usuario->eliminar($_GET["id_U"]);
        header('location:?c=usuario');
    }
    
}