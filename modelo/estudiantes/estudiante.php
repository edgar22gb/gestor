<?php
class Estudiante
{
    public static function obtenerEstudiante($id)
 {
     global $mysqli;
     $sentencia = $mysqli->prepare("SELECT * FROM estudiantes WHERE id = ?");
     $sentencia->bind_param("i", $id);
     $sentencia->execute();
     $resultado = $sentencia->get_result();
     return $resultado->fetch_object();
 }
 public static function notas_asignadas($id)
 {
    global $mysqli;
    $stmt=$mysqli->query("SELECT asignar_notas.id_estudiante, asignar_notas.id_materia, materias.id,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante,asignar_notas.nota_materia from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante=".$id);
    return $stmt->fetch_all(MYSQLI_ASSOC);
 }
 public static function asignamateria($id)
 {
 
    
  global $mysqli;
  $stmt =$mysqli->query ("SELECT asigna_materias.id_estudiante, asigna_materias.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_profesor,asigna_materias.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id INNER JOIN estudiantes ON asigna_materias.id_estudiante=estudiantes.id where asigna_materias.id_estudiante= ".$id);
return $stmt->fetch_all(MYSQLI_ASSOC);

 //   $sentencia=$mysqli->prepare("SELECT * FROM asigna_materias where id=".$id);
  // var_dump($sentencia);
 //  $sentencia=$mysqli->prepare("SELECT asigna_materias.id_estudiante, asigna_materias.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_profesor,asigna_materias.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id INNER JOIN estudiantes ON asigna_materias.id_estudiante=estudiantes.id where estudiantes.id=".$id);
    //$stmt=$mysqli->query("SELECT asigna_materias.id_estudiante, asigna_materias.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_profesor,asigna_materias.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id INNER JOIN estudiantes ON asigna_materias.id_estudiante=estudiantes.id where estudiantes.id=$id");
   //$sentencia->bind_param("i", $id);
     // $sentencia->execute();
       //$resultado = $sentencia->get_result();
      //return $resultado->fetch_object();
    //$stmt =$mysqli->query ("SELECT asigna_materias.id_estudiante, asigna_materias.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_profesor,asigna_materias.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id INNER JOIN estudiantes ON asigna_materias.id_estudiante=estudiantes.id where asigna_materias.id_estudiante= ".$id);
    //return $stmt->fetch_object();
    //return $sql->fetch_object();
 }
}
 
?>