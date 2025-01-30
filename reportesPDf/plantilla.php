<?php
	require '../fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			//AGREGO EL MEMBRETE INSTITUCIONAL
			//$this->Image('../img/logo_cum.png', 10, 10, 30 );
			//$this->Image('../img/SEG1.png', 160, 12, 30 );
			$this->Image('../img/MEMBRETE.png',10,6);
			$this->Ln(20);
			$this->SetFont('Arial','B',15);
			$this->SetTextColor(6,103,171);
			$this->Cell(30);
			$this->Cell(120,10, 'CENTRO UNIVERSITARIO MOCTEZUMA',0,0,'C');
            $this->SetTextColor(6,6,6);
			$this->Ln(10);
			$this->SetFont('Arial','I',10);
			$this->Cell(180,10, 'FRANCISCO  I. MADERO OTE #800, COL. ESQUIPULAS',0,1,'C');
			$this->Ln(1);
			
			$this->SetFont('Arial','I',10);
			$this->Cell(180,10, 'CD. ALTAMIRANO, GRO. TEL: 767-67-688-07-74',0,1,'C');
			$this->Ln(2);

			$this->SetFont('Arial','B',18);
			$this->Cell(180,10, 'Ficha de Inscripcion',0,1,'C');
			$this->Ln(10);

		}

		
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>