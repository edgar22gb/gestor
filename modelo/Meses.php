<?php
class Meses
{
	private $nombre_mes, $id;
	
	public static function obtener()
	{
		global $mysqli;
		$resultado = $mysqli->query("SELECT *from meses");
		return $resultado->fetch_all(MYSQLI_ASSOC);

	}
	


}
?>