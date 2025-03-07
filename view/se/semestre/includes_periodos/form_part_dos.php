<div class="d-none" id="form_part_dos">
    <div class="row justify-content-center py-2">
        <div class="col">
            <div class="mb-3">Examenes especiales</div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inicio_examen" name="inicio_examen" placeholder="Inicio" min="" max="">
                <label for="inicio_examen" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fin_examen" name="fin_examen" placeholder="Fin" min="" max="">
                <label for="fin_examen" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin</label>
            </div>
        </div>
        <div class="col">
            <div class="mb-3">Encuesta estudiantil</div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inicio_encuesta" name="inicio_encuesta" placeholder="Inicio" min="" max="">
                <label for="inicio_encuesta" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fin_encuesta" name="fin_encuesta" placeholder="Fin" min="" max="">
                <label for="fin_encuesta" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin</label>
            </div>
        </div>
        <hr class="my-2">
    </div>
    <div class="row justify-content-center py-2">
        <div class="mb-3">Seleccion de materias para los alumnos</div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inicio_seleccion" name="inicio_seleccion" placeholder="Inicio" min="" max="">
                <label for="inicio_seleccion" class="text-primary"><i class="fa-regular fa-calendar-check me-2"></i>Inicio</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="fin_seleccion" name="fin_seleccion" placeholder="Fin" min="" max="">
                <label for="fin_seleccion" class="text-primary"><i class="fa-regular fa-calendar-xmark me-2"></i>Fin</label>
            </div>
        </div>
    </div>  
    <div class="row justify-content-center py-2">
        <div class="col text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-danger" id="btn_cancelar">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_atras">Atras</button>
                <button type="button" id="btn_crear_periodo" class="btn btn-primary">Crear periodo</button>
            </div>
        </div>
    </div>
</div>