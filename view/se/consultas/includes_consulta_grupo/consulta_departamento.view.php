<div class="d-none" id="consulta_departamento">
<!-- id="seccion_titulo_departamento" -->
<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <h4>Consulta por departamento</h4>
        </div>
    </div>
</div>
<!-- id: id="seccion_frm_departamento" -->
<div class="container p-5">
    <form action="" id="frm_departameto" name="frm_departameto">
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento" name="departamento">
                        <option selected>Seleccionar departamento</option>
                    </select>
                    <label for="departamento" class="text-primary"><i class="fa-solid fa-users-rectangle me-2"></i>Departamento</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento_carrera" name="departamento_carrera">
                        <option selected>Seleccionar carrera</option>
                    </select>
                    <label for="departamento_carrera" class="text-primary"><i class="fa-solid fa-graduation-cap me-2"></i>Carrera</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento_periodo" name="departamento_periodo">
                        <option selected>Seleccionar Perido</option>
                    </select>
                    <label for="departamento_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento_semestre" name="departamento_semestre">
                        <option selected>Seleccionar semestre</option>
                    </select>
                    <label for="departamento_semestre" class="text-primary"><i class="fa-regular fa-chart-bar me-2"></i>Semestre</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="departamento_orden" name="departamento_orden">
                        <option selected>Seleccionar orden</option>
                    </select>
                    <label for="departamento_orden" class="text-primary"><i class="fa-solid fa-arrow-up-wide-short me-2"></i>Ordenado por</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-danger my-3" id="btn_cancelar_departamento">Cancelar</button>
                <button class="btn btn-primary my-3" id="btn_consultar_departamento">Consultar</button>
            </div>
        </div>
    </form>
</div>
<div class="container" id="seccion_tabla_departamento">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_departamento">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Excl car</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo de</th>
                            <th scope="col">Cap</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_departamento">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>