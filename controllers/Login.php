<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('models/Administrador.php');
include('models/Ruta.php');
include('models/Cliente.php');
include('models/Movil.php');
class LoginControllers {
    private $administrador;
    private $Ruta;
    private $Cliente;
    private $movil;
    public function __construct() {
        $this->administrador = new Administrador();
        $this->Ruta = new Ruta();
        $this->Cliente = new Cliente();
        $this->movil = new movil();
    }
    public function index() {
        require_once 'views/Login.php';
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $role = $_POST['role'] ?? '';
            $error = '';
    
            if (empty($role)) {
                $error = 'Por favor, seleccione un tipo de usuario.';
            } elseif ($role === 'Administrador') {
                $nombre = $_POST['admin_nombre'] ?? '';
                $contraseña = $_POST['admin_contraseña'] ?? '';
    
                if (empty($nombre) || empty($contraseña)) {
                    $error = 'Por favor, complete todos los campos de administrador.';
                } else {
                    $administrador = $this->administrador->autenticarA($nombre, $contraseña);
                    if ($administrador) {
                        $_SESSION['user'] = $administrador;
                        $_SESSION['role'] = 'Administrador';
                        header('Location: ?c=homea');
                        exit;
                    } else {
                        $error = 'Credenciales de administrador incorrectas.';
                    }
                }
    
            } elseif ($role === 'Cliente') {
                $nombre = $_POST['cliente_nombre'] ?? '';
                $contraseña = $_POST['cliente_contraseña'] ?? '';
    
                if (empty($nombre) || empty($contraseña)) {
                    $error = 'Por favor, complete todos los campos de cliente.';
                } else {
                    $cliente = $this->Cliente->autenticar($nombre, $contraseña);
                    if ($cliente) {
                        $_SESSION['user'] = $cliente;
                        $_SESSION['role'] = 'Cliente';
                        header('Location: ?c=homec');
                        exit;
                    } else {
                        $error = 'Credenciales de cliente incorrectas.';
                    }
                }
    
            } elseif ($role === 'Ruta') {
                $nombre = $_POST['nombre'] ?? '';
                $contraseña = $_POST['ruta_contraseña'] ?? '';
                $movil = $this->movil->listar(); 
                $id_M = $_POST['movil'] ?? '';
            
                if (empty($nombre) || empty($contraseña) || empty($id_M)) {
                    $error = 'Por favor, complete todos los campos de ruta.';
                } else {
                    $ruta = $this->Ruta->autenticar($nombre, $contraseña);
                    if ($ruta) {
                        $_SESSION['user'] = $ruta;
                        $_SESSION['role'] = 'Ruta';
                        $_SESSION['id_M'] = $id_M; // <-- guardar el ID del móvil
                        header('Location: ?c=homeR');
                        exit;
                    } else {
                        $error = 'Credenciales de ruta incorrectas.';
                    }
                }            
    
            } else {
                $error = 'Tipo de usuario no válido.';
            }
    
            // Cargar la vista de login nuevamente con error
            require_once 'views/Login.php';
        } else {
            header('Location: ?c=login');
        }
    }
    
}
