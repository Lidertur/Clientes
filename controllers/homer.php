<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Ruta.php');
class HomerControllers {
    private $Ruta;
    public function __construct() {
        $this->Ruta = new Ruta();
    }
    public function index() {
        require_once 'views/Ruta/homer.php';
    }
}