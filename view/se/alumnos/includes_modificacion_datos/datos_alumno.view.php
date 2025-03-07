<div class="container p-5 d-none" id="seccion_datos_alumno">
    <div class="row justify-content-center d-md-flex py-2">
        <h5 class="mb-4">Alumno a modificar</h5>
        <hr class="mt-1">
        <div class="col-lg-2 mt-4 text-center">
            <input type="text" id="id_usuario_alumno" name="id_usuario_alumno" value="" hidden>
            <div id="img_foto" class="thumb btn-hover d-flex">
                <button id="ver_img" type="button" class="align-self-center mx-auto d-block btn btn-primary btn-lg rounded-circle" title="Editar fotografia"><i class="fa-solid fa-camera mb-1 mt-1"></i></button>
                <!-- <img id="img_foto" class="thumb" src="public/img/user.png" title="fotografia" alt="fotografia"> -->
            </div>
        </div>
        <div class="col-lg-10">
            <div class="row justify-content-center mt-4 py-2">
                <div class="col-lg-6 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="nombre_completo_alumno" name="nombre_completo_alumno" value="" disabled>
                        <label for="nombre_completo_alumno" class="small">Nombre del alumno</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="numb" class="form-control small" id="numero_control" name="numero_control" value="" disabled>
                        <label for="numero_control" class="small">Numero de control</label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="form-floating mb-3">
                        <input type="numb" class="form-control small" id="semestre" name="semestre" value="" disabled>
                        <label for="floatingInputValue" class="small">Semestre</label>
                    </div>
                </div>

            </div>
            <div class="row py-2">
                <div class="col-lg-4 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="periodo_escolar" name="periodo_escolar" value="" disabled>
                        <label for="periodo_escolar" class="small">Periodo escolar</label>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="carrera" name="carrera" value="" disabled>
                        <label for="carrera" class="small">Carrera</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="prom_acumulado" name="prom_acumulado" value="" disabled>
                        <label for="prom_acumulado" class="small">Prom. acumulado</label>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control small" id="especialidad" name="especialidad" value="" disabled>
                        <label for="especialidad" class="small">Especialidad</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="opciones_alumno">
        <div class="row mt-5">
            <div class="col">
                <div class="lead">Datos a modificar</div>
                <hr class="mt-2">
            </div>
        </div>
        <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-3">
            <div class="col">
                <span class="btn w-100 p-0" id="op_datos_generales">
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-regular fa-file fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Datos generales</span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="col">
                <span class="btn w-100 p-0" id="op_datos_escolares" >
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-graduation-cap fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Datos escolares</span>
                        </div>
                    </div>
                </span>
            </div>
            <!-- <div class="col">
                <span class="btn w-100 p-0" id="op_datos_familiares">
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-people-roof fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Datos familiares</span>
                        </div>
                    </div>
                </span>
            </div>

            
            <div class="col">
                <span class="btn w-100 p-0" id="op_datos_trabajo">
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-briefcase fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Datos del trabajo del alumno</span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="col">
                <span class="btn w-100 p-0" id="op_datos_instituto">
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-school fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Cambio de instituto o equivalencia</span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="col">
                <span class="btn w-100 p-0" id="op_datos_socieconomicos">
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-file-invoice-dollar fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Datos socioeconómicos</span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="col">
                <span class="btn w-100 p-0" id="op_datos_emergencia">
                    <div class="card shadow p-3 itma2-card itma2-card-hover sin-scroll">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-kit-medical fa-4x mx-auto d-block"></i>
                            <span class="d-block mt-3 small">Datos de emergencia</span>
                        </div>
                    </div>
                </span>
            </div> -->
        </div>
        <div class="row mt-3">
            <div class="col text-end">
                <button id="btn_cancelar_info" class="btn btn-secondary text-white">Cancelar</button>
            </div>
        </div>
    </div>
</div>