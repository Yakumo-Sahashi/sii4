<div id="form_part_uno">
    <div class="row justify-content-center py-2">
        <div class="col">
            <div class="form-floating">
                <input class="form-control" id="year" name="year" value="" readonly>
                <label for="floatingSelect" class="text-primary"> <i class="fa-regular fa-calendar me-2"></i>Año</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating">
                <select class="form-select" id="periodo" name="periodo">
                    <option value="" selected>Seleccionar periodo</option>
                    <option value="1">Enero - Junio</option>
                    <option value="2">Verano</option>
                    <option value="3">Agosto - Diciembre</option>
                </select>
                <label for="periodo" class="text-primary"> <i class="fa-solid fa-calendar me-2"></i>Periodo</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="dias_clase" name="dias_clase">
                <label for="dias_clase" class="text-primary"><i class="fa-solid fa-list-ol me-2"></i>Dias de clase</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-center py-2">
        <div class="col">
            <div class="form-floating">
                <input type="date" class="form-control" id="inicio_periodo" name="inicio_periodo" min="<?=$fecha_actual?>" max="">
                <label for="inicio_periodo" class="text-primary"><i class="fa-regular fa-calendar me-2"></i>Inicio Periodo</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating">
                <input type="date" class="form-control" id="fin_periodo" name="fin_periodo" min="" max="">
                <label for="fin_periodo" class="text-primary"><i class="fa-solid fa-calendar me-2"></i>Fin Periodo</label>
            </div>
        </div>
    </div>
    <hr class="my-2">
    <div class="row justify-content-center py-2">
        <div class="col">
            <div class="mb-3">Peridodo vacacional</div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inicio_vacaciones" name="inicio_vacaciones" placeholder="Inicio" min="" max="">
                <label for="inicio_vacaciones" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio Vacacional</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fin_vacaciones" name="fin_vacaciones" placeholder="Fin" min="" max="">
                <label for="fin_vacaciones" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin Vacacional</label>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">Encuesta estudiantil</div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inicio_encuesta" name="inicio_encuesta" placeholder="Inicio" min="" max="">
                <label for="inicio_encuesta" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio Encuesta</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fin_encuesta" name="fin_encuesta" placeholder="Fin" min="" max="">
                <label for="fin_encuesta" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin Encuesta</label>
            </div>
        </div>
        <!-- <div class="col">
            <div class="mb-3">Seleccion de materias para los alumnos</div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inicio_seleccion" name="inicio_seleccion" placeholder="Inicio" min="" max="">
                <label for="inicio_seleccion" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fin_seleccion" name="fin_seleccion" placeholder="Fin" min="" max="">
                <label for="fin_seleccion" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin</label>
            </div>
        </div> -->
    </div>
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" id="btn_crear_periodo" class="btn btn-primary">Crear periodo</button>
            </div>
        </div>
    </div>
</div>