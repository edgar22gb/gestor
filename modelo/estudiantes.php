<?php
class Estudiantes
{
    private $foto_estudiante, $matricula_estudiante, $apellido_paterno,$apellido_materno,$nombre_estudiante,
    $edad,$fecha_nacimiento,$sexo,$estado_civil,$curp,$lugar_nacimiento,
    $estado,$nacionalidad,$calle,$numero_exterior,$colonia,$codigo_postal,
    $municipio,$ciudad,$telefono_celular,$licenciatura_procedente,
    $universidad_procedente,$maestria_solicitada,$generacion,$turno,
    $grado, $grupo,$semestre,$rol;

    public function __construct($foto_estudiante, $matricula_estudiante, $apellido_paterno,$apellido_materno,$nombre_estudiante,$edad,$fecha_nacimiento,$sexo,$estado_civil,$curp,$lugar_nacimiento,$estado,$nacionalidad,$calle,$numero_exterior,$colonia,$codigo_postal,$municipio,$ciudad,$telefono_celular,$licenciatura_procedente,$universidad_procedente,$maestria_solicitada,$generacion,$turno,$grado,$grupo,$semestre,$rol, $id = null)
    {
        $this->foto_estudiante=$foto_estudiante;
        $this->matricula_estudiante=$matricula_estudiante;
        $this->apellido_paterno=$apellido_paterno;
        $this->apellido_materno=$apellido_materno;
        $this->nombre_estudiante = $nombre_estudiante;
        $this->edad=$edad;
        $this->fecha_nacimiento=$fecha_nacimiento;
        $this->sexo=$sexo;
        $this->estado_civil=$estado_civil;
        $this->curp=$curp;
        $this->lugar_nacimiento=$lugar_nacimiento;
        $this->estado=$estado;
        $this->nacionalidad=$nacionalidad;
        $this->calle=$calle;
        $this->numero_exterior=$numero_exterior;
        $this->colonia=$colonia;
        $this->codigo_postal=$codigo_postal;
        $this->municipio=$municipio;
        $this->ciudad=$ciudad;
        $this->telefono_celular=$telefono_celular;
        $this->licenciatura_procedente=$licenciatura_procedente;
        $this->universidad_procedente=$universidad_procedente;
        $this->maestria_solicitada=$maestria_solicitada;
        $this->generacion=$generacion;
        $this->turno=$turno;
        $this->grado=$grado;
        $this->grupo = $grupo;
        $this->semestre=$semestre;
        $this->rol=$rol;
       
    }

    public function guardar()
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("INSERT INTO estudiantes
            (foto_estudiante,matricula_estudiante,apellido_paterno,apellido_materno,nombre_estudiante,edad,fecha_nacimiento,sexo,estado_civil,curp,lugar_nacimiento,estado,nacionalidad,calle,numero_exterior,colonia,codigo_postal,municipio,ciudad,telefono_celular,licenciatura_procedente,universidad_procedente,maestria_solicitada,generacion,turno,grado,grupo,semestre,rol)
                VALUES
                (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                
        $sentencia->bind_param("sssssssssssssssssssssssssssss",$this->foto_estudiante,$this->matricula_estudiante,$this->apellido_paterno,$this->apellido_materno, $this->nombre_estudiante,$this->edad,$this->fecha_nacimiento,$this->sexo,$this->estado_civil,$this->curp,$this->lugar_nacimiento,$this->estado,$this->nacionalidad,$this->calle,$this->numero_exterior,$this->colonia,$this->codigo_postal,$this->municipio,$this->ciudad,$this->telefono_celular,$this->licenciatura_procedente,$this->universidad_procedente,$this->maestria_solicitada,$this->generacion,$this->turno,$this->grado, $this->grupo,$this->semestre,$this->rol);
      

        if($sentencia->execute()){
            return true;
        }else{
            return false;
        }

 return $this->matricula_estudiante;
    }

    public static function obtener()
    {
        global $mysqli;
        $resultado = $mysqli->query("SELECT * FROM estudiantes");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    /*public static function obtenerSemestre()
    {
        global $mysqli;
        $result=$mysqli->query("SELECT  id_semestre,nombre_semestre from semestres");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }*/
    //obtenemos los estudiantes cuyo nivel sea secundaria
    public static function obtenerlista($id)

    {
        
     global $mysqli;
     $sentencia=$mysqli->query("SELECT estudiantes.nombre_estudiante,estudiantes.apellido_paterno, estudiantes.apellido_materno,estudiantes.semestre from estudiantes INNER JOIN semestres on estudiantes.semestre=semestres.id_semestre where estudiantes.semestre=".$id);   
     return $sentencia->fetch_all(MYSQLI_ASSOC);

    }
    public static function obtenerUno($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("SELECT * FROM estudiantes WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
    }
    public function actualizar($id)
    {


       global $mysqli;
        $sentencia = $mysqli->prepare("update estudiantes set foto_estudiante=?, apellido_paterno=?,apellido_materno=?,
        nombre_estudiante = ?,edad=?,fecha_nacimiento=?,sexo=?,estado_civil=?,curp=?,lugar_nacimiento=?,
        estado=?,nacionalidad=?,calle=?,numero_exterior=?,colonia=?,codigo_postal=?,
        municipio=?,ciudad=?,telefono_celular=?,licenciatura_procedente=?,universidad_procedente=?,
        maestria_solicitada=?,generacion=?,turno=?,grado=?,grupo=?,semestre=? where id =".$id);

        $sentencia->bind_param("sssssssssssssssssssssssssss",
        $this->foto_estudiante,
        $this->apellido_paterno,$this->apellido_materno, 
        $this->nombre_estudiante,$this->edad,
        $this->fecha_nacimiento,$this->sexo,
        $this->estado_civil,$this->curp,$this->lugar_nacimiento,
        $this->estado,$this->nacionalidad,$this->calle,
        $this->numero_exterior,$this->colonia,
        $this->codigo_postal,$this->municipio,
        $this->ciudad,$this->telefono_celular,$this->licenciatura_procedente,
        $this->universidad_procedente,$this->maestria_solicitada,
        $this->generacion,$this->turno, $this->grado,$this->grupo,$this->semestre);

        //var_dump($sentencia);   
      if( $sentencia->execute())
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
        $sentencia = $mysqli->prepare("DELETE FROM estudiantes WHERE id = ?");
        $sentencia->bind_param("i", $id);
    
       if( $sentencia->execute())
       {
        return true;

       }
       else
       {
        return false;
       }
    }

    public static  function   total_hombres()
    {
        global $mysqli;
        $sentencia=$mysqli->query("SELECT COUNT(*) as hombres from estudiantes where estudiantes.sexo='Masculino'");
        //$sentencia=$mysqli->query($sql = "SELECT COUNT(*) AS total_hombres FROM estudiantes WHERE sexo = "Femenino);   
       // return $sentencia->fetch_all(MYSQLI_ASSOC);
      // $total=mysql_fetch_array($sentencia);
      return $sentencia->fetch_array(MYSQLI_ASSOC);
       // 

    }
    public static function   total_mujeres()
    {
        global $mysqli;
        $sentencia=$mysqli->query("SELECT COUNT(*) as mujeres from estudiantes where estudiantes.sexo='Femenino'");
        return $sentencia->fetch_array(MYSQLI_ASSOC);

    }
    public static function total_alumnos()
    {
        global $mysqli;

        $sentencia=$mysqli->query("SELECT COUNT(*) as total from estudiantes");
        return $sentencia->fetch_array(MYSQLI_ASSOC);
    }

    
}