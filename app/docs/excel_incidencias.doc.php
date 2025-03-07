<?php
    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    use config\Token;
    use model\TablaRegistroTemp;

    require_once realpath('../../vendor/autoload.php');
    
    $consulta = TablaRegistroTemp::select('t_persona.nombre_persona','t_persona.apellido_paterno','t_persona.apellido_materno','t_registro_temp.fecha','t_registro_temp.entrada','t_registro_temp.salida','t_registro_temp.checador_id','t_registro_temp.dia','t_horario_personal.hora_inicio','t_horario_personal.hora_fin')->join('t_horario_personal','t_registro_temp.checador_id','t_horario_personal.checador_id')->join('t_personal','t_horario_personal.fk_personal','t_personal.id_personal')->join('t_persona','t_personal.fk_persona','t_persona.id_persona')->whereBetween('t_registro_temp.fecha',[$_POST['fecha_inicio'],$_POST['fecha_fin']])->whereBetween('t_registro_temp.dia',[TablaRegistroTemp::raw('t_horario_personal.dia')])->orderBy('t_registro_temp.fecha','desc')->orderBy('t_registro_temp.entrada','asc')->get();
   
    $excel = new Spreadsheet();
    $hojaActiva =  $excel->getActiveSheet();
    $hojaActiva->setTitle("Incidencias");

    $hojaActiva->getColumnDimension('A')->setWidth(5);
    $hojaActiva->setCellValue('A1','ID');
    $hojaActiva->getColumnDimension('B')->setWidth(50);
    $hojaActiva->setCellValue('B1','NOMBRE');
    $hojaActiva->getColumnDimension('C')->setWidth(15);
    $hojaActiva->setCellValue('C1','DIA');
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D1','FECHA');
    $hojaActiva->getColumnDimension('E')->setWidth(15);
    $hojaActiva->setCellValue('E1','HORA');
    $hojaActiva->getColumnDimension('F')->setWidth(30);
    $hojaActiva->setCellValue('F1','ESTADO ENTRADA');
    $hojaActiva->getColumnDimension('G')->setWidth(30);
    $hojaActiva->setCellValue('G1','ESTADO SALIDA');

    $fila = 2;

    if(Token::comprobar_token_frm("frm_incidencias",$_POST['tk_frm'])){
        foreach($consulta as $row) { 
            $entrada = strtotime($row['entrada']);
            $salida = strtotime($row['salida']);
            $hora_entrada_asignada = strtotime($row['hora_inicio']);
            $hora_salida_asignada = strtotime($row['hora_fin']);

            // Calcular estado de entrada
            $diff_entrada = ($entrada - $hora_entrada_asignada) / 60;
            if ($diff_entrada <= 0) {
                $estado_entrada = "OK";
            } elseif ($diff_entrada <= 10) {
                $estado_entrada = "OK";
            } elseif ($diff_entrada <= 20) {
                $estado_entrada = "Retardo";
            } elseif ($diff_entrada <= 30) {
                $estado_entrada = "Retardo Mayor";
            } else {
                $estado_entrada = "Falta";
            }

            // Calcular estado de salida
            if ($row['salida'] == '00:00:00') {
                $estado_salida = "No registrada";
            } else {
                $diff_salida = ($salida - $hora_salida_asignada) / 60;
                if ($diff_salida >= 0) {
                    $estado_salida = "OK";
                } elseif ($diff_salida >= -10) {
                    $estado_salida = "OK";
                } else {
                    $estado_salida = "Salida Anticipada";
                }
            }

            $hojaActiva->setCellValue('A'.$fila, htmlspecialchars($row['checador_id']));
            $hojaActiva->setCellValue('B'.$fila, $row['nombre_persona'].' '.$row['apellido_paterno'].' '.$row['apellido_materno']);
            $hojaActiva->setCellValue('C'.$fila, htmlspecialchars($row['dia']));
            $hojaActiva->setCellValue('D'.$fila, htmlspecialchars($row['fecha']));
            $hojaActiva->setCellValue('E'.$fila, htmlspecialchars($row['entrada']));
            $hojaActiva->setCellValue('F'.$fila, htmlspecialchars($estado_entrada));
            $hojaActiva->setCellValue('G'.$fila, $row['salida'] == '00:00:00' ? 'No registrada' : htmlspecialchars($row['salida']));
            $hojaActiva->setCellValue('H'.$fila, htmlspecialchars($estado_salida));
            $fila++;
        }
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Incidencias_de_'.$_POST['fecha_inicio'].'_A_'.$_POST['fecha_fin'].'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;
?>