<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Cliente.php');
class HomecControllers {
    private $Cliente;
    public function __construct() {
        $this->Cliente = new Cliente();
    }
    public function index() {
        require_once 'views/Cliente/homec.php';
    }
}