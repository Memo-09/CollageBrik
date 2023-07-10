<?php
    include("./plantilla.php");
    require("./conexion.php");

    $query="SELECT * FROM registro_portafolio WHERE ID_ROL_PORTAFOLIO_REGISTRO=1";
    $resultado=mysqli_query($conexion,$query);

    $pdf=new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',10);

    $pdf->SetFillColor(232,232,232);
    $pdf->Cell(50,6,'MATRICULA',1,0,'C',1);
    $pdf->Cell(50,6,'NOMBRE',1,0,'C',1);
    $pdf->Cell(50,6,'APELLIDOS',1,0,'C',1);
    $pdf->Cell(40,6,'CORREO',1,1,'C',1);

    $pdf->SetFont('Arial','',10);
    while($tabla=mysqli_fetch_array($resultado)){
        $pdf->Cell(50,6,$tabla[3],1,0,'C',1);
        $pdf->Cell(50,6,$tabla[1],1,0,'C',1);
        $pdf->Cell(50,6,$tabla[2],1,0,'C',1);
        $pdf->Cell(40,6,$tabla[4],1,1,'C',1);
    }
    $pdf->Output();
?>