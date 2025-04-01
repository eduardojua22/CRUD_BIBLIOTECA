<?php
/**
 * Gestiona operaciones CRUD con MySQL
 * Fuente: Francisco Arce - Versión mejorada y completa
 */
class MySQLdb {
    private $host = "127.0.0.1";
    private $usuario = "root";
    private $clave = "";
    private $db = "libreria";
    private $conn;
    
    public function __construct() {
        $this->conn = mysqli_connect(
            $this->host,
            $this->usuario,
            $this->clave,
            $this->db
        );

        if (mysqli_connect_errno()) {
            $this->error("Error de conexión: " . mysqli_connect_error());
        }

        if (!mysqli_set_charset($this->conn, "utf8")) {
            $this->error("Error de charset: " . mysqli_error($this->conn));
        }
    }

    public function querySelect($sql, $single = false) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) $this->error("Error en SELECT: " . mysqli_error($this->conn));
        
        if ($single) return mysqli_fetch_assoc($result);
        
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function queryInsert($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) $this->error("Error en INSERT: " . mysqli_error($this->conn));
        return mysqli_insert_id($this->conn);
    }

    public function queryUpdate($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) $this->error("Error en UPDATE: " . mysqli_error($this->conn));
        return mysqli_affected_rows($this->conn);
    }

    public function queryDelete($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) $this->error("Error en DELETE: " . mysqli_error($this->conn));
        return mysqli_affected_rows($this->conn);
    }

    public function escape($valor) {
        return mysqli_real_escape_string($this->conn, $valor);
    }

    private function error($mensaje) {
        error_log($mensaje);
        die("<div style='padding: 20px; background: #ffe6e6; border: 1px solid red; margin: 10px;'>
            <strong>Error de base de datos:</strong><br>{$mensaje}<br>
            <small>Consulta registrada en el log del servidor</small>
        </div>");
    }
}
?>