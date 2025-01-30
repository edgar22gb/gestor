<?php

/**
 * 
 */
Class AsignaNotas
{

	//ASIGNO LAS VARIABLES Y GENERO EL CONSTRUCTOR 
	private $nombre_estudiante,$nombre_profesor, $nombre_semestre, $nombre_materia,$nota_materia;

	//GENERO EL CONSTRUCTOR Y A CADA CAMPO LE ASIGNO UNA VARIABLE
	public function  __construct($nombre_estudiante,$nombre_profesor,$nombre_semestre,$nombre_materia,$nota_materia)
	{
		$this->nombre_estudiante=$nombre_estudiante;
		$this->nombre_profesor=$nombre_profesor;
		$this->nombre_semestre=$nombre_semestre;
		$this->nombre_materia=$nombre_materia;
		$this->nota_materia=$nota_materia;



	}
	//GENERO EL METODO QUE SE ENCARGARA DE GUARDAR LOS DATOS A LA BASE DE DATOS
	public function guardar_nota()
	{
		 global $mysqli;
          $sentencia = $mysqli->prepare("INSERT INTO asignar_notas
            (id_estudiante,id_profesor,id_materia,id_semestre,nota_materia)
                VALUES
                (?,?,?,?,?)");
        $sentencia->bind_param("sssss", $this->nombre_estudiante, $this->nombre_profesor, $this->nombre_materia,$this->nombre_semestre,$this->nota_materia);
        
        if($sentencia->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

	}
	//GENERO EL METODO PARA MOSTRAR TODAS LAS NOTAS
	public  static function mostrar_notas()
	{
		  global $mysqli;
		  //$resultado=$mysqli->query("select asignar_notas.id_estudiante ,materias.id,materias.nombre_materia,asignar_notas.id_profesor,asignar_notas.id_semestre,asignar_notas.nota_materia, estudiantes.nombre_estudiante FROM asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN semestres ON asignar_notas.id_semestre=semestres.id_semestre INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_semestre=?");
		  $resultado=$mysqli->query("SELECT *from asignar_notas");
       // $resultado = $mysqli->query("SELECT asignar_notas.id_estudiante, asignar_notas.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,asignar_notas.nota_materia,estudiantes.nombre_estudiante from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=?"); 
		//var_dump($resultado);
		return $resultado->fetch_all(MYSQLI_ASSOC);
	}
	public function vista()
	{
		
	}
	public static function mostrar_nota2($id2)
	{
		 global $mysqli;
		// $stmt =$mysqli->query ("SELECT asigna_nota.id_materia,materias.id,materias.nombre_materia,asigna_notas.id_profesor,asigna_notas.id_semestre, materias.clave_materia FROM asigna_notas INNER JOIN materias ON asigna_notas.id_materia=materias.id where asigna_notas.id_estudiante= ".$id2);
		 //var_dump($stmt);
        $stmt =$mysqli->query ("SELECT asigna_materias.id_materia,materias.id,materias.nombre_materia,asigna_materias.id_profesor,asigna_materias.id_semestre  FROM asigna_materias INNER JOIN materias ON asigna_materias.id_materia=materias.id where asigna_materias.id_estudiante= ".$id2);
        return $stmt->fetch_all(MYSQLI_ASSOC);
	}

	public static function nota_alumno($id=null,$numero_semestre=null)
	{
		if($numero_semestre==null)
		{
			global $mysqli;

		//$stmt = $mysqli->prepare("SELECT * FROM asignar_notas.nota_materia WHERE asignar_notas.id_estudiante=".$id);
        //$stmt->bind_param("s", $id);
        //$stmt->execute();
        //$resultado = $stmt->get_result();
        //return $resultado->fetch_object();
		
		//$stmt=$mysqli->query("SELECT asignar_notas.nota_materia  from asignar_notas  where asignar_notas.id_estudiante=".$id.'and asignar_notas.id_materia='.$_GET["id"]);
		//var_dump($id);
		//CONSULTA NUEVA
		//$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia, materias.id,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante,asignar_notas.nota_materia from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante".$id);
		$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia,asignar_notas.id_profesor,asignar_notas.id_semestre,asignar_notas.nota_materia,materias.nombre_materia,materias.clave_materia,materias.numero_creditos,profesores.nombre_profesor,estudiantes.nombre_estudiante from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante=".$id."");
		//$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia, materias.id,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante,asignar_notas.nota_materia from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante=".$id);
		//$stmt=$mysqli->query("SELECT asignar_notas.id_estudiante, asignar_notas.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,asignar_notas.nota_materia,estudiantes.nombre_estudiante from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=".$_GET["id"]);
		return $stmt->fetch_all(MYSQLI_ASSOC);
		}
		else
		{
			global $mysqli;

		//$stmt = $mysqli->prepare("SELECT * FROM asignar_notas.nota_materia WHERE asignar_notas.id_estudiante=".$id);
        //$stmt->bind_param("s", $id);
        //$stmt->execute();
        //$resultado = $stmt->get_result();
        //return $resultado->fetch_object();
		
		//$stmt=$mysqli->query("SELECT asignar_notas.nota_materia  from asignar_notas  where asignar_notas.id_estudiante=".$id.'and asignar_notas.id_materia='.$_GET["id"]);
		//var_dump($id);
		//CONSULTA NUEVA
		//$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia, materias.id,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante,asignar_notas.nota_materia from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante".$id);
		//$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia,asignar_notas.id_profesor,asignar_notas.id_semestre,asignar_notas.nota_materia,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,estudiantes.nombre_estudiante from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante=".$id);
		//$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia, materias.id,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,estudiantes.nombre_estudiante,asignar_notas.nota_materia from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id where asignar_notas.id_estudiante=".$id);
		//$stmt=$mysqli->query("SELECT asignar_notas.id_estudiante, asignar_notas.id_materia,materias.id,materias.nombre_materia,profesores.nombre_profesor,asignar_notas.id_profesor,asignar_notas.id_semestre,materias.clave_materia,asignar_notas.nota_materia,estudiantes.nombre_estudiante from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=".$_GET["id"]);
		$stmt=$mysqli->query("SELECT asignar_notas.id, asignar_notas.id_estudiante, asignar_notas.id_materia,asignar_notas.id_profesor,asignar_notas.id_semestre,asignar_notas.nota_materia,materias.nombre_materia,materias.clave_materia,profesores.nombre_profesor,estudiantes.nombre_estudiante from asignar_notas INNER JOIN materias ON asignar_notas.id_materia=materias.id INNER JOIN profesores ON asignar_notas.id_profesor=profesores.id INNER JOIN estudiantes ON asignar_notas.id_estudiante=estudiantes.id INNER JOIN semestres ON asignar_notas.id_semestre=semestres.id_semestre where asignar_notas.id_estudiante=".$id." AND asignar_notas.id_semestre=".$numero_semestre."");
		return $stmt->fetch_all(MYSQLI_ASSOC);
	//return $numero_semestre;
		}
		
	}
	public static function nota_materia($id_materia,$id_estudiante)
	{
		
		global $mysqli;
		$stmt=$mysqli->query("SELECT * from asignar_notas where id_materia=$id_materia and id_estudiante=$id_estudiante");
		return $stmt->fetch_all(MYSQLI_ASSOC);
	}
	public function editarnota($id,$nota_materia)
	{
		global $mysqli;
		
        $sentencia = $mysqli->prepare("update asignar_notas set id_estudiante=?,id_profesor=?,id_materia=?,id_semestre=?, nota_materia=? where id=".$id);
        $sentencia->bind_param("sssss",$id_estudiante,$nombre_profesor,$nombre_materia,$nombre_semestre,$nota_materia,$id);
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


}



?>