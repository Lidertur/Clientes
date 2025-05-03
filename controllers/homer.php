<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Ruta.php');
include('models/Movil.php');
include('models/Registro.php');
class HomerControllers {
    private $ruta;
    private $movil;
    private $registro;
    public function __construct() {
        $this->ruta = new Ruta();
        $this->movil = new Movil();
        $this->registro = new registro();
    }
    public function index() {
        session_start(); // Asegúrate de que la sesión esté iniciada
    
        if (!isset($_SESSION['user'])) {
            header('Location: ?c=login'); // Redirigir si no está autenticado
            exit;
        }
    
        // Obtener nombre de la ruta desde la sesión
        $rutaSeleccionada = $_SESSION['id_R'] ?? 'Ruta desconocida'; // Ruta desde la sesión
        $id_R = $_SESSION['id_R'] ?? null; // ID de la ruta
    
        // Obtener ID del móvil desde la sesión
        $id_M = $_SESSION['id_M'] ?? null;
    
        // Obtener datos del móvil usando el modelo
        if ($id_M) {
            $movilInfo = $this->movil->listar($id_M); // Aquí usas tu método 'listar'
            $movilSeleccionado = $movilInfo ? $movilInfo['N_movil'] : 'Móvil desconocido';
        } else {
            $movilSeleccionado = 'Móvil desconocido';
        }
    
        require_once 'views/Ruta/homer.php'; // Mostrar la vista de bienvenida
    }
    
    
    public function guardarRegistro() {
        session_start(); // Accedemos a la sesión
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $documento = $_POST['documento'] ?? null;
                if (!$documento) {
                    throw new Exception('Documento no proporcionado');
                }
    
                $id_R = $_SESSION['id_R'] ?? null;
                $id_M = $_SESSION['id_M'] ?? null;
                if (!$id_R || !$id_M) {
                    throw new Exception('Datos de sesión no disponibles');
                }
    
                // Buscar el usuario
                $usuario = $this->registro->buscarUsuarioPorDocumento($documento);
                $id_U = $usuario ? $usuario['id_U'] : 5; // Si no encuentra, id_U = 1
    
                // Preparar fecha y hora actuales
                date_default_timezone_set('America/Bogota');
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');
    
                // Insertar en la tabla registro
                $this->registro->insertarRegistro($fecha, $hora, $documento, $id_U, $id_R, $id_M);
    
                // Redireccionar
                header('Location: ?c=homer');
                exit();
    
            } catch (Exception $e) {
                die('Error al guardar registro: ' . $e->getMessage());
            }
        }
    }
    
    
    
    
}