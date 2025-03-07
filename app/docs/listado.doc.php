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
			$this->SetX(100);
			$this->SetFont('Arial','B',10);
			$this->Cell(30,5,utf8_decode('LISTA DE ASISTENCIA'),0,1,'C');
		}
		function Footer(){
			$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
			date_default_timezone_set('America/Mexico_City');
			$dia = date("d");
			$me = date("m");
			$year = date("Y");
			$this->SetY(-15);
			$this->SetFont('Arial','',9);
			$this->Cell(80,5,utf8_decode('FECHA: '.$dia.' de '.$mes[$me].' del '.$year.'.'),1,1,'L');
		}
	}
	
	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$me = date("m");
	$year = date("Y");

	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$docente = TablaGrupo::select('fk_periodo','t_persona.rfc')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('id_grupo',$_POST['id'])->first();
	$periodo = TablaPeriodoEscolar::select('identificacion_corta')->where('id_periodo_escolar',$docente->fk_periodo)->first();

	$pdf->SetFont('Arial','B',10);
	$pdf->SetY(30); 
	$pdf->SetFillColor(255, 255, 255); //establece el color de la celda RGB
	$pdf->SetDrawColor(0,0,0); //establece el color de las lineas
	$pdf->SetX(11);
	$pdf->Cell(44,6,utf8_decode('PERIODO ESCOLAR'),0,0,'C');
	$pdf->Cell(3,6,'',0,0,'C');
    $pdf->Cell(44,6,utf8_decode('CICLO DE ESTUDIOS'),0,0,'C');
	$pdf->Cell(3,6,'',0,0,'C');
	$pdf->Cell(98,6,utf8_decode('DEPARTAMENTO ACADEMICO'),0,1,'C');
    $pdf->SetFont('Arial','',9);
	$pdf->Cell(44,6,utf8_decode($periodo->identificacion_corta),1,0,'C');
	$pdf->Cell(3,6,'',0,0,'C');
    $pdf->Cell(44,6,utf8_decode('LICENCIATURA'),1,0,'C');
	$pdf->Cell(3,6,'',0,0,'C');
	$pdf->Cell(98,6,utf8_decode($_POST['descripcion']),1,1,'C');
	$pdf->Ln(2);
	$pdf->SetX(11);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(130,6,utf8_decode('MATERIA'),0,0,'C');
	$pdf->Cell(31,6,utf8_decode('CLAVE'),0,0,'C');
	$pdf->Cell(30,6,utf8_decode('GRUPO'),0,1,'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(130,6,utf8_decode($_POST['nombre_completo_m']),1,0,'C');
	$pdf->Cell(31,6,utf8_decode($_POST['clave']),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($_POST['grupo']),1,1,'C');

	$pdf->Ln(2);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(55,6,utf8_decode('RFC'),0,0,'C');
	$pdf->Cell(137,6,utf8_decode('CATEDRATICO'),0,1,'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(55,6,utf8_decode($docente->rfc),1,0,'C');
	$pdf->Cell(137,6,utf8_decode($_POST['docente']),1,1,'C');

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

	$consulta_horario = TablaHorario::select('dia','hora_inicio','hora_fin','aula')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->where('t_horario.fk_grupo',$_POST['id'])->get();
	$horarios['lunes'] = [0=>'',1=>''];
	$horarios['martes'] = [0=>'',1=>''];
	$horarios['miercoles'] = [0=>'',1=>''];
	$horarios['jueves'] = [0=>'',1=>''];
	$horarios['viernes'] = [0=>'',1=>''];
	$horarios['sabado'] = [0=>'',1=>''];

	foreach($consulta_horario as $datos){
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
	$pdf->Cell(87,5,'NOMBRE DEL ALUMNO',1,0,'C',true);
	$pdf->Cell(32,5,'No. CONTROL',1,0,'C',true);
	$pdf->Cell(64,5,'',1,1,'C',true);

	$alumno = TablaSeleccionMaterias::select('numero_control','nombre_persona','apellido_paterno','apellido_materno')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_seleccion_materias.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_grupo',$_POST['id'])->get();
	$con = 104;
	$i = 1;

	/* for($j = 0; $j < 5; $j++){
		$pdf->Ln(1);
		$pdf->Cell(9,5,'No.',0,0,'C',true);
		$pdf->Cell(87,5,'NOMBRE DEL ALUMNO',0,0,'C',true);
		$pdf->Cell(32,5,'No. CONTROL',0,0,'C',true);
		$pdf->Cell(64,5,'',0,1,'C',true);
		$pdf->Line(10, $con , 202, $con);
		$con += 6;
		$i++;
	}
 */
	foreach($alumno as $datos){
		$pdf->Ln(1);
		$pdf->Cell(9,5,$i,0,0,'C',true);
		$pdf->Cell(87,5,utf8_decode(''.$datos->apellido_paterno.' '.$datos->apellido_materno.' '.$datos->nombre_persona),0,0,'L',true);
		$pdf->Cell(32,5,$datos->numero_control,0,0,'C',true);
		$pdf->Cell(64,5,'',0,1,'C',true);
		$pdf->Line(10, $con , 202, $con);
		$con += 6;
		$i++;
	}
	$pdf->Output('D', 'LISTA_DE_ASISTENCIA.pdf');
?>
