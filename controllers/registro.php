<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Registro.php');
class RegistroControllers {
    private $registro;
    public function __construct() {
        $this->registro = new Registro();
    }
    public function index() {
        require_once 'views/Registros/registro.php';
    }
    PUBLIC function EXCEL(){
        require_once 'views/Registros/EXCEL.php';
    }
    public function filtrarFechas() {
        try {
            $startDate = $_POST['startDate'] ?? null;
            $endDate = $_POST['endDate'] ?? null;
    
            if (!$startDate || !$endDate) {
                echo json_encode([]);
                return;
            }
    
            $registros = $this->registro->listarPorFecha($startDate, $endDate);
            echo json_encode($registros);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    
}
