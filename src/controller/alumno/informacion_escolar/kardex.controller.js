const obtener_informacion_alumno = async () => {
    bootstrap.Itma2.start_loader();
    let datos = new FormData();
    datos.append('funcion','consultar_alumno');
    const ejecucion = new Consultas("AvanceReticula", datos);
    let resultado = await ejecucion.consulta();
    if(resultado[0] == 1){
        let {id_persona,nombre_persona,apellido_paterno,apellido_materno,numero_control,semestre,nombre_carrera,especialidad,clave_reticula,kardex,id_usuario} = resultado[1];
        $('[name=nombre_alumno]').val(`${nombre_persona +' ' + apellido_paterno + ' ' + apellido_materno}`);
        $('[name=numero_control]').val(`${numero_control}`);  
        $('[name=semestre]').val(`${semestre}`);  
        $('[name=carrera]').val(`${nombre_carrera}`);  
        $('[name=especialidad]').val(`${especialidad}`);   
        $('[name=plan_estudios]').val(`${clave_reticula}`);
        $('#img_foto').attr('src',`public/img/alumno/${id_usuario}/fotografia.webp`)
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
        $('#continer_frm_num_ctrl').addClass('d-none');
        $('#datos_alumno').removeClass('d-none');
        $('#container_tablas_kardex').removeClass('d-none');
    }else{
        msj_error(resultado[1])
    }
    bootstrap.Itma2.end_loader();
}

$(document).ready(() => {
    obtener_informacion_alumno();
});