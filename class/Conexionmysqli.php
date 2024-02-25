<?php

/**
 * [Creamos la conexión a la base de datos]
 */
class Conexionmysqli
{
    private $dbHost = 'localhost';
    private $dbName = 'jardin';
    private $dbUser = 'root';
    private $dbPass = '';

    protected $conexion;

    /**
     * Método para realizar la conexion a la base de datos
     * @return [conexion]
     */
    public function obtenerConexion()
    {
        $this->conexion = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }

        $this->conexion->set_charset("utf8");

        return $this->conexion;
    }

    /**
     * Metodo para cerrar la conexión a la base de datos
     * @return [conexion]
     */
    public function cerrarConexion()
    {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }
}

