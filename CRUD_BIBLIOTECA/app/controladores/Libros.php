<?php
class Libros extends Controlador {
    private $objModelo;
    
    public function __construct() {
        $this->objModelo = $this->modelo("LibrosModelo");
    }

    public function index() {
        $data = $this->objModelo->getLibros();
        $this->vista("LibrosVista", $data);
    }

    public function modificar($id = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'id' => $id,
                'titulo' => htmlspecialchars($_POST['titulo']),
                'autor' => htmlspecialchars($_POST['autor']),
                'editorial' => htmlspecialchars($_POST['editorial'])
            ];
            
            if ($this->objModelo->actualizarLibro($datos)) {
                header('Location: ' . RUTA_APP . '/libros');
                exit();
            }
        } else {
            $libro = $this->objModelo->getLibro($id);
            if ($libro) {
                $this->vista("libros/editar", $libro);
            } else {
                header('Location: ' . RUTA_APP . '/libros');
                exit();
            }
        }
    }

    public function borrar($id = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($this->objModelo->eliminarLibro($id)) {
                header('Location: ' . RUTA_APP . '/libros');
                exit();
            }
        }
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'titulo' => htmlspecialchars($_POST['titulo']),
                'autor' => htmlspecialchars($_POST['autor']),
                'editorial' => htmlspecialchars($_POST['editorial'])
            ];
            
            if ($this->objModelo->crearLibro($datos)) {
                header('Location: ' . RUTA_APP . '/libros');
                exit();
            }
        } else {
            $this->vista("libros/alta");
        }
    }
}
?>