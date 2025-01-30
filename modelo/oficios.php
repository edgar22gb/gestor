<?php

class Oficios
{
    private $numero_folio,$id_estudiante,$descripcion,$asunto;
    public function __construct($numero_folio,$id_estudiante,$descripcion,$asunto)
    {
        $this->numero_folio=$numero_folio;
        $this->id_estudiante=$id_estudiante;
        $this->descripcion=$descripcion;
        $this->asunto=$asunto;
    }

    public function guardar_oficio()
    {
        global $mysqli;
        $sentencia=$mysqli->prepare("INSERT INTO oficios
        (numero_folio,id_estudiante,descripcion,asunto)
        VALUES (?,?,?,?)");
        $sentencia->bind_param("ssss",$this->numero_folio,$this->id_estudiante,$this->descripcion,$this->asunto);
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
    public static function obtener_oficios()
    {
        global $mysqli;
       //$resultado = $mysqli->query("SELECT * FROM oficios where oficios.id=".$id);
   $resultado=$mysqli->query("SELECT oficios.numero_folio,oficios.id_estudiante,estudiantes.id,estudiantes.nombre_estudiante,oficios.descripcion,oficios.asunto from oficios INNER JOIN estudiantes ON oficios.id_estudiante=estudiantes.id");

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUno($id)
    {
        global $mysqli;
        
        $sentencia = $mysqli->prepare("SELECT * FROM oficios WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }

    public function actualizarOficio($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update oficios set numero_folio=?, id_estudiante = ?, descripcion=?, asunto=? where id=".$id);
        $sentencia->bind_param("siss",$this->numero_folio, $this->id_estudiante,$this->descripcion,$this->asunto);
        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
}


?>