<?php
    function calcularMinutosDiferencia($hora1, $hora2) {
        $t1 = strtotime($hora1);
        $t2 = strtotime($hora2);
        return round(($t2 - $t1) / 60);
    }
    
    // Agrupar registros por fecha
    $agrupadosPorFecha = [];
    foreach ($registros as $registro) {
        $fecha = $registro['fecha'];
        if (!isset($agrupadosPorFecha[$fecha])) {
            $agrupadosPorFecha[$fecha] = [];
        }
        $agrupadosPorFecha[$fecha][] = $registro;
    }
    
    // Verificar retardos y salidas
    foreach ($agrupadosPorFecha as $fecha => $registrosDelDia) {
        // Ordenar por hora para garantizar que la primera sea entrada y la última sea salida
        usort($registrosDelDia, function ($a, $b) {
            return strtotime($a['hora']) - strtotime($b['hora']);
        });
    
        $registroEntrada = $registrosDelDia[0];
        $registroSalida = end($registrosDelDia);
    
        $id = $registroEntrada['id'];
        $dia = $registroEntrada['dia'];
        $horaEntrada = $registroEntrada['hora'];
        $horaSalida = $registroSalida['hora'];
    
        // Encontrar el horario correspondiente al día y al id
        $horarioDia = array_filter($horario, function ($h) use ($dia, $id) {
            return $h['dia'] === $dia && $h['id'] == $id;
        });
    
        if (!empty($horarioDia)) {
            $horarioDia = array_values($horarioDia)[0];
            $horaEntradaEsperada = $horarioDia['hora_entrada'];
            $horaSalidaEsperada = $horarioDia['hora_salida'];
    
            // Validar entrada
            $diferenciaEntrada = calcularMinutosDiferencia($horaEntradaEsperada, $horaEntrada);
            if ($diferenciaEntrada <= 0) {
                $estadoEntrada = "ok";
            } elseif ($diferenciaEntrada <= 10) {
                $estadoEntrada = "ok";
            } elseif ($diferenciaEntrada <= 20) {
                $estadoEntrada = "retardo";
            } elseif ($diferenciaEntrada <= 30) {
                $estadoEntrada = "retardo mayor";
            } else {
                $estadoEntrada = "falta";
            }
    
            // Validar salida
            $diferenciaSalida = calcularMinutosDiferencia($horaSalidaEsperada, $horaSalida);
            if ($diferenciaSalida >= -10) {
                $estadoSalida = "ok";
            } elseif ($diferenciaSalida >= 0) {
                $estadoSalida = "ok";
            } else {
                $estadoSalida = "falta no se registró salida";
            }         
                $hojaActiva->setCellValue('A'.$fila, $id);
                $hojaActiva->setCellValue('B'.$fila, $persona['nombre_persona'].' '.$persona['apellido_paterno'].' '.$persona['apellido_materno']);
                $hojaActiva->setCellValue('C'.$fila, $dia);
                $hojaActiva->setCellValue('D'.$fila, $fecha);
                $hojaActiva->setCellValue('E'.$fila, $horaRegistro);
                $hojaActiva->setCellValue('F'.$fila, $estadoEntrada);
                $hojaActiva->setCellValue('G'.$fila, $horaSalida);
                $hojaActiva->setCellValue('H'.$fila, $estadoSalida);
                $fila++;  
        } else {
            $hojaActiva->setCellValue('A'.$fila, $id);
            $hojaActiva->setCellValue('B'.$fila, $persona['nombre_persona'].' '.$persona['apellido_paterno'].' '.$persona['apellido_materno']);
            $hojaActiva->setCellValue('C'.$fila, "");
            $hojaActiva->setCellValue('D'.$fila, $fecha);
            $hojaActiva->setCellValue('E'.$fila, "No se encontró horario definido");
            $hojaActiva->setCellValue('F'.$fila, "");
            $hojaActiva->setCellValue('G'.$fila, "");
            $hojaActiva->setCellValue('H'.$fila, "");
            $fila++;
        } 
    }
?>