<?php
include_once "../modelo/pagos.php";
include_once "../conexionBD/conexion.php";


//$mes_pago=$_POST["mes_pago"];

$pagos= new Pagos($_POST['fecha_pago'], $_POST['monto'],   $_POST['descripcion'],$_POST['mes_pago'], $_POST['id_estudiante']);


if($pagos->guardar_pagos()==true)
{
    echo '<script>
	alert("Oficio Ingresado Correctamente")
	location.href="../vista/mostrar-pagos.php"
	</script>';
}
else
{
    echo "<script>alert('Datos Ingresados incorrectamente')</script>";
}

/*

function guardarPago($conn) 
{
    $fecha_pago = $_POST['fecha_pago'];
    $monto = $_POST['monto'];
    $descripcion = $_POST['descripcion'];
    $id_estudiante = $_POST['id_estudiante'];

    // Consulta SQL para insertar el pago en la tabla
    $sql = "INSERT INTO Pagos (fecha_pago, monto, descripcion, id_cliente) VALUES ('$fecha_pago', '$monto', '$descripcion', '$id_cliente')";
    if($sql->execute()==true)
    {
        echo "Pago guardado exitosamente";
    }
}

/*
    if ($conn->query($sql) === TRUE) {
        echo "Pago guardado exitosamente";
    } else {
        echo "Error al guardar el pago: " . $conn->error;
    }
}
*
// Llamada a la función para guardar el pago
guardarPago($conn);


*/

?>