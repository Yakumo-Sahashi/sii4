let input_asignar_puestos = [];

const mostrar_puestos=async()=>{
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_asignar_puesto_personal`).html(``);  
    $('#tabla_asignar_puesto_personal').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarPuestos');
    const ejecucion = new Consultas("RhPersonal", datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(puesto=>{
        let{id_cat_puestos,descripcion_puesto, clave_puesto, fk_cat_nivel_puesto,} = puesto;
        tabla +=`
            <tr>
                <td>${id_cat_puestos}</td>
                <td>${clave_puesto}</td>
                <td>${descripcion_puesto}</td>
                <td>${fk_cat_nivel_puesto}</td>
            </tr>
        `;
    });
    $(`#contenido_tabla_asignar_puesto_personal`).html(`${tabla}`);  
    $('#tabla_asignar_puesto_personal').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });  
    bootstrap.Itma2.end_loader();   
}

const mostrar_todos_puestos=()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPuestos');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_puesto','codigo_html');
}
const mostrar_niveles=()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerNiveles');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('nivel_puesto','codigo_html');
}
const asignar_nivel=()=>{

}
$('#btn_asignar_nivel').on('click',()=>{
    if(validar_campo(['seleccion_puesto','nivel_puesto'],'vacios')){
        let datos = new FormData($('#frm_asignar_nivel')[0]);
        datos.append('funcion','actualizarNivel');
        const ejecucion = new Consultas("RhPersonal",datos);
        ejecucion.insercion();
        console.log(datos);
        mostrar_puestos();
        $('#frm_asignar_nivel')[0].reset();
    }
});
mostrar_puestos();
mostrar_todos_puestos();
mostrar_niveles();