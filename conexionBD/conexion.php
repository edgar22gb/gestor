<?php
$host="localhost";
$usuario="root";
$password="";
$base_datos="sistema_cum";
$mysqli = new mysqli($host, $usuario, $password, $base_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
