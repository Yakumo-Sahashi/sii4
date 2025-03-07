let input_listado_general = [];
const mostrar_info=async()=>{
    bootstrap.Itma2.start_loader();  
    $(`#contenido_tabla_listado_general`).html(``);  
    $('#tabla_listado_general').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarInfo');
    const ejecucion = new Consultas("RhReportesPersonal",datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(info=>{
        let{id_personal,apellido_paterno,apellido_materno,rfc,curp,nombre_persona,inicio_sep}=info;
        tabla +=`
            <tr>
                <td>${id_personal}</td>
                <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                <td>${rfc}</td>
                <td>${curp}</td>
                <td>${inicio_sep}</td>
            </tr>
        `;
    });
    $(`#contenido_tabla_listado_general`).html(`${tabla}`);  
    $('#tabla_listado_general').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
mostrar_info();