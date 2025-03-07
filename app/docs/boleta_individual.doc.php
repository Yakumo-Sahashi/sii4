<?php
    require_once '../../app/lib/FPDF/fpdf.php';

	use model\TablaAcumuladoHistorico;
	use model\TablaAlumno;
	use model\TablaHistoriaAlumno;
	use model\TablaPeriodoEscolar;

    require_once realpath('../../vendor/autoload.php');

	class PDF extends FPDF{
	// Cabecera de página

		function Header(){	
			$this->Image('../../public/img/SEP.png',10,6,40,25,'png');
			$this->Image('../../public/img/itma2.png',185,10,18,17,'png');
			$this->SetFont('Arial','B',12);
			$this->SetTextColor(37,73,144);
			$this->SetY(15); //posicion en Y 
			$this->SetX(95); //pisicon en X
			$this->Cell(30,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1,'C'); //celda titulo
			$this->SetFont('Arial','B',11);
			$this->SetX(95);
			$this->Cell(30,5,utf8_decode('BOLETA DE CALIFICACIONES'),0,1,'C');
			// Salto de línea
			$this->Ln(5);
		}

		function Footer(){
			$this->SetTextColor(0,0,0); 
			$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
			date_default_timezone_set('America/Mexico_City');
			$dia = date("d");
			$me = date("m");
			$year = date("Y");
			$this->SetY(-100);
			$this->SetFont('Arial','B',9);
			$this->Cell(0,60,utf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, CDMX a '.$dia.' de '.$mes[$me].' del '.$year.'.'),0,1,'R');
			$this->Cell(96,5,utf8_decode('__________________________________________'),0,0,'C');
			$this->Cell(96,5,utf8_decode('__________________________________________'),0,1,'C');
			$this->Cell(96,5,utf8_decode('PONCE MARTINEZ TONANZIN'),0,0,'C');
			$this->Cell(96,5,utf8_decode('GARCIA ROMERO ELVIA'),0,1,'C');
			$this->Cell(96,5,utf8_decode('Directora'),0,0,'C');
			$this->Cell(96,5,utf8_decode('Depto. Servicios Escolares'),0,1,'C');
			$this->Ln(10);
			$this->SetFont('Arial','',7);
			$this->Cell(0,5,utf8_decode('ESTE DOCUMENTO NO PODRA SER UTILIZADO COMO BOLETA OFICIAL DE CALIFICACIONES SI NO CUENTA CON LAS FIRMAS Y SELLO CORRESPONDIENTE.'),0,1,'C');
		}
	}
	date_default_timezone_set('America/Mexico_City');
	$fecha = date("d-m-Y");
	$pe = date("Y");

	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$alumno = TablaAlumno::select('apellido_paterno','apellido_materno','nombre_persona','numero_control','t_cat_carrera.nombre_carrera','t_cat_especialidad.especialidad','t_alumno.semestre','creditos_aprobados','t_alumno.periodos_revalidados')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->where('t_alumno.fk_numero_control',$_POST['id_alumno_boleta'])->first();
	$periodo = TablaPeriodoEscolar::select('identificacion_corta')->where('id_periodo_escolar',$_POST['id_periodo_boleta'])->first();

	$pdf->SetFont('Arial','B',9);	
	$pdf->SetFillColor(1,93,153); //establece el color de la celda RGB
	$pdf->SetTextColor(255,255,255); //establece un color para el texto del documento RGB
	$pdf->SetDrawColor(255,255,255); //establece el color de las lineas
	$pdf->Cell(40,7,'No. Control',1,0,'C',true); //Cell(tamaños_horizontal,tamaño_vertical,'contenido',margen 1=true 0=false,salto de linea 1=true 0=false, color de celda true ó false);
	$pdf->Cell(82,7,'Nombre del Alumno ',1,0,'C',true);
	$pdf->Cell(30,7,'Semeste',1,0,'C',true);
	$pdf->Cell(40,7,'Periodo Escolar',1,1,'C',true);

	$pdf->SetFillColor(221,221,221);
	$pdf->SetTextColor(37,73,144);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(40,6,$alumno->numero_control,1,0,'C',true);
	$pdf->Cell(82,6,utf8_decode($alumno->apellido_paterno.' '.$alumno->apellido_materno.' '.$alumno->nombre_persona),1,0,'C',true);
	$pdf->Cell(30,6,($alumno->semestre + $alumno->periodos_revalidados),1,0,'C',true);
	$pdf->Cell(40,6,$periodo->identificacion_corta,1,1,'C',true);

	$pdf->SetFillColor(1,93,153);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',9);	
	$pdf->Cell(40,7,'Ciclo de Estudios',1,0,'C',true);
	$pdf->Cell(82,7,'Carrera',1,0,'C',true);
	$pdf->Cell(70,7,'Especialidad',1,1,'C',true);

	$pdf->SetFillColor(221,221,221);
	$pdf->SetTextColor(37,73,144);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(40,6,'Licenciatura',1,0,'C',true);
	$pdf->Cell(82,6,utf8_decode($alumno->nombre_carrera),1,0,'C',true);
	$pdf->Cell(70,6,utf8_decode($alumno->especialidad),1,1,'C',true);

	$pdf->SetFillColor(1,93,153);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',9);	
	$pdf->Cell(70,7,'Materia',1,0,'C',true);
	$pdf->Cell(26,7,'Cr',1,0,'C',true);
	$pdf->Cell(26,7,'Calificacion',1,0,'C',true);
	$pdf->Cell(30,7,'Tipo Evaluacion',1,0,'C',true);
	$pdf->Cell(40,7,'Observaciones',1,1,'C',true);

	$cal_semestre = TablaHistoriaAlumno::select('t_historia_alumno.calificacion','t_cat_materias.nombre_completo_materia','clave_oficial','creditos_totales','t_cat_tipo_evaluacion.descripcion_corto')->join('t_cat_materias','t_historia_alumno.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_tipo_evaluacion','t_historia_alumno.fk_cat_tipo_evaluacion','t_cat_tipo_evaluacion.id_cat_tipo_evaluacion')->where('t_historia_alumno.fk_numero_control',$_POST['id_alumno_boleta'])->where('t_historia_alumno.fk_periodo_escolar',$_POST['id_periodo_boleta'])->get();

	$pdf->SetFillColor(221,221,221);
	$pdf->SetTextColor(37,73,144);
	$pdf->SetFont('Arial','',8);
	if(count($cal_semestre) > 0){
		foreach($cal_semestre as $materia) { 
			$pdf->Cell(70,7,utf8_decode($materia->nombre_completo_materia),1,0,'L',true);
			$pdf->Cell(26,7,$materia->creditos_totales,1,0,'C',true);
			$pdf->Cell(26,7,$materia->calificacion,1,0,'C',true);
			$pdf->Cell(30,7,utf8_encode($materia->descripcion_corto),1,0,'C',true);
			$pdf->Cell(40,7,'',1,1,'C',true);
		}
	}else{
		$pdf->Cell(192,50,utf8_decode('SIN CALIFICACIONES EN SEMESTRE'),1,1,'C',true);
	}
	$pdf->Ln(5);
	$pdf->SetFillColor(1,93,153);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','B',8);	
	$pdf->Cell(32,5,"Periodo Escolar",1,0,'C',true);
	$pdf->Cell(32,5,'Creditos Cursados',1,0,'C',true);
	$pdf->Cell(32,5,'Creditos Aprobados',1,0,'C',true);
	$pdf->Cell(32,5,'Creditos Acumulados',1,0,'C',true);
	$pdf->Cell(32,5,'Prom. Arit. Periodo',1,0,'C',true);
	$pdf->Cell(32,5,'Prom. Arit. Acum.',1,1,'C',true);
	$pdf->SetFillColor(221,221,221);
	$pdf->SetTextColor(37,73,144);

	$historial = TablaAcumuladoHistorico::select('t_acumulado_historico.creditos_cursados','t_acumulado_historico.creditos_aprobados','t_acumulado_historico.promedio_aritmetico','t_acumulado_historico.promedio_aritmetico_acumulado','t_periodo_escolar.identificacion_corta')->join('t_periodo_escolar','t_acumulado_historico.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('t_acumulado_historico.fk_numero_control',$_POST['id_alumno_boleta'])->get();
	if(count($historial) > 0){
		foreach($historial as $cursado) { 
			$pdf->Cell(32,5,$cursado->identificacion_corta,1,0,'C',true);
			$pdf->Cell(32,5,$cursado->creditos_cursados,1,0,'C',true);
			$pdf->Cell(32,5,$cursado->creditos_aprobados,1,0,'C',true);
			$pdf->Cell(32,5,$alumno->creditos_aprobados,1,0,'C',true);
			$pdf->Cell(32,5,$cursado->promedio_aritmetico,1,0,'C',true);
			$pdf->Cell(32,5,$cursado->promedio_aritmetico_acumulado,1,1,'C',true);
		}
	}

	$pdf->Output('D', 'boleta.pdf');
?>