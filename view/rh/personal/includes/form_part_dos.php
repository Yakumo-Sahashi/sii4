<div id="form_part_dos">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-12">
                <div id="check_ditar"></div>
                <div class="form-check mb-3 form-switch mt-5">
                    <input class="" type="checkbox" id="escritura_manual" name="escritura_manual">
                    <label class="" for="escritura_manual">Edicion Manual</label>
                    <!-- <button type="button" class="btn borded-0 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Escritura manual de Colonia, Alcaldia y Estado.">
                    <i class="fas fa-question-circle"></i>
                </button> -->
                </div>
            </div>
        </div>
        <div class="row align-items-end mb-3">
            <div class="col-lg-3 col-md-6 col-sm-6 text-start">
                <div class="form-floating mb-3">
                    <input name="codigo_postal_empleado" type="text" maxLength="5" class="form-control break_size" id="codigo_postal_empleado" value="" placeholder="CP. 00000">
                    <label for="codigo_postal_empleado" class="text-primary"><i class="fas fa-sort-numeric-up-alt me-2"></i> Codigo Postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="estado_empleado" type="text" class="form-control break_size" value="" id="estado_empleado" readonly placeholder="Estado">
                    <label for="estado_empleado" class="text-primary"><i class="fas fa-map-marked me-2"></i> Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="alcaldia_empleado" type="text" class="form-control break_size" id="alcaldia_empleado" readonly placeholder="Alcaldia">
                    <label for="alcaldia_empleado" class="text-primary"><i class="fas fa-archway me-2"></i>Alcaldia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 text-start mt-md-2 ">
                <div class="form-floating mb-3">
                    <select name="colonia_empleado" class="form-control break_size" id="colonia_empleado"></select>
                    <label for="colonia_empleado" class="text-primary"><i class="fas fa-map me-2"></i> Colonia</label>
                </div>
            </div>
        </div>
        <div class="row align-items-end justify-content-center mb-3">
            <div class="col-lg-4 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="calle_empleado" type="text" class="form-control break_size" id="calle_empleado" placeholder="Calle">
                    <label for="calle_empleado" class="text-primary"><i class="fas fa-directions me-2"></i> Calle</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="no_exterior_empleado" type="text" class="form-control break_size" id="no_exterior_empleado" placeholder="Mz. 0000">
                    <label for="no_exterior_empleado" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="no_interior_empleado" type="text" class="form-control break_size" id="no_interior_empleado" placeholder="Lt. 0000">
                    <label for="no_interior_empleado" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    1.- Input -> name="" id="codigo_postal_empleado"
    2.- Input -> name="" id="estado_empleado"
    3.- Input -> name="" id="alcaldia_empleado"
    4.- Input -> name="" id="colonia_empleado"
    5.- Input -> name="" id="calle_empleado"
    6.- Input -> name="" id="no_exterior_empleado"
    7.- Input -> name="" id="no_interior_empleado"
    
 -->