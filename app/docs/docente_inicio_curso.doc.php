<?php
	require_once '../../app/lib/FPDF/fpdf.php';

	use model\CatalogoCarrera;
	use model\CatalogoMaterias;
	use model\TablaGrupo;
	use model\TablaSeleccionMaterias;
	use model\TablaPeriodoEscolar;
	use model\TablaHorario;
	require_once realpath('../../vendor/autoload.php');
	
	$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$me = date("m");
	$year = date("Y");

	class PDF extends FPDF{
		function periodo(){
			$consulta = TablaPeriodoEscolar::select('identificacion_larga')->where('estado','1')->first();
			return $consulta->identificacion_larga;
		}
		function Header(){ 
			$this->Cell(42,26,'',1,0,'C');
			$this->Cell(108,26,'',1,0,'C');
			$this->Cell(42,26,'',1,1,'C');
			$this->Image('../../public/img/SEP.png',10,9,40,25,'png');
			$this->Image('../../public/img/itma2.png',172,13,20,19,'png');
			$this->SetFont('Arial','B',12);
			$this->SetTextColor(0,0,0);
			$this->SetY(14); 
			$this->SetX(52);
			$this->Cell(108,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1,'C'); 
			$this->Line(52,22,160,22);
			$this->Ln(4); 
			$this->SetX(52);
			$this->SetFont('Arial','B',10);
			$this->Cell(108,5,utf8_decode('SUBDIRECCIÓN ACADÉMICA'),0,1,'C');
			$this->Line(52,29,160,29);
			$this->Ln(2);
			$this->SetX(52);
			$this->Cell(108,5,utf8_decode($_POST['descripcion']),0,1,'C');
		}
		function Footer(){
			$this->SetY(-22);
			$this->SetFont('Arial','',5);
			$this->Cell(60,4,utf8_decode('c.c.p. Depto. Académico.'),0,1,'L',true);
			$this->Cell(60,4,utf8_decode('c.c.p. Archivo.'),0,1,'L',true);
		}
	}
	
	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$me = date("m");
	$year = date("Y");
	$carrera = CatalogoCarrera::select('nombre_carrera')->where('id_cat_carrera',$_POST['carrera'])->first();
	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',10);
	$pdf->SetY(50); 
	$pdf->SetFillColor(255, 255, 255); //establece el color de la celda RGB
	$pdf->SetDrawColor(0,0,0); //establece el color de las lineas
	$pdf->SetX(11);
	$pdf->Cell(22,6,utf8_decode('FECHA:'),0,0,'L');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(108,6,utf8_decode($dia.' de '.$mes[$me].' del '.$year),0,1,'C');
	$pdf->Line(30,55,140,55);
	$pdf->SetX(11);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(22,6,utf8_decode('MATERIA:'),0,0,'L');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(108,6,utf8_decode($_POST['nombre_completo_m']),0,0,'C');
	$pdf->Line(33,61,140,61);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(20,6,utf8_decode('GRUPO:'),0,0,'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(42,6,utf8_decode($_POST['grupo']),0,1,'C');
	$pdf->Line(163,61,200,61);
	$pdf->SetX(11);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(22,6,utf8_decode('CARRERA:'),0,0,'L');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(108,6,utf8_decode($carrera->nombre_carrera),0,1,'C');
	$pdf->Line(36,67,200,67);

	$pdf->SetX(11);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(22,6,utf8_decode('PROFESOR:'),0,0,'L');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(108,6,utf8_decode($_POST['docente']),0,1,'C');
	$pdf->Line(39,73,200,73);

    
	$pdf->Ln(15);
    $pdf->SetFont('Arial','',10);
	$pdf->SetFillColor(255, 255, 255); //establece el color de la celda RGB
	$pdf->SetDrawColor(0,0,0); //establece el color de las lineas

	$pdf->Cell(192,6,utf8_decode('Marca con una X la información que el profesor ha proporcionado al inicio del curso:'),0,1,'L');
	$pdf->Ln(10);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('a) Objetivo del curso.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('b) Aportación del curso al perfil profesional.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('c) Relación con materias y temas anteriores del curso.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('d) Relación con materias y temas posteriores del curso.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('e) Temario del curso.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('f) Unidades de aprendizaje del curso y su respectiva bibliografia.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('g) Estrategias didácticas a seguir.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('h) Los criterios de evaluación y acreditación respectiva.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->SetX(27);
	$pdf->Cell(140,5,utf8_decode('i) Calendarización del trabajo semestral.'),1,0,'L',true);
	$pdf->Cell(15,5,'',1,1,'C',true);
	$pdf->Ln(10);
	
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(9,5,'No.',1,0,'C',true);
	$pdf->Cell(32,5,'No. CONTROL',1,0,'C',true);
	$pdf->Cell(87,5,'NOMBRE DEL ALUMNO',1,0,'C',true);
	$pdf->Cell(64,5,'FIRMA',1,1,'C',true);

	$alumno = TablaSeleccionMaterias::select('numero_control','nombre_persona','apellido_paterno','apellido_materno')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_seleccion_materias.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_grupo',$_POST['id'])->get();
	$con = 165;
	$i = 1;

	/* for($j = 0; $j < 25; $j++){
		$pdf->Ln(1);
		$pdf->Cell(9,5,'No.',0,0,'C',true);
		$pdf->Cell(32,5,'No. CONTROL',0,0,'C',true);
		$pdf->Cell(87,5,'NOMBRE DEL ALUMNO',0,0,'C',true);
		$pdf->Cell(64,5,'',0,1,'C',true);
		$pdf->Line(10, $con , 202, $con);
		$con += 6;
		$i++;
	}
 */
	foreach($alumno as $datos){
		$pdf->Ln(1);
		$pdf->Cell(9,5,$i,0,0,'C',true);
		$pdf->Cell(32,5,$datos->numero_control,0,0,'C',true);
		$pdf->Cell(87,5,utf8_decode(''.$datos->apellido_paterno.' '.$datos->apellido_materno.' '.$datos->nombre_persona),0,0,'L',true);
		$pdf->Cell(64,5,'',0,1,'C',true);
		$pdf->Line(10, $con , 202, $con);
		$con += 6;
		$i++;
		if($i == 13){
			$pdf->AliasNbPages();
	        $pdf->AddPage();
			$pdf->SetY(45); 
			$con = 50;
			$pdf->Cell(9,5,'No.',1,0,'C',true);
			$pdf->Cell(32,5,'No. CONTROL',1,0,'C',true);
			$pdf->Cell(87,5,'NOMBRE DEL ALUMNO',1,0,'C',true);
			$pdf->Cell(64,5,'FIRMA',1,1,'C',true);
		}
	}

	$pdf->Output('D', 'REPORTE_INICIO_CURSO.pdf');
?>
