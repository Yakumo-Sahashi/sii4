const consulta_materias_docente = async() =>{
    bootstrap.Itma2.start_loader(); 
    let datos = new FormData();
    let contenido = ``;
    $("#tabla_reporte").html(``);
    $("#tabla_listado_reporte").DataTable().destroy();
    datos.append('funcion',"consulta_materias");
    const ejecucion = new Consultas("DocumentosDocente",datos);
    let resultado = await ejecucion.consulta();
    resultado.map(({alumnos_inscritos,apellido_materno,apellido_paterno,clave,id_grupo,nombre_completo_materia,nombre_grupo,nombre_persona,fk_cat_carrera,descripcion} = lista) =>{
        contenido += `
        <tr> 
            <td class="align-middle text-start text-small"><b>${clave}</b><br>${nombre_completo_materia}</td>
            <td class="align-middle">${nombre_grupo}</td>
            <td class="align-middle">${alumnos_inscritos}</td>
            <td class="align-middle">
                <form action="app/docs/docente_inicio_curso.doc.php" method="POST" targe="_blank">
                    <input type="text" name="id" value="${id_grupo}" hidden>
                    <input type="text" name="docente" value="${nombre_persona+" "+apellido_paterno+" "+apellido_materno}" hidden>
                    <input type="text" name="grupo" value="${nombre_grupo}" hidden>
                    <input type="text" name="carrera" value="${fk_cat_carrera}" hidden>
                    <input type="text" name="clave" value="${clave}" hidden>
                    <input type="text" name="nombre_completo_m" value="${nombre_completo_materia}" hidden>
                    <input type="text" name="descripcion" value="${descripcion}" hidden>
                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-print"></i></butto>
                </form>
            </td>
        </tr>
        `;
    });
    
    $("#tabla_reporte").html(contenido);
    $("#tabla_listado_reporte").DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
    bootstrap.Itma2.end_loader();
}

consulta_materias_docente();