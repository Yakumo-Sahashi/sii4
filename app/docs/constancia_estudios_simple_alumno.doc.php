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
    $pdf->Cell(25,5,utf8_decode('DEPENDENCIA:'),0,0,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode('SERVICIOS ESCOLARES'),0,1,'L');
    
    $pdf->SetX(119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode('OFICIO:'),0,0,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode('SE-00'.$_POST['no_oficio'].'/'.$year),0,1,'L');

    $pdf->SetX(119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode('EXPEDIENTE:'),0,0,'L');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(152,5,utf8_decode($_POST['num_ctrl']),0,1,'L');

    $pdf->Ln(3);
    $pdf->SetX(119);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(25,5,utf8_decode('ASUNTO:'),0,0,'');
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(40,5,utf8_decode('CONSTANCIA'),0,1,'L');
    $pdf->Ln(5);

    $pdf->SetX(11);
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(50,5,utf8_decode('A QUIEN CORRESPONDA:'),0,1,'L');
    $pdf->Ln(5);


    $kard = array();
    $consulta = TablaAlumno::select('nombre_persona','apellido_paterno','apellido_materno','numero_control','semestre','nombre_carrera','t_numero_control.id_numero_control','periodos_revalidados')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->where('t_numero_control.numero_control',$_POST['num_ctrl'])->first();

    $periodo = TablaPeriodoEscolar::select('identificacion_larga','fecha_inicio','fecha_termino','inicio_vacacional','termino_vacacional')->where('id_periodo_escolar',$_POST['periodo'])->first();

    function determinar_fecha($fecha) {
        $mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
        $fecha = explode("-",$fecha);
        $dia = $fecha[2];
        $me = $fecha[1];
        $year1 = $fecha[0];
        return $dia.' de '.$mes[$me].' de '.$year1;
    }

    $pdf->SetX(11);
    $pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(192,5,utf8_decode('La que suscribe, Jefa del Departamento de Servicios Escolares de este Instituto Teclógico, hace constar que el'),0,'FJ',1);
    $pdf->SetFont('Arial','B',9);
    $pdf->MultiCell(192,6,mb_strtoupper(utf8_decode('C.'.$consulta->nombre_persona.' '.$consulta->apellido_paterno.' '.$consulta->apellido_materno),'UTF-8'),0,'C',0);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(192,5,utf8_decode('con número de control '.$consulta->numero_control.' es alumno del periodo '.$periodo->identificacion_larga.', cursando el semestre '.($consulta->semestre + $consulta->periodos_revalidados).' de la carrera de '.$consulta->nombre_carrera.' durante el ciclo escolar comprendido del '.determinar_fecha($periodo->fecha_inicio).' al '.determinar_fecha($periodo->fecha_termino).'.'),0,'FJ',1);
    
    $pdf->Ln(5);
    
    $pdf->MultiCell(192,5,utf8_decode('El periodo de vacaciones comprendido del '.determinar_fecha($periodo->inicio_vacacional).' al '.determinar_fecha($periodo->termino_vacacional).'.'),0,'FJ',1);
    
    $pdf->Ln(6);    
    $fecha = explode("-",$_POST['fecha']);
    $dia = $fecha[2];
    $me = $fecha[1];
    $year1 = $fecha[0];
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(192,6,utf8_decode('A petición del interesado y para los fines legales a que haya lugar, se extiende la presente en la ciudad de '),0,'FJ',0);
    $pdf->MultiCell(192,6,utf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, Ciudad de México a '.$dia.' de '.$mes[$me].' del '.$year1.'.'),0,'',0);
    $pdf->Ln(14);

    $usuario = TablaUsuario::select('apellido_paterno','apellido_materno','nombre_persona')->join('t_persona','t_usuario.fk_persona','t_persona.id_persona')->where('t_usuario.fk_cat_rol','4')->first();

    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(26,5,'ATENTAMENTE',0,1,'C',true);
    $pdf->Ln(8);
    $pdf->Cell(60,4,mb_strtoupper(utf8_encode($usuario->apellido_paterno.' '.$usuario->apellido_materno.' '.$usuario->nombre_persona),'UTF-8'),0,1,'L',true);
    $pdf->Cell(60,4,'JEFA DE DEPTO. DE SERVICIOS ESCOLARES',0,1,'L',true);

    $pdf->Output('D', 'constancia_estudios_simple.pdf');
?>