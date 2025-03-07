const mostrar_puestos = async()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPuestos');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_puesto_personal','codigo_html');
}
const consultarPersonal = async (personal) =>{
    bootstrap.Itma2.start_loader();
    $(`#contenido_tabla_personal_puesto`).html(``);  
    $('#tabla_personal_puesto').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','consultarPersonalPuesto');
    datos.append('filtro',`${personal}`);
    const ejecucion = new Consultas("RhReportesPersonal",datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(personal=>{
        let {id_personal,apellido_paterno,apellido_materno,nombre_persona,descripcion,descripcion_puesto,estudios} = personal;
        tabla+=`
            <tr>
                <td>${id_personal}</td>
                <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                <td>${descripcion}</td>
                <td>${descripcion_puesto}</td>
                <td>${estudios}</td>
            </tr>
        `
    });
    $(`#contenido_tabla_personal_puesto`).html(`${tabla}`);  
    $('#tabla_personal_puesto').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();
}
$(`[name=seleccion_puesto_personal]`).on('change',()=>{
    consultarPersonal($(`[name=seleccion_puesto_personal]`).val());
});

mostrar_puestos();