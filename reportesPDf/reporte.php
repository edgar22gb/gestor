<?php 

include_once "../conexion.php";
include_once "../Estudiantes.php";
//include_once "../fpdf/fpdf.php";
include_once "../reportesPDf/plantilla.php";
include_once "../Materias.php";
include_once "../asigna_materias.php";
include_once "../semestres.php";
include_once "../profesores.php";

//MANDAMOS LLAMAR LAS CLASES PARA OBTENCIÓN DE DATOS
$materias=Materias::obtener();
$estudiante = Estudiantes::obtenerUno($_GET["id"]);
$materias_asignadas=AsignaMaterias::obtener2($_GET["id"]);

//AQUI AGGREAMOS LAS CLASES PARA CREAR EL PDF
    $pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	
	$pdf->SetFillColor(243,239,239);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(50,8,'Nombre del alumno',0,0,'C',0);


	//$pdf->Cell(40,6,'Nombre de Materia',1,0,'C',0);
	//$pdf->Cell(70,6,'Numero',1,0,'C',0);
		//AAQUI AGREGO EL CUERPO PARA LAS MATERIAS	
	//$pdf->Ln();
	$pdf->SetFont('Arial','B',12);
    $pdf->SetTextColor(6,103,71);
	$pdf->Cell(58,8,utf8_decode($estudiante->nombre_estudiante),0,0,'C');

	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(30,8,'Semestre',0,0,'C',0);
	$pdf->SetTextColor(6,103,71);

	$pdf->Cell(2,8, utf8_decode($estudiante->semestre),0,0,'C');	

	$pdf->Ln(20);
	$pdf->SetTextColor(28,90,149);
	$pdf->Ln();
	$pdf->Cell(90,1,'Clave de la Materia',0,0,'L',0);
	$pdf->SetTextColor(28,90,149);

	
	$pdf->Cell(30,8,'Nombre de la',0,0,'C',0);
	$pdf->Ln();
	$pdf->Cell(60,8,'Materia',0,0,'C',0);


	//echo $estudiante->nombre_estudiante;
	//AQUI AGREGO EL TEXTO DE SEMESTRE
	
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(2,2);
	$pdf->Cell(10,10,'Nombre del ',0,0,'L');
	$pdf->Ln();
	$pdf->Cell(10,10,'Profesor',0,0,'L');

	//$pdf->Cell(58,8,utf8_decode($estudiante->nombre_estudiante),0,0,'C');

	//$pdf->Cell(-30,10);
	
	
	


	$pdf->SetFont('Arial','I',9);
	$pdf->Ln(5);

	foreach ($materias_asignadas as $materia)
	{
		$pdf->Ln(8);
		$pdf->SetTextColor(6,103,71);
//		$pdf->MultiCell([string align "J"]);
		$pdf->Cell(10,10,utf8_decode($materia['clave_materia']),0,0,'L');
		$pdf->Cell(5,1,utf8_decode($materia['nombre_materia']),0,0,'L');

		// echo $materia->clave_materia;
		$pdf->SetTextColor(0,0,0);	
		$pdf->Cell(70,2,utf8_decode($materia['id_profesor']),0,0,'R');

	}
	
	
	


//GENERAMOS LA FIRMA
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
/*
	$pdf->Cell(180,6,'Atentamente',0,0,'C',0);
	$pdf->Ln();
	$pdf->Ln();
	
	
	$pdf->Cell(180,6,'________________________________',0,0,'C',0);

	$pdf->Ln();
	//$pdf->Cell(180,6,'Mtra. Maria del Rosario Ascencio Valenzuela',0,0,'C',0);
	$pdf->Ln();
//	$pdf->Cell(180,6,'Jefa de Control Escolar',0,0,'C',0);*/
$pdf->Output();


