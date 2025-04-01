<?php
/**
 * LibrosModelo.php - Gestiona operaciones CRUD para la tabla libros
 */
class LibrosModelo {
    private $obj_mySQLdb;

    public function __construct() {
        $this->obj_mySQLdb = new MySQLdb();
    }

    public function getLibros() {
        return $this->obj_mySQLdb->querySelect("SELECT * FROM libros");
    }

    public function getLibro($id) {
        $sql = "SELECT * FROM libros WHERE id = " . (int)$id;
        return $this->obj_mySQLdb->querySelect($sql, true);
    }

    public function crearLibro($datos) {
        $sql = "INSERT INTO libros (titulo, autor, editorial) 
                VALUES (
                    '" . $this->sanitizar($datos['titulo']) . "', 
                    '" . $this->sanitizar($datos['autor']) . "', 
                    '" . $this->sanitizar($datos['editorial']) . "'
                )";
        return $this->obj_mySQLdb->queryInsert($sql);
    }

    public function actualizarLibro($datos) {
        $sql = sprintf("UPDATE libros SET 
                titulo = '%s', 
                autor = '%s', 
                editorial = '%s' 
                WHERE id = %d",
            $this->sanitizar($datos['titulo']),
            $this->sanitizar($datos['autor']),
            $this->sanitizar($datos['editorial']),
            (int)$datos['id']
        );
        return $this->obj_mySQLdb->queryUpdate($sql);
    }

    public function eliminarLibro($id) {
        $sql = "DELETE FROM libros WHERE id = " . (int)$id;
        return $this->obj_mySQLdb->queryDelete($sql);
    }

    private function sanitizar($valor) {
        return $this->obj_mySQLdb->escape($valor);
    }
}
?>