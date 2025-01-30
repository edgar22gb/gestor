<?php
class Materias
{
    private $clave_materia,$nombre_materia,$numero_creditos,$semestre;
    

    public function __construct($clave_materia,$nombre_materia,$numero_creditos,$semestre)
    {
        $this->clave_materia=$clave_materia;
        $this->nombre_materia = $nombre_materia;
        $this->numero_creditos=$numero_creditos;
        $this->semestre=$semestre;
        
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO materias
            (clave_materia,nombre_materia,numero_creditos,semestre)
                VALUES
                (?,?,?,?)");
        $sentencia->bind_param("ssss",$this->clave_materia,$this->nombre_materia,$this->numero_creditos, $this->semestre);

        if($sentencia->execute())
        {
            return true;

        }
        else
        {
            return false;
        }
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT * FROM materias");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtenerUna($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT * FROM materias WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update materias set clave_materia=?, nombre_materia = ?,numero_creditos=?, semestre=? where id=".$id);
        $sentencia->bind_param("ssss",$this->clave_materia, $this->nombre_materia,$this->numero_creditos,$this->semestre);
        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public static function eliminar($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("DELETE FROM materias WHERE id =".$id);
        
        if($sentencia ->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
        //$sentencia->execute();
        

    }

    //CREDITOS DE LAS MATERIAS
    public static function  total_creditos()
    {

        global $mysqli;
        $sentencia=$mysqli->query("SELECT SUM(numero_creditos) as total_creditos from materias");
        //$sentencia=$mysqli->query($sql = "SELECT COUNT(*) AS total_hombres FROM estudiantes WHERE sexo = "Femenino);   
       // return $sentencia->fetch_all(MYSQLI_ASSOC);
      // $total=mysql_fetch_array($sentencia);
      return $sentencia->fetch_array(MYSQLI_ASSOC);
    }

    public static function total_materias()
    {
        global $mysqli;
        $sentencia=$mysqli->query("SELECT COUNT(*) as total_materias FROM materias");
        return $sentencia->fetch_array(MYSQLI_ASSOC);
    }
}