<?php
    use model\CatalogoDirectorio;
    use model\CatalogoCarrera;
    use model\CatalogoEspecialidad;
    use model\CatalogoTipoIngreso;
    use model\CatalogoReticula;
    use model\CatalogoEscolaridad;
    use model\CatalogoEstatus;
    use model\TablaPeriodoEscolar;
    use model\CatalogoNControl;
    use model\CatalogoMaterias;
    use model\CatalogoNivelPuesto;
    use model\CatalogoTipoEvaluacion;
    use model\CatalogoAutorizacion;
    use model\CatalogoOrganigrama;

    require_once realpath('../../vendor/autoload.php');
    class InformacionCatalogos{
        static function obtenerOrganigrama(){
            $consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->get();
            echo '<option value="" selected>Seleccionar el Area</option>';
                foreach($consulta as $organigrama){
                    echo '<option value="'.$organigrama['id_cat_organigrama'].'">'.$organigrama['descripcion'].'</option>';
                }
        }
        static function obtenerOrganigramaArea(){
            $consulta = CatalogoOrganigrama::select('id_cat_organigrama','descripcion')->where('tipo_area','D')->get();
            echo '<option value="" selected>Seleccionar el Area</option>';
                foreach($consulta as $organigrama){
                    echo '<option value="'.$organigrama['id_cat_organigrama'].'">'.$organigrama['descripcion'].'</option>';
                }
        }
        static function obtener_nivel(){
            $consulta = CatalogoNivelPuesto::select('id_cat_nivel_puesto', 'descripcion_nivel_puesto')->get();
            echo '<option value="" selected>Seleccionar</option>';
            foreach ($consulta as $nivel) {
                echo '<option value="' . $nivel['id_cat_nivel_puesto'] . '">' . $nivel['descripcion_nivel_puesto'] . '</option>';
            }
        }
        static function consultar_materias(){
            $consulta = CatalogoMaterias::select('id_cat_materias', 'nombre_completo_materia')->where('fk_cat_reticula', $_POST['filtro'])->get();
            echo '<option value="" selected>Seleccionar materia</option>';
            foreach ($consulta as $materia) {
                echo '<option value="' . $materia['id_cat_materias'] . '">' . $materia['nombre_completo_materia'] . '</option>';
            }
        }
        static function consultar_estado(){
            $consulta =  CatalogoDirectorio::select('entidad_federativa', 'alcaldia')->where('codigo_postal', $_POST['codigo_postal'])->first();
            $consulta['colonias'] = CatalogoDirectorio::select('colonia')->where('codigo_postal', $_POST['codigo_postal'])->get();
            echo json_encode($consulta);
        }
        static function consultar_carrera(){
            echo '<option value="">Seleccionar carrera</option>';
            $consulta = CatalogoCarrera::select('id_cat_carrera', 'nombre_carrera')->where('estatus','1')->get();
            foreach ($consulta as $carrera) {
                echo '<option value="' . $carrera['id_cat_carrera'] . '">' . $carrera['nombre_carrera'] . '</option>';
            }
        }
        static function consultar_especialidad(){
            echo '<option value="">Seleccionar especialidad</option>';
            $consulta = CatalogoEspecialidad::orderBy('id_cat_especialidad', 'asc')->where('fk_cat_carrera', $_POST['carrera_reticula'])->where('estatus', '1')->get();
            foreach ($consulta as $especialidad) {
                echo '<option value="' . $especialidad['id_cat_especialidad'] . '">' . $especialidad['especialidad'] . '</option>';
            }
        }
        static function consultar_ingreso(){
            $consulta = CatalogoTipoIngreso::get();
            foreach ($consulta as $ingreso) {
                echo '<option value="' . $ingreso['id_cat_tipo_ingreso'] . '">' . $ingreso['tipo_ingreso'] . '</option>';
            }
        }
        static function consultar_plan_estudios(){
            $consulta = CatalogoReticula::where('fk_cat_carrera', $_POST['carrera'])->first();
            echo json_encode($consulta);
        }
        static function consulta_nivel_estudios(){
            $consulta = CatalogoEscolaridad::get();
            foreach ($consulta as $escolaridad) {
                echo '<option value="' . $escolaridad['id_cat_escolaridad'] . '">' . $escolaridad['escolaridad'] . '</option>';
            }
        }
        static function consulta_estatus_alumno(){
            $consulta = CatalogoEstatus::get();
            foreach ($consulta as $estaus) {
                echo '<option value="' . $estaus['id_cat_estatus'] . '">' . $estaus['estatus'] . ' (' . $estaus['descripcion_estatus'] . ')</option>';
            }
        }
        static function obtener_periodo(){
            $consulta = TablaPeriodoEscolar::where('estado', '1')->first();
            echo json_encode($consulta);
        }

        static function obtener_periodo_se(){
            $consulta = TablaPeriodoEscolar::select('identificacion_corta')->where('estado', '1')->first();
            echo json_encode($consulta->identificacion_corta);
        }
        static function obtener_periodo_full(){
            $consulta = TablaPeriodoEscolar::select('id_periodo_escolar','identificacion_corta')->orderBy('id_periodo_escolar','desc')->get();
            echo '<option value="" selected>Seleccionar periodo</option>';
            foreach($consulta as $periodo){
                echo '<option value="'.$periodo['id_periodo_escolar'].'">'.$periodo['identificacion_corta'].'</option>';
            }
        }
        static function mostrar_num_control(){
            $consulta = CatalogoNControl::select('id_numero_control', 'numero_control')->join('t_periodo_escolar','t_numero_control.fk_periodo_escolar','t_periodo_escolar.id_periodo_escolar')->where('estatus', 'disponible')->where('estado','1')->get();
            foreach ($consulta as $control) {
                $arreglo[] = $control;
            }
            if (isset($arreglo)) {
                echo json_encode($arreglo);
            } else {
                $control['numero_control'] = 'N/D';
                $control['id_numero_control'] = "";
                $arreglo[] = $control;
                echo json_encode($arreglo);
            }
        }
        static function consultar_tipo_evaluacion(){
            $consulta = CatalogoTipoEvaluacion::select('id_cat_tipo_evaluacion','descripcion_corto')->get();
            echo '<option value="" selected>Seleccionar</option>';
            foreach($consulta as $tipoEval){
                echo '<option value="'.$tipoEval['id_cat_tipo_evaluacion'].'">'.$tipoEval['descripcion_corto'].'</option>';
            }
        }
        static function consultar_tipo_autorizacion(){
            $consulta = CatalogoAutorizacion::get();
            echo '<option value="" selected>Seleccionar tipo</option>';
            foreach($consulta as $tipoAutori){
                echo '<option value="'.$tipoAutori['id_cat_tipo_autorizacion'].'">'.$tipoAutori['descripcion'].'</option>';
            }
        }
    }
    call_user_func('InformacionCatalogos::' . $_POST['funcion']);
?>