<?php use config\Token; ?>
<div class="container d-none" id="seccion_datos_socioeconomicos">
    <div class="row justify-content-center py-2">
        <h4 class="text-center mt-3 mb-5">Actualización de datos socioeconómicos</h4>
        <div class="col text-center">
            <div class="row d-md-flex justify-content-center mb-4">
                <h3 class="me-auto mb-4"></h3>
                <div class="col-lg-2 col-md-6 align-self-end text-center me-3">
                    <img class="icono-seccion fa-solid fa-file-invoice-dollar overflow-hidden text-primary mx-auto mb-4"></i>
                </div>
            </div>
        </div>
    </div>
    <form action="" id="frm_socioeconomico" name="frm_socioeconomico" method="POST">
        <input type="text" id="tk_frm" name="tk_frm" value="<?=Token::generar_token_frm("frm_socioeconomico")?>" hidden>
        <div class="row">
            <div class="small mt-3 mb-4">Nivel Máximo de estudios alcanzado de los padres, aunque hayan fallecido</div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="estudios_padre" name="estudios_padre">
                        <option value="" selected>Seleccionar nivel de estudios</option>
                        <option value="No lo se">No lo se</option>
                        <option value="No sabe leer ni escribir">No sabe leer ni escribir</option>
                        <option value="No fue a la escuela">No fue a la escuela</option>
                        <option value="No termino la Primaria">No termino la Primaria</option>
                        <option value="Termino la Primaria">Termino la Primaria</option>
                        <option value="Tiene alguna capacitación técnica despues de la Primaria">Tiene alguna capacitación técnica despues de la Primaria</option>
                        <option value="No termino la Secundaria">No termino la Secundaria</option>
                        <option value="Termino la Secundaria">Termino la Secundaria</option>
                        <option value="Tiene alguna capacitación técnica despues de la Secundaria">Tiene alguna capacitación técnica despues de la Secundaria</option>
                        <option value="Tiene estudios de técnico profesional incompletos">Tiene estudios de técnico profesional incompletos</option>
                        <option value="Tiene estudios de técnico profesional completos">Tiene estudios de técnico profesional completos</option>
                        <option value="No termino la Preparatoria o Bachillerato">No termino la Preparatoria o Bachillerato</option>
                        <option value="Termino la Preparatoria o Bachillerato">Termino la Preparatoria o Bachillerato</option>
                        <option value="No termino la licenciatura, Ingenieria o normal">No termino la licenciatura, Ingeniería o normal</option>
                        <option value="Termino la licenciatura, Ingenieria o normal">Termino la licenciatura, Ingeniería o normal</option>
                        <option value="No termino la Maestria o Doctorado">No termino la Maestría o Doctorado</option>
                        <option value="Termino la Maestria o Doctorado">Termino la Maestría o Doctorado</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="estudios_padre" class="text-primary"><i class="fa-solid fa-person me-2"></i>Padre</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="estudios_madre" name="estudios_madre">
                        <option value="" selected>Seleccionar nivel de estudios</option>
                        <option value="No lo se">No lo se</option>
                        <option value="No sabe leer ni escribir">No sabe leer ni escribir</option>
                        <option value="No fue a la escuela">No fue a la escuela</option>
                        <option value="No termino la Primaria">No termino la Primaria</option>
                        <option value="Termino la Primaria">Termino la Primaria</option>
                        <option value="Tiene alguna capacitación técnica despues de la Primaria">Tiene alguna capacitación técnica despues de la Primaria</option>
                        <option value="No termino la Secundaria">No termino la Secundaria</option>
                        <option value="Termino la Secundaria">Termino la Secundaria</option>
                        <option value="Tiene alguna capacitación técnica despues de la Secundaria">Tiene alguna capacitación técnica despues de la Secundaria</option>
                        <option value="Tiene estudios de técnico profesional incompletos">Tiene estudios de técnico profesional incompletos</option>
                        <option value="Tiene estudios de técnico profesional completos">Tiene estudios de técnico profesional completos</option>
                        <option value="No termino la Preparatoria o Bachillerato">No termino la Preparatoria o Bachillerato</option>
                        <option value="Termino la Preparatoria o Bachillerato">Termino la Preparatoria o Bachillerato</option>
                        <option value="No termino la licenciatura, Ingenieria o normal">No termino la licenciatura, Ingeniería o normal</option>
                        <option value="Termino la licenciatura, Ingenieria o normal">Termino la licenciatura, Ingeniería o normal</option>
                        <option value="No termino la Maestria o Doctorado">No termino la Maestría o Doctorado</option>
                        <option value="Termino la Maestria o Doctorado">Termino la Maestría o Doctorado</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="estudios_madre" class="text-primary"><i class="fa-solid fa-person-dress me-2"></i>Madre</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="vive_actualmente" name="vive_actualmente">
                        <option value="" selected>Seleccionar opción</option>
                        <option value="Padre y Madre">Padre y Madre</option>
                        <option value="Padre">Padre</option>
                        <option value="Madre">Madre</option>
                        <option value="Herman@ o Herman@s">Herman@ o Herman@s</option>
                        <option value="Cónyuge o pareja">Cónyuge o pareja</option>
                        <option value="Otro familiar">Otro familiar</option>
                        <option value="Amig@ o amig@s">Amigo o amigos</option>
                        <option value="Solo">Solo</option>
                        <option value="Hijos">Hijos</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="vive_actualmente" class="text-primary"><i class="fa-solid fa-people-roof me-2"></i>Con quien vives actualmente</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="depende_economicamente" name="depende_economicamente">
                        <option value="" selected>Seleccionar opción</option>
                        <option value="Padre y Madre">Padre y Madre</option>
                        <option value="Padre, Madre y yo mismo">Padre, Madre y yo mismo</option>
                        <option value="Padre">Padre</option>
                        <option value="Padre y yo mismo">Padre y yo mismo</option>
                        <option value="Madre">Madre</option>
                        <option value="Madre y yo mismo">Madre y yo mismo</option>
                        <option value="Hermanos">Hermanos</option>
                        <option value="Hermanos y yo mismo">Hermanos y yo mismo</option>
                        <option value="Cónyuge o pareja">Cónyuge o pareja</option>
                        <option value="Cónyuge/pareja y yo mismo">Cónyuge/pareja y yo mismo</option>
                        <option value="Otro familiar o amigo">Otro familiar o amigo</option>
                        <option value="Yo mismo">Yo mismo</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="depende_economicamente" class="text-primary small"><i class="fa-solid fa-money-bill me-2"></i>De quien dependes económicamente</label>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="small my-4">Ingresos familiares mensuales</div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ingreso_padre" name="ingreso_padre" placeholder="Padre" value="">
                    <label for="ingreso_padre" class="text-primary">Padre</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ingreso_madre" name="ingreso_madre" placeholder="Madre" value="">
                    <label for="ingreso_madre" class="text-primary">Madre</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ingreso_hermanos" name="ingreso_hermanos" placeholder="Hermanos" value="">
                    <label for="ingreso_hermanos" class="text-primary">Hermanos</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ingresos_propios" name="ingresos_propios" placeholder="Propios" value="">
                    <label for="ingresos_propios" class="text-primary">Propios</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ingresos_otros" name="ingresos_otros" placeholder="Otros" value="">
                    <label for="ingresos_otros" class="text-primary">Otros</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ingresos_totales" name="ingresos_totales" placeholder="Total ingresos" value="" readonly>
                    <label for="ingresos_totales" class="text-primary small">Total ingresos</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small mt-5 mb-4">¿Cuáles la ocupación o Trabajo de tus padres o tutores?</div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="ocupacion_padre" name="ocupacion_padre">
                        <option value="" selected>Seleccionar ocupación</option>
                        <option value="No lo se">No lo se</option>
                        <option value="Labores del hogar">Labores del hogar</option>
                        <option value="Dueno de negocio, empresa, despacho o comercio estable">Dueño de negocio, empresa, despacho o comercio estable</option>
                        <option value="Profesor, Investigador">Profesor, Investigador</option>
                        <option value="Profesionita que ejerce por su cuenta">Profesionita que ejerce por su cuenta</option>
                        <option value="Obrero">Obrero</option>
                        <option value="Ganadero, Agricultor o similar">Ganadero, Agricultor o similar</option>
                        <option value="Campesino, Jornalero, Pescador o similar">Campesino, Jornalero, Pescador o similar</option>
                        <option value="Jubilado o pensionado">Jubilado o pensionado</option>
                        <option value="Funcionario o gerente de una empresa privada">Funcionario o gerente de una empresa privada</option>
                        <option value="Funcionario de una empresa publica">Funcionario de una empresa publica</option>
                        <option value="Empleado, oficinista o secretari@ de empresa privada">Empleado, oficinista o secretari@ de empresa privada</option>
                        <option value="Burocrata, oficinista o secretari@ de empresa publica">Burocrata, oficinista o secretari@ de empresa publica</option>
                        <option value="Trabahador de oficio con personal a su cargo">Trabahador de oficio con personal a su cargo</option>
                        <option value="Vendedor en comercio o empresa">Vendedor en comercio o empresa</option>
                        <option value="Vendedor por su cuenta o ambulante">Vendedor por su cuenta o ambulante</option>
                        <option value="Peon, ayudante, mozo o emplead@ domestic@">Peon, ayudante, mozo o emplead@ domestic@</option>
                        <option value="Miembro de las fuerzas armadas">Miembro de las fuerzas armadas</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="ocupacion_padre" class="text-primary">Padre</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-select" id="ocupacion_madre" name="ocupacion_madre">
                        <option value="" selected>Seleccionar ocupación</option>
                        <option value="No lo se">No lo se</option>
                        <option value="Labores del hogar">Labores del hogar</option>
                        <option value="Dueno de negocio, empresa, despacho o comercio estable">Dueño de negocio, empresa, despacho o comercio estable</option>
                        <option value="Profesor, Investigador">Profesor, Investigador</option>
                        <option value="Profesionita que ejerce por su cuenta">Profesionita que ejerce por su cuenta</option>
                        <option value="Obrero">Obrero</option>
                        <option value="Ganadero, Agricultor o similar">Ganadero, Agricultor o similar</option>
                        <option value="Campesino, Jornalero, Pescador o similar">Campesino, Jornalero, Pescador o similar</option>
                        <option value="Jubilado o pensionado">Jubilado o pensionado</option>
                        <option value="Funcionario o gerente de una empresa privada">Funcionario o gerente de una empresa privada</option>
                        <option value="Funcionario de una empresa publica">Funcionario de una empresa publica</option>
                        <option value="Empleado, oficinista o secretari@ de empresa privada">Empleado, oficinista o secretari@ de empresa privada</option>
                        <option value="Burocrata, oficinista o secretari@ de empresa publica">Burocrata, oficinista o secretari@ de empresa publica</option>
                        <option value="Trabahador de oficio con personal a su cargo">Trabahador de oficio con personal a su cargo</option>
                        <option value="Vendedor en comercio o empresa">Vendedor en comercio o empresa</option>
                        <option value="Vendedor por su cuenta o ambulante">Vendedor por su cuenta o ambulante</option>
                        <option value="Peon, ayudante, mozo o emplead@ domestic@">Peon, ayudante, mozo o emplead@ domestic@</option>
                        <option value="Miembro de las fuerzas armadas">Miembro de las fuerzas armadas</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="ocupacion_madre" class="text-primary">Madre</label>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-6">
                <div class="form-floating mb-4">
                    <select class="form-select" id="casa_donde_vive" name="casa_donde_vive">
                        <option value="" selected>Seleccionar opción</option>
                        <option value="Propia">Propia</option>
                        <option value="Rentada">Rentada</option>
                        <option value="Prestada">Prestada</option>
                        <option value="Se esta pagando">Se esta pagando</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <label for="casa_donde_vive" class="text-primary small">¿La casa donde vives es?</label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="num_personas_viven_casa" name="num_personas_viven_casa">
                        <option selected>Seleccionar opción</option>
                        <option value="Uno">Uno</option>
                        <option value="Dos">Dos</option>
                        <option value="Tres">Tres</option>
                        <option value="Cuatro">Cuatro</option>
                        <option value="Cinco">Cinco</option>
                        <option value="Seis">Seis</option>
                        <option value="Siete">Siete</option>
                        <option value="Ocho">Ocho</option>
                        <option value="Nueve">Nueve</option>
                        <option value="Mas de nueve">Mas de nueve</option>
                    </select>
                    <label for="num_personas_viven_casa" class="text-primary">¿Cuantas personas viven en la casa?</label>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-floating mb-3">
                    <select class="form-select" id="num_cuartos_casa" name="num_cuartos_casa">
                        <option selected>Seleccionar opción</option>
                        <option value="Uno">Uno</option>
                        <option value="Dos">Dos</option>
                        <option value="Tres">Tres</option>
                        <option value="Cuatro">Cuatro</option>
                        <option value="Cinco">Cinco</option>
                        <option value="Seis">Seis</option>
                        <option value="Siete">Siete</option>
                        <option value="Ocho">Ocho</option>
                        <option value="Nueve">Nueve</option>
                        <option value="Mas de nueve">Mas de nueve</option>
                    </select>
                    <label for="num_cuartos_casa" class="text-primary text-small">¿Cuántos cuartos tiene la casa? (sin contar baños ni pasillos)</label>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-floating mb-3">
                    <select class="form-select" id="num_personas_dependen_economicamente" name="num_personas_dependen_economicamente">
                        <option selected>Seleccionar opción</option>
                        <option value="Uno">Uno</option>
                        <option value="Dos">Dos</option>
                        <option value="Tres">Tres</option>
                        <option value="Cuatro">Cuatro</option>
                        <option value="Cinco">Cinco</option>
                        <option value="Seis">Seis</option>
                        <option value="Siete">Siete</option>
                        <option value="Ocho">Ocho</option>
                        <option value="Nueve">Nueve</option>
                        <option value="Mas de nueve">Mas de nueve</option>
                    </select>
                    <label for="num_personas_dependen_economicamente" class="text-primary text-small">Cuántas personas incluyéndotea ti, dependen económicamente del principal apoyo o sustento</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="button" class="btn btn-secondary text-white" id="btn_canc_socioeconomicos">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_act_socioeconomicos">Actualizar</button>
            </div>
        </div>
    </form>
</div>