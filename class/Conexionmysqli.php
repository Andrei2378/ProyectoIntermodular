<?php

class Conexionmysqli {
    private $dbHost = 'localhost';
    private $dbName = 'jardin';
    private $dbUser = 'root';
    private $dbPass = '';

    protected $conexion;

    public function abrirConexion() {
        $this->conexion = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }

        $this->conexion->set_charset("utf8");

        return $this->conexion;
    }

    public function cerrarConexion() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }

    public function obtenerConexion() {
        return $this->conexion;
    }
}

