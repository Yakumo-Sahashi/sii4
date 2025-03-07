const consultar_organigrama = async () =>{
    let datos = new FormData();
    datos.append('funcion',"organigrama_materias");
    const ejecucion = new Consultas("PlazasAsignadas",datos);
    let resultado = await ejecucion.consulta();
    $('[name=seleccion_departamento_plaza]').val(resultado.descripcion);
}

const consultar_periodo = async () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo");
    const ejecucion = new Consultas("AsignacionGrupo",datos);
    let resultado = await ejecucion.consulta();
    $('[name=periodo]').val(resultado.identificacion_corta);
}

const consultar_docentes = async ()=> {
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_especiales_1`).html(``);  
    $('#tabla_especiales_1').DataTable().destroy();
    $(`#contenido_tabla_especiales_2`).html(``);  
    $('#tabla_especiales_2').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultar_examenes_sin_cal');
    const ejecucion = new Consultas('ExamenesEspecialesSinCal',datos);
    let respuesta = await ejecucion.consulta();
    let tabla = ``, tabla2 = ``;
    respuesta.map(({materia,clave_oficial,solicitud} = examen) => {
        let {apellido_paterno = "---",apellido_materno = "",nombre_persona = "",rfc = ""} = solicitud;
        if(rfc != ""){
            tabla += `
            <tr> 
                <td class="align-middle text-start">
                    ${apellido_paterno} ${apellido_materno} ${nombre_persona}
                </td>
                <td class="align-middle">${rfc}</td>
                <td class="align-middle">${clave_oficial}</td>
                <td class="align-middle">${materia}</b></td>
            </tr>`;
        }else{
            tabla2 += `
            <tr> 
                <td class="align-middle">${clave_oficial}</td>
                <td class="align-middle">${materia}</b></td>
            </tr>`;
        }
    });
    $(`#contenido_tabla_especiales_1`).html(tabla);
    $('#tabla_especiales_1').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    $(`#contenido_tabla_especiales_2`).html(tabla2);
    $('#tabla_especiales_2').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader(); 
}

consultar_organigrama();
consultar_periodo();
consultar_docentes();