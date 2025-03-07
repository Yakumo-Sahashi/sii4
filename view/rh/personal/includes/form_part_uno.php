<div id="form_part_uno" class="">
    <div class="row align-items-end mb-3 prueba justify-content-center mt-3">
        <div class="col-lg-4 col-md-6 col-sm-6 text-start">
            <div class="form-floating mb-3">
                <input name="apellido_paterno_empleado" type="text" class="form-control break_size" id="apellido_paterno_empleado" placeholder="Apellido" maxlength="100">
                <label for="apellido_paterno_empleado" class="text-primary"><i class="fas fa-portrait me-2"></i> Apellido Paterno</label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 text-start">
            <div class="form-floating mb-3">
                <input name="apellido_materno_empleado" type="text" class="form-control break_size" id="apellido_materno_empleado" placeholder="Apellido" maxlength="100">
                <label for="apellido_materno_empleado" class="text-primary"><i class="fas fa-portrait me-2"></i> Apellido Materno</label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 text-start">
            <div class="form-floating mb-3">
                <input name="nombres_empleado" type="text" class="form-control break_size" id="nombres_empleado" placeholder="Nombres" maxlength="100">
                <label for="nombres_empleado" class="text-primary"><i class="fas fa-user me-2"></i> Nombre (s)</label>
            </div>
        </div>
    </div>
    <div class="row align-items-end mb-3 justify-content-center">
        <div class="col-lg-4 col-md-6 text-start">
            <div class="form-floating mb-3">
                <select class="form-select" id="lugar_nacimiento_empleado" name="lugar_nacimiento_empleado">
                    <option value="">Seleccionar</option>
                    <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                    <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
                    <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
                    <option value="CAMPECHE">CAMPECHE</option>
                    <option value="COAHUILA">COAHUILA</option>
                    <option value="COLIMA">COLIMA</option>
                    <option value="CHIAPAS">CHIAPAS</option>
                    <option value="CHIHUAHUA">CHIHUAHUA</option>
                    <option value="DISTRITO FEDERAL">DISTRITO FEDERAL</option>
                    <option value="DURANGO">DURANGO</option>
                    <option value="ESTADO DE MEXICO">ESTADO DE MÉXICO</option>
                    <option value="GUANAJUATO">GUANAJUATO</option>
                    <option value="GUERRERO">GUERRERO</option>
                    <option value="HIDALGO">HIDALGO</option>
                    <option value="JALISCO">JALISCO</option>
                    <option value="MICHOACÁN">MICHOACÁN</option>
                    <option value="MORELOS">MORELOS</option>
                    <option value="NAYARIT">NAYARIT</option>
                    <option value="NUEVO LEÓN">NUEVO LEÓN</option>
                    <option value="OAXACA">OAXACA</option>
                    <option value="PUEBLA">PUEBLA</option>
                    <option value="QUERÉTARO">QUERÉTARO</option>
                    <option value="QUINTANA ROO">QUINTANA ROO</option>
                    <option value="SAN LUIS POTOSI">SAN LUIS POTOSÍ</option>
                    <option value="SINALOA">SINALOA</option>
                    <option value="SONORA">SONORA</option>
                    <option value="TABASCO">TABASCO</option>
                    <option value="TAMAULIPAS">TAMAULIPAS</option>
                    <option value="TLAXCALA">TLAXCALA</option>
                    <option value="VERACRUZ">VERACRUZ</option>
                    <option value="YUCATAN">YUCATÁN</option>
                    <option value="ZACATECAS">ZACATECAS</option>
                    <option value="NACIDO EN EL EXTRANJERO">NACIDO EN EL EXTRANJERO</option>
                </select>
                <label for="lugar_nacimiento_empleado" class="text-primary"><i class="fas fa-map me-2"></i> Lugar de Nacimiento</label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 text-start">
            <div class="form-floating mb-3">
                <input name="fecha_nacimiento_empleado" max="2004-12-31" date_format="YYYY-MM-DD" type="date" class="form-control" id="fecha_nacimiento_empleado" placeholder="Fecha">
                <label for="fecha_nacimiento_empleado" class="text-primary"><i class="fas fa-calendar-alt me-2"></i> Fecha de Nacimiento</label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 text-start">
            <div class="form-floating mb-3">
                <select class="form-select" name="selector_sexo_empleado" id="selector_sexo_empleado">
                    <option value="">Seleccionar</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
                <label for="selector_sexo_empleado" class="text-primary"><i class="fas fa-venus-mars fa-lg me-2"></i> Sexo</label>
            </div>
        </div>
    </div>
    <div class="row align-items-end mb-3 prueba justify-content-center">
        <div class="col-lg-4 col-md-6  col-sm-6 text-start">
            <div class="form-floating mb-3">
                <select class="form-select" name="selector_edo_civil_empleado" id="selector_edo_civil_empleado">
                    <option value="">Estado Civil</option>
                    <option value="1">Soltero</option>
                    <option value="2">Casado</option>
                    <option value="3">Divorciado</option>
                    <option value="4">Separación en proceso judicial</option>
                    <option value="5">Viudo</option>
                    <option value="6">Concubinato</option>
                </select>
                <label for="selector_edo_civil_empleado" id="label_mt" class="text-primary"><i class="fas fa-ring me-2"></i> Estado Civil</label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6  col-sm-6 text-start">
            <div class="form-floating mb-3">
                <input type="tel" class="form-control break_size" name="telefono_empleado" id="telefono_empleado" maxlength="10" placeholder="10 Digitos">
                <label for="telefono_empleado" class="text-primary"><i class="fas fa-phone-alt me-2"></i> Telefono</label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 text-start">
            <div class="form-floating mb-3">
                <input name="correo_electronico_empleado" type="email" class="form-control break_size" id="correo_electronico_empleado" placeholder="example@correo.com">
                <label for="correo_electronico_empleado" class="text-primary"><i class="fas fa-at me-2"></i> Correo Electronico</label>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-start">
            <div class="form-floating mb-3">
                <input name="curp_empleado" type="tel" class="form-control break_size" id="curp_empleado" placeholder="18 Caracteres" maxlength="18">
                <label for="curp_empleado" class="text-primary"><i class="fas fa-address-card me-2"></i> CURP </label>
            </div>
        </div>
    </div>
</div>

<!-- 
    1.- Input -> name="" id="apellido_paterno_empleado"
    2.- Input -> name="" id="apellido_materno_empleado"
    3.- Input -> name="" id="nombres_empleado"
    4.- Input -> name="" id="lugar_naciemiento_empleado"
    5.- Input -> name="" id="fecha_naciemiento_empleado"
    6.- Select -> id="selector_sexo_empleado"
    7.- Select -> id="selector_edo_civil_empleado"
    8.- Input -> name="" id="telefono_empleado"
    9.- Input -> name="" id="curp_empleado"
    10.- Input -> name="" id="correo-electronico_empleado"
 -->