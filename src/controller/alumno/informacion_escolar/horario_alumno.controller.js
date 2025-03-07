const obtener_informacion_alumno = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','consultar_alumno');
    const ejecucion = new Consultas("DatosAlumno", datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        let {fk_numero_control,nombre_persona,apellido_paterno,apellido_materno,numero_control,semestre,nombre_carrera,especialidad,promedio_aritmetico_acumulado,periodo, horario} = resultado[1];
        //$('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`)
        let horario_t = ``, contenido = `
            <tr>
                <th class="align-middle">${numero_control}</th>
                <th class="align-middle">${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}</th>
                <th class="align-middle">${semestre}</th>
                <th class="align-middle">${periodo}</th>
                <th class="align-middle">${promedio_aritmetico_acumulado}</th>
            </tr>
            <tr class="bg-primary text-white">
                <th colspan="3" class="align-middle">Carrera</th>
                <th colspan="2" class="align-middle">Especialidad</th>
            </tr>
            <tr>
                <th colspan="3" class="align-middle">${nombre_carrera}</th>
                <th colspan="2" class="align-middle">${especialidad}</th>
            </tr>
        `;
        $('#contenido_tabla_datos_personales').html(contenido);
        horario.map(({lunes,martes,miercoles,jueves,viernes,sabado,nombre_grupo,nombre,creditos_totales,clave,rep,docente} = materia) => {
            horario_t += `
            <tr>
                <th class="align-middle text-start">
                    <b>${clave}</b><br>
                    ${nombre}
                    <p class="text-small">${docente}</p>
                </th>
                <th class="align-middle">${nombre_grupo}</th>
                <th class="align-middle">${creditos_totales}</th>
                <th class="align-middle text-small">${lunes}</th>
                <th class="align-middle text-small">${martes}</th>
                <th class="align-middle text-small">${miercoles}</th>
                <th class="align-middle text-small">${jueves}</th>
                <th class="align-middle text-small">${viernes}</th>
                <th class="align-middle text-small">${sabado}</th>
            </tr>
            `;
        });
        $('#contenido_tabla_horario_alumno').html(horario_t);
        $('#alumno').val(fk_numero_control);
    }else{
        msj_error(resultado[1])
    }
    bootstrap.Itma2.end_loader();
}

$(document).ready(() => {
    obtener_informacion_alumno();    
});