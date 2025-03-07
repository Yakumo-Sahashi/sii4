<div class="d-none" id="consulta_carrera">
    <!--  id="seccion_titulo_carrera" -->
<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <h4>Consulta por carrera</h4>
        </div>
    </div>
</div>
<!--  id="seccion_frm_carrera" -->
<div class="container p-5">
    <form action="" id="frm_carrera" name="frm_carrera">
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera" name="carrera">
                        <option selected>Seleccionar carrera</option>
                    </select>
                    <label for="carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_periodo" name="carrera_periodo">
                        <option selected>Seleccionar Perido</option>
                    </select>
                    <label for="carrera_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="carrera_semestre" name="carrera_semestre">
                        <option selected>Seleccionar semestre</option>
                    </select>
                    <label for="carrera_semestre" class="text-primary"><i class="fa-regular fa-chart-bar me-2"></i>Semestre</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-danger my-3" id="btn_cancelar_carrera">Cancelar</button>
                <button class="btn btn-primary my-3" id="btn_consultar_carrera">Consultar</button>
            </div>
        </div>
    </form>
</div>
<div class="container" id="seccion_tabla_carrera">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_carrera">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Excl car</th>
                            <th scope="col">cap</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo de</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_carrera">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>