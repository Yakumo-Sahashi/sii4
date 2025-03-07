<?php

    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    use model\CatalogoCarrera;
    use model\TablaAvisosReinscripcion;
    use model\TablaPeriodoEscolar;
    require_once realpath('../../vendor/autoload.php');
    
    $periodo = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->where('id_periodo_escolar',$_POST['periodo_imp'])->first();
    $carrera = CatalogoCarrera::select('carrera')->where('id_cat_carrera',$_POST['carrera_imp'])->first();
   
    $excel = new Spreadsheet();
    $hojaActiva =  $excel->getActiveSheet();
    $hojaActiva->setTitle("Alumnos-".$periodo->identificacion_corta);

    $hojaActiva->getColumnDimension('A')->setWidth(5);
    $hojaActiva->setCellValue('A1','No');
    $hojaActiva->getColumnDimension('B')->setWidth(15);
    $hojaActiva->setCellValue('B1','No. Control');
    $hojaActiva->getColumnDimension('C')->setWidth(50);
    $hojaActiva->setCellValue('C1','CURP');
    $hojaActiva->getColumnDimension('D')->setWidth(80);
    $hojaActiva->setCellValue('D1','Alumno');
    $hojaActiva->getColumnDimension('E')->setWidth(25);
    $hojaActiva->setCellValue('E1','Semestre');
    $hojaActiva->getColumnDimension('F')->setWidth(15);
    $hojaActiva->setCellValue('F1','Sexo');
    $hojaActiva->getColumnDimension('G')->setWidth(25);
    $hojaActiva->setCellValue('G1','Promedio AC');
    $hojaActiva->getColumnDimension('H')->setWidth(25);
    $hojaActiva->setCellValue('H1','Promedio P');
    $hojaActiva->getColumnDimension('I')->setWidth(20);
    $hojaActiva->setCellValue('I1','Creditos');
    $hojaActiva->getColumnDimension('J')->setWidth(50);
    $hojaActiva->setCellValue('J1','Correo electronico');

    $consulta = TablaAvisosReinscripcion::select('numero_control', 'nombre_persona', 'apellido_paterno','apellido_materno','t_alumno.semestre','t_alumno.periodos_revalidados','t_alumno.promedio_aritmetico_acumulado','t_alumno.promedio_final_alcanzado','t_alumno.creditos_aprobados','t_persona.curp','t_cat_sexo.sexo','t_usuario.correo_usuario')->join('t_alumno','t_avisos_reinscripcion.fk_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_numero_control','t_alumno.fk_numero_control', 't_numero_control.id_numero_control')->join('t_cat_sexo','t_persona.fk_cat_sexo','t_cat_sexo.id_cat_sexo')->join('t_usuario','t_persona.id_persona','t_usuario.fk_persona')->where('t_avisos_reinscripcion.fk_periodo_escolar',$_POST['periodo_imp'])->where('t_alumno.fk_cat_carrera',$_POST['carrera_imp'])->orderBy('t_avisos_reinscripcion.fk_numero_control','asc')->get();

    $fila = 2;
    $cont = 1;

    if(count($consulta) > 0){
        foreach($consulta as $alumno){
            $hojaActiva->setCellValue('A'.$fila, $cont);
            $hojaActiva->setCellValue('B'.$fila, $alumno['numero_control']);
            $hojaActiva->setCellValue('C'.$fila, $alumno['curp']);
            $hojaActiva->setCellValue('D'.$fila, $alumno['apellido_paterno'].' '.$alumno['apellido_materno'].' '.$alumno['nombre_persona']);
            $hojaActiva->setCellValue('E'.$fila, ($alumno['semestre'] + $alumno['periodos_revalidados']));
            $hojaActiva->setCellValue('F'.$fila, $alumno['sexo']);
            $hojaActiva->setCellValue('G'.$fila, $alumno['promedio_aritmetico_acumulado']);
            $hojaActiva->setCellValue('H'.$fila, $alumno['promedio_final_alcanzado']);
            $hojaActiva->setCellValue('I'.$fila, $alumno['creditos_aprobados']);
            $hojaActiva->setCellValue('J'.$fila, $alumno['correo_usuario']);
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
        $hojaActiva->setCellValue('I'.$fila, '');
        $hojaActiva->setCellValue('J'.$fila, '');
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Listado_alumnos_inscritos -'.$carrera->carrera.'-'.$periodo->identificacion_corta.'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;
?>