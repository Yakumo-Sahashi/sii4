const obtener_periodo_escolar = (fk_periodo_ingreso) => {
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_alumno");
    datos.append('periodo_ingreso',fk_periodo_ingreso);
    const selec = new Consultas("DatosAlumno",datos);
    selec.catalogo('opcion_periodo_calificaciones','codigo_html');
}

const obtener_informacion_alumno = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','consultar_datos_alumno');
    const ejecucion = new Consultas("DatosAlumno", datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        let {fk_numero_control,nombre_persona,apellido_paterno,apellido_materno,numero_control,semestre,nombre_carrera,especialidad,fk_periodo_ingreso} = resultado[1];
        let contenido = `
            <tr class="bg-primary text-white">
                <th scope="col">No. Control</th>
                <th colspan="2" scope="col">Nombre del Alumno</th>
                <th scope="col">Semetre</th>
                <th scope="col">Periodo Escolar</th>
            </tr>
            <tr>
                <th class="align-middle">${numero_control}</th>
                <th colspan="2" class="align-middle">${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}</th>
                <th class="align-middle">${semestre}</th>
                <th class="align-middle" id="periodo_seleccionado"></th>
            </tr>
            <tr class="bg-primary text-white">
                <th class="align-middle">Ciclo de Estudios</th>
                <th colspan="2" class="align-middle">Carrera</th>
                <th colspan="2" class="align-middle">Especialidad</th>
            </tr>
            <tr>
                <th class="align-middle">Licenciatura</th>
                <th colspan="2" class="align-middle">${nombre_carrera}</th>
                <th colspan="2" class="align-middle">${especialidad}</th>
            </tr>
        `;
        $('#datos_alumno').html(contenido);
        $('#numero_control').val(fk_numero_control);
        obtener_periodo_escolar(fk_periodo_ingreso);
    }else{
        msj_error(resultado[1])
    }
    bootstrap.Itma2.end_loader();
}

const obtener_boleta_alumno = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData($('#frm_consulta_calificaciones')[0]);
    datos.append('funcion','obtener_boleta');
    const ejecucion = new Consultas("DatosAlumno", datos);
    let resultado = await ejecucion.consulta();
    let contenido = ` 
        <tr class="bg-primary">
            <th class="text-white" >Materia</th>
            <th class="text-white" >Cr</th>
            <th class="text-white" >Calificación</th>
            <th class="text-white" >Tipo de Evaluación</th>
            <th class="text-white" >Observaciones</th> 
        </tr>
    `;
    if(resultado.length > 0){
        resultado.map(({calificacion,clave_oficial,creditos_totales,descripcion_corto,nombre_completo_materia} = calificaciones) => {
            contenido += ` 
                <tr>
                    <th class="text-start text-small">    
                        <b>${clave_oficial}</b><br>
                        ${nombre_completo_materia}
                    </th>
                    <th class="" >${creditos_totales}</th>
                    <th class="" >${calificacion}</th>
                    <th class="" >${descripcion_corto}</th>
                    <th class="" ></th> 
                </tr>
            `;
        });
    }else{
        contenido += ` 
            <tr>
                <th colspan="5">    
                    <h1>Sin calificaciones registradas</h1>
                </th>
            </tr>
        `;
    }
    $('#contenido_tabla_boleta_calificaciones').html(contenido);
    bootstrap.Itma2.end_loader();
}

$('#opcion_periodo_calificaciones').on('change',() => {
    if($('#opcion_periodo_calificaciones').val() != ''){
        obtener_boleta_alumno();
        $('#periodo_seleccionado').text($('select[name="opcion_periodo_calificaciones"] option:selected').text());
        $('#seccion_tabla_boleta_calificaciones').removeClass('d-none'); 
    }else{
        $('#seccion_tabla_boleta_calificaciones').addClass('d-none'); 
    }
});

$(document).ready(() => {
    obtener_informacion_alumno();    
});