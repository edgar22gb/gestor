<?php
include_once "../conexionBD/conexion.php";
    class Roles
    {
        private $id, $rol;

        public static function obtener()
        {
            global $mysqli;
            $resultado=$mysqli->query("SELECT *from roles ");
            return $resultado->fetch_all(MYSQLI_ASSOC);


        }
        
        
    }

?>