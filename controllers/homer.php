<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Ruta.php');
include('models/Movil.php');
class HomerControllers {
    private $ruta;
    private $movil;
    public function __construct() {
        $this->ruta = new Ruta();
        $this->movil = new Movil();
    }
    public function index() {
        session_start();
    
        if (!isset($_SESSION['user'])) {
            header('Location: ?c=login'); // Redirigir si no está autenticado
            exit;
        }    
        // Obtener nombre de la ruta desde la sesión
        $rutaSeleccionada = $_SESSION['user']['nombre'] ?? 'Ruta desconocida';
    
        // Obtener ID del móvil desde la sesión
        $id_M = $_SESSION['id_M'] ?? null;
    
        // Obtener datos del móvil usando el modelo
        if ($id_M) {
            $movilInfo = $this->movil->listar($id_M); // Aquí usas tu método 'listar'
            $movilSeleccionado = $movilInfo ? $movilInfo['N_movil'] : 'Móvil desconocidso';
        } else {
            $movilSeleccionado = 'Móvil desconocido';
        }
    
        require_once 'views/Ruta/homer.php';
    }
    
    
    
}