<div id="form_part_dos">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-12">
                <!-- <div id="check_ditar"></div> -->
                <div class="form-check form-switch mt-5">
                    <input class="" type="checkbox" id="escritura_manual" name="escritura_manual">
                    <label class="" for="escritura_manual">Edicion Manual</label>
                    <!-- <button type="button" class="btn borded-0 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Escritura manual de Colonia, Alcaldia y Estado.">
                    <i class="fas fa-question-circle"></i>
                </button> -->
                </div>
            </div>
        </div>
        <div class="row align-items-end mb-3">
            <div class="col-lg-3 col-md-6 text-start">
                <div class="form-floating mb-3">
                    <input name="codigo_postal" type="text" maxLength="5" class="form-control break_size" id="codigo_postal" value="" placeholder="CP. 00000">
                    <label for="codigo_postal" class="text-primary"><i class="fas fa-sort-numeric-up-alt me-2"></i> Codigo Postal</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="estado" type="text" class="form-control break_size" value="" id="estado" readonly placeholder="Estado">
                    <label for="estado" class="text-primary"><i class="fas fa-map-marked me-2"></i> Estado</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="alcaldia" type="text" class="form-control break_size" id="alcaldia" readonly placeholder="Alcaldia">
                    <label for="alcaldia" class="text-primary"><i class="fas fa-archway me-2"></i>Alcaldia</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-9 text-start mt-md-2 ">
                <div class="form-floating mb-3">
                    <select name="colonia" class="form-control break_size" id="colonia"></select>
                    <label for="colonia" class="text-primary"><i class="fas fa-map me-2"></i> Colonia</label>
                </div>
            </div>
        </div>
        <div class="row align-items-end justify-content-center mb-3">
            <div class="col-lg-4 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="calle" type="text" class="form-control break_size" id="calle" placeholder="Calle">
                    <label for="calle" class="text-primary"><i class="fas fa-directions me-2"></i> Calle</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="no_exterior" type="text" class="form-control break_size" id="no_exterior" placeholder="Mz. 0000">
                    <label for="no_exterior" class="text-primary"><i class="fas fa-sort-numeric-up me-2"></i> No. Exterior</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-start mt-md-2">
                <div class="form-floating mb-3">
                    <input name="no_interior" type="text" class="form-control break_size" id="no_interior" placeholder="Lt. 0000">
                    <label for="no_interior" class="text-primary"><i class="fas fa-sort-numeric-down-alt me-2"></i> No. Interior</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    1.- Input -> name="" id="codigo_postal"
    2.- Input -> name="" id="estado"
    3.- Input -> name="" id="alcaldia"
    4.- Input -> name="" id="colonia"
    5.- Input -> name="" id="calle"
    6.- Input -> name="" id="no_exterior"
    7.- Input -> name="" id="no_interior"
    
 -->