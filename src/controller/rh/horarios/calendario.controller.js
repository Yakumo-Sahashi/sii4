const cargar_archivo = async () =>{
    bootstrap.Itma2.start_loader();
    let datos = new FormData($("#frm_calendario")[0]);
    datos.append('funcion','actualizar_calendario');
    const ejecucion = new Consultas("RhHorarios", datos);
    let respuesta = await ejecucion.insertar();
    if(respuesta[0]== 0){
        msj_error(respuesta[1]);
    }else{
        msj_exito(respuesta[1]);
    }
    $('#frm_calendario')[0].reset();
    bootstrap.Itma2.end_loader();

}

$(document).ready(() => {
    $('#frm_calendario').on('submit', (e) => {
        e.preventDefault();
        if(validar_campo(['archivo'],'vacios')){
            cargar_archivo();
        }
    });
});