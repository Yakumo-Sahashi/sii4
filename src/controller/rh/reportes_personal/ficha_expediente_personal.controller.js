let input_ficha_expediente_personal = [];
const mostrarFicha = async()=>{
    bootstrap.Itma2.start_loader();  
    $(`#contenido_tabla_ficha_expediente`).html(``);  
    $('#tabla_ficha_expediente').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarInfoFichas');
    const ejecucion = new Consultas("RhReportesPersonal",datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(result=>{
        let{id_personal,nombre_persona,apellido_paterno,apellido_materno,rfc,descripcion_estatus,numero_tarjeta}=result;
            tabla +=`
            <tr>
                <td>${id_personal}</td>
                <td>${numero_tarjeta}</td>
                <td>${rfc}</td>
                <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                <td>${descripcion_estatus}</td>
                <td><button class="btn btn-outline-primary"><i class="fa-solid fa-file-import"></i></button></td>
            </tr>
        `; 
    });
    $(`#contenido_tabla_ficha_expediente`).html(`${tabla}`);  
    $('#tabla_ficha_expediente').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
mostrarFicha();
