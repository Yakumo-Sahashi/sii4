let input_cal_parcial = [];

const consulta_materias_docente = async() =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    let contenido = ``;
    $("#tabla_materias").html(``);
    $("#tabla_materias_parcial").DataTable().destroy();
    datos.append('funcion',"consulta_materias");
    const ejecucion = new Consultas("DocumentosDocente",datos);
    let resultado = await ejecucion.consulta();
    resultado.map(({alumnos_inscritos,apellido_materno,apellido_paterno,clave,id_grupo,nombre_completo_materia,nombre_grupo,nombre_persona,fk_cat_carrera,descripcion} = lista) =>{
        contenido += `
        <tr> 
            <td class="align-middle text-start text-small"><b>${clave}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle">${nombre_grupo}</td>
            <td class="align-middle">${alumnos_inscritos}</td>
            <td class="align-middle"><button type="button" class="btn btn-outline-primary btn-sm" onclick="precargar_alumnos(${id_grupo})"><i class="fa-solid fa-list"></i></button></td>
            <td class="align-middle">
                <form action="app/docs/docente_inicio_curso.doc.php" method="POST" targe="_blank">
                    <input type="text" name="id" value="${id_grupo}" hidden>
                    <input type="text" name="docente" value="${nombre_persona+" "+apellido_paterno+" "+apellido_materno}" hidden>
                    <input type="text" name="grupo" value="${nombre_grupo}" hidden>
                    <input type="text" name="carrera" value="${fk_cat_carrera}" hidden>
                    <input type="text" name="clave" value="${clave}" hidden>
                    <input type="text" name="nombre_completo_m" value="${nombre_completo_materia}" hidden>
                    <input type="text" name="descripcion" value="${descripcion}" hidden>
                    <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-print"></i></butto>
                </form>
            </td>
            <td class="align-middle">
                <form action="app/docs/listado.doc.php" method="POST" targe="_blank">
                    <input type="text" name="id" value="${id_grupo}" hidden>
                    <input type="text" name="docente" value="${nombre_persona+" "+apellido_paterno+" "+apellido_materno}" hidden>
                    <input type="text" name="grupo" value="${nombre_grupo}" hidden>
                    <input type="text" name="rfc" value="" hidden>
                    <input type="text" name="clave" value="${clave}" hidden>
                    <input type="text" name="nombre_completo_m" value="${nombre_completo_materia}" hidden>
                    <input type="text" name="identificacion_corta" value="" hidden>
                    <input type="text" name="descripcion" value="${descripcion}" hidden>
                    <input type="text" name="alumnos_inscritos" value="${alumnos_inscritos}" hidden>
                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-file-contract"></i></butto>
                </form>
            </td>
        </tr>
        `;
    });
    
    $("#tabla_materias").html(contenido);
    $("#tabla_materias_parcial").DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

const calcular_promedio = (no_unidades,fk_control) =>{
    let promedio = 0, contador_na = 0;
    for(let i = 1; i <= no_unidades; i++){
        promedio += parseInt($(`[name=u${i}_${fk_control}]`).val() < 70  ? 0 : $(`[name=u${i}_${fk_control}]`).val());
        contador_na += ($(`[name=u${i}_${fk_control}]`).val() < 70) ?? 1;
    }
    let final = Math.round((promedio/no_unidades) * Math.pow(10, 2)) / Math.pow(10, 2);
    if(final > 69 && contador_na == 0){
        $(`#estado_${fk_control}`).html(` 
            <span class="btn btn-outline-success rounded-circle">
                <i class="fa-solid fa-circle-check py-1 mt-1"></i>
            </span>
        `);
    }else{
        $(`#estado_${fk_control}`).html(`
            <span class="btn btn-outline-danger rounded-circle">
                <i class="fa-solid fa-xmark"></i>
            </span>
        `);
    }
    $(`[name=promedio_${fk_control}]`).val(final);
}

const precargar_alumnos = async(id) => {
    bootstrap.Itma2.start_loader(); 
    input_cal_parcial = [];
    let datos = new FormData();
    let contenido = ``;
    $("#tabla_calificacion").html(``);
    datos.append('funcion',"consultar_alumnos_materia");
    datos.append('grupo',id);
    const ejecucion = new Consultas("CapturaCalificacionDocente",datos);
    let resultado = await ejecucion.consulta();
    let {id_grupo,identificacion_corta,nombre_completo_materia,no_unidades,nombre_grupo} = resultado[0];
    let encabezado = ``;
    for(let i = 1; i <=no_unidades; i++){
        encabezado += `<th scope="col">U${i}</th>`;
    }
    $('#titulos_tabla').html(`
        <th scope="col">No.</th>
        <th scope="col">No. Control</th>
        <th scope="col">Nom. Alumno</th>
        ${encabezado}
        <th scope="col">Prom.</th>
        <th scope="col">Acredita</th>
        <th scope="col">Calcular</th>
    `);
    const generar_unidades = (unidades,fk_control) => {
        let uni = ``;
        for(let i = 1; i <= unidades; i++){
            uni += `
                <td class="align-middle text-small">
                    <input class="form-control form-control-sm" type="text" name="u${i}_${fk_control}" value="" minlength="1" maxlength="3">
                </td>
            `;   
        }
        return uni;                 
    }
    let con = 1;
    $('#titulo_periodo').text(identificacion_corta);
    $('#titulo_materia').text(nombre_completo_materia);
    $('#titulo_grupo').text(nombre_grupo);
    $('[name=grupo_id]').val(id_grupo);
    $('[name=n_unidades]').val(no_unidades);
    resultado[1].map(({nombre_alumno,control,fk_control} = lista) =>{
        contenido += `
        <tr>
            <td class="align-middle text-small">${con}</td> 
            <td class="align-middle text-small">${control}</td>
            <td class="align-middle text-small">${nombre_alumno}</td>
            ${generar_unidades(no_unidades,fk_control)}
            <td class="align-middle text-small">
                <input readonly class="form-control form-control-sm border border-primary" type="text" name="promedio_${fk_control}" value="">
                <input type="text" name="control_${con}" value="${fk_control}" hidden>
            </td>
            <td class="align-middle text-small" id="estado_${fk_control}">               
            </td> 
            <td class="align-middle text-small">
                <button type="button" class="btn btn-outline-primary" onclick="calcular_promedio(${no_unidades},${fk_control})"><i class="fa-solid fa-calculator"></i></button>
            </td>
        </tr>
        `;
        con++;
    });
    $("#tabla_calificacion").html(contenido);
    let promedio = 0;
    resultado[1].map(({calificaciones} = lista) =>{
        calificaciones.map(({calificacion_unidad,no_unidad,fk_numero_control} = calificaciones) => {
            $(`[name=u${no_unidad}_${fk_numero_control}]`).val(calificacion_unidad == 'NA' ? 0 : calificacion_unidad );
            input_cal_parcial.push(`u${no_unidad}_${fk_numero_control}`);
            if(no_unidad == no_unidades) {
                calcular_promedio(no_unidades,fk_numero_control);
            }
        });
    });
    $('#titulos').removeClass('d-none');
    $('#frm_calificaciones_parciales').removeClass('d-none');
    $('#listado_materias').addClass('d-none');
    bootstrap.Itma2.end_loader();    
}

const registrar_calificaciones = () => {
    let datos = new FormData($('#frm_calificaciones_parciales')[0]);
    datos.append('funcion',"registrar_calificaciones");
    const ejecucion = new Consultas("CapturaCalificacionDocente",datos);
    ejecucion.insercion();
}

$('#btn_regresar').on('click',() => {
    $('#titulos').addClass('d-none');
    $('#frm_calificaciones_parciales').addClass('d-none');
    $('#listado_materias').removeClass('d-none');
});

consulta_materias_docente();

$(document).ready(() => {
    $('#frm_calificaciones_parciales').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(input_cal_parcial,'vacios')){
            if(validar_campo(input_cal_parcial,"calificacion")){
                registrar_calificaciones();
            }else{
                msj_error("Las calificaciones validas estan en el rango de 0 y 100");
            }
        }else{
            msj_error("No puedes dejar ningun campo vacio");
        }
    });
});