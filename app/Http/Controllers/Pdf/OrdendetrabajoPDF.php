<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use App\Models\GrupoHerramienta;
use App\Models\OdtUsuario;
use App\Models\OrdenTrabajo;
use App\Models\Tarea;
use App\Models\TareaGrupoHerramienta;
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
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }

    // Contenido
    function Content($ordenTrabajo)
    {
        $this->SetFillColor(192, 192, 192);
        $this->SetFont('Arial','',10);
        $this->Cell(10,7,utf8_decode('Nº: '),0,0,'L');
        $this->Cell(105,7,$ordenTrabajo->id_orden,0,0,'L',);
        $this->Cell(55,7,utf8_decode('Fecha de creación: '),0,0,'R');
        $this->Cell(0,7,$ordenTrabajo->fecha,0,1,'R',);
        $this->Cell(0,2,'',0,1,'C');

        // Descripción de la orden de trabajo

        $this->Cell(25,7,utf8_decode('Acueducto:'),0,0,'L');
        $this->Cell(90,7,$ordenTrabajo->acueductos->nom_acu,0,0,'L',);
        $this->Cell(55, 7, 'Tipo de Orden: ', 0, 0, 'R');
        $this->Cell(0, 7,$ordenTrabajo->tipo->desc_orden ,0 , 1, 'R');
        $this->Cell(0,2,'',0,1,'C');

        $this->Cell(25,7,utf8_decode('Descripción: '),0,0,'L');
        $this->Cell(89.3,7,$ordenTrabajo->descrip_ot,0,0,'L',);
        $this->Cell(55, 7,'Prioridad:' , 0 , 0, 'R');
        $this->Cell(0, 7,$ordenTrabajo->prioridad->desc_priori , 0 , 1, 'R',);
        $this->Cell(0,2,'',0,1,'C');

        $this->Cell(25,7,'Equipo: ',0,0,'L');
        $this->Cell(60,7,$ordenTrabajo->subsistemas->nombre_subsistema,0,0,'L', );
        $this->Cell(25,10,'',0,0,'C');

        // Fecha de creación

        $this->Cell(0, 10,'' , 0 , 1, 'C');

        $this->Cell(30, 10,'Datos' , 1 , 0, 'C',true);
        $this->Cell(65, 10,'Fecha/Hra Inicio' , 1 , 0, 'C',true);
        $this->Cell(65, 10,'Fecha/Hra Fin' , 1 , 0, 'C',true);
        $this->Cell(0, 10,'Duracion' , 1 , 1, 'C',true);
        $this->Cell(30, 10,'Programado' , 1 , 0, 'C',true);
        $this->Cell(65, 10,$ordenTrabajo->fecha_inicio , 1 , 0, 'C');
        $this->Cell(65, 10,$ordenTrabajo->fecha_final , 1 , 0, 'C');
        $this->Cell(0, 10,$ordenTrabajo->dias.' Dia' , 1 , 1, 'C');
        $this->Cell(30, 10,'Real' , 1 , 0, 'C',true);
        $this->Cell(65, 10,'' , 1 , 0, 'C');
        $this->Cell(65, 10,'' , 1 , 0, 'C');
        $this->Cell(0, 10,''.' Dia' , 1 , 1, 'C');
        $this->Cell(0, 10,'' , 0 , 1, 'C');

        $equipos = Equipo::where('id_subsistema', $ordenTrabajo->id_subsistema)->get();
        $cont = 1;
        $coleccionEq = array();
        foreach ($equipos as $equipo){
            $tareas  = $equipo->tareas;
            foreach ($tareas as $tarea){
                $col = $tarea->tarea;
                $col1 =  $tarea->id_tareas;
                $col3 = $tarea->id_tipo_eq;
                $nuevoItem = array(
                    'id_tareas' => $col1,
                    'tarea' => $col,
                    'id_tipo_eq' => $col3,
                );
                //dd($nuevoItem);
                array_push($coleccionEq, $nuevoItem);
            }
        }
        $this->Cell(20, 10,'item' , 1 , 0, 'C',true);
        $this->Cell(0, 10,'Tareas de la OT' , 1 , 1, 'C',true);
        foreach ($coleccionEq as $equipo){
            $tarea = $equipo['tarea'];
            $this->Cell(20, 10,$cont , 1 , 0, 'C');
            $this->Cell(0,10,$tarea, 1);
            $this->Ln();
            $cont +=1;
        }
        $this->Cell(0, 10,'' , 0 , 1, 'C');
        $this->Cell(0, 10,'Datos de la mano de obra' , 1 , 1, 'C',true);
        $this->Cell(17.5, 10,'Cedula' , 1 , 0, 'C',true);
        $this->Cell(68, 10,'Nombre' , 1 , 0, 'C',true);
        $this->Cell(0, 10,'Cargo' , 1 , 1, 'C',true);

        $obreros = OdtUsuario::where('id_orden', $ordenTrabajo->id_orden)->get();
        foreach ($obreros as $obrero){
            $this->Cell(17.5, 10,$obrero->obreros->cedula , 1 , 0, 'C');
            $this->Cell(68, 10,utf8_decode($obrero->obreros->nombre) , 1 , 0, 'J');
            $this->Cell(0, 10,utf8_decode($obrero->obreros->cargo) , 1 ,1,  'J');

        }



        $this->Ln();
       // dd($coleccionEq);

        $coleccionGrHr = array();
        foreach ($coleccionEq as $item){
            $id = $item['id_tareas'];
            $item1 = TareaGrupoHerramienta::where('id_tarea', $id)->get();
            foreach ($item1 as $item2){
                $co = $item2->id_tarea;
                $co1 =  $item2->id_grupo_herramienta;
                $coleccionGrEq = array(
                    'id_tarea' => $co,
                    'id_grupo_herramienta' => $co1,
                );
                array_push($coleccionGrHr, $coleccionGrEq);
            }
        }
        $colecciontahr = array();
        foreach ($coleccionGrHr as $item3){
            $grherram = GrupoHerramienta::where('id_grupo_herramienta', $item3['id_grupo_herramienta'])->get();
            $trname = Tarea::where('id_tareas', $item3['id_tarea'])->get();
            foreach ($trname as $trana){
                $nametr = $trana['tarea'];
            }
            foreach ($grherram as $grhe){
                $namegrhe = $grhe['nombre_grupo'];
            }
            // Agregamos los nuevos elementos al array
            $colecciontahr[] = array(
                'tarea' => $nametr,
                'nombre_grupo' => $namegrhe,
            );

        }
        $grupos = array();
        foreach ($colecciontahr as $item) {
            $nombreGrupo = $item['nombre_grupo'];
            $tarea = $item['tarea'];

            if (isset($grupos[$nombreGrupo])) {
                $grupos[$nombreGrupo]['count']++;
            } else {
                $grupos[$nombreGrupo] = array(
                    'count' => 1,
                    'tarea' => $tarea
                );
            }
        }
        $this->Cell(30, 10, 'Cantidad', 1, 0, 'C',true);
        $this->Cell(0, 10, 'Herramientas/Materiales/Respuestos a utilizar', 1, 1, 'C',true);

        // Imprimir datos en FPDF
        foreach ($grupos as $nombreGrupo => $info) {
            $count = $info['count'];
            $tarea = $info['tarea'];

            $this->Cell(30, 10, $count, 1, 0);
            $this->Cell(0, 10, utf8_decode($nombreGrupo), 1, 1);
        }
        $this->Cell(0, 10,'' , 0 , 1, 'C');
        $this->Cell(25, 10,'Observacion: ' , 0 , 0, 'L');
        $this->Cell(0, 10,$ordenTrabajo->observacion , 0 , 1, 'J');


    }
}
