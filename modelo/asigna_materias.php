<?php
 /**
  * 
  */
 class AsignaMaterias
 {
 	private $id_estudiante,$id_profesor, $id_materia, $id_semestre;

    public function __construct($id_estudiante,$id_profesor,$id_materia, $id_semestre)
    {
        $this->id_estudiante=$id_estudiante;
        $this->id_profesor=$id_profesor;
        $this->id_materia = $id_materia;
        $this->id_semestre=$id_semestre;
        
        
    }

    public function guardar()
    {

     

         global $mysqli;
          $sentencia = $mysqli->prepare("INSERT INTO asigna_materias
            (id_estudiante,id_profesor,id_materia,id_semestre)
                VALUES
                (?,?,?,?)");
        $sentencia->bind_param("ssss", $this->id_estudiante,$this->id_profesor,$this->id_materia,$this->id_semestre);
        
        if($sentencia->execute()){
            return true;
        }else{
            return false;
        }

        

      
       
    }
    public static function obtener()
    {
        
         global $mysqli;
        $resultado = $mysqli->query("SELECT * FROM asigna_materias");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public static function obtener2($id2)
    {

    global $mysqli;
        $stmt =$mysqli->query ("SELECT asigna_materias.id_estudiante, asigna_materias.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_profesor,asigna_materias.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id INNER JOIN estudiantes ON asigna_materias.id_estudiante=estudiantes.id where asigna_materias.id_estudiante= ".$id2);
   return $stmt->fetch_all(MYSQLI_ASSOC);
    
    }
    public static function obtener3($id3)
    {
    global $mysqli;
        $stmt =$mysqli->query ("SELECT * FROM asigna_materias where id_profesor=".$id3);
   return $stmt->fetch_all(MYSQLI_ASSOC);    
    }

 }

?>