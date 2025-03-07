<div class="d-none" id="consulta_docentes">
    <!-- id="seccion_titulo_docente" -->
<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <h4>Consulta por docente</h4>
        </div>
    </div>
</div>
<!--  id="seccion_frm_docente" -->
<div class="container p-5">
    <form action="" id="frm_docente" name="frm_docente">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="docente_periodo" name="docente_periodo">
                        <option selected>Seleccionar Periodo</option>
                    </select>
                    <label for="docente_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Periodo</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="docente_rfc" name="docente_rfc">
                        <option selected>Seleccionar RFC</option>
                    </select>
                    <label for="docente_rfc" class="text-primary"><i class="fa-regular fa-id-badge me-2"></i></i>RFC</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-danger my-3" id="btn_cancelar_docente">Cancelar</button>
                <button class="btn btn-primary my-3" id="btn_consultar_docente">Consultar</button>
            </div>
        </div>
    </form>
</div>
<div class="container" id="seccion_tabla_docente">
    <div class="row justify-content-around">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="tabla_docente">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Materia</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Excl car</th>
                            <th scope="col">cap</th>
                            <th scope="col">Lun</th>
                            <th scope="col">Mar</th>
                            <th scope="col">Mie</th>
                            <th scope="col">Jue</th>
                            <th scope="col">Vie</th>
                            <th scope="col">Sab</th>
                            <th scope="col">Paralelo de</th>
                        </tr>
                        <thead>
                        <tbody id="contenido_tabla_docente">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>