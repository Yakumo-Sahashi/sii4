let input = ['departamento','periodo'];

$("#seccion_tabla_asistencia").hide();

const consultar_organigrama = () =>{
    let datos = new FormData();
    datos.append('funcion',"consultar_area_academica");
    const selec = new Consultas("AsignacionTemporalDocente",datos);
    selec.catalogo('departamento','codigo_html');
}

const consultar_periodo = () =>{
    let datos = new FormData();
    datos.append('funcion',"obtener_periodo_full");
    const selec = new Consultas("InformacionCatalogos",datos);
    selec.catalogo('periodo','codigo_html');
}

consultar_periodo();
consultar_organigrama();

const consulta_filtrada = async() =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData($("#frm_consulta")[0]);
    let tabla = ``;
    $("#tabla_contenido_asistencia").html(``);
    $("#tabla_asistencia").DataTable().destroy();
    datos.append('funcion',"consulta_filtrada");
    const ejecucion = new Consultas("ListaAsistencia",datos);
    let resultado = await ejecucion.consulta();
    $("#seccion_tabla_asistencia").show();
    resultado.map(lista =>{
        let {alumnos_inscritos,apellido_materno,apellido_paterno,clave,id_grupo,nombre_completo_materia,nombre_grupo,nombre_persona,rfc,identificacion_corta,descripcion} = lista;
        tabla += `
        <tr> 
            <td class="align-middle text-start">${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
            <td class="align-middle">${nombre_completo_materia}</td>
            <td class="align-middle">${clave}</td>
            <td class="align-middle">${nombre_grupo}</td>
            <td class="align-middle">${alumnos_inscritos}</td>
            <td class="align-middle">
                <form action="app/docs/listado.doc.php" method="POST" targe="_blank">
                    <input type="text" name="id" value="${id_grupo}" hidden>
                    <input type="text" name="docente" value="${nombre_persona+" "+apellido_paterno+" "+apellido_materno}" hidden>
                    <input type="text" name="grupo" value="${nombre_grupo}" hidden>
                    <input type="text" name="rfc" value="${rfc}" hidden>
                    <input type="text" name="clave" value="${clave}" hidden>
                    <input type="text" name="nombre_completo_m" value="${nombre_completo_materia}" hidden>
                    <input type="text" name="identificacion_corta" value="${identificacion_corta}" hidden>
                    <input type="text" name="descripcion" value="${descripcion}" hidden>
                    <input type="text" name="alumnos_inscritos" value="${alumnos_inscritos}" hidden>
                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-file-contract"></i></butto>
                </form>
            </td>
        </tr>
        `;
    });
    
    $("#tabla_contenido_asistencia").html(`${tabla}`);
    $("#tabla_asistencia").DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

const lista_asistencia = async(id,docente,rfc,grupo,clave,materia,periodo,departamento,alumnos) =>{
    let ciclo_estudios = 'Licenciatura';
    let datos = new FormData();
    datos.append('funcion',"consultar_lista_asistencia");
    datos.append('id',id);
    console.log(`
    ${docente}
    ${rfc}
    ${grupo}
    ${clave}
    ${materia}
    ${periodo}
    ${departamento}
    ${alumnos}
    ${ciclo_estudios}
    `);
    const ejecucion = new Consultas("ListaAsistencia",datos);
    let respuesta = await ejecucion.consulta();
}


$("#frm_consulta").on('submit',(e) =>{
    e.preventDefault();
    if(validar_campo(input,'vacios')){
        consulta_filtrada();
    }
})