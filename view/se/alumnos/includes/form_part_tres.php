<div id="form_part_tres">
    <div class="row align-items-end mb-3">
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating mb-3">
                <select name="carrera_reticula" class="form-control break_size" id="carrera_reticula"></select>
                <label for="carrera_reticula" class="text-primary"><i class="fas fa-book-reader me-2"></i> Carrera y Reticula</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating mb-3">
                <select name="especialidad" class="form-control break_size" id="especialidad"></select>
                <label for="especialidad" class="text-primary"><i class="fas fa-archive me-2"></i> Especialidad</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating mb-3">
                <input name="periodo_ingreso" type="text" class="form-control break_size" id="periodo_ingreso" readonly placeholder="Ciclo Escolar">
                <label for="periodo_ingreso" class="text-primary"><i class="fas fa-calendar-alt me-2"></i> Periodo Ingreso IT</label>

            </div>
            <input name="periodo_ingreso_id" type="text" class="form-control" id="periodo_ingreso_id" hidden>
        </div>
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="row">
                <div class="col-9">
                    <div class="form-floating mb-3">
                        <input name="periodos_revalidados" type="text" placeholder="0" class="form-control break_size" id="periodos_revalidados" placeholder="No seleccionado" disabled>
                        <label for="periodos_revalidados" class="text-primary small"><i class="fas fa-file-download me-2"></i> Periodos Revalidados</label>
                    </div>
                </div>
                <div class="col-3 align-self-center">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="cb_revalidado" name="cb_revalidado">
                        <label class="form-check-label" for="cb_revalidado"></label>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating mb-3">
                <select name="tipo_ingresos" class="form-control break_size" id="tipo_ingresos"></select>
                <label for="tipo_ingresos" class="text-primary"><i class="fas fa-stream me-2"></i> Tipo de Ingreso</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating mb-3">
                <input type="text" name="plan_est" id="plan_est" value="" hidden>
                <input name="plan_estudios" readonly type="text" class="form-control break_size" name="plan_estudios" id="plan_estudios" value="" placeholder="No seleccionado">
                <label for="plan_estudios" class="text-primary"><i class="fas fa-file-alt me-2"></i> Plan de Estudios</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating">
                <select name="nivel_escolar" class="form-control break_size" id="nivel_escolar"></select>
                <label for="nivel_escolar" class="text-primary"><i class="fas fa-graduation-cap me-2"></i> Nivel Escolar</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 text-start mt-md-2">
            <div class="form-floating">
                <select name="estatus_alumno" class="form-control break_size" id="estatus_alumno"></select>
                <label for="estatus_alumno" class="text-primary"><i class="fas fa-toggle-on me-2"></i> Estatus del Alumno</label>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="escuela_alumno" name="escuela_alumno" placeholder="Escuela de procedencia" value="">
                <label for="escuela_alumno" class="text-primary">Escuela de procedencia</label>
            </div>
        </div>
    </div>
</div>
</div>

<!-- 
    1.- Input -> name="" id="carrera_reticula"
    2.- Input -> name="" id="especialidad"
    3.- Input -> name="" id="periodo_ingreso"
    4.- Input -> name="" id="periodos_revalidados"
    5.- Input -> name="" id="tipo_ingresos"
    6.- Input -> name="" id="plan_estudios"
    7.- Input -> name="" id="nivel_escolar"
    8.- Input -> name="" id="estatus_alumno"
 -->