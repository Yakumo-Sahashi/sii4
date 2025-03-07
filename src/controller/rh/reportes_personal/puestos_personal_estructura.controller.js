let input_puestos_personal_estructura = [];

const mostrarPersonalEstructura = async () =>{
    bootstrap.Itma2.start_loader();  
    $(`#contenido_tabla_puesto_personal_estructura`).html(``);  
    $('#tabla_puesto_personal_estructura').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','personalEstructura');
    const ejecucion = new Consultas("RhReportesPersonal",datos);
    let resultado = await ejecucion.consulta();
    console.log(resultado);
    let tabla = ``;
    resultado.map(result=>{
        let{id_personal,descripcion,nombre_persona,apellido_materno,apellido_paterno} = result;
        tabla+=`
            <tr>
                <td>${id_personal}</td>
                <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno+''}</td>
                <td>${descripcion}</td>
            </tr>
        `
    });
    $(`#contenido_tabla_puesto_personal_estructura`).html(`${tabla}`);  
    $('#tabla_puesto_personal_estructura').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
mostrarPersonalEstructura();