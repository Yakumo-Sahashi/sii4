let input_asignacion_personal_puestos = [];

const eliminar_historial = async (id_historia_alumno) =>{
    swal({
        title: "Desea eliminar el historial seleccionado?",
        text: `Una vez eliminado no se podra recuperar`,
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
    }).then(eliminar => {
        if (eliminar) {
            let datos = new FormData();
            // datos.append('funcion','eliminar_historial');
            console.log('Eliminado');
            /* datos.append('id_historia_alumno', `${id_historia_alumno}`);
            const ejecucion = new Consultas("HistorialAcademico", datos);
            ejecucion.insercion(); */
        } else {
            // msj_exito("Se ha conservado el historial");
        }
    });
}

const mostrar_info =async()=>{
    bootstrap.Itma2.start_loader();    
    $(`#contenido_tabla_asignar_puesto_personal`).html(``);  
    $('#tabla_asignar_puesto_personal').DataTable().destroy();
    let datos = new FormData();
    datos.append('funcion','mostrarInfo');
    const ejecucion = new Consultas("RhPersonal",datos);
    let resultado = await ejecucion.consulta();
    let tabla = ``;
    resultado.map(informacion=>{
        let {id_personal,rfc,nombre_persona,apellido_paterno,apellido_materno,descripcion_puesto} = informacion;
        if(id_personal != 0){
            tabla+=`
                <tr>
                    <td>${id_personal}</td>
                    <td>${rfc}</td>
                    <td>${nombre_persona+' '+apellido_paterno+' '+apellido_materno}</td>
                    <td>${descripcion_puesto}</td>
                </tr>
            `;
        }
    });
    $(`#contenido_tabla_asignar_puesto_personal`).html(`${tabla}`);  
    $('#tabla_asignar_puesto_personal').DataTable({
        "language": {
            "url": "./json/lenguaje.json"
        }
    });
}
const mostrar_personal = async ()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPersonal');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_personal','codigo_html');
}
mostrar_personal();
const mostrar_puestos = async()=>{
    let datos = new FormData();
    datos.append('funcion','obtenerPuestos');
    const ejecucion = new Consultas("RhPersonal", datos);
    ejecucion.catalogo('seleccion_puesto','codigo_html');
}
$('#btn_asignar_puesto_personal').on('click',()=>{
    if (validar_campo(['seleccion_personal','seleccion_puesto'],'vacios')) {
        let datos = new FormData($('#frm_asignar_personal')[0]);
        datos.append('funcion','actualizarPuestoPersonal');
       const ejecucion = new Consultas("RhPersonal",datos);
        ejecucion.insercion();
        mostrar_info();
        $('#frm_asignar_personal')[0].reset();
    }
});
mostrar_puestos();

mostrar_info();