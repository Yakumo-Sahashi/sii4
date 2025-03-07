<?php
	require_once '../../app/lib/FPDF/fpdf.php';

	use model\CatalogoCarrera;
	use model\TablaPeriodoEscolar;
	use model\TablaHorario;
	use model\TablaPersona;

	require_once realpath('../../vendor/autoload.php');
	
	class PDF extends FPDF{
		function Header(){ 
			$this->Image('../../public/img/SEP.png',10,6,40,25,'png');
			$this->Image('../../public/img/itma2.png',250,10,18,17,'png');
			$this->SetFont('Arial','B',14);
			$this->SetTextColor(37,73,144);
			$this->SetY(15);
			$this->SetX(126);
			$this->Cell(30,10,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1,'C');
			$this->SetFont('Arial','B',10);
			$this->SetX(126);
			$this->Cell(30,5,utf8_decode('HORARIO DOCENTE'),0,1,'C');
			$this->Ln(5);
		}
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula, $id) {
		return $dia == $dia_tabla ? $hora_inicio .'-'. $hora_fin .'/'. $aula : ''; 
	}
	$pdf = new PDF('L','mm','letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$docente = TablaPersona::select('apellido_paterno','apellido_materno','nombre_persona','rfc')->where('id_persona',$_POST['persona'])->first();
	$pdf->SetFont('Arial','B',10);	
	$pdf->SetFillColor(1,93,153);
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(255,255,255);
	$pdf->Ln(10);
	$pdf->Cell(32,6,'NOMBRE:',1,0,'C',true);
	$pdf->Cell(140,6,utf8_decode($docente->apellido_paterno .' '. $docente->apellido_materno .' '. $docente->nombre_persona),1,0,'C',true);
	$pdf->Cell(28,6,'RFC:',1,0,'C',true);
	$pdf->Cell(58,6,$docente->rfc,1,1,'C',true);

	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',8);	
	$pdf->Cell(22,6,'CLAVE',1,0,'C',true);
	$pdf->Cell(72,6,'ASIGNATURA',1,0,'C',true); //Cell(tamaños_horizontal,tamaño_vertical,'contenido',margen 1=true 0=false,salto de linea 1=true 0=false, color de celda true ó false);
	$pdf->Cell(22,6,'GRUPO',1,0,'C',true);
	$pdf->Cell(10,6,'HRS',1,0,'C',true);
	$pdf->Cell(22,6,'LUNES',1,0,'C',true);
	$pdf->Cell(22,6,'MARTES',1,0,'C',true);
	$pdf->Cell(22,6,'MIERCOLES',1,0,'C',true);
	$pdf->Cell(22,6,'JUEVES',1,0,'C',true);
	$pdf->Cell(22,6,'VIERNES',1,0,'C',true);
	$pdf->Cell(22,6,'SABADO',1,1,'C',true);

	$periodo = TablaPeriodoEscolar::select('id_periodo_escolar')->where('estado','1')->first();
	$consulta = TablaHorario::select('id_horario','dia','hora_inicio','hora_fin','nombre_grupo','aula','nombre_completo_materia','t_grupo.id_grupo','t_grupo.paralelo_de','t_grupo.capacidad','t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','clave','creditos_totales')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_personal.fk_persona',$_POST['persona'])->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->get();
	$i = 0;
	foreach ($consulta as $aux){
		if(isset($horario)){
			if($horario[($i-1)]['nombre'] == $aux['nombre_completo_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
				switch($aux['dia']){
					case 'lunes': {
						$horario[($i-1)]['lunes'] = determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
						break;
					}
					case 'martes': {
						$horario[($i-1)]['martes'] = determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
						break;
					}
					case 'miercoles': {
						$horario[($i-1)]['miercoles'] = determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
						break;
					}
					case 'jueves': {
						$horario[($i-1)]['jueves'] = determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
						break;
					}
					case 'viernes': {
						$horario[($i-1)]['viernes'] = determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
						break;
					}
					case 'sabado': {
						$horario[($i-1)]['sabado'] = determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
						break;
					}
				}
			}else {
				$horario[$i]['lunes'] = determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
				$horario[$i]['martes'] = determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
				$horario[$i]['miercoles'] = determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
				$horario[$i]['jueves'] = determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
				$horario[$i]['viernes'] = determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
				$horario[$i]['sabado'] = determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
				$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
				$horario[$i]['nombre'] = $aux['nombre_completo_materia'];
				$horario[$i]['creditos_totales'] = $aux['creditos_totales'];
				$horario[$i]['clave'] = $aux['clave'];
				$i++;
			}
		}else {
			$horario[$i]['lunes'] = determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
			$horario[$i]['martes'] = determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
			$horario[$i]['miercoles'] = determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
			$horario[$i]['jueves'] = determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
			$horario[$i]['viernes'] = determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
			$horario[$i]['sabado'] = determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula'], $aux['id_horario']);
			$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
			$horario[$i]['nombre'] = $aux['nombre_completo_materia'];
			$horario[$i]['creditos_totales'] = $aux['creditos_totales'];
			$horario[$i]['clave'] = $aux['clave'];
			$i++;
		}
	}

	$pdf->SetFillColor(221,221,221);
	$pdf->SetTextColor(37,73,144);
	if(isset($horario)){
		foreach ($horario as $aux){
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(22,5,utf8_decode($aux['clave']),1,0,'C',true);
			$pdf->Cell(72,5,''.utf8_decode($aux['nombre']),1,0,'C',true);
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(22,5,''.$aux['nombre_grupo'],1,0,'C',true);
			$pdf->Cell(10,5,''.$aux['creditos_totales'],1,0,'C',true);
			$pdf->Cell(22,5,''.$aux['lunes'],1,0,'C',true);
			$pdf->Cell(22,5,''.$aux['martes'],1,0,'C',true);
			$pdf->Cell(22,5,''.$aux['miercoles'],1,0,'C',true);
			$pdf->Cell(22,5,''.$aux['jueves'],1,0,'C',true);
			$pdf->Cell(22,5,''.$aux['viernes'],1,0,'C',true);
			$pdf->Cell(22,5,''.$aux['sabado'],1,1,'C',true);
		}
	}else{
		$pdf->SetFont('Arial','',25);
		$pdf->Cell(258,50,'SIN HORARIOS',1,0,'C',true);
	}
	$pdf->Output('D', 'Horario_docente.pdf');
?>
