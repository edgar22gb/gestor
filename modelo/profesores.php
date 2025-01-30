<?php
class Profesores
{
	private $clave_profesor,$nombre_profesor,$curp,$direccion,$telefono_celular,$correo_electronico,$rol;

	public function __construct($clave_profesor,$nombre_profesor,$curp,$direccion,$telefono_celular,$correo_electronico,$rol)
	{
		$this->clave_profesor=$clave_profesor;
		$this->nombre_profesor=$nombre_profesor;
		$this->curp=$curp;
		$this->direccion=$direccion;
		$this->telefono_celular=$telefono_celular;
		$this->correo_electronico=$correo_electronico;
		$this->rol=$rol;
		
	}
	public function guardar_profesor()
	{
		global $mysqli;
		$sentencia=$mysqli->prepare("INSERT INTO profesores
		(clave_profesor,nombre_profesor,curp,direccion,telefono_celular,correo_electronico,rol)
		VALUES (?,?,?,?,?,?,?)");
		$sentencia->bind_param("sssssss",$this->clave_profesor,$this->nombre_profesor,$this->curp,$this->direccion,$this->telefono_celular,$this->correo_electronico,$this->rol);
		//	return $sentencia;
	
		if($sentencia->execute())
		{

			return true;
		}
		else
		{
			return false;
		}
		
		//$sentencia->execute();
	}
	public static function obtener()
	{
		global $mysqli;
        $resultado = $mysqli->query("SELECT id,clave_profesor, nombre_profesor,curp,direccion,telefono_celular,correo_electronico FROM profesores");
        return $resultado->fetch_all(MYSQLI_ASSOC);
	}
	public static function obtenerUnProfesor($id)
	{
		global $mysqli;
        $sentencia = $mysqli->prepare("SELECT * FROM profesores WHERE id = ?");
        $sentencia->bind_param("i", $id);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado->fetch_object();
        
	}
	public function actualizarprofesor($id)
    {
        global $mysqli;
        $sentencia = $mysqli->prepare("update profesores set clave_profesor=?,nombre_profesor=?,curp=?,direccion=?,telefono_celular=?,correo_electronico=?  where id =".$id);
        $sentencia->bind_param("ssssss", $this->clave_profesor,$this->nombre_profesor,$this->curp,$this->direccion,$this->telefono_celular,$this->correo_electronico);
        //return $sentencia;
		if($sentencia->execute())
		{

			return true;
		}
		else
		{
			return false;
		}
		
	//	$sentencia->execute();
    }
	public function eliminarProfesor($id)
	{
		global $mysqli;
		$sentencia=$mysqli->prepare("DELETE FROM profesores where id=".$id);
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