let input_plantilla_personal = [];
const mostrarPlantilla = async() =>{
    bootstrap.Itma2.start_loader();  
    $(`#contenido_tabla_ficha_expediente`).html(``);  
    $('#tabla_ficha_expediente').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarPlantilla');
    const ejecucion = new Consultas("RhReportesPersonal",datos);
    let resultado = await ejecucion.consulta();
    console.log(resultado);
    let tabla = ``;
    resultado.map(result=>{
        let{id_cat_organigrama,descripcion} = result;
        tabla+=`
            <tr>
                <td>${id_cat_organigrama}</td>
                <td>${descripcion}</td>
                <td><button class="btn btn-outline-primary"><i class="fa-solid fa-file-import"></i></button></td>
            </tr>
        `
    });
    $(`#contenido_tabla_ficha_expediente`).html(`${tabla}`);  
    $('#tabla_ficha_expediente').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
mostrarPlantilla();