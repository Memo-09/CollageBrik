<?php
    require("fpdf/fpdf.php");
    class PDF extends FPDF{
        function header(){
            $this->Image("image/logo_Collegebrick.png", 10, 5, 13);
            $this->setFont('Arial','B',15);
            $this->Cell(30);
            $this->Cell(135,10,"LISTA DE ALUMNOS REGISTRADOS",0,0,'C');
            $this->Ln(20);
        }
        function footer(){
            $this->SetY(-15);
            $this->setFont('Arial','I',15);
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

        }
    }
?>