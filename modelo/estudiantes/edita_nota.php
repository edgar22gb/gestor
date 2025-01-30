<?php
class EditaNotaAlumno
{
    private $id,$nota_materia;
    public function __construct($id,$nota_materia)
    {
        $this->id=$id;
        $this->nota_materia=$nota_materia;

    }
    public function editar_nota()
    {
        //return $nota_materia;
        global $mysqli;
		//var_dump($this->$id);
        //return;
        $sentencia = $mysqli->prepare("update asignar_notas set nota_materia=? where id=?");
		//var_dump($sentencia);
        
        $sentencia->bind_param("ii",$this->nota_materia,$this->id);
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