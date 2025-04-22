<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Administrador.php');
class HomeaControllers {
    private $Administrador;
    public function __construct() {
        $this->Administrador = new Administrador();
    }
    public function index() {
        require_once 'views/Admin/homea.php';
    }
}