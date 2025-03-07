<?php
	require_once '../../app/lib/FPDF/fpdf.php';

	use model\CatalogoMaterias;
	use model\TablaGrupo;
	use model\TablaSeleccionMaterias;
	use model\TablaPeriodoEscolar;
	use model\TablaHorario;
	require_once realpath('../../vendor/autoload.php');
	
	$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];

	class PDF extends FPDF{
		function periodo(){
			$consulta = TablaPeriodoEscolar::select('identificacion_larga')->where('id_periodo_escolar',$_POST['periodo'])->first();
			return $consulta->identificacion_larga;
		}
		function Header(){ 
			$this->Image('../../public/img/SEP.png',10,6,40,25,'png');
			$this->Image('../../public/img/itma2.png',185,10,18,17,'png');
			$this->SetFont('Arial','B',12);
			$this->SetTextColor(0,0,0);
			$this->SetY(15); 
			$this->SetX(100);
			$this->Cell(30,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1,'C');
		}
		function Footer(){
			$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
			date_default_timezone_set('America/Mexico_City');
			$dia = date("d");
			$me = date("m");
			$year = date("Y");
			$this->SetY(-30);
			$this->SetFont('Arial','',9);
			$this->Cell(0,5,utf8_decode('Este documento no es valido si tiene tachaduras o enmendaduras.'),0,1,'L');
			$this->Cell(0,5,utf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, CDMX a '.$dia.' de '.$mes[$me].' del '.$year.'.'),0,1,'L');
			$this->Cell(0,5,utf8_decode('Firma del Profesor:______________________________________'),0,1,'R');
		}
	}
	
	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$me = date("m");
	$year = date("Y");

	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
    $consulta = TablaPeriodoEscolar::select('identificacion_corta')->where('id_periodo_escolar',$_POST['periodo'])->first();
	$materia = TablaGrupo::select('id_grupo','nombre_grupo','nombre_persona','apellido_paterno','apellido_materno','nombre_completo_materia','alumnos_inscritos','clave_oficial','t_cat_organigrama.descripcion')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_grupo.fk_periodo',$_POST['periodo'])->first();

	$pdf->SetFont('Arial','B',12);
	$pdf->SetY(40); 
	/* $pdf->Cell(30,5,u tf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, CDMX a '.$dia.' de '.$mes[$me].' del '.$year),0,1,'L'); */
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('ACTA DE CALIFICACIONES'),0,1,'L');

    $pdf->SetFont('Arial','',10);
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('DEPARTAMENTO:'),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(90,5,utf8_decode('  '.$materia->descripcion),0,0,'L');
    $pdf->SetFont('Arial','',10);
	$pdf->Cell(30,5,utf8_decode('FOLIO:'),0,0,'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,5,utf8_decode(''),0,1,'L');

	$pdf->SetFont('Arial','',10);
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('MATERIA:'),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(90,5,utf8_decode('  '.$materia->nombre_completo_materia),0,0,'L');
    $pdf->SetFont('Arial','',10);
	$pdf->Cell(30,5,utf8_decode('CLAVE:'),0,0,'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,5,utf8_decode(''.$materia->clave_oficial),0,1,'L');
    
	$pdf->SetFont('Arial','',10);
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('PROFESOR:'),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(90,5,utf8_decode('  '.$materia->apellido_paterno.' '.$materia->apellido_materno.' '.$materia->nombre_persona),0,0,'L');
    $pdf->SetFont('Arial','',10);
	$pdf->Cell(30,5,utf8_decode('GRUPO:'),0,0,'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,5,''.$materia->nombre_grupo,0,1,'L');

    $pdf->SetFont('Arial','',10);
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('PERIODO:'),0,0,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(90,5,utf8_decode('  '.$consulta->identificacion_corta),0,0,'L');
    $pdf->SetFont('Arial','',10);
	$pdf->Cell(30,5,utf8_decode('ALUMNOS:'),0,0,'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(42,5,''.$materia->alumnos_inscritos,0,1,'L');

	$pdf->Ln(5);
    $pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(255, 255, 255); //establece el color de la celda RGB
	$pdf->SetDrawColor(0,0,0); //establece el color de las lineas

	$pdf->Cell(32,5,'LUNES',1,0,'C',true);
	$pdf->Cell(32,5,'MARTES',1,0,'C',true);
	$pdf->Cell(32,5,'MIERCOLES',1,0,'C',true);
	$pdf->Cell(32,5,'JUEVES',1,0,'C',true);
    $pdf->Cell(32,5,'VIERNES',1,0,'C',true);
    $pdf->Cell(32,5,'SABADO',1,1,'C',true);

	$pdf->Cell(16,5,'HORA',1,0,'C',true);
	$pdf->Cell(16,5,'AULA',1,0,'C',true);
	$pdf->Cell(16,5,'HORA',1,0,'C',true);
	$pdf->Cell(16,5,'AULA',1,0,'C',true);
	$pdf->Cell(16,5,'HORA',1,0,'C',true);
	$pdf->Cell(16,5,'AULA',1,0,'C',true);
	$pdf->Cell(16,5,'HORA',1,0,'C',true);
	$pdf->Cell(16,5,'AULA',1,0,'C',true);
	$pdf->Cell(16,5,'HORA',1,0,'C',true);
	$pdf->Cell(16,5,'AULA',1,0,'C',true);
	$pdf->Cell(16,5,'HORA',1,0,'C',true);
	$pdf->Cell(16,5,'AULA',1,1,'C',true);

	$horario = TablaHorario::select('t_horario.dia','hora_inicio','hora_fin','aula')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->where('fk_grupo',$materia->id_grupo)->get();

	$horarios['lunes'] = [0=>'',1=>''];
	$horarios['martes'] = [0=>'',1=>''];
	$horarios['miercoles'] = [0=>'',1=>''];
	$horarios['jueves'] = [0=>'',1=>''];
	$horarios['viernes'] = [0=>'',1=>''];
	$horarios['sabado'] = [0=>'',1=>''];

	foreach($horario as $datos){
		$horarios[''.$datos->dia][0] = $datos->hora_inicio.'-'.$datos->hora_fin;
		$horarios[''.$datos->dia][1] = $datos->aula;
	}

	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(16,8,''.$horarios['lunes'][0],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['lunes'][1],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['martes'][0],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['martes'][1],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['miercoles'][0],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['miercoles'][1],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['jueves'][0],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['jueves'][1],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['viernes'][0],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['viernes'][1],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['sabado'][0],1,0,'C',true);
	$pdf->Cell(16,8,''.$horarios['sabado'][1],1,1,'C',true);

	$pdf->SetFont('Arial','',8);
	$pdf->Cell(9,5,'No.',1,0,'C',true);
	$pdf->Cell(23,5,'No. CONTROL',1,0,'C',true);
	$pdf->Cell(82,5,'NOMBRE DEL ALUMNO',1,0,'C',true);
	$pdf->Cell(21,5,'CARRERA',1,0,'C',true);
    $pdf->Cell(15,5,'REP',1,0,'C',true);
    $pdf->Cell(14,5,'ORD.',1,0,'C',true);
	$pdf->Cell(14,5,'REG.',1,0,'C',true);
    $pdf->Cell(14,5,'EXT.',1,1,'C',true);

	$alumno = TablaSeleccionMaterias::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','calificacion','fk_tipo_evaluacion','presento','repeticion','carrera')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_numero_control.id_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo')->join('t_cat_carrera','t_grupo.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_seleccion_materias.fk_cat_periodo',$_POST['periodo'])->get();

	$con = 99;
	$i = 1;

	foreach($alumno as $datos){
		$pdf->Ln(1);
		$pdf->Cell(9,5,''.$i,0,0,'C',true);
		$pdf->Cell(23,5,''.$datos->numero_control,0,0,'C',true);
		$pdf->Cell(82,5,utf8_decode(''.$datos->apellido_paterno.' '.$datos->apellido_materno.' '.$datos->nombre_persona),0,0,'L',true);
		$pdf->Cell(21,5,''.$datos->carrera,0,0,'C',true);
		$pdf->Cell(14,5,''.$datos->repeticion == 'N' ? '' : 'SI',0,0,'C',true);
		$pdf->Cell(14,5,''.$datos->fk_tipo_evaluacion == '4' || $datos->fk_tipo_evaluacion == '10' ? $datos->calificacion : 'NA',0,0,'C',true);
		$pdf->Cell(14,5,''.($datos->fk_tipo_evaluacion == '12' ? $datos->calificacion : ($datos->fk_tipo_evaluacion == '4' || $datos->fk_tipo_evaluacion == '10' ? '':'NA')),0,0,'C',true);
		$pdf->Cell(14,5,''.($datos->fk_tipo_evaluacion == '7' ? $datos->calificacion : ''),0,1,'C',true);
		$pdf->Line(10, $con , 202, $con);
		$con += 6;
		$i++;
	}
	$pdf->Output('D', 'acta_calif_individual.pdf');
?>
