<?php
class Pagos
{
    private $fecha_pago,$monto,$descripcion,$mes_pago,$id_estudiante;
    public function __construct($fecha_pago,$monto,$descripcion,$mes_pago, $id_estudiante)
    {
        $this->fecha_pago=$fecha_pago;
        $this->monto=$monto;
        $this->descripcion=$descripcion;
        $this->mes_pago=$mes_pago;
        $this->id_estudiante=$id_estudiante;
    }

    public function guardar_pagos()
    {
        global $mysqli;
        $sentencia=$mysqli->prepare("INSERT INTO pagos
        (fecha_pago,monto,descripcion,mes_pago,id_estudiante)
        VALUES (?,?,?,?,?)");
        $sentencia->bind_param("sssii",$this->fecha_pago,$this->monto,$this->descripcion,$this->mes_pago,$this->id_estudiante);
        //var_dump($sentencia);
        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }


    }
    public static function obtener_pagos()
    {
        global $mysqli;
        //$resultado=$mysqli->query("SELECT * from pagos");
        $resultado=$mysqli->query("SELECT pagos.id, pagos.id_estudiante, pagos.fecha_pago,pagos.monto,pagos.descripcion,meses.nombre_mes,estudiantes.nombre_estudiante FROM pagos INNER JOIN estudiantes ON estudiantes.id=pagos.id_estudiante INNER JOIN meses ON pagos.mes_pago=meses.id");
        //$resultado=$mysqli->query("SELECT  pagos.fecha_pago,pagos.monto,pagos.descripcion,pagos.id_estudiante,pagos.mes_pago, estudiantes.id,estudiantes.nombre_estudiante FROM pagos INNER JOIN estudiantes ON pagos.id_estudiante=estudiantes.id");
       //$resultado=$mysqli->query("SELECT pagos.fecha_pago,pagos.monto,pagos.descripcion,pagos.id_estudiante,meses.nombre_mes,estudiantes.id,estudiantes.nombre_estudiante from pagos INNER JOIN meses ON meses.id=pagos.id INNER JOIN estudiantes ON pagos.id_estudiante=estudiante.id");
       //$resultado=$mysqli->query("SELECT pagos.fecha_pago,pagos.monto,pagos.descripcion,meses.nombre_mes,estudiantes.nombre_estudiante from pagos INNER JOIN meses ON meses.id=pagos.id INNER JOIN estudiantes ON pagos.id_estudiante=estudiantes.id"); 
       //$resultado=mysqli->query("SELECT pagos.fecha_pago,pagos.monto,pagos.descripcion,meses.nombre_mes,estudiantes.nombre_estudiante from pagos INNER JOIN meses ON meses.id=pagos.id INNER JOIN estudiantes ON pagos.id_estudiante=estudiantes.id");
       //$resultado=$mysqli->query("SELECT  pagos.fecha_pago,pagos.monto,pagos.descripcion,pagos.id_estudiante,meses.nombre_mes FROM pagos INNER JOIN meses ON pagos.mes_pago=meses.id INNER JOIN estudiantes ON pagos.id_estudiante=estudiantes.id");
       return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public static function obteneruno($id)
    {
        global $mysqli;
        //$sentencia=$mysqli->query("SELECT  pagos.fecha_pago,pagos.monto,pagos.descripcion,pagos.id_estudiante,pagos.mes_pago, estudiantes.id,estudiantes.nombre_estudiante FROM pagos INNER JOIN estudiantes ON pagos.id_estudiante=estudiantes.id where id=? ");
        //$sentencia = $mysqli->prepare("SELECT * FROM pagos WHERE id =?");
        $sentencia=$mysqli->query("SELECT pagos.id, pagos.id_estudiante, pagos.fecha_pago,pagos.monto,pagos.descripcion,meses.nombre_mes,estudiantes.nombre_estudiante FROM pagos INNER JOIN estudiantes ON estudiantes.id=pagos.id_estudiante INNER JOIN meses ON pagos.mes_pago=meses.id where pagos.id=".$id."");
        //$sentencia=$mysqli->query("SELECT pagos.id, pagos.id_estudiante, pagos.fecha_pago,pagos.monto,pagos.descripcion,meses.nombre_mes,estudiantes.nombre_estudiante FROM pagos INNER JOIN estudiantes ON estudiantes.id=pagos.id_estudiante INNER JOIN meses ON pagos.mes_pago=meses.id where pagos.id=".$id);
       // $sentencia->bind_param("i", $id);
       // $sentencia->execute();
        //$resultado = $sentencia->get_result();
        return $sentencia->fetch_all(MYSQLI_ASSOC);
    }
}
?>