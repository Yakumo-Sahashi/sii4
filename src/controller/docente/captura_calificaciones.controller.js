let captura = true;
let input_captura_cal = [];

const precargar_act_normal = async (id) => {
    bootstrap.Itma2.start_loader();
    input_captura_cal = [];
    let datos = new FormData();
    datos.append('funcion','precargar_alumnos'); 
    datos.append('materia',id);
    const ejecucion = new Consultas("CapturaCalificacionDocente", datos);
    let respuesta = await ejecucion.consulta();
    let {nombre_grupo,nombre_persona,apellido_paterno,apellido_materno,nombre_completo_materia,periodo} = respuesta[1];
    $('#periodo_normal').val(periodo);
    $('[name=materia_normal]').val(nombre_completo_materia);
    $('[name=grupo_normal]').val(nombre_grupo);
    $('[name=docente_normal]').val(`${apellido_paterno} ${apellido_materno} ${nombre_persona}`);
    let contenido = ``, cont = 1;
    respuesta[0].map(alumnos => {
        let {id_seleccion_materias,numero_control,nombre_persona,apellido_paterno,apellido_materno,calificacion,fk_tipo_evaluacion,presento,repeticion} = alumnos;
        contenido += `
            <hr class="my-2">
            <input type="text" name="id_${cont}" value="${id_seleccion_materias}" hidden>
            <div class="col-lg-1 col-md-4 col-sm-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="No." value="${cont}" readonly>
                    <label for="" class="small">No.</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-8 col-sm-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-small" placeholder="No. Control" value="${numero_control}" readonly>
                    <label for="" class="small">No. Control</label>
                </div>
            </div>
            <div class="col-lg-3 col-md-9">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-small" placeholder="Alumno" value="${apellido_paterno} ${apellido_materno} ${nombre_persona}" readonly>
                    <label for="" class="small">Alumno</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="calificacion${cont}" id="calificacion${cont}" placeholder="Calificación" value="${calificacion == 'NA' ? 0 : calificacion}" minlength="1" maxlength="3">
                    <label for="calificacion${cont}" class="small">Calificación</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <select class="form-control" name="tipo_evaluacion${cont}" id="tipo_evaluacion${cont}">
                        <option value="4" ${fk_tipo_evaluacion == '4' ? 'Selected' : ''}>Ev.Ord.1ra</option>
                        <option value="12" ${fk_tipo_evaluacion == '12' ? 'Selected' : ''}>Ev.Reg.1ra</option>
                        <option value="7" ${fk_tipo_evaluacion == '7' ? 'Selected' : ''}>Ev.Ext.1ra</option>
                    </select>
                    <label for="tipo_evaluacion${cont}" class="small">Tipo Evaluacion</label>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-12 text-center align-self-center">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" ${presento == 0 ? 'checked' : ''} name="no_presento${cont}" id="no_presento${cont}">
                    <label for="no_presento" class="form-check-label text-small">No Presento</label>
                </div>
            </div>
            <div class="col-lg-1 col-md-3 col-sm-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-center" readonly placeholder="Repite" value="${repeticion}">
                    <label for="" class="small">Repite</label>
                </div>
            </div>
            <hr class="my-2">
        `;
        input_captura_cal.push(`calificacion${cont}`);
        cont++;
    });
    contenido += `<input type="text" name="cantidad_normal" value="${cont}" hidden></input>`;
    $('#seccion_calificaciones').html(contenido);
    $('#modal_capturar').modal('show');
    if(respuesta[2] > 0){
        $('#btn_capturar_cal').addClass('d-none');
        captura = false;
        msj_error('No puedes capturar calificaciones hasta haber registrado todas las calificaciones parciales por unidad!!');
    }else{
        captura = true;
        $('#btn_capturar_cal').removeClass('d-none')
    }
    bootstrap.Itma2.end_loader();   
}

const consulta_materias_docente = async() =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    let contenido = ``;
    $("#tabla_materias").html(``);
    $("#tabla_materias_parcial").DataTable().destroy();
    datos.append('funcion',"consulta_materias");
    const ejecucion = new Consultas("DocumentosDocente",datos);
    let resultado = await ejecucion.consulta();
    resultado.map(({alumnos_inscritos,clave,nombre_completo_materia,nombre_grupo,fk_cat_materias} = lista) =>{
        contenido += `
        <tr> 
            <td class="align-middle text-start text-small"><b>${clave}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle">${nombre_grupo}</td>
            <td class="align-middle">${alumnos_inscritos}</td>
            <td class="align-middle"><button type="button" class="btn btn-outline-primary btn-sm" onclick="precargar_act_normal(${fk_cat_materias})"><i class="fa-solid fa-list"></i></button></td>
            <td class="align-middle">
                <form action="app/docs/docente_acta_calif.doc.php" method="POST" targe="_blank">
                    <input type="text" name="materia" value="${fk_cat_materias}" hidden>
                    <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-file-lines"></i></butto>
                </form>
            </td>
            <td class="align-middle">
                <form action="app/docs/docente_captura_calificaciones.doc.php" method="POST" targe="_blank">
                    <input type="text" name="materia" value="${fk_cat_materias}" hidden>
                    <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa-regular fa-file-excel" id="btn_generar_excel"></i></button>
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

const actualizar_cal_normales = () =>{
    let datos = new FormData($('#frm_captura_cal_normal')[0]);
    datos.append('funcion',"actualizar_calificacion_normal");
    const ejecucion = new Consultas("CalificacionesActas",datos);
    ejecucion.insercion();
}

consulta_materias_docente();


$(document).ready(() => {
    $('#frm_captura_cal_normal').on('submit', (e) => {
        e.preventDefault();
        if(captura){
            if(validar_campo(input_captura_cal,'vacios')){
                if(validar_campo(input_captura_cal,"calificacion")){
                    actualizar_cal_normales();
                }else{
                    msj_error("Las calificaciones validas estan en el rango de 0 y 100");
                }
            }
        }
    });
});