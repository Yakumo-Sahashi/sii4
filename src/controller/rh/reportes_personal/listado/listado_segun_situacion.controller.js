
const mostrarInfoSituacion = async()=>{
    bootstrap.Itma2.start_loader();  
    $(`#contenido_tabla_listado_personal_situacion`).html(``);  
    $('#tabla_listado_personal_situacion').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarInfoSituacion');
    const ejecucion = new Consultas("RhReportesPersonal",datos);
    let resultado = await ejecucion.consulta();
    console.log(resultado);
    let tabla = ``;
    resultado.map(info=>{
        let{id_personal,apellido_paterno,apellido_materno,nombre_persona,rfc,descripcion,descripcion_puesto,grado_maximo_estudio}=info;
        tabla +=`
            <tr>
                <td>${id_personal}</td>
                <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                <td>${rfc}</td>
                <td>${descripcion}</td>
                <td>${descripcion_puesto}</td>
                <td>${grado_maximo_estudio}</td>
            </tr>
        `;
    });
    $(`#contenido_tabla_listado_personal_situacion`).html(`${tabla}`);  
    $('#tabla_listado_personal_situacion').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
mostrarInfoSituacion();