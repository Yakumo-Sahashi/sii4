<?php

    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    use model\TablaPeriodoEscolar;
    use model\TablaGrupo;
    use model\TablaSeleccionMaterias;
    require_once realpath('../../vendor/autoload.php');
    
    $periodo = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->where('estado','1')->first();
    $materia = TablaGrupo::select('nombre_grupo','nombre_completo_materia')->join('t_cat_materias','t_grupo.fk_cat_materias','t_cat_materias.id_cat_materias')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_grupo.fk_periodo',$periodo->id_periodo_escolar)->first();   
    
    $excel = new Spreadsheet();
    $hojaActiva =  $excel->getActiveSheet();
    $hojaActiva->setTitle("Calificaciones grupo ".$materia->nombre_grupo);

    $hojaActiva->getColumnDimension('A')->setWidth(5);
    $hojaActiva->setCellValue('A1','No');
    $hojaActiva->getColumnDimension('B')->setWidth(15);
    $hojaActiva->setCellValue('B1','No. Control');
    $hojaActiva->getColumnDimension('C')->setWidth(80);
    $hojaActiva->setCellValue('C1','Alumno');
    $hojaActiva->getColumnDimension('D')->setWidth(25);
    $hojaActiva->setCellValue('D1','Calificacion');

    $consulta = TablaSeleccionMaterias::select('numero_control','nombre_persona','apellido_paterno','apellido_materno','calificacion')->join('t_numero_control','t_seleccion_materias.fk_numero_control','t_numero_control.id_numero_control')->join('t_alumno','t_numero_control.id_numero_control','t_alumno.fk_numero_control')->join('t_persona','t_alumno.fk_persona','t_persona.id_persona')->join('t_grupo','t_seleccion_materias.fk_grupo','t_grupo.id_grupo')->where('t_grupo.fk_cat_materias',$_POST['materia'])->where('t_seleccion_materias.fk_cat_periodo',$periodo->id_periodo_escolar)->get();

    $fila = 2;
    $cont = 1;

    if(count($consulta) > 0){
        foreach($consulta as $alumno){
            $hojaActiva->setCellValue('A'.$fila, $cont);
            $hojaActiva->setCellValue('B'.$fila, $alumno['numero_control']);
            $hojaActiva->setCellValue('C'.$fila, $alumno['apellido_paterno'].' '.$alumno['apellido_materno'].' '.$alumno['nombre_persona']);
            $hojaActiva->setCellValue('D'.$fila, $alumno['calificacion'] == 0 ? 'Sin calificacion' : $alumno['calificacion']);
            $fila++;
            $cont++;        
        }
    }else{
        $hojaActiva->setCellValue('A'.$fila, '');
        $hojaActiva->setCellValue('B'.$fila, '');
        $hojaActiva->setCellValue('C'.$fila, '');
        $hojaActiva->setCellValue('D'.$fila, '');
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Captura_calificaciones '.$materia->nombre_completo_materia.'/'.$periodo->identificacion_corta.'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;
?>