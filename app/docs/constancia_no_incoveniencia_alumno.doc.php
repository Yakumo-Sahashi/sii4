<?php
    require_once '../../app/lib/FPDF/force_justify.php';
    use model\TablaPeriodoEscolar;
    use model\TablaAlumno;
    use model\TablaHistoriaAlumno;
    use model\TablaUsuario;
    use model\TablaSeleccionMaterias;

	require_once realpath('../../vendor/autoload.php');
    
    $mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
    date_default_timezone_set('America/Mexico_City');
    /* $dia = date("d");
    $me = date("m");*/
    $year = date("Y"); 

	class PDF extends JPDF{
		function periodo(){
			$consulta = TablaPeriodoEscolar::select('identificacion_larga')->where('id_periodo_escolar',$_POST['periodo'])->first();
			return $consulta->identificacion_larga;
		}
		function Header(){ 
			$this->Image('../../public/img/educacion.png',10,20,75,15,'png');
            $this->Image('../../public/img/tecnm.png',111,18,48,20,'png');
			$this->Image('../../public/img/itma2.png',185,18,21,20,'png');
			$this->SetFont('Arial','',9);
			//$this->SetTextColor(0,0,0);
            $this->SetY(67);
            $this->SetX(11);
            $this->Cell(0,5,utf8_decode('SUBSECRETARÍA DE EDUCACION SUPERIOR'),0,1,'L');
            $this->SetX(11);
            $this->Cell(0,5,utf8_decode('TECNOLÓGICO NACIONAL DE MÉXICO'),0,1,'L');
            $this->SetX(11);
            $this->Cell(0,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1,'L');

            $this->SetY(70);
            $this->SetX(11);
            $this->SetFont('Arial','B',9);
            $this->Cell(152,5,utf8_decode('SECRETARÍA DE'),0,1,'R');
            $this->SetX(11);
            $this->Cell(152,5,utf8_decode('EDUCIACIÓN PÚBLICA'),0,1,'R');
		}
		function Footer(){
			$this->SetY(-22);
			$this->SetFont('Arial','',9);
			$this->Cell(0,5,utf8_decode('El Ingenio y la Técnica al Servicio de la Humanidad'),0,0,'C');
            $this->SetFont('Arial','',10);
            $this->Cell(0,5,utf8_decode('Hoja ').$this->PageNo().'/{nb}',0,1,'R');
            $this->SetDrawColor(255,201,0);
            $this->Line(40,263, 172,263);
            $this->SetFont('Arial','',8);
            $this->Ln(2);
			$this->Cell(0,4,utf8_decode('Guerrero Sur #171, CP. 12800 San Juan Tepenahuac, Alcaldia Milpa Alta, Cidad de México'),0,1,'C');
			$this->Cell(0,3,utf8_decode('Tel(s). (55) 58446824 Web https://milpaalta2.tecnm.mx'),0,1,'C');
		}
	}

    $pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

    $pdf->SetY(90);
    $pdf->SetX(119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode(''),0,0,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode(''),0,1,'L');
    
    $pdf->SetX(119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode(''),0,0,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode(''),0,1,'L');

    $pdf->SetX(119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode(''),0,0,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(152,5,utf8_decode(''),0,1,'L');

    $pdf->SetX(11);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(50,5,utf8_decode('CONSTANCIA DE NO INCOVENIENCIA PARA EL ACTO DE RECEPCIÓN PROFESIONAL'),0,1,'L');
    $pdf->Ln(3);


    $kard = array();
    $consulta = TablaAlumno::select('nombre_persona','apellido_paterno','apellido_materno','numero_control','semestre','nombre_carrera','t_numero_control.id_numero_control','periodos_revalidados')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->first();

    $pdf->SetX(11);
    $pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $fecha = explode("-",$_POST['fecha']);
    $dia = $fecha[2];
    $me = $fecha[1];
    $year1 = $fecha[0];

    $pdf->MultiCell(192,6,utf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, Ciudad de México a '.$dia.' de '.$mes[$me].' del '.$year1.'.'),0,'',0);
    $pdf->SetFont('Arial','B',9);
    $pdf->Ln(1);
    $pdf->MultiCell(192,6,mb_strtoupper(utf8_decode('C.'.$consulta->nombre_persona.' '.$consulta->apellido_paterno.' '.$consulta->apellido_materno),'UTF-8'),0,'C',0);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(192,5,utf8_decode('Me permito informarle de acuerdo a su solicitud, que no existe incoveninente para que pueda Ud. Presentar su'),0,'FJ',1);
    $pdf->MultiCell(142,5,utf8_decode('Acto de Recepción Profesional, ya que su expediente quedo integrado para tal efecto.'),0,'FJ',1);
    
    $pdf->Ln(14);

    $usuario = TablaUsuario::select('apellido_paterno','apellido_materno','nombre_persona')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('t_usuario.fk_cat_rol','4')->first();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(26,5,'ATENTAMENTE',0,1,'C',true);
    $pdf->Ln(8);
    $pdf->Cell(60,4,mb_strtoupper(utf8_decode($usuario->apellido_paterno.' '.$usuario->apellido_materno.' '.$usuario->nombre_persona),'UTF-8'),0,1,'L',true);
    $pdf->Cell(60,4,'JEFA DE DEPTO. DE SERVICIOS ESCOLARES',0,1,'L',true);

    $pdf->Ln(34);
    $pdf->SetFont('Arial','',5);
    $pdf->Cell(60,4,mb_strtoupper(utf8_decode('c.c.p. División de Estudios Profesionales'),'UTF-8'),0,1,'L',true);
    $pdf->Cell(60,4,mb_strtoupper(utf8_decode('c.c.p. Archivo'),'UTF-8'),0,1,'L',true);

    $pdf->Output('D', 'constancia_no_inconveniencia.pdf');
?>