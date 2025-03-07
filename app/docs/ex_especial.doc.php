<?php
	require_once '../../app/lib/FPDF/fpdf.php';
	use model\TablaAlumno;
	use model\TablaSolExamenEspecial;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');
	
	$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];
	
	class PDF extends FPDF{
		function periodo(){
			$consulta = TablaPeriodoEscolar::select('identificacion_larga')->where('id_periodo_escolar',$_POST['ex_periodo'])->first();
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
			$this->SetFont('Arial','B',10);
			$this->SetY(22);
			$this->SetX(95);
			$this->Cell(30,5,utf8_decode('SOLICITUD DE EXAMEN ESPECIAL'),0,1,'C');
			$this->SetX(95);
			$this->Cell(30,5,utf8_decode(''.$this->periodo()),0,1,'C');
			$this->Ln(5);
		}
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,utf8_decode('*** NO SE ACEPTAN CANCELACIONES ***'),0,0,'C');
		}
	}

	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$me = date("m");
	$year = date("Y");

	$pdf = new PDF('P','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',10);
	$pdf->SetY(55); 
	$pdf->SetX(72);
	$pdf->Cell(30,5,utf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, CDMX a '.$dia.' de '.$mes[$me].' del '.$year),0,1,'L');
	$pdf->SetY(80); 
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('TONANTZIN PONCE MARTÍNEZ'),0,1,'L');
	$pdf->SetX(11);
	$pdf->Cell(30,5,utf8_decode('DIRECTORA DEL INSTITUTO TECNOLOGÍCO DE MILPA ALTA II'),0,1,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->SetY(100);
	$pdf->Cell(30,5,utf8_decode('Solicito a usted, sé me conceda la autorización de presentar en EXAMEN ESPECIAL la(s) siguiente(s) materia(s):'),0,1,'L');
	$pdf->Ln(3);
	$pdf->SetFillColor(50, 49, 49); //establece el color de la celda RGB
	$pdf->SetTextColor(255,255,255); //establece un color para el texto del documento RGB
	$pdf->SetDrawColor(0,0,0); //establece el color de las lineas
	$pdf->Cell(82,5,'MATERIA',1,0,'C',true); //Cell(tamaños_horizontal,tamaño_vertical,'contenido',margen 1=true 
	$pdf->Cell(29,5,'CLAVE',1,0,'C',true);
	$pdf->Cell(29,5,'CREDITOS',1,0,'C',true);
	$pdf->Cell(52,5,'AUTORIZACION',1,1,'C',true);

	$consulta = TablaSolExamenEspecial::select('tipo_evaluacion','autorizacion','nombre_completo_materia','clave_oficial','creditos_totales')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('t_numero_control.numero_control',$_POST['ex_numero_de_control'])->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['ex_periodo'])->get();
	$cont = 1;
	$pdf->SetTextColor(0,0,0);
	foreach($consulta as $materias){
		if($cont %= 2){
			$pdf->SetFillColor(218, 216, 216);
		}else{
			$pdf->SetFillColor(175, 175, 175);
		}
		$pdf->Cell(82,5,utf8_decode(''.$materias['nombre_completo_materia']),1,0,'L',true); 
		$pdf->Cell(29,5,utf8_decode(''.$materias['clave_oficial']),1,0,'C',true);
		$pdf->Cell(29,5,utf8_decode(''.$materias['creditos_totales']),1,0,'C',true);
		$pdf->Cell(52,5,utf8_decode(''.$materias['tipo_evaluacion'] == 'SI' ? '***AUTODIDACTA***' : ''),1,1,'C',true);
		$cont++;
	}
	$alumno = TablaAlumno::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','nombre_carrera','semestre','fk_persona','periodos_revalidados')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->where('t_numero_control.numero_control',$_POST['ex_numero_de_control'])->first();

	
	$pdf->Ln(8);
	$pdf->SetTextColor(0,0,0); 
	$pdf->Cell(30,5,utf8_decode('En el peridodo de exámenes especiales comprendidos del '.$dia.' de '.$mes[$me].' del '.$year.' al '.$dia.' de '.$mes[$me].' del '.$year),0,1,'L');

	$pdf->Image('../../public/img/foto.png',20,163,28,34,'png');
	$pdf->SetY(160);
	$pdf->SetFillColor(50, 49, 49);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(0,0,0);
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(84,5,utf8_decode('ALUMNO(A)'),1,0,'C',true); 
	$pdf->Cell(62,5,utf8_decode('NO. DE CONTROL'),1,1,'C',true); 
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0); 
	$pdf->SetDrawColor(0,0,0);
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(84,5,utf8_decode(''.$alumno->nombre_persona.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno),1,0,'C',true); 
	$pdf->Cell(62,5,utf8_decode(''.$alumno->numero_control),1,1,'C',true);
	
	$pdf->Ln(5);
	$pdf->SetFillColor(50, 49, 49);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(0,0,0);
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(84,5,utf8_decode('CARRERA'),1,0,'C',true); 
	$pdf->Cell(62,5,utf8_decode('SEMESTRE'),1,1,'C',true); 
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0); 
	$pdf->SetDrawColor(0,0,0);
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(84,5,utf8_decode(''.$alumno->nombre_carrera),1,0,'C',true); 
	$pdf->Cell(62,5,utf8_decode(''.($alumno->semestre + $alumno->periodos_revalidados)),1,1,'C',true);

	$pdf->Ln(5);
	$pdf->SetFillColor(50, 49, 49);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(0,0,0);
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(146,5,utf8_decode('ESCUELA DE PROCEDENCIA:'),1,1,'C',true);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0,0,0); 
	$pdf->SetDrawColor(0,0,0);	
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(146,5,utf8_decode(''),1,1,'C',true);
	
	$pdf->SetY(230);
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(146,5,utf8_decode('___________________________________'),0,1,'C');
	$pdf->Cell(46,5,utf8_decode(''),0,0,'L'); 	
	$pdf->Cell(146,5,utf8_decode('Firma del Alumno'),0,1,'C');

	
	$pdf->Output('D', 'solicitud examen especial.pdf');
?>
