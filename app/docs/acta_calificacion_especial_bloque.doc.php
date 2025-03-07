<?php
	require_once '../../app/lib/FPDF/fpdf.php';

	use model\CatalogoMaterias;
	use model\TablaAlumno;
	use model\TablaSolExamenEspecial;
	use model\TablaPeriodoEscolar;
	require_once realpath('../../vendor/autoload.php');
	
	$mes = ['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];

	class PDF extends FPDF{
		function periodo(){
			$consulta = TablaPeriodoEscolar::select('identificacion_larga')->where('id_periodo_escolar',$_POST['periodo_exam_periodo'])->first();
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
			$this->SetY(-20);
			$this->SetFont('Arial','',8);
			$this->Cell(0,5,utf8_decode('Este documento no es valido si tiene tachaduras o enmendaduras.'),0,1,'L');
			$this->Cell(0,5,utf8_decode('San Juan Tepenahuac, Alcaldia Milpa Alta, CDMX a '.$dia.' de '.$mes[$me].' del '.$year.'.'),0,1,'L');
		}
	}
	
	function calificacion_num($cal){
		$numeros_cal = [7=>'SETENTA',8=>'OCHENTA',9=>'NOVENTA',10=>'CIEN'];
		$numero_secundario = ['NO ACREDITADA','UNO','DOS','TRES','CUATRO','CINCO','SEIS','SIETE','OCHO','NUEVE'];
		$cal_final = '';
		if($cal == 'NA'){
			$cal_final =  $numeros_cal[10];
		}else{
			if(strlen($cal) < 2){
				$cal_final = $numero_secundario[0];
			}elseif(strlen($cal) > 2){
				$cal_final = $numeros_cal[10];
			}else{
				$segundo = $cal[1]== 0 ? '' : ' Y '. $numero_secundario[$cal[1]];
				$cal_final = $numeros_cal[$cal[0]].$segundo;
			}
		}
		return $cal_final;
	}

	date_default_timezone_set('America/Mexico_City');
	$dia = date("d");
	$me = date("m");
	$year = date("Y");

	$pdf = new PDF('P','mm','letter');

	$cantidad = TablaSolExamenEspecial::select('fk_cat_materias')->where('fk_periodo_escolar',$_POST['periodo_exam_periodo'])->get();
	
	$consulta = TablaPeriodoEscolar::select('identificacion_corta')->where('id_periodo_escolar',$_POST['periodo_exam_periodo'])->first();
	if(count($cantidad) > 0){
		foreach($cantidad as $id_materia){
			$materia = CatalogoMaterias::select('nombre_completo_materia','clave','t_cat_organigrama.descripcion')->join('t_cat_organigrama','t_cat_materias.fk_cat_organigrama','t_cat_organigrama.id_cat_organigrama')->where('id_cat_materias',$id_materia->fk_cat_materias)->first();
			$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',12);
			$pdf->SetY(40); 
			$pdf->SetX(11);
			$pdf->Cell(30,5,utf8_decode('ACTA DE CALIFICACIONES  DE EXAMEN GLOBAL Y ESPECIAL'),0,1,'L');

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
			$pdf->Cell(42,5,utf8_decode(''.$materia->clave),0,1,'L');
			
			$pdf->SetFont('Arial','',10);
			$pdf->SetX(11);
			$pdf->Cell(30,5,utf8_decode('PERIODO:'),0,0,'L');
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(90,5,utf8_decode('  '.$consulta->identificacion_corta),0,0,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(30,5,utf8_decode('FECHA:'),0,0,'R');
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(42,5,''.$dia.'/'.$me.'/'.$year,0,1,'L');

			$pdf->Ln(5);
			$pdf->SetFont('Arial','',8);
			$pdf->SetFillColor(255, 255, 255); //establece el color de la celda RGB
			$pdf->SetDrawColor(0,0,0); //establece el color de las lineas
			$pdf->Cell(9,10,'No.',1,0,'C',true); //Cell(tamaños_horizontal,tamaño_vertical,'contenido',margen 1=true 
			$pdf->Cell(23,10,'CONTROL',1,0,'C',true);
			$pdf->Cell(82,10,'NOMBRE DEL ALUMNO',1,0,'C',true);
			$pdf->Cell(21,10,'CARRERA',1,0,'C',true);
			$pdf->Cell(57,5,'CALIFICACION',1,1,'C',true);
			$pdf->SetX(145);
			$pdf->Cell(18,5,'NUMERO',1,0,'C',true);
			$pdf->Cell(39,5,'LETRA',1,1,'C',true);

			$examen_especial = TablaSolExamenEspecial::select('calificacion_especial','carrera','nombre_persona','apellido_paterno','apellido_materno','numero_control')->join('t_alumno','t_solicitudes_ex_especiales.fk_numero_control','t_alumno.fk_numero_control')->join('t_cat_carrera','t_alumno.fk_cat_carrera','t_cat_carrera.id_cat_carrera')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('fk_cat_materias',$id_materia->fk_cat_materias)->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo_exam_periodo'])->get();
			$con = 81;
			$i = 1;
			if(count($examen_especial) > 0){
				foreach($examen_especial as $alumno){
					$pdf->Ln(1);
					$pdf->Cell(9,5,''.$i,0,0,'C',true);
					$pdf->Cell(23,5,''.$alumno->numero_control,0,0,'C',true);
					$pdf->Cell(82,5,utf8_decode(''.$alumno->apellido_paterno.' '.$alumno->apellido_materno.' '.$alumno->nombre_persona),0,0,'L',true);
					$pdf->Cell(21,5,''.$alumno->carrera,0,0,'C',true);
					$pdf->Cell(18,5,''.$alumno->calificacion_especial == 0 ? 'NA' : $alumno->calificacion_especial,0,0,'C',true);
					$pdf->Cell(39,5,''.calificacion_num(''.$alumno->calificacion_especial),0,1,'C',true);
					$pdf->Line(10, $con , 202, $con);
					$con += 6;
					$i++;
				}
			}			
			$pdf->SetY(210);
			$pdf->SetX(11);
			$pdf->Cell(76,5,utf8_decode('PRESIDENTE'),0,0,'C');
			$pdf->Cell(40,5,utf8_decode(''),0,0,'C');	
			$pdf->Cell(76,5,utf8_decode('SECRETARIO'),0,1,'C');

			$pdf->Cell(76,5,utf8_decode('_________________________________________________'),0,0,'C');
			$pdf->Cell(40,5,utf8_decode(''),0,0,'C');	
			$pdf->Cell(76,5,utf8_decode('_________________________________________________'),0,1,'C');
			
			$pdf->SetY(235);
			$pdf->Cell(60,5,utf8_decode(''),0,0,'C'); 	
			$pdf->Cell(76,5,utf8_decode('VOCAL'),0,1,'C');

			$pdf->Cell(60,5,utf8_decode(''),0,0,'C'); 	
			$pdf->Cell(76,5,utf8_decode('_________________________________________________'),0,1,'C');
		}
	}else{
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',12);
		$pdf->SetY(40); 
		$pdf->SetX(11);
		$pdf->Cell(192,55,utf8_decode('NO EXISTEN ACTAS DE CALIFICACIONES DE EXAMEN GLOBAL Y ESPECIAL'),0,1,'C');
	}
	$pdf->Output('D', 'acta_calificaciones_examen_especial_bloque.pdf');
?>
