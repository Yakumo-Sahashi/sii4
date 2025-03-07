let ex_numeros = /[0-9]$/;
const obtener_kardex = async (alumno) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','consultar_kardex');
    datos.append('alumno',alumno);
    const ejecucion = new Consultas("Kardex", datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        let {id_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,semestre,nombre_carrera,especialidad,clave_reticula,kardex,id_usuario,periodos_revalidados} = resultado[1];
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
        $('[name=numero_control]').val(`${numero_control}`);  
        $('[name=semestre]').val(`${semestre + periodos_revalidados}`);  
        $('[name=carrera]').val(`${nombre_carrera}`);  
        $('[name=especialidad]').val(`${especialidad}`);   
        $('[name=plan_estudios]').val(`${clave_reticula}`);
        $('#img_foto_k').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`)
        let tabla = `
            <tr class="bg-primary text-white">
                <th COLSPAN="2">No. Control</th>
                <th COLSPAN="3">Nombre</th>
                <th COLSPAN="2">Plan de estudios</th>
            </tr>
            <tr style="background: rgb(221,221,221);">
                <td COLSPAN="2">${numero_control}</td>
                <td COLSPAN="3">${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}</td>
                <td COLSPAN="2">${clave_reticula}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th COLSPAN="2">Semestre</th>
                <th COLSPAN="3">Carrera</th>
                <th COLSPAN="2">Especialidad</th>
            </tr>
            <tr style="background: rgb(221,221,221);">
                <td COLSPAN="2">${semestre}</td>
                <td COLSPAN="3">${nombre_carrera}</td>
                <td COLSPAN="2">${especialidad}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th>No.</th>
                <th COLSPAN="2">Materia</th>
                <th>Creditos</th>
                <th>Calificacion</th>
                <th>Evaluacion</th>
                <th>Observaciones</th>
            </tr>
        `;
        let cont_apro = 0, cont_total = 0, cont2 = 1, prom_semestre = 0, creditos_semestre = 0, creditos_totales_semestre = 0, creditos_totales_carrera = 0, aprobados = 0, prom_cert = 0;
        let ids = Object.keys(kardex);
        ids.map(identificador => {
            cont2 = 1;
            prom_semestre = 0;
            creditos_semestre = 0;
            creditos_totales_semestre = 0;
            tabla +=`
                <tr style="background: rgb(221,221,221);">
                    <td colspan="7"><b>[${identificador}]</b></td>
                </tr>`;
            kardex[identificador].map(({clave_oficial,nombre_completo_materia,creditos_totales,calificacion,descripcion_corto} = contenido) => {
                tabla +=`
                <tr style="background: rgb(221,221,221);">
                    <td>${cont2}</td>
                    <td class="align-self"-center>${clave_oficial}</td>
                    <td class="text-start">${nombre_completo_materia}</td>
                    <td>${creditos_totales}</td>
                    <td>${calificacion}</td>
                    <td>${descripcion_corto}</td>
                    <td></td>
                </tr>    
                `;
                prom_semestre += calificacion == 'NA' ? 0 : parseInt(calificacion);
                creditos_semestre += calificacion == 'NA' ? 0 : parseInt(creditos_totales);
                creditos_totales_semestre += parseInt(creditos_totales);
                creditos_totales_carrera += parseInt(creditos_totales);
                cont2++;
                cont_total ++;
                cont_apro += calificacion == 'NA' ? 0 : 1;
                prom_cert += calificacion == 'NA' ? 0 : parseInt(calificacion);
            });
            aprobados += creditos_semestre;
            tabla += `
            <tr style="background: rgb(221,221,221);">
                <td colspan="3"></td>
                <td><b>Promedio Semestral</b></td>
                <td class="align-self-center"><b>${Math.round(((prom_semestre/(cont2-1)) + Number.EPSILON) *100)/100}</b></td>
                <td><b>Creditos Cur./Aprob.</b></td>
                <td class="align-self-center"><b>${creditos_semestre}/${creditos_totales_semestre}</b></td>
            </tr>       
            `;
        });
        tabla += `
        <tr>
            <th COLSPAN="3"></th>
            <th class="bg-primary text-white">Promedio Aritmetico:</th>
            <th style="background: rgb(221,221,221);">${Math.round(((prom_cert/cont_total) + Number.EPSILON) *100)/100}</th>
            <th class="bg-primary text-white">Creditos Cusados:</th>
            <th style="background: rgb(221,221,221);">${creditos_totales_carrera}</th>
        </tr>
        <tr>
            <th COLSPAN="3"></th>
            <th class="bg-primary text-white">Promedio Certificado:</th>
            <th style="background: rgb(221,221,221);">${Math.round(((prom_cert/cont_apro) + Number.EPSILON) *100)/100}</th>
            <th class="bg-primary text-white">Creditos Aprobados:</th>
            <th style="background: rgb(221,221,221);">${aprobados}</th>
        </tr>
        `;
        $('#tabla_contenido_kardex').html(tabla);
        $('#container_tabla').addClass('d-none');
        $('#datos_alumno').removeClass('d-none');
        $('#container_tablas_kardex').removeClass('d-none');
    }
    bootstrap.Itma2.end_loader();
}

const precargar_informacion = async (alumno,persona) => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion', 'informacion_general');
    datos.append('alumno', alumno);
    datos.append('persona',persona);
    const ejecucion = new Consultas("AlumnosGenerales", datos);
    let respuesta = await ejecucion.consulta();
    let {numero_control,nombre_carrera,tipo_ingreso,clave_reticula,identificacion_corta,periodos_revalidados,escolaridad,descripcion_estatus,especialidad} = respuesta[1];
    let {apellido_paterno,apellido_materno,nombre_persona,curp,telefono,correo,fecha_nacimiento,lugar_nacimiento,estado_civil,sexo,codigo_postal,entidad_federativa,alcaldia,colonia,calle,numero_interior,numero_exterior,id_usuario} = respuesta[0];
    let contenido = `
        <tr class="bg-claro">
            <td colspan="4">
                <b>DATOS PERSONALES</b>
            </td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Nombre</td>
            <td>No. control</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${apellido_paterno}</td>
            <td class="align-middle">${apellido_materno}</td>
            <td class="align-middle">${nombre_persona}</td>
            <td class="align-middle">${numero_control}</td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Lugar nacimiento</td>
            <td>Fecha nacimiento</td>
            <td>Sexo</td>
            <td>Estado civil</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${lugar_nacimiento}</td>
            <td class="align-middle">${fecha_nacimiento}</td>
            <td class="align-middle">${sexo}</td>
            <td class="align-middle">${estado_civil}</td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Domicilio</td>
            <td>Colonia</td>
            <td>C.P</td>
            <td>Alcaldia</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${calle}, No. Ext. ${numero_exterior}, No. Int. ${numero_interior}</td>
            <td class="align-middle">${colonia}</td>
            <td class="align-middle">${codigo_postal}</td>
            <td class="align-middle">${alcaldia}</td>
        </tr>  
        <tr class="text-small bg-primary text-white text-center">
            <td>Estado</td>
            <td>Telefono</td>
            <td>CURP</td>
            <td>Correo electronico</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${entidad_federativa}</td>
            <td class="align-middle">${telefono}</td>
            <td class="align-middle">${curp}</td>
            <td class="align-middle">${correo}</td>
        </tr>   
        <tr>
            <td><br></td>
        <tr/>
        <tr class="bg-claro">
            <td colspan="4">
                <b>DATOS ESCOLARES</b>
            </td>
        </tr>
        <tr class="text-small bg-primary text-white text-center">
            <td>Carrera y Reticula</td>
            <td>Especialidad</td>
            <td>Periodo ingreso</td>
            <td>Periodos revalidados</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${nombre_carrera}</td>
            <td class="align-middle">${especialidad}</td>
            <td class="align-middle">${identificacion_corta}</td>
            <td class="align-middle">${periodos_revalidados}</td>
        </tr>  
        <tr class="text-small bg-primary text-white text-center">
            <td>Tipo de ingreso al plantel</td>
            <td>Plan de estudios</td>
            <td>Nivel escolar</td>
            <td>Estatus alumno</td>
        </tr>
        <tr class="text-small bg-claro">
            <td class="align-middle">${tipo_ingreso}</td>
            <td class="align-middle">${clave_reticula}</td>
            <td class="align-middle">Licenciatura</td>
            <td class="align-middle">${descripcion_estatus}</td>
        </tr>   
    `;
    $('#contenido_tabla_datos_alumno').html(contenido);
    $('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`)
    $('#datos_generales').modal('show');
    bootstrap.Itma2.end_loader();
}

const filtrar_contenido = async () => {
    bootstrap.Itma2.start_loader();
    $(`#contenido_tabla_alum_gral`).html(``);
    $('#tabla_alumnos_gral').DataTable().destroy();
    let datos = new FormData($('#frm_busqueda')[0]);
    datos.append('funcion', 'consultar_alumno_general');
    const ejecucion = new Consultas("AlumnosGenerales", datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``;
    respuesta.map(alumno => {
        let { id_alumno,fk_persona, numero_control, nombre_persona, apellido_paterno, apellido_materno, carrera,fk_numero_control,fk_cat_carrera,nombre_carrera,especialidad} = alumno;
        tabla += `
        <tr>
            <td class="align-middle text-small">${numero_control}</td>
            <td class="align-middle text-small">${apellido_paterno} ${apellido_materno} ${nombre_persona}</td>
            <td class="align-middle text-small">${carrera}</td>
            <td><button type="button" class="btn btn-outline-primary" onclick="precargar_informacion(${id_alumno},${fk_persona})"><i class="fa-solid fa-circle-info"></i></button></td>
            <td class="align-middle"><button type="button" class="btn btn-outline-primary" onclick="reticula_avance(${fk_cat_carrera},${fk_numero_control})"><i class="fa-solid fa-table-list"></i></button></td>
            <td class="align-middle">
                <form action="app/docs/horario_alumno.doc.php" method="POST" targe="_blank">
                    <input type="text" name="alumno" value="${id_alumno}" hidden>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-regular fa-calendar-days"></i></butto>
                </form>
            </td>
            <td class="align-middle"><button type="button" class="btn btn-outline-primary" onclick="obtener_kardex(${id_alumno})"><i class="fa-solid fa-address-card"></i></td>
        </tr>
        `;
        $('#carrera_elegida').text(nombre_carrera);
        $('#especialidad_elegida').text(especialidad);
    });
    $(`#contenido_tabla_alum_gral`).html(`${tabla}`);
    $('#tabla_alumnos_gral').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    $('#container_tabla').removeClass('d-none');
    $('#buscador').addClass('d-none');
    bootstrap.Itma2.end_loader();
}

const reticula_avance = async (id_carrera,id_num_control) =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion',"obtener_movimientos");
    datos.append('id_carrera',id_carrera);
    datos.append('id_num_control',id_num_control);
    const ejecucion = new Consultas("InscripcionPeriodo",datos);
    let respuesta = await ejecucion.consulta();
    let materias = respuesta[0];
    let calificaciones = respuesta[1];
    let horarios = respuesta[2];
    let cont = 0, temp = 1, posicion = 0;;
    let contenido = ``, texto= '';
    const semestres = [];
    for(let i = 1; i < 10; i++){
        semestres[i] = new Array();
        for(let j = 1 ; j < 9; j++){
            semestres[i][j] = '';
        }
    }
    materias.map(({semestre,renglon} = reticula_carrera) =>{
        semestres[semestre][renglon] = materias[cont];
        cont++;
    });
    cont = 0;
    let impresion = 0;
    semestres.map(materias_plan => {
        if(materias_plan != ''){
            materias_plan.map(({id_cat_materias,clave,nombre_abreviado_materia} = info) =>{
                if(nombre_abreviado_materia != undefined){
                    calificaciones.map(({calificacion,siglas,fk_cat_materias, color} = calf) =>{
                        if(fk_cat_materias == id_cat_materias){
                            contenido += `
                                <div class="p-1 text-center border cuadricula text-small sin-scroll ${color}">
                                    <div class="mt-1">
                                        <b>${clave}<br>
                                        ${nombre_abreviado_materia}</b><br>
                                        ${ex_numeros.test(calificacion) && calificacion != 0 ? calificacion +'  / ' +siglas : ''}                                        
                                    </div>
                                </div>
                            `;
                            impresion = 1;
                        }
                    });
                    if(impresion == 0){
                        horarios.map( ({fk_cat_materias} = horario) => {
                            if(fk_cat_materias == id_cat_materias){
                                texto = 'bg-cuadricula-azul';
                            }
                        });                        
                        contenido += `
                            <div class="p-1 text-center border cuadricula text-small sin-scroll ${texto != '' ? texto : 'bg-cuadricula-none'}">
                                <div class="mt-1">
                                    <b>${clave}<br>
                                    ${nombre_abreviado_materia}</b>
                                </div>
                            </div>
                        `; 
                    }
                    texto = '';
                    impresion = 0;
                }else{
                    contenido += `
                        <div class="p-1 text-center border cuadricula text-small sin-scroll bg-white">
                            <div class="mt-1">
                                <br>
                            </div>
                        </div>
                    `; 
                }
                cont++;
            });
            cont = 0;
            $(`#seccion_materias_${temp}`).html(contenido);
            contenido = ``;
            temp ++;
            posicion++;
        }
    });
    $('#seccion_reticula').removeClass('d-none');
    $('#container_tabla').addClass('d-none');
    bootstrap.Itma2.end_loader();
}

$('#btn_canc_kardex').on('click',() => {
    $('#datos_alumno').addClass('d-none');
    $('#container_tablas_kardex').addClass('d-none');
    $('#container_tabla').removeClass('d-none');
});

$('#btn_regresar').on('click',() => {
    $('#seccion_reticula').addClass('d-none');
    $('#codigo_colores').addClass('d-none');
    $('#container_tabla').removeClass('d-none');
});

$('#btn_regresa_busqueda').on('click',() => {
    $('#container_tabla').addClass('d-none');
    $('#buscador').removeClass('d-none');
    $('#frm_busqueda')[0].reset();
});

$(document).ready(() => {
    caracter_numeros('valor_busqueda');
    $('#frm_busqueda').on("submit", (e) => {
        e.preventDefault();
        if (validar_campo(['valor_busqueda'],'vacios')) {
            filtrar_contenido();
        }
    });
});

