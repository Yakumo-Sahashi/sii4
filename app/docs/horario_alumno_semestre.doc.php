<?php
    require_once '../../app/lib/FPDF/fpdf.php';
    use model\TablaAlumno;
    use model\TablaHorario;
    use model\TablaPeriodoEscolar;
    use model\TablaSeleccionMaterias;
    require_once realpath('../../vendor/autoload.php');

    class PDF extends FPDF{

    }
        //fecha del dia 
	date_default_timezone_set('America/Mexico_City');
	$fecha = date("d-m-Y");

    $alumno =  TablaAlumno::select('apellido_paterno','apellido_materno','nombre_persona','id_numero_control','numero_control','semestre','especialidad','clave_reticula','periodos_revalidados')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control','t_numero_control.id_numero_control')->join('t_cat_especialidad','t_alumno.fk_cat_especialidad','t_cat_especialidad.id_cat_especialidad')->join('t_cat_reticula','t_alumno.fk_cat_reticula','t_cat_reticula.id_cat_reticula')->where('id_alumno',$_POST['alumno'])->first();
    $periodo = TablaPeriodoEscolar::select('t_periodo_escolar.identificacion_corta','t_periodo_escolar.id_periodo_escolar')->where('id_periodo_escolar',$_POST['periodo'])->first();
    $consulta_horario = TablaSeleccionMaterias::select('dia','hora_inicio','hora_fin','nombre_grupo','t_cat_materias.clave_oficial','t_cat_materias.nombre_abreviado_materia','t_cat_materias.creditos_totales','aula','repeticion','apellido_paterno','apellido_materno','nombre_persona')->join('t_horario','t_seleccion_materias.fk_grupo','t_horario.fk_grupo')->join('t_grupo','t_horario.fk_grupo','t_grupo.id_grupo')->join('t_cat_materias','t_horario.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_cat_aulas','t_horario.fk_cat_aulas','t_cat_aulas.id_cat_aulas')->join('t_personal','t_grupo.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->where('t_seleccion_materias.fk_numero_control',$alumno->id_numero_control)->where('t_seleccion_materias.fk_cat_periodo',$_POST['periodo'])->get();

    function determinar_dia ($dia, $dia_tabla, $hora_inicio, $hora_fin, $aula) {
		return $dia == $dia_tabla ? $hora_inicio .'-'. $hora_fin .'/'. $aula : ''; 
	}

    $i = 0;
    $creditos = 0;
    foreach($consulta_horario as $aux){
        if(isset($horario)){
			if($horario[($i-1)]['nombre'] == $aux['nombre_abreviado_materia'] && $horario[($i-1)]['nombre_grupo'] == $aux['nombre_grupo']){
				switch($aux['dia']){
					case 'lunes': {
						$horario[($i-1)]['lunes'] = determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						break;
					}
					case 'martes': {
						$horario[($i-1)]['martes'] = determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						break;
					}
					case 'miercoles': {
						$horario[($i-1)]['miercoles'] = determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						break;
					}
					case 'jueves': {
						$horario[($i-1)]['jueves'] = determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						break;
					}
					case 'viernes': {
						$horario[($i-1)]['viernes'] = determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						break;
					}
					case 'sabado': {
						$horario[($i-1)]['sabado'] = determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
						break;
					}
				}
			}else {
				$horario[$i]['lunes'] = determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
				$horario[$i]['martes'] = determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
				$horario[$i]['miercoles'] = determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
				$horario[$i]['jueves'] = determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
				$horario[$i]['viernes'] = determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
				$horario[$i]['sabado'] = determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
				$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
				$horario[$i]['nombre'] = $aux['nombre_abreviado_materia'];
				$horario[$i]['creditos_totales'] = $aux['creditos_totales'];
                $horario[$i]['clave'] = $aux['clave_oficial'];
                $horario[$i]['rep'] = $aux['repeticion'];
                $horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
                $creditos += $aux['creditos_totales'];
				$i++;
			}
		}else {
			$horario[$i]['lunes'] = determinar_dia($aux['dia'], 'lunes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
			$horario[$i]['martes'] = determinar_dia($aux['dia'], 'martes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
			$horario[$i]['miercoles'] = determinar_dia($aux['dia'], 'miercoles', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
			$horario[$i]['jueves'] = determinar_dia($aux['dia'], 'jueves', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
			$horario[$i]['viernes'] = determinar_dia($aux['dia'], 'viernes', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
			$horario[$i]['sabado'] = determinar_dia($aux['dia'], 'sabado', $aux['hora_inicio'], $aux['hora_fin'], $aux['aula']);
			$horario[$i]['nombre_grupo'] = $aux['nombre_grupo'];
			$horario[$i]['nombre'] = $aux['nombre_abreviado_materia'];
			$horario[$i]['creditos_totales'] = $aux['creditos_totales'];
            $horario[$i]['clave'] = $aux['clave_oficial'];
            $horario[$i]['rep'] = $aux['repeticion'];
            $horario[$i]['docente'] = $aux['apellido_paterno'].' '.$aux['apellido_materno'].' '.$aux['nombre_persona'];
            $creditos += $aux['creditos_totales'];
			$i++;
		}
    }

	//variables de los datos del estudiante
	$nombre = $alumno->apellido_paterno.' '.$alumno->apellido_materno.' '.$alumno->nombre_persona;
	$nControl = $alumno->numero_control;
	$semestre = '   '.($alumno->semestre + $alumno->periodos_revalidados);
	$especialidad =$alumno->especialidad ;
	$reticula = $alumno->clave_reticula;
	$pe = $periodo->identificacion_corta;
	//Variables que definen las posiciones del encabezado
	$sepLogoY = 2;
	$itmaLogoY = 6;
	$ti = 11;
	//variable de posicion del horario
	$horarioY = 25;

// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();//permite añadir pie de pagina
	$pdf->AddPage(); //añade pagina

	for ($va=0; $va < 2 ; $va++) { 
        $pdf->Image('../../public/img/SEP.png',10,$sepLogoY,40,25,'png');
        $pdf->Image('../../public/img/itma2.png',185,$itmaLogoY,18,17,'png');
        $pdf->SetFont('Arial','B',10);
        $pdf->SetY($ti);
        $pdf->SetX(69);
        $pdf->Cell(20,5,utf8_decode('INSTITUTO TECNOLÓGICO DE MILPA ALTA II'),0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->SetX(67);
        $pdf->Cell(20,5,'CARGA ACADEMICA AL PERIODO: '.$pe,0,1);
        
        //inicio llenado de datos del estudiante
        $pdf->SetY($horarioY);
        $pdf->Cell(15,6,'FECHA: ',0,0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(10,6,$fecha,0,1);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(40,6,'NUMERO DE CONTROL : ',0,0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(20,6,$nControl,0,1);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(20,6,'ALUMNO : ',0,0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(100,6,$nombre,0,1);

        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(20,6,'SEMESTRE : ',0,0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(50,6,$semestre,0,0);

        $pdf->SetFont('Arial','B',9);
        $pdf->SetX(140);
        $pdf->cell(20,6,'CREDITOS : ',0,);
        $pdf->SetFont('Arial','',9);
        $pdf->cell(10,6,$creditos,0,1);
        
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(28,6,'ESPECIALIDAD : ',0,0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(100,6,utf8_decode($especialidad),0,0);

        $pdf->SetFont('Arial','B',9);
        $pdf->SetX(140);
        $pdf->Cell(20,6,'RETICULA : ',0,0);
        $pdf->SetFont('Arial','',9);
        $pdf->Cell(30,6,$reticula,0,1);
        //fin del llenado de datos del estudiante

        $pdf->SetFont('Arial','B',6);
        $pdf->SetX(10);
        $pdf->Cell(32,6,'MATERIA',0,0);
        $pdf->Cell(15,6,'CLAVE',0,0,'C');
        $pdf->Cell(15,6,'GPO',0,0,'C');
        $pdf->Cell(12,6,'REP',0,0,'C');
        $pdf->Cell(12,6,'CR',0,0,'C');
        $pdf->Cell(20,6,'LUNES',0,0,'C');
        $pdf->Cell(20,6,'MARTES',0,0,'C');
        $pdf->Cell(20,6,'MIERCOLES',0,0,'C');
        $pdf->Cell(20,6,'JUEVES',0,0,'C');
        $pdf->Cell(20,6,'VIERNES',0,1,'C');
        $pdf->Cell(20,0,'_______________________________________________________________________________________________________________________________________________________________',0,1);
        $pdf->Cell(20,3,'',0,1);
        if(isset($horario)){
            for($i = 0; $i < count($horario); $i++){
                $pdf->SetFont('Arial','B',6);
                $pdf->Cell(32,2,utf8_decode($horario[$i]['nombre']),0,0);
                $pdf->Cell(15,2,$horario[$i]['clave'],0,0,'C');
                $pdf->Cell(15,2,$horario[$i]['nombre_grupo'],0,0,'C');
                $pdf->Cell(12,2,$horario[$i]['rep'],0,0,'C');
                $pdf->Cell(12,2,$horario[$i]['creditos_totales'],0,0,'C');
                $pdf->Cell(20,2,$horario[$i]['lunes'],0,0,'C');
                $pdf->Cell(20,2,$horario[$i]['martes'],0,0,'C');
                $pdf->Cell(20,2,$horario[$i]['miercoles'],0,0,'C');
                $pdf->Cell(20,2,$horario[$i]['jueves'],0,0,'C');
                $pdf->Cell(20,2,$horario[$i]['viernes'],0,1,'C');
                $pdf->SetFont('Arial','',4);
                $pdf->Cell(20,3,$horario[$i]['docente'],0,1);
            }
        }
        $pdf->Cell(20,10,'',0,1);
        $pdf->SetFont('Arial','B',6);

        $pdf->Cell(90,3,'___________________________________________',0,0,'C');
        $pdf->Cell(100,3,'___________________________________________',0,1,'C');
        $pdf->Cell(90,6,'DIVISION DE ESTUDIOS PROFESIONALES',0,0,'C');
        $pdf->Cell(100,6,$nombre,0,1,'C');

        //actualizacion de valores de posicion
        $sepLogoY=137;
        $itmaLogoY=141;
        $horarioY=163;
        $ti = 146;

    }
	
	$pdf->Output('D', 'HORARIO.pdf');
?>