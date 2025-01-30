<?php
/**
 * 
 */
class Semestres
{
	private $nombre_semestre, $id_semestre;
	
	public static function obtener()
	{
		global $mysqli;
		$resultado = $mysqli->query("SELECT *from semestres");
		return $resultado->fetch_all(MYSQLI_ASSOC);

	}
	


}
?>