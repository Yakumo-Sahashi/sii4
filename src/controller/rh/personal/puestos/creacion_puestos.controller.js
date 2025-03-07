let input_creacion_puestos = [];
caracter_mayus('descripcion_puesto');
caracter_letras('descripcion_puesto');
const mostrar_nivel_puesto= ()=>{
    let datos = new FormData();
    datos.append('funcion','obtener_nivel');
    const ejecucion = new Consultas("InformacionCatalogos", datos);
    ejecucion.catalogo('nivel_puesto','codigo_html');
}

/* const matricula=async()=>{
    let datos = new FormData();
    datos.append('funcion','consultarClave');
    const ejecucion = new Consultas("Puestos", datos);
    let response = await ejecucion.consulta();
    let{clave_puesto} = response;
} */
const mostrar_puestos=async()=>{
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_crear_puesto`).html(``);  
    $('#tabla_crear_puesto').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarPuestos');
    const ejecucion = new Consultas("RhPersonal", datos);
    console.log(datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(puesto=>{
        let{id_cat_puestos,descripcion_puesto, clave_puesto, descripcion_nivel_puesto} = puesto;
        tabla +=`
            <tr>
                <td>${id_cat_puestos}</td>
                <td>${clave_puesto}</td>
                <td>${descripcion_puesto}</td>
                <td>${descripcion_nivel_puesto}</td>
            </tr>
        `;
    });
    $(`#contenido_tabla_crear_puesto`).html(`${tabla}`);  
    $('#tabla_crear_puesto').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();   
}
$('#btn_crear_puesto').on('click',()=>{
    if(validar_campo(['descripcion_puesto','nivel_puesto'],'vacios')){
        let datos = new FormData($("#frm_crear_puesto")[0]);
        datos.append('funcion','crearPuesto');
        const ejecucion = new Consultas("RhPersonal",datos);
        ejecucion.insercion();
        mostrar_puestos();
        $("#frm_crear_puesto")[0].reset();
    }
})
mostrar_puestos();
mostrar_nivel_puesto();
