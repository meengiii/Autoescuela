<?php
class db
{
    private static $conexion = null;

    public static function abreConexion()
    {
        if (self::$conexion === null) {
            try {
                self::$conexion = new PDO('mysql:host=localhost;dbname=ProyectoAutoescuela', 'mengi', '1234');
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conexion;
    }
}
?>