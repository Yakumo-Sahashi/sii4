<?php

    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    use model\TablaPeriodoEscolar;
    use model\TablaSolExamenEspecial;
    require_once realpath('../../vendor/autoload.php');
    
    $periodo = TablaPeriodoEscolar::select('identificacion_corta')->where('id_periodo_escolar',$_POST['periodo'])->first();
    
    $excel = new Spreadsheet();
    $hojaActiva =  $excel->getActiveSheet();
    $hojaActiva->setTitle("Alumnos en examen especial");

    $hojaActiva->getColumnDimension('A')->setWidth(5);
    $hojaActiva->setCellValue('A1','No');
    $hojaActiva->getColumnDimension('B')->setWidth(15);
    $hojaActiva->setCellValue('B1','No. Control');
    $hojaActiva->getColumnDimension('C')->setWidth(80);
    $hojaActiva->setCellValue('C1','Materia');
    $hojaActiva->getColumnDimension('D')->setWidth(25);
    $hojaActiva->setCellValue('D1','Calificacion');
    $hojaActiva->getColumnDimension('E')->setWidth(25);
    $hojaActiva->setCellValue('E1','Tipo evaluacion');
    $hojaActiva->getColumnDimension('F')->setWidth(15);
    $hojaActiva->setCellValue('F1','Fecha especial');
    $hojaActiva->getColumnDimension('G')->setWidth(15);
    $hojaActiva->setCellValue('G1','Autorizacion');

    $consulta = TablaSolExamenEspecial::select('t_numero_control.numero_control','t_cat_materias.nombre_completo_materia','calificacion_especial','tipo_evaluacion','autorizacion','fecha_especial','t_cat_materias.clave_oficial')->join('t_cat_materias','t_solicitudes_ex_especiales.fk_cat_materias','t_cat_materias.id_cat_materias')->join('t_periodo_escolar','t_solicitudes_ex_especiales.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->join('t_numero_control','t_solicitudes_ex_especiales.fk_numero_control','t_numero_control.id_numero_control')->where('t_solicitudes_ex_especiales.fk_periodo_escolar',$_POST['periodo'])->orderBy('t_solicitudes_ex_especiales.fk_cat_materias','asc')->get();

    $fila = 2;
    $cont = 1;

    if(count($consulta) > 0){
        foreach($consulta as $alumno){
            $hojaActiva->setCellValue('A'.$fila, $cont);
            $hojaActiva->setCellValue('B'.$fila, $alumno['numero_control']);
            $hojaActiva->setCellValue('C'.$fila, $alumno['nombre_completo_materia']);
            $hojaActiva->setCellValue('D'.$fila, $alumno['calificacion_especial'] == 0 ? 'Sin calificacion' : $alumno['calificacion_especial']);
            $hojaActiva->setCellValue('E'.$fila, $alumno['tipo_evaluacion'] == 'SI' ? 'Especial Autodidacta' : 'Examen Especial' );
            $hojaActiva->setCellValue('F'.$fila, $alumno['fecha_especial']);
            $hojaActiva->setCellValue('G'.$fila, $alumno['autorizacion']);
            $fila++;
            $cont++;        
        }
    }else{
        $hojaActiva->setCellValue('A'.$fila, '');
        $hojaActiva->setCellValue('B'.$fila, '');
        $hojaActiva->setCellValue('C'.$fila, '');
        $hojaActiva->setCellValue('D'.$fila, '');
        $hojaActiva->setCellValue('E'.$fila, '');
        $hojaActiva->setCellValue('F'.$fila, '');
        $hojaActiva->setCellValue('G'.$fila, '');
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Alumnos_en_examen_especial '.$periodo->identificacion_corta.'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;
?>