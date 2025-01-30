<?php
class Profesor
{
    //creo la funcion que obtiene las materias por id profesor
    public static function materiaasignada($id)
    {
        global $mysqli;
        $stmt=$mysqli->query("SELECT asigna_materias.id_profesor,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_semestre,materias.clave_materia from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id where asigna_materias.id_profesor=".$id);
        //$stmt=$mysqli->query("SELECT asigna_materias.id_profesor, asigna_materias.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asigna_materias.id_profesor,asigna_materias.id_semestre,materias.clave_materia from asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id INNER JOIN profesores ON asigna_materias.id_profesor=profesores.id where asigna_materias.id_profesor=".$id);
        return $stmt->fetch_all();

    }
}
?>