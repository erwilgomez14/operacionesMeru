<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

use Codedge\Fpdf\Fpdf\Fpdf;
class OrdendetrabajoPDF extends Fpdf
{
    function Header()
    {

        // Logo
        $this->Image(public_path('template/assets/img/logosunidos.png'),10,6,40, 20,'png');
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Orden de trabajo (OT)',0,0,'C');
        // Movernos a la derecha
        $this->Cell(80);
        $this->Image(public_path('template/assets/img/logo_sello.png'),160,6,40, 20,'png');
        // Salto de línea
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Contenido
    function Content($ordenTrabajo)
    {
        $this->SetFont('Courier','',12);
        $this->Cell(10,10,utf8_decode('Nº: '),0,0,'L');
        $this->Cell(20,10,$ordenTrabajo->id_orden,1,0,'C');
        // Descripción de la orden de trabajo

        $this->Cell(30,10,utf8_decode('Acueducto:'),0,0,'R');
        $this->Cell(0,10,$ordenTrabajo->acueductos->nom_acu,1,1,'L');
        $this->Cell(33,10,utf8_decode('Descripción: '),0,0,'L');
        $this->Cell(0,10,$ordenTrabajo->descrip_ot,1,1,'L');
        $this->Cell(20,10,'Equipo: ',0,0,'L');
        $this->Cell(60,10,$ordenTrabajo->subsistemas->nombre_subsistema,1,0,'C');
        $this->Cell(25,10,'',0,0,'C');

        // Fecha de creación
        /*$this->SetFont('Arial','B',12);*/
        $this->Cell(50,10,utf8_decode('Fecha de creación: '),0,0,'L');
        $this->Cell(0,10,$ordenTrabajo->fecha,1,1,'C');
        $this->Cell(38, 10, 'Tipo de Orden: ', 0 , 0, 'L');
        //$this->Cell(38, 10,$ordenTrabajo->tipo->desc_orden , 0 , 0, 'L');

    }
}
